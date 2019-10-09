<?php
include_once("../../config/connection.php");

$myID=$_GET['ID'];

//Insert Values in DB
$query_1=mysqli_query($link, "DELETE FROM recruiter_registration WHERE ID='$myID'");
?>