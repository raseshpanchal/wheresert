<?php
error_reporting(0);
include_once("../config/connection.php");
include_once('../userInfo.php');

$newRating=$_GET['RT'];
$newUserID=$_POST['txt_revUser'];
$newName=$_POST['txt_revName'];
$newEmail=$_POST['txt_revEmail'];
$newMobile=$_POST['txt_revMobile'];
$newReview=urlencode($_POST['txt_review']);

$query_1=mysqli_query($link, "INSERT INTO freelancer_reviews SET UserID='$newUserID', Name='$newName', Email='$newEmail', Review='$newReview', Rating='$newRating', ReviewDate=now(), Status='Approved'");

if($query_1)
{
    echo '1';
}
else
{
    echo '0';
}

?>
