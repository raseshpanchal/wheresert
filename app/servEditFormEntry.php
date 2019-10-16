<?php
//error_reporting(0);
include_once("../config/connection.php");
include_once("../userInfo.php");

$newID=$_GET['ID'];
$newTitle=$_POST['txt_title'];
$newCurrency=$_POST['txt_currency'];
$newPrice=$_POST['txt_price'];
$newDesc=urlencode($_POST['txt_desc']);

if($newTitle=='' || $newCurrency=='' || $newPrice=='' || $newDesc=='')
{
    echo 'fieldsErr';
}
else
{
    //Update into DB
    $query_1=mysqli_query($link, "UPDATE freelancer_services SET Title='$newTitle', Currency='$newCurrency', Price='$newPrice', Description='$newDesc' WHERE ID='$newID'");

    if($query_1)
    {
        echo '1';
    }
    else
    {
        echo '0';
    }
}
?>
