<?php
error_reporting(0);
include_once("../config/connection.php");
include_once('../userInfo.php');

$newID=$_GET['ID'];
$newTitle=$_POST['txt_pdfTitle'];

$query_1=mysqli_query($link, "UPDATE freelancer_upload_pdf SET Title='$newTitle' WHERE ID='$newID'");

if($query_1)
{
    echo 'pdf_1';
}
else
{
    echo 'pdf_0';
}


?>
