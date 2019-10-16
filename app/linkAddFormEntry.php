<?php
error_reporting(0);
include_once("../config/connection.php");
include_once('../userInfo.php');

$newTitle=$_POST['txt_linkTitle'];
$newURL=urlencode($_POST['txt_linkURL']);

$query_1=mysqli_query($link, "INSERT INTO freelancer_upload_weblink SET FreelancerID='$userID', Title='$newTitle', URL='$newURL', Publish='Yes'");

if($query_1)
{
    echo 'link_1';
}
else
{
    echo 'link_0';
}


?>
