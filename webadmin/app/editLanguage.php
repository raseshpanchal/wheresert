<?php
include("../../config/connection.php");
$newID=$_GET['ID'];
//Fetch Existing Records
$query=mysqli_query($link, "SELECT * FROM language_master WHERE ID='$newID'");
$view=mysqli_fetch_array($query);
$newLanguage=$view['Language'];
$newPublish=$view['Publish'];
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

<script src="app/js/validLanguage.js"></script>
<script src="app/js/onlyAlpha.js"></script>
<script src="app/js/onlyNum.js"></script>
<script>
$(document).ready(function(){
    $("#btnSave").click(function(){
        if ($('#chk_publish').is(":checked"))
        {
             var myShow = '<img src="images/mark-yes.png" border="0" />';
        }
        else
        {
            var myShow = '<img src="images/reject.png" border="0" />';
        }
        var myTitle = $( "#txt_title" ).val();
        $('#btnSave').attr("disabled", true);
        $.post("app/editLanguageEntry?ID=<?php echo $newID ?>",
        $("#myForm").serialize(),
        function(data){
            //Update Edited Table Row
            $("#1_<?php echo $newID ?>").css('background-color','#a3d3d1');
            $("#2_<?php echo $newID ?>").html(myShow+' '+myTitle);
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
    <td>Edit Language</td>
  </tr>
</table>
</div>

<form name="myForm" id="myForm" method="POST">
<div class="row" style="padding:15px;">
    <div class="col-xs-12">
        <input type="text" class="form-control form-require" id="txt_title" name="txt_title" value="<?php echo $newLanguage ?>" required placeholder="Title*" />
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-6">
        <label><input type="checkbox" <?php if($newPublish=='Yes') echo 'checked="checked"' ?> id="chk_publish" name="chk_publish" value="Yes"> Publish Online</label>
    </div>
    <div class="col-xs-6" style="text-align:right">
        <span style="color:#C00">* Mandatory Fields</span>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <button type="button" class="btn btn-primary" style="padding:6px; width:100px;" id="btnCancel">Close</button>
        <button type="submit" class="btn btn-danger" style="padding:6px; width:100px;" id="btnSave" onMouseDown="validCategory()">Update</button>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <div class="success_alert">Record updated successfully!</div>
    </div>
</div>
</form>
