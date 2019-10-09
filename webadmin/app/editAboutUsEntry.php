<?php
include("../../config/connection.php");
$newID=$_GET['ID'];

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
$query_1=mysqli_query($link, "UPDATE about_us SET Title='$myAboutTitle', Description='$myAboutDesc', Publish='$myPublish' WHERE ID='$newID'");

?>