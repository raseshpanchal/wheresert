<?php
include("../../config/connection.php");

$newID=$_GET['ID'];

$query_1=mysqli_query($link, "DELETE FROM about_us WHERE ID='$newID'");

?>