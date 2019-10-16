<?php
    error_reporting(0);
    include_once("config/connection.php");
    include_once("userInfo.php");

    if(!$myEmail)
    {
        header("Location: ./");
    }

    //Fetch Media Name
    $newMediaID=$_GET['SID'];
    $query_social=mysqli_query($link, "SELECT * FROM socialmedia_master WHERE ID='$newMediaID'");
    $view_social=mysqli_fetch_array($query_social);
    $newMediaName=$view_social['MediaName'];
    $newMediaLogo=$view_social['Logo'];

    //Fetch User's Social Links
    $query_userMedia=mysqli_query($link, "SELECT * FROM freelancer_social_media WHERE FreelancerID='$userID' AND SocialMediaID='$newMediaID'");
    $view_userMedia=mysqli_fetch_array($query_userMedia);
    $myURL=$view_userMedia['URL'];
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

        .boxTitle {
            margin-bottom: 15px;
            background-color: #636363;
            border-radius: 5px;
            padding: 15px;
        }

        .pageTitle {
            text-align: left;
            font-size: 11pt !important;
            color: #FFF !important;
            font-weight: 400;
        }

        h2 {
            color: #000 !important;
            font-weight: 600;
            padding-top: 10px;
        }

        .settingIcon {
            float: right;
            border: solid 1px #C6C2C1;
            padding: 5px;
            border-radius: 3px;
            background-color: #F5F0EF;
            margin-top: -5px;
        }

        .settingIcon:hover {
            cursor: pointer;
        }

        .myList li {
            border-bottom: dotted 1px #333;
            padding: 5px;
            font-size: 11pt !important;
        }

        .myList li span {
            float: right;
            font-size: 10pt !important;
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

                </div>
                <div class="column">

                    <!--Page Title Starts-->
                    <div class="boxTitle">
                        <h3 class="pageTitle"><?=strtoupper($newMediaName)?>
                            <img src="images/home.png" class="settingIcon" id="myHome" />
                        </h3>
                    </div>
                    <!--Page Title Ends-->

                    <!--Services List Starts-->
                    <div class="box">

                        <form name="mySocialForm" id="mySocialForm" method="POST">
                            <div class="columns">
                                <div class="column">
                                    <p>
                                        <input class="input customInput formSpace" name="txt_url" id="txt_url" type="text" placeholder="Enter URL*" value="<?=$myURL?>">
                                    </p>
                                    <p style="text-align:right">
                                        <button class="button is-danger is-small btnSave">UPDATE</button>
                                    </p>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!--Services List Ends-->

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

            //Back to MyAccount
            $("#myHome").click(function() {
                window.location.href = "myAccount";
            });


            //Check Class
            $('.btnSave').click(function() {

                $('#btnSave').attr("disabled", true);

                $.post("app/socialMediaEditFormEntry?ID=<?=$newMediaID?>",
                    $("#mySocialForm").serialize(),
                    function(data) {
                        if (data == 'social_1') {
                            window.location.href = "mySocialMedia";
                        }
                        if (data == 'social_0') {
                            alert('Check Connection!');
                        }
                    });

                return false;
            });




        });

    </script>
    <script src="js/mobileMenu.js">
    </script>

</body>

</html>
