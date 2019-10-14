<?php
error_reporting(0);
include_once("../config/connection.php");
include_once('../userInfo.php');

$newMainCat=$_POST['txt_mainCat'];
$newSubCat=$_POST['txt_subCat'];

//Check Existing Record
$query_1=mysqli_query($link, "SELECT * FROM freelancer_categories WHERE UserID='$userID'");
$view_cat=mysqli_num_rows($query_1);

if($view_cat==0)
{
    //Add New Entry
    $query_2=mysqli_query($link, "INSERT INTO freelancer_categories SET UserID='$userID', MainCatID='$newMainCat', SubCatID='$newSubCat' ");
}
else
{
    //Update Existing Entry
    $query_2=mysqli_query($link, "UPDATE freelancer_categories SET MainCatID='$newMainCat', SubCatID='$newSubCat' WHERE UserID='$userID' ");
}

//Change User's Registration Status
$query_2=mysqli_query($link, "UPDATE freelancer_registration SET Status='Wizard04' WHERE ID='$userID' ");

//Remove Old Entries
$query_3=mysqli_query($link, "DELETE FROM freelancer_skills WHERE FreelancerID='$userID'");

//Insert Multiple Values in DB
if(isset($_POST['checkboxvar']))
{
    $chpmods = ($_POST['checkboxvar']);


    foreach($chpmods as $chpmod)
    {
        //Find Skill Name
        $query_4=mysqli_query($link, "SELECT * FROM subcategories WHERE ID='$chpmod'");
        $view_4=mysqli_fetch_array($query_4);
        $skillName=$view_4['SubCategory'];

        //Check the existing records
        $query_5=mysqli_query($link, "SELECT * FROM freelancer_skills WHERE FreelancerID='$userID' AND SkillID='$chpmod'");
        $product_rows=mysqli_num_rows($query_5);
        if($product_rows==0)
        {
            $query_6=mysqli_query($link, "INSERT INTO freelancer_skills SET FreelancerID='$userID', SkillID='$chpmod', SkillName='$skillName'");
        }
    }

}

echo 'skills_1';

?>
