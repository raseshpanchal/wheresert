<?php
    error_reporting(0);
    include_once("config/connection.php");
    //Fetch Profile Info
    $newID=myDecode($_GET['ID']);
    $query_user=mysqli_query($link, "SELECT * FROM freelancer_registration WHERE ID='$newID'");
    $view_user=mysqli_fetch_array($query_user);
    $userID=$view_user['ID'];
    $userFirstName=$view_user['FirstName'];
    $userLastName=$view_user['LastName'];
    $userFullName=$userFirstName.' '.$userLastName;
    $userProfilePic=$view_user['ProfilePic'];
    $userDOB=$view_user['DOB'];
    $userMobile=$view_user['Mobile'];
    $userEmailID=$view_user['EmailID'];
    $userGender=$view_user['Gender'];
    $userDescription=urldecode($view_user['Description']);
    $userBusinessTitle=$view_user['BusinessTitle'];
    $userDesignation=$view_user['Designation'];
    $userAddress=$view_user['Address'];
    $userCity=$view_user['City'];
    $userState=$view_user['State'];
    $userCountry=$view_user['Country'];
    $userZipCode=$view_user['ZipCode'];
    $userStatus=$view_user['Status'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>WHERESERT</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <?php include_once('scripts/headTags.php') ?>

    <style>
        .box {
            border: solid 1px #CCC;
            font-size: 11pt !important;
            margin-bottom: 15px;
        }

        .boxCenter {
            border-radius: 5px;
            border: solid 2px #CCC;
            text-align: center;
            padding: 10px;
            font-size: 14pt !important;
            margin-bottom: 15px;
        }

        h2 {
            color: #000 !important;
            font-weight: 600;
            padding-top: 10px;
        }

        .myList li {
            border-bottom: dotted 1px #333;
            padding: 5px;
            font-size: 11pt !important;
            height: 35px;
        }

        h3 {
            border-bottom: dotted 1px blue;
            padding-bottom: 10px;
            margin-bottom: 10px;
            text-align: center;
        }

        .settingIcon {
            float: right;
            border: solid 1px #C6C2C1;
            padding: 3px;
            border-radius: 3px;
            background-color: #F5F0EF;
        }

        .settingIcon:hover {
            cursor: pointer;
        }

        .listTick {
            background-image: url(images/tickMark.png);
            background-repeat: no-repeat;
            background-position: center left;
            padding-left: 25px !important;
        }

    </style>
</head>

<body>

    <!--Nav Starts-->
    <?php include_once('topInner.php'); ?>
    <!--Nav Ends-->

    <!--Main Content Area Starts-->
    <section class="section">
        <div class="container">
            <div class="columns" style="margin-top:20px">
                <div class="column is-one-quarter" style="margin-top:80px;">
                    <!--Profile Pic Starts-->
                    <div class="box" style="background-image:url(images/profileBg.jpg); height:180px; text-align:center">

                        <div class="profilePic" style="background-image: url(profilePics/<?=$userProfilePic?>);"></div>

                        <h2><?=$userFullName?></h2>
                        <i style="font-size:11pt; color:#333"><?=$userDesignation?></i>
                        <br />
                        <?=$userCity?>

                    </div>
                    <!--Profile Pic Ends-->

                    <!--User Rating Starts-->
                    <div class="box">

                        <h3 style="text-align:left; font-size:13pt !important">
                            User Rating
                        </h3>
                        <img src="images/stars_0.png" style="margin-top:5px;" />
                    </div>
                    <!--User Rating Ends-->

                    <!--Skills Start-->
                    <div class="box">

                        <h3 style="text-align:left; font-size:13pt !important">
                            My Skills
                        </h3>
                        <ul class="myList">
                            <?php
                                //Fetch User's Skills
                                $query_userSkill=mysqli_query($link, "SELECT * FROM freelancer_skills WHERE FreelancerID='$userID'");
                                while($view_userSkill=mysqli_fetch_array($query_userSkill))
                                {
                                    $mySkillID=$view_userSkill['SkillID'];
                                    //Fetch Skills Name
                                    $query_skillsName=mysqli_query($link, "SELECT * FROM subcategories WHERE ID='$mySkillID'");
                                    $view_skillsName=mysqli_fetch_array($query_skillsName);
                                    $newSubCategory=$view_skillsName['SubCategory'];
                                    ?>
                            <li class="listTick">
                                <?=$newSubCategory?></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                    <!--Skills End-->

                    <!--Languages Start-->
                    <div class="box">
                        <h3 style="text-align:left; font-size:13pt !important">
                            I Can Speak
                        </h3>
                        <ul class="myList">
                            <?php
                                //Fetch User's Languages
                                $query_languages=mysqli_query($link, "SELECT * FROM freelancer_languages WHERE FreelancerID='$userID'");
                                while($view_languages=mysqli_fetch_array($query_languages))
                                {
                                    $myLanguageID=$view_languages['LanguageID'];
                                    //Fetch Language Name
                                    $query_langName=mysqli_query($link, "SELECT * FROM language_master WHERE ID='$myLanguageID'");
                                    $view_langName=mysqli_fetch_array($query_langName);
                                    $newLanguage=$view_langName['Language'];
                                    ?>
                            <li class="listTick">
                                <?=$newLanguage?>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                    <!--Languages End-->

                    <!--Social Media Links Start-->
                    <div class="box">
                        <h3 style="text-align:left; font-size:13pt !important">
                            Follow Me
                        </h3>
                        <ul class="myList">
                            <?php
                                //Fetch User's Social Media
                                $query_social=mysqli_query($link, "SELECT * FROM freelancer_social_media WHERE FreelancerID='$userID'");
                                while($view_social=mysqli_fetch_array($query_social))
                                {
                                    $mySocialMediaID=$view_social['SocialMediaID'];
                                    $mySocialMediaURL=$view_social['URL'];
                                    //Fetch Media Details
                                    $query_mediaName=mysqli_query($link, "SELECT * FROM socialmedia_master WHERE ID='$mySocialMediaID'");
                                    $view_mediaName=mysqli_fetch_array($query_mediaName);
                                    $newMediaName=$view_mediaName['MediaName'];
                                    $newMediaLogo=$view_mediaName['Logo'];
                                    ?>
                            <li>
                                <img src="images/<?=$newMediaLogo?>" align="middle" style="margin-top:-10px" /> &nbsp;
                                <a href="<?=$mySocialMediaURL?>" target="_blank" style="color:#000">
                                    <?=$newMediaName?>
                                </a>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                    <!--Social Media Links End-->

                </div>
                <div class="column">
                    <div class="box">
                        <h3 style="text-align:left; font-size:13pt !important;">
                            <strong>PROFILE</strong>
                        </h3>

                        <span style="float:right; font-size:10pt; color:#000;">
                            City : <?=$userCity?>
                        </span>
                        <br /><br />
                        <?=$userDescription?>
                    </div>

                    <!--Services List Starts-->
                    <div class="box">

                        <h3 style="text-align:left; font-size:13pt !important; border-bottom:0 !important">
                            <strong>LIST OF SERVICES</strong>
                        </h3>

                        <?php
                        //Fetch User's Services
                        $query_service=mysqli_query($link, "SELECT * FROM  freelancer_services WHERE FreelancerID='$userID'");
                        while($view_service=mysqli_fetch_array($query_service))
                        {
                            $myServiceID=$view_service['ID'];
                            $myServiceTitle=$view_service['Title'];
                            $myServiceCurrency=$view_service['Currency'];
                            $myServicePrice=$view_service['Price'];
                            $myServiceDesc=urldecode($view_service['Description']);
                            ?>
                        <h3 style="text-align:left; font-size:13pt !important">
                            <?=$myServiceTitle?>
                        </h3>
                        <span style="float:right; font-size:11pt; color:#C00">
                            Charges : <?=$myServiceCurrency?> <?=$myServicePrice?>
                        </span>
                        <br /><br />
                        <?=$myServiceDesc?>
                        <hr />
                        <?php
                        }
                        ?>

                    </div>
                    <!--Services List Ends-->

                    <!--Photo Gallery Starts-->
                    <div class="box">

                        <h3 style="text-align:left; font-size:13pt !important; border-bottom:0 !important">
                            <strong>PHOTO GALLERY</strong>
                        </h3>

                        <!--Images Start-->
                        <div class="columns is-multiline">

                            <?php
                            //Fetch User's Photo
                            $query_photo=mysqli_query($link, "SELECT * FROM  freelancer_upload_images WHERE FreelancerID='$userID'");
                            while($view_photo=mysqli_fetch_array($query_photo))
                            {
                                $myPhotoID=$view_photo['ID'];
                                $myPhotoTitle=$view_photo['Title'];
                                $myPhotoFileName=$view_photo['FileName'];
                                $myPhotoPublish=$view_photo['Publish'];
                            ?>

                            <div class="column is-one-quarter-desktop is-half-tablet">
                                <div class="card">
                                    <div class="card-image">
                                        <figure class="image is-3by2">
                                            <img src="userPhotos/<?=$myPhotoFileName?>" alt="<?=$myPhotoTitle?>">
                                        </figure>
                                    </div>
                                    <footer class="card-footer" style="padding:5px; font-size:9pt">
                                        <?=$myPhotoTitle?>
                                    </footer>
                                </div>
                            </div>
                            <?php
                            }
                            ?>

                        </div>
                        <!--Images End-->

                    </div>
                    <!--Photo Gallery Ends-->

                    <!--Video Gallery Starts-->
                    <!--
                    <div class="box">
                        <img src="images/add-green.png" class="settingIcon" id="myVideos" />

                        <h3 style="text-align:left; font-size:13pt !important; border-bottom:0 !important">
                            <strong>VIDEOS</strong>
                        </h3>
                    </div>
                    -->
                    <!--Video Gallery Ends-->

                    <!--Audio Starts-->
                    <div class="box">

                        <h3 style="text-align:left; font-size:13pt !important; border-bottom:0 !important">
                            <strong>AUDIO FILES</strong>
                        </h3>

                        <div class="columns is-multiline">

                            <?php
                            //Fetch User's Audio
                            $query_audio=mysqli_query($link, "SELECT * FROM  freelancer_upload_audio WHERE FreelancerID='$userID'");
                            while($view_audio=mysqli_fetch_array($query_audio))
                            {
                                $myAudioID=$view_audio['ID'];
                                $myAudioTitle=$view_audio['Title'];
                                $myAudioFileName=$view_audio['FileName'];
                                $myAudioPublish=$view_audio['Publish'];
                            ?>

                            <div class="column is-one-quarter-desktop is-half-tablet">
                                <div class="card">
                                    <header class="card-header" style="padding:5px; font-size:9pt">
                                        <?=$myAudioTitle?>
                                    </header>
                                    <div class="card-image">
                                        <audio controls controlsList="nodownload" controls="none" style="width:100%">
                                            <source src="userAudio/<?=$myAudioFileName?>" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>


                    </div>
                    <!--Audio Ends-->

                    <!--Pdf Starts-->

                    <div class="box">

                        <h3 style="text-align:left; font-size:13pt !important; border-bottom:0 !important">
                            <strong>PDF DOCUMENTS</strong>
                        </h3>

                        <!--PDF Start-->
                        <div class="columns is-multiline">

                            <?php
                            //Fetch User's PDF
                            $query_pdf=mysqli_query($link, "SELECT * FROM  freelancer_upload_pdf WHERE FreelancerID='$userID'");
                            while($view_pdf=mysqli_fetch_array($query_pdf))
                            {
                                $myPdfID=$view_pdf['ID'];
                                $myPdfTitle=$view_pdf['Title'];
                                $myPdfFileName=$view_pdf['FileName'];
                                $myPdfPublish=$view_pdf['Publish'];
                            ?>

                            <div class="column is-one-quarter-desktop is-half-tablet">
                                <div class="card">
                                    <header class="card-header" style="padding:5px; font-size:9pt">
                                        <?=$myPdfTitle?>
                                    </header>
                                    <a href="userPDFs/<?=$myPdfFileName?>" target="_blank">
                                        <div class="card-image">
                                            <figure class="image is-64x64" style="margin:auto">
                                                <img src="images/pdf.png" />
                                            </figure>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>

                    </div>

                    <!--Pdf Ends-->

                    <!--WebLink Starts-->
                    <div class="box">

                        <h3 style="text-align:left; font-size:13pt !important; border-bottom:0 !important">
                            <strong>EXTERNAL WEB LINKS</strong>
                        </h3>

                        <ul class="myList">
                            <?php
                                //Fetch User's WebLink
                                $query_weblink=mysqli_query($link, "SELECT * FROM freelancer_upload_weblink WHERE FreelancerID='$userID'");
                                while($view_weblink=mysqli_fetch_array($query_weblink))
                                {
                                    $myWebLinkID=$view_weblink['ID'];
                                    $myWebLinkTitle=$view_weblink['Title'];
                                    $myWebLinkURL=$view_weblink['URL'];
                                    ?>
                            <li class="listTick">
                                <a href="<?=$myWebLinkURL?>" target="_blank" style="color:#000">
                                    <?=$myWebLinkTitle?>
                                </a>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>

                    </div>
                    <!--WebLink Ends-->

                    <!--User Reviews Start-->
                    <!--
                    <div class="box">
                        Reviews
                    </div>
                    -->
                    <!--User Reviews End-->

                </div>
            </div>


        </div>
    </section>
    <!--Main Content Area Ends-->


    <!--Footer Starts-->
    <?php include_once('footer.php'); ?>
    <!--Footer Ends-->

    <!--Copyrights Start-->
    <?php include_once('copyrights.php'); ?>
    <!--Copyrights End-->

    <?php include_once('scripts/bottomScripts.php') ?>


    <script>
        $(document).ready(function() {

            $(" #btnFind").click(function() {
                $.post("app/findProfile", $("#myForm").serialize(), function(data) {
                    window.location.href = "searchList?LF=" + data;
                });
                return false;
            });

            //My Ratings
            $("#myRating").click(function() {
                window.location.href = "myRating";
            });

            //My Email
            $("#myEmail").click(function() {
                window.location.href = "myEmail";
            });

            //My Skills
            $("#mySkills").click(function() {
                window.location.href = "mySkills";
            });

            //My Languages
            $("#myLanguages").click(function() {
                window.location.href = "myLanguages";
            });

            //My Social Media
            $("#mySocialMedia").click(function() {
                window.location.href = "mySocialMedia";
            });

            //My Profile
            $("#myProfile").click(function() {
                window.location.href = "myProfile";
            });

            //My Services
            $("#myServices").click(function() {
                window.location.href = "myServices";
            });

            //My Services Edit
            $(".myServicesEdit").click(function() {

                var myServID = $(this).attr('id');
                window.location.href = "myServicesEdit?SID=" + myServID;
            });

            //My Services Delete
            $(".myServicesDelete").click(function() {
                var myServID = $(this).attr('id');
                window.location.href = "myServicesDelete?SID=" + myServID;
            });

            //My Photos
            $("#myPhotos").click(function() {
                window.location.href = "myPhotos";
            });

            //My Photo Edit
            $(".myPhotoEdit").click(function() {

                var myPhotoID = $(this).attr('ID');
                window.location.href = "myPhotoEdit?SID=" + myPhotoID;
            });

            //My Photo Delete
            $(".myPhotoDelete").click(function() {
                var myPhotoID = $(this).attr('ID');
                window.location.href = "myPhotoDelete?SID=" + myPhotoID;
            });

            //My Video
            $("#myVideos").click(function() {
                window.location.href = "myVideos";
            });

            //My Audio
            $("#myAudio").click(function() {
                window.location.href = "myAudio";
            });

            //My Audio Edit
            $(".myAudioEdit").click(function() {

                var $myAudioID = $(this).attr('ID');
                window.location.href = "myAudioEdit?AID=" + $myAudioID;
            });

            //My Audio Delete
            $(".myAudioDelete").click(function() {
                var $myAudioID = $(this).attr('ID');
                window.location.href = "myAudioDelete?AID=" + $myAudioID;
            });

            //My Pdf
            $("#myPdf").click(function() {
                window.location.href = "myPdf";
            });

            //My Pdf Edit
            $(".myPdfEdit").click(function() {

                var $myPdfID = $(this).attr('ID');
                window.location.href = "myPdfEdit?SID=" + $myPdfID;
            });

            //My Pdf Delete
            $(".myPdfDelete").click(function() {
                var $myPdfID = $(this).attr('ID');
                window.location.href = "myPdfDelete?SID=" + $myPdfID;
            });

            //Add Web Link
            $("#myWebLink").click(function() {
                window.location.href = "myWebLink";
            });

            //Edit Web Link
            $("#editWebLink").click(function() {
                var newID = $(this).attr('recordID');
                window.location.href = "editWebLink?ID=" + newID;
            });

            //Delete Web Link
            $("#delWebLink").click(function() {
                var newID = $(this).attr('recordID');
                window.location.href = "deleteWebLink?ID=" + newID;
            });


        });

    </script>
    <script src="js/mobileMenu.js">
    </script>

</body>

</html>
