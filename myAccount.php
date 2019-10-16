<?php
    error_reporting(0);
    include_once("config/connection.php");
    include_once("userInfo.php");

    if(!$myEmail)
    {
        header("Location: ./");
    }

    //Count New Inquiries
    $email_count=mysqli_query($link, "SELECT * FROM freelancer_inquiries WHERE UserID='$userID' AND Status='New'");
    $email_rows = mysqli_num_rows($email_count);
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
                            <img src="images/star.png" class="settingIcon" id="myRating" />
                        </h3>
                        <img src="images/stars_0.png" style="margin-top:5px;" />
                    </div>
                    <!--User Rating Ends-->

                    <!--New Email Starts-->
                    <div class="box">
                        <h3 style="text-align:left; font-size:13pt !important">
                            New Inquiry
                            <img src="images/envelope.png" class="settingIcon" id="myEmail" />
                        </h3>
                        <?php
                        if($email_rows!=0)
                        {
                            ?>
                        <p style="color:red; font-size:10pt; font-weight:600">You have (<?=$email_rows?>) New Email</p>
                        <?php
                        }
                        else
                        {
                            ?>
                        <p style="font-size:10pt; font-weight:600">No New Email</p>
                        <?php
                        }
                        ?>

                    </div>
                    <!--New Email Ends-->

                    <!--Skills Start-->
                    <div class="box">

                        <h3 style="text-align:left; font-size:13pt !important">
                            My Skills
                            <img src="images/setting.png" class="settingIcon" id="mySkills" />
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
                            <img src="images/setting.png" class="settingIcon" id="myLanguages" />
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
                            <img src="images/setting.png" class="settingIcon" id="mySocialMedia" />
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
                        <h3 style="text-align:left; font-size:13pt !important">
                            Profile
                            <img src="images/setting.png" class="settingIcon" id="myProfile" />
                        </h3>
                        <span style="float:right; font-size:10pt; color:#000">
                            City : <?=$userCity?>
                        </span>
                        <br /><br />
                        <?=$userDescription?>
                    </div>

                    <!--Services List Starts-->
                    <div class="box">

                        <img src="images/add-green.png" class="settingIcon" id="myServices" />

                        <h3 style="text-align:left; font-size:13pt !important; border-bottom:0 !important">
                            <strong>LIST OF SERVICES</strong>
                        </h3>

                        <?php
                        //Fetch User's Services
                        $query_service=mysqli_query($link, "SELECT * FROM  freelancer_services WHERE FreelancerID='$userID'");
                        while($view_service=mysqli_fetch_array($query_service))
                        {
                            $myServiceTitle=$view_service['Title'];
                            $myServiceCurrency=$view_service['Currency'];
                            $myServicePrice=$view_service['Price'];
                            $myServiceDesc=urldecode($view_service['Description']);
                            ?>
                        <h3 style="text-align:left; font-size:13pt !important">
                            <?=$myServiceTitle?>
                        </h3>
                        <span style="float:right; font-size:11pt; color:#000">
                            Charges : <?=$myServiceCurrency?> <?=$myServicePrice?>
                        </span>
                        <br /><br />
                        <?=$myServiceDesc?>
                        <br /><br />
                        <span style="float:right; font-size:11pt; color:#000">
                            <a href="#">
                                <img src="images/delete.png" class="settingIcon" id="myServices" />
                            </a>
                            <a href="#">
                                <img src="images/edit.gif" style="margin-left:5px; margin-right:5px" class="settingIcon" id="myServices" />
                            </a>
                        </span>
                        <hr />
                        <?php
                        }
                        ?>

                    </div>
                    <!--Services List Ends-->

                    <!--Photo Gallery Starts-->
                    <div class="box">
                        <img src="images/add-green.png" class="settingIcon" id="myPhotos" />

                        <h3 style="text-align:left; font-size:13pt !important; border-bottom:0 !important">
                            <strong>PHOTO GALLERY</strong>
                        </h3>
                    </div>
                    <!--Photo Gallery Ends-->

                    <!--Video Gallery Starts-->
                    <div class="box">
                        <img src="images/add-green.png" class="settingIcon" id="myVideos" />

                        <h3 style="text-align:left; font-size:13pt !important; border-bottom:0 !important">
                            <strong>VIDEOS</strong>
                        </h3>
                    </div>
                    <!--Video Gallery Ends-->

                    <!--Audio Starts-->
                    <div class="box">
                        <img src="images/add-green.png" class="settingIcon" id="myAudio" />

                        <h3 style="text-align:left; font-size:13pt !important; border-bottom:0 !important">
                            <strong>AUDIO</strong>
                        </h3>
                    </div>
                    <!--Audio Ends-->

                    <!--PDF Starts-->
                    <div class="box">
                        <img src="images/add-green.png" class="settingIcon" id="myPDF" />

                        <h3 style="text-align:left; font-size:13pt !important; border-bottom:0 !important">
                            <strong>PDF DOCUMENTS</strong>
                        </h3>
                    </div>
                    <!--PDF Ends-->

                    <!--WebLink Starts-->
                    <div class="box">
                        <img src="images/add-green.png" class="settingIcon" id="myWebLink" />

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

                                <span style="float:right">
                                    <a href="#">
                                        <img src="images/delete.png" class="settingIcon" id="delWebLink" recordID="<?=$myWebLinkID?>" />
                                    </a>
                                    <a href="#">
                                        <img src="images/edit.gif" style="margin-left:5px; margin-right:5px" class="settingIcon" id="editWebLink" recordID="<?=$myWebLinkID?>" />
                                    </a>
                                </span>
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

            //My Photos
            $("#myPhotos").click(function() {
                window.location.href = "myPhotos";
            });

            //My Video
            $("#myVideos").click(function() {
                window.location.href = "myVideos";
            });

            //My Audio
            $("#myAudio").click(function() {
                window.location.href = "myAudio";
            });

            //My Audio
            $("#myAudio").click(function() {
                window.location.href = "myAudio";
            });

            //My PDF
            $("#myPDF").click(function() {
                window.location.href = "myPDF";
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
