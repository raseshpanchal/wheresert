<?php
    error_reporting(0);
    include_once("config/connection.php");
    include_once("userInfo.php");

    if(!$myEmail)
    {
        header("Location: ./");
    }

    
    //Fetch User's Services
    $servID=$_GET['SID'];

    $query_service=mysqli_query($link, "SELECT * FROM  freelancer_services WHERE ID='$servID'");
    $view_service=mysqli_fetch_array($query_service);
    $myServiceTitle=$view_service['Title'];
    $myServiceCurrency=$view_service['Currency'];
    $myServicePrice=$view_service['Price'];
    $myServiceDesc=urldecode($view_service['Description']);

        
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
                        <h3 class="pageTitle">DELETE SERVICE ENTRY
                            <img src="images/home.png" class="settingIcon" id="myHome" />
                        </h3>
                    </div>
                    <!--Page Title Ends-->

                    <!--Services List Starts-->
                    <div class="box">

                        <form name="myServicesForm" id="myServicesForm" method="POST">

                            <div class="columns">
                                <div class="column">
                                    <input type="text" class="input customInput" value="<?=$myServiceTitle?>" id="txt_title" name="txt_title" placeholder="Enter Title*">
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column">
                                    <input type="text" class="input customInput" value="<?=$myServiceCurrency?>" id="txt_currency" name="txt_currency" placeholder="Enter Currency*">
                                </div>
                                <div class="column">
                                    <input type="text" class="input customInput" value="<?=$myServicePrice?>" id="txt_price" name="txt_price" placeholder="Enter Price*">
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <textarea class="textarea customInput has-fixed-size" name="txt_desc" id="txt_desc" rows="6" cols="50" placeholder="Your short profile*"><?=$myServiceDesc?></textarea>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column">
                                    <button class="button is-danger is-pulled-right" name="btnSubmit" id="btnSubmit">Delete</button>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column" style="text-align:left; color:red;">
                                    <span id="alert"></span>
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

            //Add Form
            $('#btnSubmit').click(function() {
                //                var myServID = $(this).attr('servID');
                var newTitle = $('#txt_title').val();
                var newCurrency = $('#txt_currency').val();
                var newPrice = $('#txt_price').val();
                var newDesc = $('#txt_desc').val();

                if (newTitle == '' || newCurrency == '' || newPrice == '' || newDesc == '') {
                    $('#alert').html('<span style="color:red">All fields are mandatory!</span>');
                } else {
                    $('#alert').html('<span style="color:#333">Please wait...</span> Processing...');

                    $.post("app/servDeleteFormEntry?ID=<?=$servID?>",
                        $("#myServicesForm").serialize(),
                        function(data) {

                            if (data == 'fieldsErr') {
                                $('#alert').html('<span style="color:red">All fields are mandatory!</span>');
                                $('.btnLogin').attr("disabled", false);
                            } else if (data == '0') {
                                $('#alert').html('<span style="color:red">Please check connection!</span>');
                                $('.btnLogin').attr("disabled", false);
                            } else if (data == '1') {
                                window.location.href = "myAccount";
                            }
                        });

                }

                return false;
            });

        });

    </script>
    <script src="js/mobileMenu.js">
    </script>

</body>

</html>
