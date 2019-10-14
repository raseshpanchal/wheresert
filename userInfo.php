<?php
//error_reporting(0);
include_once("config/connection.php");

if(!isset($_SESSION))
{
    session_start();

    if($_SESSION['whrsrtfruser'])
    {
        $checkFUser=is_numeric($_SESSION['whrsrtfruser']);

        if($checkFUser==1)
        {
            //Check info using Mobile#
            $myEmail=$_SESSION['whrsrtfruser'];
            $query_user=mysqli_query($link, "SELECT * FROM freelancer_registration WHERE Mobile='$myEmail'");
            $view_user=mysqli_fetch_array($query_user);
            $userID=$view_user['ID'];
            $userFirstName=$view_user['FirstName'];
            $userLastName=$view_user['LastName'];
            $userFullName=$userFirstName.' '.$userLastName;
            $userProfilePic=$view_user['ProfilePic'];
            $userDOB=$view_user['DOB'];
            $userMobile=$view_user['Mobile'];
            $userEmailID=$view_user['EmailID'];
            $userGender=$view_user['Gender'];
            $userDescription=urldecode($view_user['Description']);
            $userBusinessTitle=$view_user['BusinessTitle'];
            $userProfessional=$view_user['Professional'];
            $userAddress=$view_user['Address'];
            $userCity=$view_user['City'];
            $userState=$view_user['State'];
            $userCountry=$view_user['Country'];
            $userZipCode=$view_user['ZipCode'];
            $userStatus=$view_user['Status'];
        }
        else
        {
            //Check info using Email
            $myEmail=$_SESSION['whrsrtfruser'];
            $query_user=mysqli_query($link, "SELECT * FROM freelancer_registration WHERE EmailID='$myEmail'");
            $view_user=mysqli_fetch_array($query_user);
            $userID=$view_user['ID'];
            $userFirstName=$view_user['FirstName'];
            $userLastName=$view_user['LastName'];
            $userFullName=$userFirstName.' '.$userLastName;
            $userProfilePic=$view_user['ProfilePic'];
            $userDOB=$view_user['DOB'];
            $userMobile=$view_user['Mobile'];
            $userEmailID=$view_user['EmailID'];
            $userGender=$view_user['Gender'];
            $userDescription=urldecode($view_user['Description']);
            $userBusinessTitle=$view_user['BusinessTitle'];
            $userProfessional=$view_user['Professional'];
            $userAddress=$view_user['Address'];
            $userCity=$view_user['City'];
            $userState=$view_user['State'];
            $userCountry=$view_user['Country'];
            $userZipCode=$view_user['ZipCode'];
            $userStatus=$view_user['Status'];
        }
    }
    else if($_SESSION['whrsrtrcuser'])
    {
        $checkRUser=is_numeric($_SESSION['whrsrtrcuser']);

        if($checkRUser==1)
        {
            //Check info using Mobile#
            $myEmail=$_SESSION['whrsrtrcuser'];
            $query_user=mysqli_query($link, "SELECT * FROM recruiter_registration WHERE Mobile='$myEmail'");
            $view_user=mysqli_fetch_array($query_user);
            $userID=$view_user['ID'];
            $userFirstName=$view_user['FirstName'];
            $userLastName=$view_user['LastName'];
            $userFullName=$userFirstName.' '.$userLastName;
            $userDOB=$view_user['DOB'];
            $userMobile=$view_user['Mobile'];
            $userGender=$view_user['Gender'];
            $userAddress=$view_user['Address'];
            $userCityID=$view_user['CityID'];
            $userStateID=$view_user['StateID'];
            $userCountryID=$view_user['CountryID'];
            $userZipCode=$view_user['ZipCode'];
            $userStatus=$view_user['Status'];
        }
        else
        {
            //Check info using Email
            $myEmail=$_SESSION['whrsrtrcuser'];
            $query_user=mysqli_query($link, "SELECT * FROM recruiter_registration WHERE EmailID='$myEmail'");
            $view_user=mysqli_fetch_array($query_user);
            $userID=$view_user['ID'];
            $userFirstName=$view_user['FirstName'];
            $userLastName=$view_user['LastName'];
            $userFullName=$userFirstName.' '.$userLastName;
            $userDOB=$view_user['DOB'];
            $userMobile=$view_user['Mobile'];
            $userGender=$view_user['Gender'];
            $userAddress=$view_user['Address'];
            $userCityID=$view_user['CityID'];
            $userStateID=$view_user['StateID'];
            $userCountryID=$view_user['CountryID'];
            $userZipCode=$view_user['ZipCode'];
            $userStatus=$view_user['Status'];
        }
    }
}
?>
