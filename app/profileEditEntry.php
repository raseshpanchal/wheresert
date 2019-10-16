<?php
//error_reporting(0);
include_once("../config/connection.php");
include_once("../userInfo.php");

$newTitle=$_POST['txt_designation'];
$newMobile=trim($_POST['txt_mobile']);
$newEmail=trim($_POST['txt_email']);
$newCity=$_POST['txt_city'];
$newState=$_POST['txt_state'];
$newState=$_POST['txt_state'];
$newDescription=urlencode($_POST['txt_info']);

if($newMobile=='' || $newEmail=='' || $newCity=='' || $newState=='')
{
    echo 'fieldsErr';
}
else
{
    //Update into DB
    $query_1=mysqli_query($link, "UPDATE freelancer_registration SET Designation='$newTitle', ContactMobile='$newMobile', ContactEmail='$newEmail', City='$newCity', State='$newState', Description='$newDescription', Status='Active' WHERE ID='$userID'");

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
