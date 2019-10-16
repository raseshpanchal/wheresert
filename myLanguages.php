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

        .myList li {
            border-bottom: dotted 1px #333;
            padding: 5px;
            font-size: 11pt !important;
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
                        <h3 class="pageTitle">I CAN SPEAK
                            <img src="images/home.png" class="settingIcon" id="myHome" />
                        </h3>
                    </div>
                    <!--Page Title Ends-->

                    <!--Services List Starts-->
                    <div class="box">
                        <form name="myLanguageForm" id="myLanguageForm" method="POST">
                            <ul class="myList">
                                <?php
                                $query_lang=mysqli_query($link, "SELECT * FROM language_master WHERE Publish='Yes' ORDER BY Language ASC");
                                while($view_lang=mysqli_fetch_array($query_lang))
                                {
                                    $newLangID=$view_lang['ID'];
                                    $newLanguage=$view_lang['Language'];
                                    //Fetch User's Languages
                                    $query_userLang=mysqli_query($link, "SELECT * FROM freelancer_languages WHERE FreelancerID='$userID' AND LanguageID='$newLangID'");
                                    $view_userLang=mysqli_fetch_array($query_userLang);
                                    $myLanguageID=$view_userLang['LanguageID'];
                                    ?>
                                <li>
                                    <input type="checkbox" id="checkboxvar[]" <?php
                                    if($newLangID==$myLanguageID)
                                    {
                                        echo 'checked="checked"';
                                    }
                                    ?> name="checkboxvar[]" value="<?=$newLangID?>" />
                                    &nbsp;&nbsp;
                                    <?php
                                    if($newLangID==$myLanguageID)
                                    {
                                        ?>
                                    <span style="color:red"><?=$newLanguage?></span>
                                    <?php
                                    }
                                    else
                                    {
                                        ?>
                                    <?=$newLanguage?>
                                    <?php
                                    }
                                    ?>
                                </li>
                                <?php
                                }
                                ?>

                                <li style="border:0; text-align:right">
                                    <button class="button is-danger is-small btnSave">UPDATE</button>
                                </li>
                            </ul>
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

            //Update Language
            //Check Class
            $('.btnSave').click(function() {

                $('#btnSave').attr("disabled", true);

                $.post("app/languageEditFormEntry",
                    $("#myLanguageForm").serialize(),
                    function(data) {
                        if (data == 'language_1') {
                            location.reload();
                        }
                        if (data == 'language_0') {
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
