<?php
session_start();
include_once("../config/connection.php");

$myUser=$_POST['txt_user'];
$myPass=$_POST['txt_pass'];

//Check user input type
$checkUser=is_numeric($myUser);

if($checkUser==1)
{
    //Check Registered Email ID
    $query_1=mysqli_query($link, "SELECT * FROM freelancer_registration WHERE Mobile='$myUser'");
    $view_mobile=mysqli_num_rows($query_1);
    if($view_mobile==0)
    {
        echo 'mobileError';
    }
    else
    {
        //Check Password
        $query_2=mysqli_query($link, "SELECT * FROM freelancer_registration WHERE Mobile='$myUser'");
        $view_2=mysqli_fetch_array($query_2);
        $newMobile=$view_2['Mobile'];
        $newPassword=$view_2['Password'];
        $newValid=$view_2['Status'];
        //Check Authenticated Account
        if($newValid=='New')
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
                //Check First Time Login for Wizard
                if($newValid=='Wizard')
                {
                    //Valid User for Wizard
                    $_SESSION['whrsrtfruser']=$myUser;
                    echo 'validWizard';
                }
                else if($newValid=='Active')
                {
                    //Valid User
                    $_SESSION['whrsrtfruser']=$myUser;
                    echo 'validUser';
                }
            }
        }
    }
}
else
{
    //Check Registered Email ID
    $query_1=mysqli_query($link, "SELECT * FROM freelancer_registration WHERE EmailID='$myUser'");
    $view_email=mysqli_num_rows($query_1);
    if($view_email==0)
    {
        echo 'emailError';
    }
    else
    {
        //Check Password
        $query_2=mysqli_query($link, "SELECT * FROM freelancer_registration WHERE EmailID='$myUser'");
        $view_2=mysqli_fetch_array($query_2);
        $newPassword=$view_2['Password'];
        $newValid=$view_2['Status'];
        //Check Authenticated Account
        if($newValid=='New')
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
                $_SESSION['whrsrtfruser']=$myUser;
                echo 'validUser';
            }
        }
    }
}
?>
