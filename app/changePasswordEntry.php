<?php
//error_reporting(0);
include_once("../config/connection.php");

$myID=myDecode($_GET['ID']);
$newPassword=$_POST['txt_newPass'];
$newConfirmPass=$_POST['txt_confirmPass'];

//New Pass And Confirm Pass Dont Match
if($newPassword!=$newConfirmPass)
{
    echo 'passErr';
}
else if($newPassword==$newConfirmPass)
{
    //Update Values in DB
    $query_1=mysqli_query($link, "UPDATE freelancer_registration SET Password='$newPassword' WHERE EmailID='$myID'");

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
