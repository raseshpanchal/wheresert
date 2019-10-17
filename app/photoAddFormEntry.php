<?php
error_reporting(0);
include_once("../config/connection.php");
include_once('../userInfo.php');

$path = "../userPhotos/";
// an array of allowed extensions
$allowedExts = array("gif", "jpeg", "jpg", "png","GIF","JPEG","JPG","PNG");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);


//check if the file type is image and then extension
if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "image/png")) && in_array($extension, $allowedExts))
{
    if($_FILES["file"]["error"]>0)
    {
        echo "0";
    }
    else
    {
        if($_FILES['file']['size'] / 1024 <= 5120)
        {
            //Form Values
            $myTitle=$_POST['txt_photoTitle'];
            $myFileTitle=str_replace(" ", "", $_POST['txt_photoTitle']);
            $new_photo_name = time()."_".$myFileTitle.".".$extension;

            if($myFileTitle!='')
            {
                //move_uploaded_file($_FILES["file"]["tmp_name"], $path.$new_photo_name);
                //Compress and Upload Image
                compressImage($_FILES["file"]["tmp_name"], $path.$new_photo_name, 40);
                //Insert Values in DB
                $query_1=mysqli_query($link, "INSERT INTO freelancer_upload_images SET FreelancerID='$userID', Title='$myTitle', FileName='$new_photo_name', Publish='Yes'");
            }

            echo "1";
        }
        else
        {
            echo "2";
        }
    }
}
else
{
    echo "0";
}


// Compress image
function compressImage($source, $destination, $quality)
{

    $info = getimagesize($source);

    if($info['mime'] == 'image/jpeg')
    {
        $image = imagecreatefromjpeg($source);
    }
    else if($info['mime'] == 'image/gif')
    {
        $image = imagecreatefromgif($source);
    }
    else if($info['mime'] == 'image/png')
    {
        $image = imagecreatefrompng($source);
    }

    imagejpeg($image, $destination, $quality);

}

?>
