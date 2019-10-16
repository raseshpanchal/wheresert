<?php
error_reporting(0);
include_once("../config/connection.php");
include_once('../userInfo.php');

//Remove Old Entries
$query_1=mysqli_query($link, "DELETE FROM freelancer_skills WHERE FreelancerID='$userID'");

//Insert Multiple Values in DB
if(isset($_POST['checkboxvar']))
{
    $chpmods = ($_POST['checkboxvar']);
    foreach($chpmods as $chpmod)
    {
        //Check the existing records
        $query_2=mysqli_query($link, "SELECT * FROM freelancer_skills WHERE FreelancerID='$userID' AND SkillID='$chpmod'");
        $product_rows=mysqli_num_rows($query_2);
        if($product_rows==0)
        {
            //Find Skills Name
            $query_skillsName=mysqli_query($link, "SELECT * FROM subcategories WHERE ID='$chpmod'");
            $view_skillsName=mysqli_fetch_array($query_skillsName);
            $newSubCategory=$view_skillsName['SubCategory'];

            //Update Skills
            $query_3=mysqli_query($link, "INSERT INTO freelancer_skills SET FreelancerID='$userID', SkillID='$chpmod', SkillName='$newSubCategory'");
        }
    }
}

echo 'skills_1';

?>
