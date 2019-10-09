<?php
include("../../config/connection.php");

$arrayID=$_POST['sort_order'];
$likeslist = explode(',', $arrayID);
$listLen = count($likeslist);

for($offset=0; $offset<1; $offset++)
{
    $subList = array_slice($likeslist, $offset);
    // do whatever to your sublist
    //print_r($subList);
    $i=1;
    foreach( $subList as $state )
    {
        //Updating ID
        $query1=mysqli_query($link, "UPDATE subcategories SET MyID='$i' WHERE ID='$state'");
        //echo $state.' : '.$i;
        //echo "<br />";
        $i++;
    }
}

?>
