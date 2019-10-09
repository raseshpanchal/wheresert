<?php
include("../../config/connection.php");

$newID=$_GET['ID'];

$myFullName=$_POST['txt_fullName'];
$newFullName=filter_var($myFullName, FILTER_SANITIZE_STRING);

$myPassword=$_POST['txt_pass'];
$myNewPassword=str_replace(' ', '', $myPassword);
$newPassword=filter_var($myNewPassword, FILTER_SANITIZE_STRING);

//Publish Online
$myPublish=$_POST['chk_publish'];
if(!$myPublish)
{
    $myPublish = 'No';
}
else
{
    $myPublish = 'Yes';
}

if($newFullName!='' && $newPassword!='')
{
    //Update Record
    $query_1=mysqli_query($link, "UPDATE admin_login SET FullName='$newFullName', Password='$newPassword', Publish='$myPublish' WHERE ID='$newID'");
}
?>
