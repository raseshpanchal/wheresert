<?php
include("../../config/connection.php");
$ID=$_GET['ID'];

//Fetch New Request Details
$query_1=mysqli_query($link, "SELECT * FROM freelancer_inquiries  ORDER BY ID DESC");
$view_1=mysqli_fetch_array($query_1);
$newName=$view_1['Name'];
$newEmail=$view_1['Email'];
$newCity=$view_1['City'];
$newNumber=$view_1['Number'];
$newContactPrefrence=$view_1['ContactPrefrence'];
$newComment=urldecode($view_1['Comment']);
$newReviewDate=$view_1['PostDate'];


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
<script>
$(document).ready(function(){	
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
    <td>View Service Request Details</td>
  </tr>
</table>
</div>

<div style="height:480px; overflow:hidden; overflow-y:auto; padding-top:10px;">

<div class="row" style="padding:10px; border:dotted 1px #666; width:530px; margin-left:10px; background-color:#FFF; margin-bottom:10px;">
	<div class="col-xs-12">
    <p>USER DETAILS:</p>
    <b>Posted Date:</b><br> 
    <?php echo $newReviewDate; ?><br/><br>
    <b>Person Name:</b><br>
    <?php echo $newName; ?><br/><br>
    <b>Contact Number:</b><br>
    <?php echo $newNumber; ?><br/><br>
    <b>Email:</b><br>
    <?php echo $newEmail; ?><br/><br>
    <b>City:</b><br>
    <?php echo $newCity; ?><br/><br>
    
    </div>
</div>

<div class="row" style="padding:10px; border:dotted 1px #666; width:530px; margin-left:10px; background-color:#FFF; margin-bottom:10px;">
	<div class="col-xs-12">
    <p>Comment:</p>
    <p><strong><?php echo $newComment; ?></strong><br/>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <button type="button" class="btn btn-primary" style="padding:6px; width:100px;" id="btnCancel">Close</button>
    </div>
</div>


</div>