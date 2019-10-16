<?php
//error_reporting(0);
include_once("../config/connection.php");
include_once("../userInfo.php");

$newID=$_GET['ID'];

$query_1=mysqli_query($link, "DELETE FROM freelancer_services WHERE ID='$newID'");

if($query_1)
{
    echo '1';
}
else
{
    echo '0';
}


?>
