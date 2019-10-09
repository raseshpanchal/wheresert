<?php
include("../../config/connection.php");

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
$query_1=mysqli_query($link, "INSERT INTO blogs SET BlogTitle='$myTitle', BlogDate=now(), Publish='$myPublish'");
if($query_1)
{
    echo '1';
}
else
{
    echo '2';
}

?>
