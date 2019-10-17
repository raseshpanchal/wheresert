<?php
    error_reporting(0);
    include_once("config/connection.php");
    include_once("userInfo.php");

    if(!$myEmail)
    {
        header("Location: ./");
    }
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
                        <h3 class="pageTitle">PDF GALLERY
                            <img src="images/home.png" class="settingIcon" id="myHome" />
                        </h3>
                    </div>
                    <!--Page Title Ends-->

                    <!--Services List Starts-->
                    <div class="box">
                        <form name="myFormPdf" id="myFormPdf" method="POST" enctype="multipart/form-data" action="app/pdfAddFormEntry">
                            <div class="columns">
                                <div class="column">

                                    <div class="field">
                                        <div class="control">
                                            <input class="input is-primary" type="text" name="txt_pdfTitle" id="txt_pdfTitle" placeholder="Enter Title*">
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="control">
                                            <!-- File Input Starts -->
                                            <div id="upload-file-container">
                                                <input type="file" name="file" id="file" />
                                            </div>
                                            <!-- File Input Ends -->
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="columns">

                                <div class="column">
                                    <button class="button is-danger is-pulled-right" id="btnUpload" onclick="profilePDF()" style="margin-left:10px">Save</button>
                                    <a class="button is-dark is-pulled-right btnCancel">Cancel</a>

                                </div>

                            </div>

                            <div class="columns">

                                <div class="column">
                                    <span id="fileStatus"></span>
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

            //Cancel Button
            $('.btnCancel').click(function() {
                window.location.href = "myAccount";
            });

        });

    </script>
    <script src="js/mobileMenu.js">
    </script>

</body>

</html>
