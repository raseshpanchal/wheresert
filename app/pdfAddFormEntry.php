<?php
error_reporting(0);
include_once("../config/connection.php");
include_once('../userInfo.php');

$path = "../userPDFs/";
// an array of allowed extensions
$allowedExts = array("pdf", "PDF");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);


//check if the file type is image and then extension
// store the files to upload folder
//echo '0' if there is an error
if ((($_FILES["file"]["type"] == "application/pdf")) && in_array($extension, $allowedExts))
{
    if($_FILES["file"]["error"]>0)
    {
        echo "0";
    }
    else
    {
        //Form Values
        $myTitle=$_POST['txt_pdfTitle'];
        $myFileTitle=str_replace(" ", "", $_POST['txt_pdfTitle']);
        $new_pdf_name = time()."_".$myFileTitle.".".$extension;

        if($myFileTitle!='')
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], $path.$new_pdf_name);
            //Insert Values in DB
            $query_1=mysqli_query($link, "INSERT INTO freelancer_upload_pdf SET FreelancerID='$userID', Title='$myTitle', FileName='$new_pdf_name', Publish='Yes'");
        }

        echo "1";
    }
}
else
{
    echo "0";
}

?>
