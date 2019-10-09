<?php
include("../../config/connection.php");
$newID=$_GET['ID'];
//Fetch User Info
$query_1=mysqli_query($link, "SELECT * FROM admin_login WHERE ID='$newID'");
$view_1=mysqli_fetch_array($query_1);
$newFullName=ucfirst($view_1['FullName']);
$newEmail=$view_1['Email'];
$newUserName=$view_1['UserName'];
$newPassword=$view_1['Password'];
$newPublish=$view_1['Publish'];
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
<script src="app/js/updateSystemUser.js"></script>
<script src="app/js/onlyAlpha.js"></script>
<script src="app/js/onlyNum.js"></script>
<script>
$(document).ready(function(){
    $("#btnSave").click(function(){
        if ($('#chk_publish').is(":checked"))
        {
             var myShow = '<img src="images/bullet_green.png" border="0" />';
        }
        else
        {
            var myShow = '<img src="images/bullet_red.png" border="0" />';
        }
        var myCity = $( "#select_cityID option:selected" ).text();
        $('#btnSave').attr("disabled", true);
        $.post("app/editSystemUserEntry?ID=<?php echo $newID ?>",
        $("#myForm").serialize(),
        function(data){
            //Show Edited Table Row
            $("#1_<?php echo $newID ?>").css('background-color','#a3d3d1');
            $("#2_<?php echo $newID ?>").html(myShow+' '+$("#txt_fullName").val());
            //Additional Actions
            $('.success_alert').fadeIn(300);
            $(".success_alert").delay(1500).fadeOut(300);
            closeFormDelete();
            $('#btnSave').attr("disabled", false);
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
    <td>Edit System User</td>
  </tr>
</table>
</div>

<form name="myForm" id="myForm" method="POST">
<div class="row" style="padding:15px; margin-top:20px;">
    <div class="col-xs-12">
        <input type="text" class="form-control form-require" id="txt_fullName" name="txt_fullName" placeholder="Enter Full Name*" value="<?php echo $newFullName ?>" required />
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <input type="email" class="form-control form-require" value="<?php echo $newEmail ?>" readonly="readonly" />
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <input type="text" class="form-control form-require" value="<?php echo $newUserName ?>" readonly="readonly" />
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <input type="text" class="form-control form-require" id="txt_pass" name="txt_pass" placeholder="Enter Password*" value="<?php echo $newPassword ?>" required />
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-6">
        <label><input type="checkbox" <?php if($newPublish=='Yes') echo 'checked="checked"' ?> id="chk_publish" name="chk_publish"> Valid User</label>
    </div>
    <div class="col-xs-6" style="text-align:right">
        <span style="color:#C00">* Mandatory Fields</span>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <button type="button" class="btn btn-primary" style="padding:6px; width:100px;" id="btnCancel">Close</button>
        <button type="submit" class="btn btn-danger" style="padding:6px; width:100px;" id="btnSave" onMouseDown="updateSystemUser()">Update</button>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <div class="success_alert">Record added successfully!</div>
    </div>
</div>
</form>
