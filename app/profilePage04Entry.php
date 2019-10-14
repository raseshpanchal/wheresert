<?php
//error_reporting(0);
include_once("../config/connection.php");
include_once("../userInfo.php");

$newMobile=trim($_POST['txt_mobile']);
$newEmail=trim($_POST['txt_email']);
$newCity=$_POST['txt_city'];
$newState=$_POST['txt_state'];

if($newMobile=='' || $newEmail=='' || $newCity=='' || $newState=='')
{
    echo 'fieldsErr';
}
else
{
    //Update into DB
    $query_1=mysqli_query($link, "UPDATE freelancer_registration SET ContactMobile='$newMobile', ContactEmail='$newEmail', City='$newCity', State='$newState', Status='Wizard05' WHERE ID='$userID'");

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
