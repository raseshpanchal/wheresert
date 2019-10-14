<?php
//error_reporting(0);
include_once("../config/connection.php");
include_once("../userInfo.php");

$newProfile=urlencode($_POST['txt_info']);

if($newProfile=='')
{
    echo 'fieldsErr';
}
else
{
    //Update into DB
    $query_1=mysqli_query($link, "UPDATE freelancer_registration SET Description='$newProfile', Status='Wizard06' WHERE ID='$userID'");

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
