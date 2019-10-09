<?php
include("../../config/connection.php");

$newUID=$_GET['ID'];
$newSID=$_POST['txt_sid'];

//Remove All Main Rights
$query_1=mysqli_query($link, "SELECT * FROM user_rights_level_2 WHERE UID='$newUID' AND SID='$newSID' ORDER BY ID ASC");
while($view_1=mysqli_fetch_array($query_1))
{
    $MainID=$view_1['ID'];
    //Update Rights
    $query_2=mysqli_query($link, "UPDATE user_rights_level_2 SET Access='No' WHERE ID='$MainID'");
}


//Insert Multiple Values in DB
if(isset($_POST['checkboxvar']))
{
    $chpmods = ($_POST['checkboxvar']);
    foreach ($chpmods as $chpmod)
    {
        //Update Record
        $query_3=mysqli_query($link, "UPDATE user_rights_level_2 SET Access='Yes' WHERE ID='$chpmod'");
    }
}
?>
