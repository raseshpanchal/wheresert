<?php
include_once("../../config/connection.php");
$newID=$_GET['ID'];

//Fetch Records
$query_1=mysqli_query($link, "SELECT * FROM recruiter_registration WHERE ID='$newID'");
$view_1=mysqli_fetch_array($query_1);
$newFirstName=$view_1['FirstName'];
$newLastName=$view_1['LastName'];
$newEmailID=$view_1['EmailID'];
$newMobile=$view_1['Mobile'];
$newDOB=$view_1['DOB'];
$newGender=$view_1['Gender'];
$newStatus=$view_1['Status'];
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
<script src="app/js/validRecruiter.js"></script>
<script src="app/js/onlyAlpha.js"></script>
<script src="app/js/onlyNum.js"></script>
<script>  
$(document).ready(function(){
   //Function for Counting Table Rows
    var i=$('#middleArea .table tbody tr').length;
    $("#btnSave").click(function(){
        var myFirstName = $("#txt_firstname").val();
        var myLastName = $("#txt_lastname").val();
        var myEmail = $("#txt_email").val();
        var myMobile = $("#txt_mobile").val();
        var myDob = $("#txt_dob").val();
        var myGender = $("input[name='radio_gender']:checked").val();
        var myStatus = $("input[name='radio_status']:checked").val();
         if(myStatus=='Valid')
        {
            var myShow = '<img src="images/bullet_gray.png" border="0" />';
        }
        else if(myStatus=='Active')
        {
            var myShow = '<img src="images/bullet_green.png" border="0" />';
        }
        else if(myStatus=='Blocked')
        {
            var myShow = '<img src="images/bullet_red.png" border="0" />';
        }
        $('#btnSave').attr("disabled", true);
		$.post("app/editRecruiterEntry?ID=<?php echo $newID ?>",
		$("#myForm").serialize(),
        function(data){

            //Show Updated Table Row
            $("#1_<?php echo $newID ?>").css('background-color','#a3d3d1');
             $("#2_<?php echo $newID ?>").html(myFirstName);
            $("#3_<?php echo $newID ?>").html(myLastName);
            $("#4_<?php echo $newID ?>").html(myEmail);
            $("#5_<?php echo $newID ?>").html(myMobile);
            $("#6_<?php echo $newID ?>").html(myShow);
            
            //Additional Actions
            $('.success_alert').fadeIn(300);
            $(".success_alert").delay(1500).fadeOut(300);
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
    <td>Update Recruiter</td>
  </tr>
</table>
</div>
<form name="myForm" id="myForm" method="POST">
<div class="row" style="padding:15px; padding-top:25px;">
    <div class="col-xs-12">
        <input type="text" class="form-control form-require" id="txt_firstname" name="txt_firstname" value="<?php echo $newFirstName ?>" />
    </div>
</div>
   
<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <input type="email" class="form-control form-require" id="txt_lastname" name="txt_lastname" value="<?php echo $newLastName ?>" />
    </div>
</div>
<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <input type="email" class="form-control form-require" id="txt_email" name="txt_email" placeholder="Email ID*" value="<?php echo $newEmailID ?>" readonly="readonly" />
    </div>
</div>
<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <input type="text" class="form-control form-require" id="txt_mobile" name="txt_mobile" placeholder="Mobile Number*" required maxlength="10" onKeyPress="return numbersonly(event, false)" value="<?php echo $newMobile ?>" />
    </div>
</div>
<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <input type="date" class="form-control form-require" id="txt_dob" name="txt_dob" placeholder="Date of Birth*" value="<?php echo $newDOB ?>" />
    </div>
</div> 

<div class="row" style="padding:15px;">
    <div class="col-xs-4">
        <input type="text" class="form-control form-require" id="txt_gender" name="txt_gender"  placeholder="Gender*" Disabled required />
    </div>
    <div class="col-xs-8">
        <label>
            <input type="radio"  <?php if($newGender=='Male') echo 'checked="checked"' ?> id="radio_gender" name="radio_gender" value="Male"> Male&nbsp;&nbsp;&nbsp;
        </label>
        <label>
            <input type="radio"  <?php if($newGender=='Female') echo 'checked="checked"' ?> id="radio_gender" name="radio_gender" value="Female"> Female
        </label>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-8">
        <label>
            <input type="radio" id="radio_status" name="radio_status" value="Valid" <?php if($newStatus=='Valid') echo 'checked="checked"' ?>> Valid&nbsp;&nbsp;&nbsp;
        </label>
        <label>
            <input type="radio" id="radio_status" name="radio_status" value="Active" <?php if($newStatus=='Active') echo 'checked="checked"' ?>> Active&nbsp;&nbsp;&nbsp;
        </label>
        <label>
            <input type="radio" id="radio_status" name="radio_status" value="Blocked" <?php if($newStatus=='Blocked') echo 'checked="checked"' ?>> Blocked
        </label>
    </div>
    
    <div class="col-xs-4" style="text-align:right">
        <span style="color:#C00">* Mandatory Fields</span>
    </div>
</div>
<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <button type="button" class="btn btn-primary" style="padding:6px; width:100px;" id="btnCancel">Close</button>
        <button type="submit" class="btn btn-danger" style="padding:6px; width:100px;" id="btnSave" onMouseDown="validFreelancer()">Update</button>
    </div>
</div>
<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <div class="success_alert">Record Updated successfully!</div>
    </div>
</div>
</form>
