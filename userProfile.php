<?php
    error_reporting(0);
    include_once("config/connection.php");
   //Fetch Profile Info
    $newID=myDecode($_GET['ID']);
    $query_user=mysqli_query($link, "SELECT * FROM freelancer_registration WHERE ID='$newID'");
    $view_user=mysqli_fetch_array($query_user);
    $userID=$view_user['ID'];
    $userFirstName=$view_user['FirstName'];
    $userLastName=$view_user['LastName'];
    $userFullName=$userFirstName.' '.$userLastName;
    $userProfilePic=$view_user['ProfilePic'];
    $userDOB=$view_user['DOB'];
    $userMobile=$view_user['Mobile'];
    $userEmailID=$view_user['EmailID'];
    $userGender=$view_user['Gender'];
    $userDescription=urldecode($view_user['Description']);
    $userBusinessTitle=$view_user['BusinessTitle'];
    $userDesignation=$view_user['Designation'];
    $userAddress=$view_user['Address'];
    $userCity=$view_user['City'];
    $userState=$view_user['State'];
    $userCountry=$view_user['Country'];
    $userZipCode=$view_user['ZipCode'];
    $userStatus=$view_user['Status'];

    $mySpeech='Hello! My name is '.$userFirstName.'. And I am from '.$userCity.'. Thanks for visiting my profile. '.$userDescription.' Hope my profile suits your requirements. Looking forward to hear you soon! Thank you and have a wonderful time.';
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
            height: 35px;
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
            padding: 3px;
            border-radius: 3px;
            background-color: #F5F0EF;
        }

        .settingIcon:hover {
            cursor: pointer;
        }

        .listTick {
            background-image: url(images/tickMark.png);
            background-repeat: no-repeat;
            background-position: center left;
            padding-left: 25px !important;
        }

        #speak:hover {
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

                    <!--Self Speak Starts-->
                    <div class="box" style="text-align:center">

                        <h3 style="text-align:left; font-size:13pt !important">
                            Listen My Profile
                        </h3>
                        <img src="icons/speak.svg" id="speak" style="margin-top:5px; width:75px;" />

                    </div>
                    <!--Self Speak Ends-->

                    <!--User Rating Starts-->
                    <div class="box">

                        <h3 style="text-align:left; font-size:13pt !important">
                            User Rating
                        </h3>
                        <img src="images/stars_0.png" style="margin-top:5px;" />
                    </div>
                    <!--User Rating Ends-->

                    <!--Skills Start-->
                    <div class="box">

                        <h3 style="text-align:left; font-size:13pt !important">
                            My Skills
                        </h3>
                        <ul class="myList">
                            <?php
                                //Fetch User's Skills
                                $query_userSkill=mysqli_query($link, "SELECT * FROM freelancer_skills WHERE FreelancerID='$userID'");
                                while($view_userSkill=mysqli_fetch_array($query_userSkill))
                                {
                                    $mySkillID=$view_userSkill['SkillID'];
                                    //Fetch Skills Name
                                    $query_skillsName=mysqli_query($link, "SELECT * FROM subcategories WHERE ID='$mySkillID'");
                                    $view_skillsName=mysqli_fetch_array($query_skillsName);
                                    $newSubCategory=$view_skillsName['SubCategory'];
                                    ?>
                            <li class="listTick">
                                <?=$newSubCategory?></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                    <!--Skills End-->

                    <!--Languages Start-->
                    <div class="box">
                        <h3 style="text-align:left; font-size:13pt !important">
                            I Can Speak
                        </h3>
                        <ul class="myList">
                            <?php
                                //Fetch User's Languages
                                $query_languages=mysqli_query($link, "SELECT * FROM freelancer_languages WHERE FreelancerID='$userID'");
                                while($view_languages=mysqli_fetch_array($query_languages))
                                {
                                    $myLanguageID=$view_languages['LanguageID'];
                                    //Fetch Language Name
                                    $query_langName=mysqli_query($link, "SELECT * FROM language_master WHERE ID='$myLanguageID'");
                                    $view_langName=mysqli_fetch_array($query_langName);
                                    $newLanguage=$view_langName['Language'];
                                    ?>
                            <li class="listTick">
                                <?=$newLanguage?>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                    <!--Languages End-->

                    <!--Social Media Links Start-->
                    <div class="box">
                        <h3 style="text-align:left; font-size:13pt !important">
                            Follow Me
                        </h3>
                        <ul class="myList">
                            <?php
                                //Fetch User's Social Media
                                $query_social=mysqli_query($link, "SELECT * FROM freelancer_social_media WHERE FreelancerID='$userID'");
                                while($view_social=mysqli_fetch_array($query_social))
                                {
                                    $mySocialMediaID=$view_social['SocialMediaID'];
                                    $mySocialMediaURL=$view_social['URL'];
                                    //Fetch Media Details
                                    $query_mediaName=mysqli_query($link, "SELECT * FROM socialmedia_master WHERE ID='$mySocialMediaID'");
                                    $view_mediaName=mysqli_fetch_array($query_mediaName);
                                    $newMediaName=$view_mediaName['MediaName'];
                                    $newMediaLogo=$view_mediaName['Logo'];
                                    ?>
                            <li>
                                <img src="images/<?=$newMediaLogo?>" align="middle" style="margin-top:-10px" /> &nbsp;
                                <a href="<?=$mySocialMediaURL?>" target="_blank" style="color:#000">
                                    <?=$newMediaName?>
                                </a>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                    <!--Social Media Links End-->

                </div>
                <div class="column">
                    <div class="box">
                        <h3 style="text-align:left; font-size:13pt !important;">
                            <strong>PROFILE</strong>
                        </h3>

                        <span style="float:right; font-size:10pt; color:#000;">
                            City : <?=$userCity?>
                        </span>
                        <br /><br />
                        <?=$userDescription?>
                    </div>

                    <!--Services List Starts-->
                    <div class="box">

                        <h3 style="text-align:left; font-size:13pt !important; border-bottom:0 !important">
                            <strong>LIST OF SERVICES</strong>
                        </h3>

                        <?php
                        //Fetch User's Services
                        $query_service=mysqli_query($link, "SELECT * FROM  freelancer_services WHERE FreelancerID='$userID'");
                        while($view_service=mysqli_fetch_array($query_service))
                        {
                            $myServiceID=$view_service['ID'];
                            $myServiceTitle=$view_service['Title'];
                            $myServiceCurrency=$view_service['Currency'];
                            $myServicePrice=$view_service['Price'];
                            $myServiceDesc=urldecode($view_service['Description']);
                            ?>
                        <h3 style="text-align:left; font-size:13pt !important">
                            <?=$myServiceTitle?>
                        </h3>
                        <span style="float:right; font-size:11pt; color:#C00">
                            Charges : <?=$myServiceCurrency?> <?=$myServicePrice?>
                        </span>
                        <br /><br />
                        <?=$myServiceDesc?>
                        <hr />
                        <?php
                        }
                        ?>

                    </div>
                    <!--Services List Ends-->

                    <!--Photo Gallery Starts-->
                    <div class="box">

                        <h3 style="text-align:left; font-size:13pt !important; border-bottom:0 !important">
                            <strong>PHOTO GALLERY</strong>
                        </h3>

                        <!--Images Start-->
                        <div class="columns is-multiline">

                            <?php
                            //Fetch User's Photo
                            $query_photo=mysqli_query($link, "SELECT * FROM  freelancer_upload_images WHERE FreelancerID='$userID'");
                            while($view_photo=mysqli_fetch_array($query_photo))
                            {
                                $myPhotoID=$view_photo['ID'];
                                $myPhotoTitle=$view_photo['Title'];
                                $myPhotoFileName=$view_photo['FileName'];
                                $myPhotoPublish=$view_photo['Publish'];
                            ?>

                            <div class="column is-one-quarter-desktop is-half-tablet">
                                <div class="card">
                                    <div class="card-image">
                                        <figure class="image is-3by2">
                                            <img src="userPhotos/<?=$myPhotoFileName?>" alt="<?=$myPhotoTitle?>">
                                        </figure>
                                    </div>
                                    <footer class="card-footer" style="padding:5px; font-size:9pt">
                                        <?=$myPhotoTitle?>
                                    </footer>
                                </div>
                            </div>
                            <?php
                            }
                            ?>

                        </div>
                        <!--Images End-->

                    </div>
                    <!--Photo Gallery Ends-->

                    <!--Video Gallery Starts-->
                    <!--
                    <div class="box">
                        <img src="images/add-green.png" class="settingIcon" id="myVideos" />

                        <h3 style="text-align:left; font-size:13pt !important; border-bottom:0 !important">
                            <strong>VIDEOS</strong>
                        </h3>
                    </div>
                    -->
                    <!--Video Gallery Ends-->

                    <!--Audio Starts-->
                    <div class="box">

                        <h3 style="text-align:left; font-size:13pt !important; border-bottom:0 !important">
                            <strong>AUDIO FILES</strong>
                        </h3>

                        <div class="columns is-multiline">

                            <?php
                            //Fetch User's Audio
                            $query_audio=mysqli_query($link, "SELECT * FROM  freelancer_upload_audio WHERE FreelancerID='$userID'");
                            while($view_audio=mysqli_fetch_array($query_audio))
                            {
                                $myAudioID=$view_audio['ID'];
                                $myAudioTitle=$view_audio['Title'];
                                $myAudioFileName=$view_audio['FileName'];
                                $myAudioPublish=$view_audio['Publish'];
                            ?>

                            <div class="column is-one-quarter-desktop is-half-tablet">
                                <div class="card">
                                    <header class="card-header" style="padding:5px; font-size:9pt">
                                        <?=$myAudioTitle?>
                                    </header>
                                    <div class="card-image">
                                        <audio controls controlsList="nodownload" controls="none" style="width:100%">
                                            <source src="userAudio/<?=$myAudioFileName?>" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>


                    </div>
                    <!--Audio Ends-->

                    <!--Pdf Starts-->

                    <div class="box">

                        <h3 style="text-align:left; font-size:13pt !important; border-bottom:0 !important">
                            <strong>PDF DOCUMENTS</strong>
                        </h3>

                        <!--PDF Start-->
                        <div class="columns is-multiline">

                            <?php
                            //Fetch User's PDF
                            $query_pdf=mysqli_query($link, "SELECT * FROM  freelancer_upload_pdf WHERE FreelancerID='$userID'");
                            while($view_pdf=mysqli_fetch_array($query_pdf))
                            {
                                $myPdfID=$view_pdf['ID'];
                                $myPdfTitle=$view_pdf['Title'];
                                $myPdfFileName=$view_pdf['FileName'];
                                $myPdfPublish=$view_pdf['Publish'];
                            ?>

                            <div class="column is-one-quarter-desktop is-half-tablet">
                                <div class="card">
                                    <header class="card-header" style="padding:5px; font-size:9pt">
                                        <?=$myPdfTitle?>
                                    </header>
                                    <a href="userPDFs/<?=$myPdfFileName?>" target="_blank">
                                        <div class="card-image">
                                            <figure class="image is-64x64" style="margin:auto">
                                                <img src="images/pdf.png" />
                                            </figure>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>

                    </div>

                    <!--Pdf Ends-->

                    <!--WebLink Starts-->
                    <div class="box">

                        <h3 style="text-align:left; font-size:13pt !important; border-bottom:0 !important">
                            <strong>EXTERNAL WEB LINKS</strong>
                        </h3>

                        <ul class="myList">
                            <?php
                                //Fetch User's WebLink
                                $query_weblink=mysqli_query($link, "SELECT * FROM freelancer_upload_weblink WHERE FreelancerID='$userID'");
                                while($view_weblink=mysqli_fetch_array($query_weblink))
                                {
                                    $myWebLinkID=$view_weblink['ID'];
                                    $myWebLinkTitle=$view_weblink['Title'];
                                    $myWebLinkURL=$view_weblink['URL'];
                                    ?>
                            <li class="listTick">
                                <a href="<?=$myWebLinkURL?>" target="_blank" style="color:#000">
                                    <?=$myWebLinkTitle?>
                                </a>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>

                    </div>
                    <!--WebLink Ends-->

                    <!--Contact Starts-->
                    <div class="box">

                        <h3 style="text-align:left; font-size:13pt !important; border-bottom:0 !important">
                            <strong>Contact <?=$userFullName?></strong>
                        </h3>

                        <!--PDF Start-->
                        <form name="myContactForm" id="myContactForm" method="POST">
                            <input type="hidden" class="input customInput" id="txt_user" name="txt_user" value="<?=$newID?>">

                            <div class="columns">
                                <div class="column">
                                    <input type="text" class="input customInput" name="txt_fname" id="txt_fname" placeholder="Your First Name*">
                                </div>
                                <div class="column">
                                    <input type="text" class="input customInput" name="txt_lname" id="txt_lname" placeholder="Your Last Name*">
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <label class="form-check-label">
                                        Gender
                                    </label>
                                    <label class="form-check-label">
                                        <input type="radio" class="is-checkradio" id="txt_gender" name="txt_gender" value="Male" checked="checked"> Male
                                    </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <label class="form-check-label">
                                        <input type="radio" class="is-checkradio" id="txt_gender" name="txt_gender" value="Female"> Female
                                    </label>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <input type="text" class="input customInput" name="txt_location" id="txt_location" placeholder="Enter City Name*" list="cityList">
                                    <datalist id="cityList">
                                        <?php
                                    //Fetch City List
                                    $query_city=mysqli_query($link, "SELECT * FROM cities ORDER BY CityName ASC");
                                    while($view_city=mysqli_fetch_array($query_city))
                                    {
                                        $newCityName=$view_city['CityName'];
                                        ?>
                                        <option value="<?=$newCityName?>">
                                            <?php
                                    }
                                    ?>
                                    </datalist>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <input type="text" class="input customInput" name="txt_number" id="txt_number" placeholder="Contact Number*">
                                </div>
                                <div class="column">
                                    <input type="text" class="input customInput" name="txt_email" id="txt_email" placeholder="Email ID (Optional)">
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <textarea class="textarea customInput has-fixed-size" name="txt_comment" id="txt_comment" rows="6" cols="50" placeholder="Short note..."></textarea>
                                </div>
                            </div>


                            <div class="row" style="padding:5px;">
                                <div class="col-lg-12">
                                    Do you want <?=$userFullName?> to&nbsp;&nbsp;&nbsp;
                                    <label>
                                        <input type="checkbox" id="check_userpre" name="check_userpre[]" value="PhoneCall" checked="checked"> Call on your Mobile&nbsp;&nbsp;&nbsp;
                                    </label>
                                    <label>
                                        <input type="checkbox" id="check_userpre" name="check_userpre[]" value="SMS/Whatsapp"> SMS/Whatsapp&nbsp;&nbsp;&nbsp;
                                    </label>
                                    <label>
                                        <input type="checkbox" id="check_userpre" name="check_userpre[]" check="check_userpre" value="Email"> Send an Email
                                    </label>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column">
                                    <button class="button is-danger is-pulled-right" name="btnSend" id="btnSend">Send Inquiry &amp; Create My Account</button>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-12" style="font-size:9pt; text-align:right; padding-top:10px">
                                    By creating an account you will be able to write reviews, share your experiences, and manage freelancers track.
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column" style="text-align:left; color:red;">
                                    <span id="contStatus"></span>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!--Contact Ends-->


                    <!--User Reviews Start-->

                    <div class="box">
                        <div class="columns">
                            <div class="column">
                                REVIEWS
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column showReviews">
                                Reviews Display Here!
                            </div>
                        </div>



                        <div class="columns">
                            <div class="column">
                                <?php
                                if(!$myEmail){
                                    ?>
                                <button class="button is-primary" id="btnLogin" style="float:right">Login to write review</button>
                                <?php
                                } else {
                                    ?>
                                <div class="box">
                                    <form name="myReviewForm" id="myReviewForm" method="POST">
                                        <input type="hidden" class="input customInput" id="txt_revUser" name="txt_revUser" value="<?=$newID?>">
                                        <input type="hidden" class="input customInput" id="txt_revName" name="txt_revName" value="<?=$userFullName?>">
                                        <input type="hidden" class="input customInput" id="txt_revEmail" name="txt_revEmail" value="<?=$userEmailID?>">
                                        <input type="hidden" class="input customInput" id="txt_revMobile" name="txt_revMobile" value="<?=$userMobile?>">

                                        <div class="columns">
                                            <div class="column">
                                                <div class="field">
                                                    <div class="control">
                                                        <textarea class="textarea customInput has-fixed-size" name="txt_review" id="txt_review" rows="5" cols="50" placeholder="Write review...."></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="columns">
                                            <div class="column">
                                                <div class="field">
                                                    <div class="control has-icons-left">
                                                        <div class="select">
                                                            <select id="starRating">
                                                                <option value="1">Rating &#128954;</option>
                                                                <option value="2">Rating &#128954;&#128954;</option>
                                                                <option value="3" selected>Rating &#128954;&#128954;&#128954;</option>
                                                                <option value="4">Rating &#128954;&#128954;&#128954;&#128954;</option>
                                                                <option value="5">Rating &#128954;&#128954;&#128954;&#128954;&#128954;</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column" style="text-align:right">
                                                <div class="buttons">
                                                    <button class="button is-primary" id="btnCancelReview" name="btnCancelReview">Cancel</button>
                                                    <button class="button is-link" id="btnSendReview" name="btnSendReview">Submit Review</button>
                                                </div>
                                            </div>
                                        </div>




                                    </form>
                                </div>
                                <?php
                                }
                                ?>
                            </div>

                        </div>
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
    <script src="js/responsivevoice.js?key=UqfHBIRn"></script>

    <script>
        $(document).ready(function() {

            $(" #btnFind").click(function() {
                $.post("app/findProfile", $("#myForm").serialize(), function(data) {
                    window.location.href = "searchList?LF=" + data;
                });
                return false;
            });

            $('#speak').click(function() {

                function voiceStartCallback() {
                    console.log("Voice started");
                }

                function voiceEndCallback() {
                    console.log("Voice ended");
                }

                var parameters = {
                    onstart: voiceStartCallback,
                    onend: voiceEndCallback
                }

                <?php
                if($userGender=='Male')
                {
                    ?>
                responsiveVoice.speak("<?=$mySpeech?>", "UK English Male", parameters);
                <?php
                }
                else if($userGender=='Female')
                {
                    ?>
                responsiveVoice.speak("<?=$mySpeech?>", "UK English Female", parameters);
                <?php
                }
                ?>



            })

            //Save Info
            $('#btnSend').click(function() {
                var myFirstName = $('#txt_fname').val();
                var myLastName = $('#txt_lname').val();
                var myContactEmail = $('#txt_email').val();
                var myContactLoc = $('#txt_location').val();
                var myContactNumber = $('#txt_number').val();
                $('#btnSend').attr("disabled", true);
                var myUserPrefrence = $("input[name='check_userpre']:checked").val();

                if (myContactNumber.length < 10) {
                    $('#contStatus').text('Incorrect Mobile Number');
                    $('#txt_number').val('');
                    $('#btnSend').attr("disabled", false);
                } else {
                    $.post("app/contactDetailEntry",
                        $("#myContactForm").serialize(),
                        function(data) {
                            if (data == 'regiSuccess') {
                                $('#txt_fname').val('');
                                $('#txt_lname').val('');
                                $('#txt_location').val('');
                                $('#txt_email').val('');
                                $('#txt_number').val('');
                                $('#contStatus').html('<br/>Inquiry has been submitted successfully!<br/>User will contact you at the earliest.');
                            } else if (data == '0') {
                                $('#contStatus').html('<span style="color:red">Please check internet connection</span>');
                            }
                        });
                    return false;
                }
            });


            //Load Reviews
            $('.showReviews').load('reviewShow?ID=<?=$profileID?>');

            //Take User to Login
            $('#btnLogin').click(function() {
                window.location.href = "wheresert-sign-in";
            });

            //Write Review
            //Save Info
            $('#btnSendReview').click(function() {
                var myRevName = $('#txt_revUser').val();
                var myRevEmail = $('#txt_revEmail').val();
                var myRevReview = $('#txt_review').val();
                var myRevRating = $('#starRating').find(":selected").val();

                if (myRevReview != '' || myRevRating != '') {
                    $.post("app/reviewWriteFormEntry?RT=" + myRevRating,
                        $("#myReviewForm").serialize(),
                        function(data) {
                            if (data == '1') {
                                $('.btnReview').attr("disabled", false);
                            }
                            if (data == '0') {
                                alert('Error occured!');
                                $('.btnReview').attr("disabled", false);
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
