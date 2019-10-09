<?php
    error_reporting(0);
    include_once("config/connection.php");

    $userEmail=$_GET['ID'];
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
                        <form name="myFormChangePassword" id="myFormChangePassword" method="POST">

                            <div class="columns">
                                <div class="column">
                                    <label class="label" style="float:left">Define New Password</label>
                                </div>
                            </div>

                            <div class="columns">

                                <div class="column">
                                    <input type="password" class="input customInput" name="txt_newPass" id="txt_newPass" placeholder="Set Password*">
                                </div>
                                <div class="column">
                                    <input type="password" class="input customInput" name="txt_confirmPass" id="txt_confirmPass" placeholder="Confirm Password*">
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <button class="button is-danger is-pulled-right" name="btnSubmit" id="btnSubmit">Update</button>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column" style="text-align:left">
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
                var newPassword = $('#txt_newPass').val();
                var newConfirmPassword = $('#txt_confirmPass').val();
                $('#alert').text('Please wait...');

                if (newPassword != '' && newConfirmPassword != '') {

                    if (newPassword == newConfirmPassword) {
                        $.post("app/changePasswordEntry?ID=<?=$userEmail?>",
                            $("#myFormChangePassword").serialize(),
                            function(data) {
                                if (data == 'passErr') {
                                    $('#alert').text('Password and Confirm Password not matching!');
                                } else if (data == '1') {
                                    $('#alert').text('Password has been changed successfully!');
                                    $('#txt_newPass').val('');
                                    $('#txt_confirmPass').val('');
                                } else if (data == '0') {
                                    $('#alert').text('Please check connection!');
                                }
                            });
                    } else {
                        $('#alert').text('Fields are not matching!');
                    }

                } else {
                    $('#alert').text('Both fields are mandatory!');
                }

                return false;
            });



        });

    </script>

    <script src="js/mobileMenu.js"></script>

</body>

</html>
