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

//Insert Values in DB
$query_1=mysqli_query($link, "INSERT INTO subcategories SET MyID='0', CatID='$newID', SubCategory='$myTitle', Publish='$myPublish'");

?>
