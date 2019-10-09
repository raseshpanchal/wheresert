<?php
include("../../config/connection.php");
$newUserID=$_GET['ID'];
//Fetch Review Details
$query_1=mysqli_query($link, "SELECT * FROM freelancer_reviews WHERE ID='$newUserID'");
$view_1=mysqli_fetch_array($query_1);
$newUserID=$view_1['UserID'];
$newName=$view_1['Name'];
$newEmail=$view_1['Email'];
$newReview=urldecode($view_1['Review']);
$newRating=$view_1['Rating'];
$newReviewDate=$view_1['ReviewDate'];

//Fetch Freelancer Details
$query_2=mysqli_query($link, "SELECT * FROM freelancer_registration WHERE ID='$newUserID'");
$view_2=mysqli_fetch_array($query_2);
$newFirstName=$view_2['FirstName'];
$newLastName=$view_2['LastName'];
$newBusinessTitle=$view_2['BusinessTitle'];
$newProfessional=$view_2['Professional'];
$newAddress=$view_2['Address'];
$newCity=$view_2['City'];
$newState=$view_2['State'];
$newCountry=$view_2['Country'];


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
    <td>View Review Details</td>
  </tr>
</table>
</div>

<div style="height:480px; overflow:hidden; overflow-y:auto; padding-top:20px;">


<div class="row" style="padding:15px; border:dotted 1px #666; width:530px; margin-left:20px; background-color:#FFF; margin-bottom:15px;">
    <div class="col-xs-12">
        <p>REVIEW DETAILS:</p>
        <p><strong><?php echo $newName; ?></strong></p>
        <p><?php echo $newReview; ?></p>
    </div>
</div>


<div class="row" style="padding:15px; border:dotted 1px #666; width:530px; margin-left:20px; background-color:#FFF; margin-bottom:15px;">
    <div class="col-xs-12">
        <p><strong><?php echo $newBusinessTitle ?> <?php echo $newProfessional; ?></strong></p>
        <p>
		<?php
		if($newRating==1)
		{
			echo '<img src="images/stars_1.png" border="0" />';
		}
		else if($newRating==2)
		{
			echo '<img src="images/stars_2.png" border="0" />';
		}
		else if($newRating==3)
		{
			echo '<img src="images/stars_3.png" border="0" />';
		}
		else if($newRating==4)
		{
			echo '<img src="images/stars_4.png" border="0" />';
		}
		else if($newRating==5)
		{
			echo '<img src="images/stars_5.png" border="0" />';
		}
		else
		{
			echo '<img src="images/stars_0.png" border="0" />';
		}
		?>
        </p>
    </div>
</div>

<div class="row" style="padding:15px; border:dotted 1px #666; width:530px; margin-left:20px; background-color:#FFF; margin-bottom:20px;">
	<div class="col-xs-12">
    <p>USER DETAILS:</p>
    <p><strong><?php echo ''.$newFirstName.' '.$newLastName; ?></strong><br/>
    <?php echo 'Location : '.$newAddress.', '.$newCity.', '.$newCountry; ?></p>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <button type="button" class="btn btn-primary" style="padding:6px; width:100px;" id="btnCancel">Close</button>
    </div>
</div>
</div>