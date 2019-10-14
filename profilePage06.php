<?php
    //error_reporting(0);
    include_once("config/connection.php");
    include_once('userInfo.php');
    //include_once('pageInfo.php');

    //Get Profile Information
    $checkFUser=is_numeric($_SESSION['whrsrtfruser']);
    $userName=$_SESSION['whrsrtfruser'];

    if($checkFUser==1)
    {
        //Check Profile Picture Uploaded
        $query_1=mysqli_query($link, "SELECT * FROM freelancer_registration WHERE Mobile='$userName'");
        $view_1=mysqli_fetch_array($query_1);
        $userProfilePic=$view_1['ProfilePic'];
    }
    else
    {
        //Check Profile Picture Uploaded
        $query_1=mysqli_query($link, "SELECT * FROM freelancer_registration WHERE EmailID='$userName'");
        $view_1=mysqli_fetch_array($query_1);
        $userProfilePic=$view_1['ProfilePic'];
    }
?>

<style>
    #upload-file-container {
        width: 150px;
        height: 150px;
        position: relative;
        border: dashed 1px #898989;
        overflow: hidden;
        margin: 25px auto;
        background-image: url(images/uploadPhoto.png);
        background-repeat: no-repeat;
        background-position: center;
    }

    #upload-file-container input[type="file"] {
        margin: 0;
        opacity: 0;
        font-size: 100px;
    }

    .success_alert {
        background-color: #6C3;
        color: #FFF;
        border: dashed 1px #666;
        width: 100%;
        height: 30px;
        padding-top: 4px;
        text-align: center;
        display: none;
    }

</style>

<h1 class="loveTitle">
    Upload Profile Picture
</h1>

<div class="columns">
    <div class="column"></div>
    <div class="column">

        <form name="myFormPhoto" id="myFormPhoto" method="POST" enctype="multipart/form-data" action="app/profilePage06Entry">

            <div class="columns">
                <div class="column">
                    <!-- File Input Starts -->
                    <div id="upload-file-container">
                        <input type="file" name="file" id="file" />
                    </div>
                    <!-- File Input Ends -->
                </div>
            </div>
            <div class="columns">
                <div class="column" style="text-align:center">
                    <button class="button is-danger" id="btnUpload" onclick="profilePhoto()">Finish</button>
                </div>
            </div>

            <div class="columns">
                <div class="column" style="text-align:left;">
                    <span id="fileStatus"></span>
                </div>
            </div>
        </form>

    </div>
    <div class="column"></div>
</div>

<script>
    $(document).ready(function() {



    });

</script>
