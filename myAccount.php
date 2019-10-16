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
            padding: 5px;
            border-radius: 3px;
            background-color: #F5F0EF;
        }

        .settingIcon:hover {
            cursor: pointer;
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
                            <li>001</li>
                            <li>002</li>
                            <li>003</li>
                            <li>003</li>
                            <li>004</li>
                            <li>005</li>
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
                            <li>001</li>
                            <li>002</li>
                            <li>003</li>
                            <li>003</li>
                            <li>004</li>
                            <li>005</li>
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
                            <li>Facebok</li>
                            <li>Twitter</li>
                            <li>Instagram</li>
                            <li>Linked-in</li>
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

                        <img src="images/setting.png" class="settingIcon" id="myServices" />

                        <h3 style="text-align:left; font-size:13pt !important">
                            Service Title 001
                        </h3>
                        <span style="float:right; font-size:11pt; color:#000">
                            Charges : AED 100
                        </span>
                        <br /><br />
                        <?=$userDescription?>

                        <hr />

                        <h3 style="text-align:left; font-size:13pt !important">
                            Service Title 001
                        </h3>
                        <span style="float:right; font-size:11pt; color:#000">
                            Charges : AED 100
                        </span>
                        <br /><br />
                        <?=$userDescription?>

                        <hr />

                    </div>
                    <!--Services List Ends-->

                    <!--User Reviews Start-->
                    <div class="box">
                        Reviews
                    </div>
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
        });

    </script>
    <script src="js/mobileMenu.js">
    </script>

</body>

</html>
