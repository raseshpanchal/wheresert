<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

include("../config/connection.php");

$query_1=mysqli_query($link, "SELECT * FROM registrations WHERE Valid='Yes'");
$totalUsers=mysqli_num_rows($query_1);

echo "data:{$totalUsers}\n\n";

flush();
?>
