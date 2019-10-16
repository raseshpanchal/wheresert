<?php
error_reporting(0);
include_once("../config/connection.php");
include_once('../userInfo.php');

//Remove Old Entries
$query_1=mysqli_query($link, "DELETE FROM freelancer_languages WHERE FreelancerID='$userID'");

//Insert Multiple Values in DB
if(isset($_POST['checkboxvar']))
{
    $chpmods = ($_POST['checkboxvar']);
    foreach($chpmods as $chpmod)
    {
        //Check the existing records
        $query_2=mysqli_query($link, "SELECT * FROM freelancer_languages WHERE FreelancerID='$userID' AND LanguageID='$chpmod'");
        $product_rows=mysqli_num_rows($query_2);
        if($product_rows==0)
        {
            $query_3=mysqli_query($link, "INSERT INTO freelancer_languages SET FreelancerID='$userID', LanguageID='$chpmod'");
        }
    }
}

echo 'language_1';

?>
