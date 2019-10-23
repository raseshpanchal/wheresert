<?php
error_reporting(0);
include_once("../config/connection.php");


$newUserID=$_POST['txt_user'];
$newFirstName=$_POST['txt_fname'];
$newLastName=$_POST['txt_lname'];
$newGender=$_POST['txt_gender'];
$newLocation=$_POST['txt_location'];
$newEmail=$_POST['txt_email'];
$newNumber=$_POST['txt_number'];
$newComment=urlencode($_POST['txt_comment']);
$newContactPrefrence = implode(',',  $_POST['check_userpre']);

$query_1=mysqli_query($link, "INSERT INTO freelancer_inquiries SET UserID='$newUserID', FirstName='$newFirstName', LastName='$newLastName', Email='$newEmail', City='$newLocation', ContactNumber='$newNumber', ContactPreference='$newContactPrefrence', Comment='$newComment', PostDate=now() ");

//Create New Recruiter Account
function randomPassword()
{
    $alphabet = "abcdefghijklmnpqrstuwxyz!@#$%&ABCDEFGHIJKLMNPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 10; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$newPass = randomPassword();

//Find City ID and State ID
$query_cityID=mysqli_query($link, "SELECT * FROM cities WHERE CityName='$newLocation'");
$view_cityID=mysqli_fetch_array($query_cityID);
$newCityID=$view_cityID['ID'];
$newStateID=$view_cityID['StateID'];

//Find Country ID
$query_countryID=mysqli_query($link, "SELECT * FROM states WHERE ID='$newStateID'");
$view_countryID=mysqli_fetch_array($query_countryID);
$newCountryID=$view_countryID['CountryID'];

//Find the existing Email record
$email_check=mysqli_query($link, "SELECT * FROM recruiter_registration WHERE EmailID='$newEmail' ");
$view_email=mysqli_num_rows($email_check);

//Find the existing Mobile record
$mobile_check=mysqli_query($link, "SELECT * FROM recruiter_registration WHERE Mobile='$newNumber' ");
$view_mobile=mysqli_num_rows($mobile_check);

if($view_email==0 && $view_mobile==0)
{
    //Insert New Registration
    $query_2=mysqli_query($link, "INSERT INTO recruiter_registration SET FirstName='$newFirstName', LastName='$newLastName', Mobile='$newNumber', EmailID='$newEmail', Gender='$newGender', CityID='$newCityID', StateID='$newStateID', CountryID='$newCountryID', Password='$newPass', CreateDate=now(), CreateTime=now(), PaidPhoto='No', PaidBanners='No', PaidListing='No', Status='New' ");
}


if($query_1)
{
    echo 'regiSuccess';
}
else
{
    echo '0';
}

?>
