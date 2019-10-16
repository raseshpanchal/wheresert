<?php
//error_reporting(0);
include_once("../config/connection.php");
include_once("../userInfo.php");

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
    $query_1=mysqli_query($link, "INSERT INTO freelancer_services SET FreelancerID='$userID', Title='$newTitle', Currency='$newCurrency', Price='$newPrice', Description='$newDesc', Publish='Yes'");

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
