<?php
session_start();
include("../config/connection.php");

$myUser = $_POST['txt_user'];
$newUser = filter_var($myUser, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$myPass = $_POST['txt_pass'];
$newPass = filter_var($myPass, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);


if((!filter_var($newUser, FILTER_SANITIZE_STRING) === false) && (!filter_var($newPass, FILTER_SANITIZE_STRING) === false))
{
    //Check UserName and Password
    $query_1=mysqli_query($link, "SELECT * FROM admin_login WHERE UserName='$newUser'");
    $view_1=mysqli_fetch_array($query_1);
    $sysUserName=$view_1['UserName'];
    $sysPassword=$view_1['Password'];
    $sysPublish=$view_1['Publish'];
    //Check Valid UserName
    if(!$query_1 || $sysUserName!=$newUser)
    {
        //Wrong UserName //User Doesn't Exists
        echo '1';
    }
    else
    {
        //Check Valid Password
        if($sysPassword!=$newPass)
        {
            //Wrong Password Entry
            echo '2';
        }
        else
        {
            //Check Blocked User
            if($sysPublish!='Yes')
            {
                //Blocked User
                echo '3';
            }
            else
            {
                //User Authenticated //Session Registered
                $_SESSION['wsAdminUser']=$view_1['UserName'];
                echo '4';
            }
        }
    }
    ///Main IF Closes
}
else
{
    //Wrong Entry //Injection Entry
    echo '0';
}

?>
