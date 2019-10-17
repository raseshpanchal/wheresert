<?php
error_reporting(0);
include_once("../config/connection.php");
include_once('../userInfo.php');

$path = "../userAudio/";
// an array of allowed extensions
$allowedExts = array("mp3", "MP3");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);


//check if the file type is image and then extension
if ((($_FILES["file"]["type"] == "audio/mp3")) && in_array($extension, $allowedExts))
{
    if($_FILES["file"]["error"]>0)
    {
        echo "0";
    }
    else
    {
        //Form Values
        $myTitle=$_POST['txt_audioTitle'];
        $myFileTitle=str_replace(" ", "", $_POST['txt_audioTitle']);
        $new_audio_name = time()."_".$myFileTitle.".".$extension;

        if($myFileTitle!='')
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], $path.$new_audio_name);
            //Insert Values in DB
            $query_1=mysqli_query($link, "INSERT INTO freelancer_upload_audio SET FreelancerID='$userID', Title='$myTitle', FileName='$new_audio_name', Publish='Yes'");
        }

        echo "1";
    }
}
else
{
    echo "0";
}

?>
