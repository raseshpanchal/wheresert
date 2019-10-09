<?php
include("../../config/connection.php");
$newID=$_GET['ID'];
?>
<style>
.success_alert{
    background-color:#6C3;
    color:#FFF;
    border:dashed 1px #666;
    width:100%;
    height:30px;
    padding-top:4px;
    text-align:center;
    display:none;
}
</style>
<script src="app/js/onlyAlpha.js"></script>
<script src="app/js/onlyNum.js"></script>
<script>
$(document).ready(function(){
    $("#btnSave").click(function(){
        $('#btnSave').attr("disabled", true);
        $.post("app/mainUserRightsEntry?ID=<?php echo $newID; ?>",
        $("#myForm").serialize(),
        function(data){
            //alert('Record Addedd Successully!');
            $('.success_alert').fadeIn(300);
            $(".success_alert").delay(1500).fadeOut(300);
            $('#btnSave').attr("disabled", false);
            closeFormDelete();
        });
        return false;
    });

    //Function for Cancel
    $("#btnCancel").click(function(){
        closeForm();
    });
});
</script>

<div class="formShadow"></div>

<div style="background-color:#424a5d; height:37px; border-top:solid 1px #FFF; border-bottom:solid 1px #044636; color:#FFF; padding-left:15px; padding-top:7px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Main Section User Rights</td>
  </tr>
</table>
</div>

<form name="myForm" id="myForm" method="POST">
<div class="row" style="padding:15px">
    <div class="col-xs-12" style="height:400px; overflow-y:auto;">
        <ul>
        <?php
        $query_1=mysqli_query($link, "SELECT * FROM user_rights_level_1 WHERE UID='$newID' ORDER BY ID ASC");
        while($view_1=mysqli_fetch_array($query_1))
        {
            $newMainID=$view_1['ID'];
            $newSID=$view_1['SID'];
            $newAccess=$view_1['Access'];
            //Fecth Main Section Name
            $query_2=mysqli_query($link, "SELECT * FROM rights_master_level_1 WHERE ID='$newSID'");
            $view_2=mysqli_fetch_array($query_2);
            $myMainSection=$view_2['MainSection'];
            echo '<li class="sectionItem" style="height:30px; border-bottom:dotted 1px #ccc; padding-top:8px;">';
            echo '<input type="checkbox" id="checkboxvar[]" name="checkboxvar[]" ';
            if($newAccess=='Yes')
            {
                echo 'checked="checked"';
            }
            echo ' value="'.$newMainID.'">&nbsp;&nbsp;';
            if($newAccess=='No')
            {
                echo '<img src="images/lock.png" border="0" />&nbsp;&nbsp;';
            }
            else
            {
                echo '<img src="images/user.png" border="0" />&nbsp;&nbsp;';
            }
            echo $myMainSection;
            echo '</li>';
        }
        ?>
        </ul>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <button type="button" class="btn btn-primary" style="padding:6px; width:100px;" id="btnCancel">Close</button>
        <button type="submit" class="btn btn-danger" style="padding:6px; width:100px;" id="btnSave">Update</button>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <div class="success_alert">Record added successfully!</div>
    </div>
</div>
</form>
