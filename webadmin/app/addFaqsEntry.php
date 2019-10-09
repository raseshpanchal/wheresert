<?php
include("../../config/connection.php");

$myFaqTitle=$_POST['txt_faqTitle'];
$myFaqDesc=urlencode($_POST['txt_faqDesc']);

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
$query_1=mysqli_query($link, "INSERT INTO faqs SET Title='$myFaqTitle', Description='$myFaqDesc', Publish='$myPublish'");

?>