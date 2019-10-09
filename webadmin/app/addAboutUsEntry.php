<?php
include("../../config/connection.php");

$myAboutTitle=$_POST['txt_aboutTitle'];
$myAboutDesc=urlencode($_POST['txt_aboutDesc']);

//Publish Online
$myPublish=$_POST['chk_publish'];
if(!$myPublish)
{
	$myPublish = 'No';
}
else
{
	$myPublish = 'Yes';
}

//Insert Values in DB
$query_1=mysqli_query($link, "INSERT INTO about_us SET Title='$myAboutTitle', Description='$myAboutDesc', Publish='$myPublish'");

?>