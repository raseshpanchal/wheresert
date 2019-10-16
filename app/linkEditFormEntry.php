<?php
error_reporting(0);
include_once("../config/connection.php");
include_once('../userInfo.php');

$newID=$_GET['ID'];
$newTitle=$_POST['txt_linkTitle'];
$newURL=urlencode($_POST['txt_linkURL']);

$query_1=mysqli_query($link, "UPDATE freelancer_upload_weblink SET Title='$newTitle', URL='$newURL' WHERE ID='$newID'");

if($query_1)
{
    echo 'link_1';
}
else
{
    echo 'link_0';
}


?>
