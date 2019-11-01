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
                <div class="column">
                    <div class="columns">
                        <div class="column is-3">
                            <img src="images/wheresert-community.png" />
                        </div>
                        <div class="column" style="padding-top:28px">
                            <h1 style="line-height:28pt">
                                Welcome to the world of skilled, professionals, and handicraft users.
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
                                <span class="is-medium"><b>Please note:</b></span>
                                <br />
                                <span>
                                    By clicking Sign Up, you agree to our Terms, Data Policy and Cookie Policy. You may receive SMS notifications from us and can opt out at any time.
                                </span>
                            </p>
                        </div>
                    </div>

                </div>
                <div class="column writingPad">
                    <form name="myRegiForm" id="myRegiForm" method="POST">
                        <div class="columns" style="margin-top:70px; height: 617px;">
                            <div class="column is-3"></div>
                            <div class="column" style="text-align:center">
                                <h1 class="formSpace">Sign Up Form</h1>

                                <div class="control formSpace">
                                    <label class="radio">
                                        <input type="radio" name="userRegi" id="userRegi" value="Freelancer" checked>
                                        I CAN HELP
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="userRegi" id="userRegi" value="Recruiter">
                                        I NEED HELP
                                    </label>
                                </div>

                                <p>
                                    <input class="input customInput formSpace" name="txt_fname" id="txt_fname" type="text" placeholder="First Name *">
                                </p>

                                <p>
                                    <input class="input customInput formSpace" name="txt_lname" id="txt_lname" type="text" placeholder="Last Name *">
                                </p>

                                <p>
                                    <input class="input customInput formSpace" name="txt_contact" id="txt_contact" type="text" placeholder="Email ID OR Mobile Number *">
                                </p>

                                <p>
                                    <input class="input customInput formSpace" name="txt_pass" id="txt_pass" type="password" placeholder="Set Password *">
                                </p>

                                <div class="formSpace">
                                    <label>
                                        Birthday
                                    </label>

                                    <div class="select">
                                        <select id="myDate" name="myDate">
                                            <?php
                                            for($i = 1; $i <= 31; $i++)
                                            {
                                                echo '<option value="' .$i.'">' .$i.'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="select">
                                        <select id="myMonth" name="myMonth">
                                            <?php
                                        for($i = 1; $i <= 12; $i++)
                                        {
                                            echo '<option value="'.$i.'">' .$i.'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>

                                    <div class="select">
                                        <select id="myYear" name="myYear">
                                            <?php
                                            for($i = 1900; $i < date("Y")+1; $i++)
                                            {
                                                ?>
                                            <option value="<?=$i?>" <?php
                                                    if($i=='2003')
                                                    {
                                                        echo 'selected';
                                                    }
                                                    ?>>
                                                <?=$i?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control formSpace">
                                    <label>
                                        Gender&nbsp;&nbsp;
                                    </label>

                                    <label class="radio">
                                        <input type="radio" name="userGender" id="userGender" value="Male" checked>
                                        Male
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="userGender" id="userGender" value="Female">
                                        Female
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="userGender" id="userGender" value="Other">
                                        Other
                                    </label>
                                </div>

                                <div class="control">
                                    <button class="button is-primary is-outlined" id="btnRegi" style="width:100%">Submit</button>
                                </div>

                                <div class="columns" style="margin-top:10px;">
                                    <div class="column">
                                        <span id="alert"></span>
                                    </div>
                                </div>


                            </div>
                            <div class="column is-3"></div>
                        </div>
                    </form>


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
                <a href="#" class="button is-medium is-danger is-outlined">
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

            //Submit Expression
            $("#btnRegi").click(function() {

                $('#alert').text('');

                var userType = $("input[name='userRegi']:checked").val();
                var myGender = $("input[name='userGender']:checked").val();
                var newDate = $('#myDate option:selected').val();
                var newMonth = $('#myMonth option:selected').val();
                var newYear = $('#myYear option:selected').val();

                var fname = $('#txt_fname').val();
                var lname = $('#txt_lname').val();
                var contact = $('#txt_contact').val();
                var pass = $('#txt_pass').val();

                if (fname == '' || lname == '' || contact == '' || pass == '') {
                    $('#alert').text('All fields are mandatory');
                    return false;
                } else {
                    if (userType == 'Freelancer') {
                        $.post("app/freelancerRegiEntry?DD=" + newDate + "&MM=" + newMonth + "&YY=" + newYear,
                            $("#myRegiForm").serialize(),
                            function(data) {
                                //alert(data);

                                if (data == 'MobileRepeat') {
                                    $('#alert').text('Mobile Number is already registered!');
                                    $('#txt_contact').val('');
                                } else if (data == 'InvalidMobile') {
                                    $('#alert').text('Mobile number is not valid!');
                                } else if (data == 'EmailRepeat') {
                                    $('#alert').text('Email ID is already registered!');
                                    $('#txt_contact').val('');
                                } else if (data == 'FNameEmptyErr') {
                                    $('#alert').text('Please enter first name');
                                    $('#txt_fname').val('');
                                } else if (data == 'FNameNumberErr') {
                                    $('#alert').text('Please enter first name');
                                    $('#txt_fname').val('');
                                } else if (data == 'LNameEmptyErr') {
                                    $('#alert').text('Please enter last name');
                                    $('#txt_lname').val('');
                                } else if (data == 'LNameNumberErr') {
                                    $('#alert').text('Please enter last name');
                                    $('#txt_lname').val('');
                                } else if (data == '1') {
                                    $('#alert').text('Form Submitted Successfully!');
                                    $('#txt_fname').val('');
                                    $('#txt_lname').val('');
                                    $('#txt_contact').val('');
                                    $('#txt_pass').val('');
                                    window.location.href = 'freelancer-registration-process';
                                } else if (data == '0') {
                                    $('#alert').text('Please check connection!');
                                }
                                return false;
                                //window.location.href = "searchList?LF=" + data;
                            });
                        return false;
                    } else if (userType == 'Recruiter') {
                        $.post("app/recruiterRegiEntry?DD=" + newDate + "&MM=" + newMonth + "&YY=" + newYear,
                            $("#myRegiForm").serialize(),
                            function(data) {

                                if (data == 'MobileRepeat') {
                                    $('#alert').text('Mobile Number is already registered!');
                                    $('#txt_contact').val('');
                                } else if (data == 'EmailRepeat') {
                                    $('#alert').text('Email ID is already registered!');
                                    $('#txt_contact').val('');
                                } else if (data == 'FNameEmptyErr') {
                                    $('#alert').text('Please enter first name');
                                    $('#txt_fname').val('');
                                } else if (data == 'FNameNumberErr') {
                                    $('#alert').text('Please enter first name');
                                    $('#txt_fname').val('');
                                } else if (data == 'LNameEmptyErr') {
                                    $('#alert').text('Please enter last name');
                                    $('#txt_lname').val('');
                                } else if (data == 'LNameNumberErr') {
                                    $('#alert').text('Please enter last name');
                                    $('#txt_lname').val('');
                                } else if (data == '1') {
                                    $('#alert').text('Form Submitted Successfully!');
                                    $('#txt_fname').val('');
                                    $('#txt_lname').val('');
                                    $('#txt_contact').val('');
                                    $('#txt_pass').val('');
                                } else if (data == '0') {
                                    $('#alert').text('Please check connection!');
                                }

                                return false;
                                //window.location.href = "searchList?LF=" + data;
                            });
                        return false;
                    }
                }


                //Regi Function Ends
            });

            //MAIN ENDS
        });

    </script>

    <script src="js/mobileMenu.js"></script>

</body>

</html>
