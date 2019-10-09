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
    <section class="hero is-light">
        <div class="hero-body">
            <div class="container" style="text-align:center">
                <div class="columns">
                    <div class="column"></div>
                    <div class="column">
                        <!--Form Starts-->
                        <form name="myFormLoginProblem" id="myFormLoginProblem" method="POST">
                            <label class="label">Login Problem ?</label>
                            <div class="columns">
                                <div class="column">
                                    <input type="text" class="input customInput" name="txt_email" id="txt_email" placeholder="Enter Registered Email ID*">
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <button class="button is-danger is-pulled-right" name="btnSubmit" id="btnSubmit">Send</button>
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
                var newEmail = $('#txt_email').val();
                $('#alert').text('Please wait...');

                $.post("app/loginProblemEntry",
                    $("#myFormLoginProblem").serialize(),
                    function(data) {

                        if (data == 'notEmail') {
                            $('#alert').text('Improper Email ID Entry!');
                        } else if (data == 'emailSuccess') {
                            $('#alert').text('Request Submitted Successfully! Please check email inbox.');
                            $('#txt_email').val('');
                        } else if (data == 'emailErr') {
                            $('#alert').text('Email is not registered with us.');
                        }

                    });
                return false;
            });
        });

    </script>

    <script src="js/mobileMenu.js"></script>

</body>

</html>
