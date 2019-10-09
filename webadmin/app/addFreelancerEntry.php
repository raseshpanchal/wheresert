<?php
if (!isset($_SESSION)) { session_start(); }
include_once("../../config/connection.php");


$myFirstName=$_POST['txt_firstname'];
$myLastName=$_POST['txt_lastname'];
$myEmail=$_POST['txt_email'];
$myMobile=$_POST['txt_mobile'];
$mydob=$_POST['txt_dob'];
$myGender = $_POST['radio_gender'];
$myPassword=rand(111111, 999999);
$myStatus=$_POST['radio_status'];

//Insert Values in DB
$query_2=mysqli_query($link, "INSERT INTO freelancer_registration SET FirstName='$myFirstName', LastName='$myLastName', EmailID='$myEmail', Mobile='$myMobile', DOB='$mydob', Gender='$myGender', Password='$myPassword', CreateDate=now(), CreateTime=now(), PaidPhoto='No', PaidBanners='No', PaidListing='No', Status='$myStatus'");
?>
