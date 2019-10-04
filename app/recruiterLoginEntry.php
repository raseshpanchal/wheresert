<?php
session_start();
include_once("../config/connection.php");

$myEmail=$_POST['txt_user'];
$myPass=$_POST['txt_pass'];

//Check Registered Email ID
$query_1=mysqli_query($link, "SELECT * FROM recruiter_registration WHERE EmailID='$myEmail'");
$view_email=mysqli_num_rows($query_1);
if($view_email==0)
{
    echo 'emailError';
}
else
{
    //Check Password
    $query_2=mysqli_query($link, "SELECT * FROM recruiter_registration WHERE EmailID='$myEmail'");
    $view_2=mysqli_fetch_array($query_2);
    $newPassword=$view_2['Password'];
    $newValid=$view_2['Status'];
    //Check Authenticated Account
    if($newValid=='No')
    {
        echo 'validationError';
    }
    else
    {
        //Check Correct Password
        if($newPassword!=$myPass)
        {
            echo 'passwordError';
        }
        else
        {
            //Valid User
            $_SESSION['whrsrtrcuser']=$myEmail;
            echo 'validUser';
        }
    }
}
?>
