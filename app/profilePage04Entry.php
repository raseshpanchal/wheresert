<?php
//error_reporting(0);
include_once("../config/connection.php");
include_once("../userInfo.php");

$newProfileName=urldecode($_POST['txt_profile']);
$newDesignation=$_POST['txt_designation'];
$newMobile=trim($_POST['txt_mobile']);
$newEmail=trim($_POST['txt_email']);
$newAddress=urldecode($_POST['txt_address']);
$newCity=$_POST['txt_city'];
$newState=$_POST['txt_state'];

if($newMobile=='' || $newEmail=='' || $newCity=='')
{
    echo 'fieldsErr';
}
else
{
    //Update into DB
    $query_1=mysqli_query($link, "UPDATE freelancer_registration SET ProfileName='$newProfileName', Designation='$newTitle', Address='$newAddress', ContactMobile='$newMobile', ContactEmail='$newEmail', City='$newCity', State='$newState', Status='Wizard05' WHERE ID='$userID'");

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
