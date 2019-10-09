<?php
    error_reporting(0);
    include_once("config/connection.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>WHERESERT</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <?php include_once('scripts/headTags.php') ?>
</head>

<body>

    <!--Nav Starts-->
    <?php include_once('topInner.php'); ?>
    <!--Nav Ends-->

    <!--Main Content Area Starts-->
    <div style="margin-top:120px"></div>
    <section class="hero is-dark">
        <div class="hero-body">
            <div class="container" style="text-align:center;">
                <h1 class="loveTitle" style="color:#FFF !important;">
                    Dear Member your registration is under approval process.<br/>We will inform you shortly!
                </h1>
            </div>
        </div>
    </section>
    
    <img src="images/expressLove.png" class="expressLove is-hidden-mobile" />
    <img src="images/expressLove.png" class="expressLoveMobile is-hidden-desktop" />
    <section class="hero is-light">
        <div class="hero-body">
            <div class="container" style="text-align:center">
                <h1 class="loveTitle">
                    If you <span>love</span> us then don’t forget to <span>express</span> it!
                </h1>
                <div class="columns">
                    <div class="column"></div>
                    <div class="column">
                        <!--Form Starts-->
                        <form name="myFormLove" id="myFormLove" method="POST">
                            <div class="columns">
                                <div class="column">
                                    <input type="text" class="input customInput" name="txt_name" id="txt_name" placeholder="Your Name*">
                                </div>
                                <div class="column">
                                    <input type="text" class="input customInput" name="txt_contact" id="txt_contact" placeholder="Email OR Mobile*">
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column">
                                    <textarea class="textarea customInput has-fixed-size" name="txt_comment" id="txt_comment" rows="6" cols="50" placeholder="Write your thoughts to motivate us*"></textarea>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column">
                                    <button class="button is-danger is-pulled-right" name="btnSubmit" id="btnSubmit">Submit</button>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <span id="alert"></span>
                                </div>
                            </div>
                        </form>
                        <!--Form Ends-->
                    </div>
                    <div class="column"></div>
                </div>
            </div>
        </div>
    </section>
    <!--Main Content Area Ends-->


    <!--Explore Professionals Start-->
    <?php include_once('exploreProfessionals.php'); ?>
    <!--Explore Professionals End-->


    <!--Footer Starts-->
    <?php include_once('footer.php'); ?>
    <!--Footer Ends-->

    <!--Copyrights Start-->
    <?php include_once('copyrights.php'); ?>
    <!--Copyrights End-->

    <?php include_once('scripts/bottomScripts.php') ?>


    <script>
        $(document).ready(function() {

            $("#btnFind").click(function() {
                $.post("app/findProfile",
                    $("#myForm").serialize(),
                    function(data) {
                        //alert(data);
                        window.location.href = "searchList?LF=" + data;
                    });
                return false;
            });

            //Submit Expression
            $("#btnSubmit").click(function() {
                $.post("app/motivateUs",
                    $("#myFormLove").serialize(),
                    function(data) {
                        if (data == 'NameEmptyErr') {
                            $('#alert').text('Please Enter Your Name');
                            $('#txt_name').val('');
                        } else if (data == 'NameNumberErr') {
                            $('#alert').text('Please Enter Only Alphabets');
                            $('#txt_name').val('');
                        } else if (data == 'ContactEmptyErr') {
                            $('#alert').text('Enter either Email OR Mobile');
                            $('#txt_contact').val('');
                        } else if (data == 'ContactMobileErr') {
                            $('#alert').text('Please Check Email ID');
                        } else if (data == 'ContactEmailErr') {
                            $('#alert').text('Please Check Email ID');
                        } else if (data == '1') {
                            $('#alert').text('Form Submitted Successfully!');
                            $('#txt_name').val('');
                            $('#txt_contact').val('');
                            $('#txt_comment').val('');
                        } else if (data == '0') {
                            $('#alert').text('Please check connection!');
                        }

                        return false;
                        //window.location.href = "searchList?LF=" + data;
                    });
                return false;
            });

        });

    </script>

    <script src="js/mobileMenu.js"></script>

</body>

</html>
