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

    <!--Breadcrums Starts
    <section class="section" style="margin-top:20px; padding-bottom:20px;">
        <div class="container">

            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li class="is-active"><a href="#" aria-current="page">WhereSert Sign Up</a></li>
                </ul>
            </nav>

        </div>
    </section>
    Breadcrums Ends-->

    <!--Content Area Starts-->
    <section class="section" style="margin-top:100px; padding-top:20px; margin-bottom:50px;">
        <div class="container">
            <div class="columns">


                <div class="column writingPad">

                    <form name="myFormLogin" id="myFormLogin" method="POST">
                        <div class="columns" style="margin-top:70px; height: 617px;">
                            <div class="column is-3"></div>
                            <div class="column" style="text-align:center">
                                <h1 class="formSpace">User Login</h1>

                                <div class="control formSpace">
                                    <label class="radio">
                                        <input type="radio" name="txt_userType" id="txt_userType" value="Freelancer" checked>
                                        I CAN HELP
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="txt_userType" id="txt_userType" value="Recruiter">
                                        I NEED HELP
                                    </label>
                                </div>

                                <p>
                                    <input class="input customInput formSpace" name="txt_user" id="txt_user" type="text" placeholder="Email ID OR Mobile Number">
                                </p>

                                <p>
                                    <input class="input customInput formSpace" name="txt_pass" id="txt_pass" type="password" placeholder="Enter Password">
                                </p>

                                <div class="control formSpace">
                                    <button class="button is-primary is-outlined btnLogin" style="width:100%">Login</button>
                                    <br /><br />
                                    <span id="loginStatus"></span>
                                </div>

                                <p style="text-align:right">
                                    Login Problem? <a href="wheresert-login-problem">Click Here</a>
                                </p>


                            </div>
                            <div class="column is-3"></div>
                        </div>
                    </form>



                </div>


                <div class="column">
                    <div class="columns">
                        <div class="column is-3">
                            <img src="images/wheresert-login.png" />
                        </div>
                        <div class="column" style="padding-top:28px">
                            <h1 style="line-height:28pt">
                                Welcome to the world of skilled, professionals, and handicraft experts.
                            </h1>

                        </div>
                    </div>

                    <div class="columns" style="color:#000">
                        <div class="column is-12">
                            <p>
                                <span class="is-medium"><b>Who can sign up under “I CAN HELP”</b></span>
                                <br />
                                <span>
                                    All those skilled people, handicraft talents, and any professional can get sign up under I CAN HELP section. After sign up you can post your profile in details along with your photos, audio and video files, along with PDF documents. It will be opening new opportunities for you to serve and share your talents beyond the boundaries. WhereSert platform is developed considering your requirements and it’s totally free.
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="columns" style="color:#000">
                        <div class="column is-12">
                            <p>
                                <span class="is-medium"><b>Who can sign up under “I NEED HELP”</b></span>
                                <br />
                                <span>
                                    If you are a company, small business, or an individual looking for some talent to hire for your company and/or planning to hire someone for longer, shorter term, or for the temporary basis. By getting sign up you can get help from community and you can help them to grow up in true manner. WhereSert as an online platform can help you to find your requirement. And don’t forget the sign up is totally free.
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="columns" style="color:#000">
                        <div class="column is-12">
                            <p>
                                <span>Not yet member?</span>
                                <br /><br />
                                <a href="wheresert-sign-up" class="button is-dark is-outlined">
                                    Join Now
                                </a>
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!--Content Area Ends-->


    <!--Express Love Starts-->
    <img src="images/expressLove.png" class="expressLove is-hidden-mobile" />
    <img src="images/expressLove.png" class="expressLoveMobile is-hidden-desktop" />
    <section class="hero is-light">
        <div class="hero-body">
            <div class="container" style="text-align:center">
                <h1 class="loveTitle">
                    If you <span>love</span> us then don’t forget to <span>express</span> it!
                </h1>
                <a href="wheresert-motivate-us" class="button is-medium is-danger is-outlined">
                    Motivate Us
                </a>
            </div>
        </div>
    </section>
    <!--Express Love Ends-->

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

            //Login Script Starts
            $('.btnLogin').click(function() {
                var userType = $("input[name='txt_userType']:checked").val();
                $('.btnLogin').attr("disabled", true);
                $('#loginStatus').html('Please wait...').fadeIn(300);
                var myUser = $('#txt_user').val();
                var myPass = $('#txt_pass').val();

                if (userType == 'Freelancer') {
                    if (myUser != '') {
                        if (myPass == '') {
                            $('#loginStatus').html('<span style="color:red">Enter Password</span>');
                            $('#txt_pass').val('');
                            $('.btnLogin').attr("disabled", false);
                        } else {
                            $.post("app/freelancerLoginEntry",
                                $("#myFormLogin").serialize(),
                                function(data) {
                                    if (data == 'emailError') {
                                        $('#loginStatus').html('<span style="color:red">Wrong Email ID</span>').fadeIn(300);
                                        $('#login_user').val('');
                                        $('#login_pass').val('');
                                        $('.btnLogin').attr("disabled", false);
                                    }
                                    if (data == 'mobileError') {
                                        $('#loginStatus').html('<span style="color:red">Wrong Mobile Number</span>').fadeIn(300);
                                        $('#login_user').val('');
                                        $('#login_pass').val('');
                                        $('.btnLogin').attr("disabled", false);
                                    } else if (data == 'validationError') {
                                        $('#loginStatus').html('<span style="color:red">Please Validate Your Account Before Login</span>').fadeIn(300);
                                        $('#login_user').val('');
                                        $('#login_pass').val('');
                                        $('.btnLogin').attr("disabled", false);
                                    } else if (data == 'passwordError') {
                                        $('#loginStatus').html('<span style="color:red">Wrong Password</span>').fadeIn(300);
                                        $('#login_user').val('');
                                        $('#login_pass').val('');
                                        $('.btnLogin').attr("disabled", false);
                                    } else if (data == 'validWizard') {
                                        $('#loginStatus').html('<span style="color:green">Account Athenticated. Please wait...</span>').fadeIn(300);
                                        $('#login_user').val('');
                                        $('#login_pass').val('');
                                        window.location.href = 'freelancer-registration-process';
                                    } else if (data == 'validUser') {
                                        $('#loginStatus').html('<span style="color:green">Account Athenticated. Please wait...</span>').fadeIn(300);
                                        $('#login_user').val('');
                                        $('#login_pass').val('');
                                        window.location.href = 'myAccount';
                                        //history.back(-1);
                                    }

                                });
                            return false;
                        }
                    } else {
                        $('#regiStatus').html('<span style="color:red">Enter Email OR Mobile Number</span>');
                        $('#txt_user').val('');
                        $('.btnLogin').attr("disabled", false);
                    }
                } else if (userType == 'Recruiter') {
                    if (validateEmail(myEmail) != '') {
                        if (myPass == '') {
                            $('#loginStatus').html('<span style="color:red">Enter Password</span>');
                            $('#txt_pass').val('');
                            $('.btnLogin').attr("disabled", false);
                        } else {
                            $.post("app/recruiterLoginEntry",
                                $("#myFormLogin").serialize(),
                                function(data) {
                                    if (data == 'emailError') {
                                        $('#loginStatus').html('<span style="color:red">Wrong Email ID</span>').fadeIn(300);
                                        $('#login_user').val('');
                                        $('#login_pass').val('');
                                        $('.btnLogin').attr("disabled", false);
                                    } else if (data == 'validationError') {
                                        $('#loginStatus').html('<span style="color:red">Please Validate Your Email ID Before Login</span>').fadeIn(300);
                                        $('#login_user').val('');
                                        $('#login_pass').val('');
                                        $('.btnLogin').attr("disabled", false);
                                    } else if (data == 'passwordError') {
                                        $('#loginStatus').html('<span style="color:red">Wrong Password</span>').fadeIn(300);
                                        $('#login_user').val('');
                                        $('#login_pass').val('');
                                        $('.btnLogin').attr("disabled", false);
                                    } else if (data == 'validUser') {
                                        $('#loginStatus').html('<span style="color:green">Account Athenticated. Please wait...</span>').fadeIn(300);
                                        $('#login_user').val('');
                                        $('#login_pass').val('');
                                        window.location.href = './';
                                    }
                                });
                            return false;
                        }
                    } else {
                        $('#regiStatus').text('Please Enter Valid User Name');
                        $('#txt_user').val('');
                        $('.btnLogin').attr("disabled", false);
                    }
                }
                return false;
            });
            //Login Script Ends


            //////MAIN ENDS
        });

    </script>

    <script src="js/mobileMenu.js"></script>

</body>

</html>
