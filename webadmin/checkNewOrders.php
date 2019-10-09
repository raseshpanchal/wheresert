<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

include("../config/connection.php");

$query_1=mysqli_query($link, "SELECT * FROM cart_shopping WHERE Status='New Order'");
$totalOrders=mysqli_num_rows($query_1);

echo "data:{$totalOrders}\n\n";

flush();
?>
