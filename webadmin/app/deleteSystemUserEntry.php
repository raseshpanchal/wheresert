<?php
include("../../config/connection.php");

$newID=$_GET['ID'];

//Delete Level_1 Rights
$query_1=mysqli_query($link, "DELETE FROM user_rights_level_1 WHERE UID='$newID'");

//Delete Level_2 Rights
$query_2=mysqli_query($link, "DELETE FROM user_rights_level_2 WHERE UID='$newID'");

//Delete Base User
$query_3=mysqli_query($link, "DELETE FROM admin_login WHERE ID='$newID'");

?>
