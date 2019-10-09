<?php
include("../../config/connection.php");

$newID=$_GET['ID'];

$query_1=mysqli_query($link, "DELETE FROM subcategories WHERE ID='$newID'");

?>