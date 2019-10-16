<?php
error_reporting(0);
include_once("../config/connection.php");
include_once('../userInfo.php');

$newID=$_GET['ID'];
$newURL=$_POST['txt_url'];

$query_1=mysqli_query($link, "SELECT * FROM freelancer_social_media WHERE FreelancerID='$userID' AND SocialMediaID='$newID'");
$product_rows=mysqli_num_rows($query_1);
if($product_rows==0)
{
    $query_2=mysqli_query($link, "INSERT INTO freelancer_social_media SET FreelancerID='$userID', SocialMediaID='$newID', URL='$newURL', Publish='Yes'");

    if($query_2)
    {
        echo 'social_1';
    }
    else
    {
        echo 'social_0';
    }
}

?>
