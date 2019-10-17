<?php
error_reporting(0);
include_once("../config/connection.php");
include_once('../userInfo.php');

$newID=$_GET['ID'];
$newTitle=$_POST['txt_audioTitle'];

$query_1=mysqli_query($link, "UPDATE freelancer_upload_audio SET Title='$newTitle' WHERE ID='$newID'");

if($query_1)
{
    echo 'audio_1';
}
else
{
    echo 'audio_0';
}


?>
