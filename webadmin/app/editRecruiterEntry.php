<?php
include_once("../../config/connection.php");

$myID=$_GET['ID'];

$myFirstName=$_POST['txt_firstname'];
$myLastName=$_POST['txt_lastname'];
$myEmail=$_POST['txt_email'];
$myMobile=$_POST['txt_mobile'];
$mydob=$_POST['txt_dob'];
$myGender = $_POST['radio_gender'];
$myPassword=rand(111111, 999999);
$myStatus=$_POST['radio_status'];

//Insert Values in DB
$query_1=mysqli_query($link, "UPDATE recruiter_registration SET FirstName='$myFirstName', LastName='$myLastName', EmailID='$myEmail', Mobile='$myMobile', DOB='$mydob', Gender='$myGender', Password='$myPassword', CreateDate=now(), CreateTime=now(), PaidPhoto='No', PaidBanners='No', PaidListing='No', Status='$myStatus' WHERE ID='$myID'");
?>