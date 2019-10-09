<?php
include("../../config/connection.php");

$newID=$_GET['ID'];

$myTitle=$_POST['txt_title'];

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

//Update Values in DB
$query_1=mysqli_query($link, "UPDATE categories SET Category='$myTitle', Publish='$myPublish' WHERE ID='$newID'");
?>
