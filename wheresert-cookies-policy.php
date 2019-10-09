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

    <section class="section greenSection" style="margin-top:50px">
        <div class="container">
            <h2 class="subtitle">
                Cookies Policy
            </h2>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">

                    <p><b>WhereSert</b> ("us", "we", or "our") uses cookies on the https://wheresert.com/
                        website and the wheresert mobile application (the "Service"). By using the
                        Service, you consent to the use of cookies.</p>
                    <br>

                    <p>Our Cookies Policy explains what cookies are, how we use cookies, how third-
                        parties we may partner with may use cookies on the Service, your choices
                        regarding cookies and further information about cookies.</p>
                    <br>

                    <p><b>What are cookies</b><br> Cookies are small pieces of text sent by your web browser by a website you
                        visit. A cookie file is stored in your web browser and allows the Service or a
                        third-party to recognize you and make your next visit easier and the Service
                        more useful to you.</p>
                    <br>
                    <p>Cookies can be "persistent" or "session" cookies. Persistent cookies remain on
                        your personal computer or mobile device when you go offline, while session
                        cookies are deleted as soon as you close your web browser.</p>

                    <br>



                    <p><b>How wheresert uses cookies</b></p>
                    <p>When you use and access the Service, we may place a number of cookies files in
                        your web browser.</p>
                    <br>

                    We use cookies for the following purposes:
                    <br>

                    * To enable certain functions of the Service
                    <br>

                    <b>1.</b>We use both session and persistent cookies on the Service and we use
                    different types of cookies to run the Service:
                    <br>

                    <b>2.</b>Essential cookies. We may use essential cookies to authenticate users and
                    prevent fraudulent use of user accounts.
                    <br>
                    <br>

                    <b>What are your choices regarding cookies</b>
                    <br>

                    If you'd like to delete cookies or instruct your web browser to delete or
                    refuse cookies, please visit the help pages of your web browser. As an
                    European citizen, under GDPR, you have certain individual rights. You can
                    learn more about these rights in the [GDPR
                    Guide]
                    <br>
                    Please note, however, that if you delete cookies or refuse to accept them, you
                    might not be able to use all of the features we offer, you may not be able to
                    store your preferences, and some of our pages might not display properly.
                    <br>
                </div>
            </div>

        </div>

    </section>
    <!--Footer Starts-->
    <?php include_once('footer.php'); ?>
    <!--Footer Ends-->

    <!--Copyrights Start-->
    <?php include_once('copyrights.php'); ?>
    <!--Copyrights End-->

    <?php include_once('scripts/bottomScripts.php') ?>


    <script>
        $(document).ready(function() {

            $('#btnFind').click(function() {
                //var cityName = $("#select_search option:selected").text();
                var lookingFor = $('#txt_search').val();
                alert(lookingFor);
                return false;
                //window.location.href="searchList?LF="+lookingFor;
            });

            /*

            //Category Function
            $('.mainCategory').click(function(){
                var mainCatName=$(this).attr('mainCatID');
                window.location.href="maincategory?ID="+mainCatName;
            });

            */

        });

    </script>

    <script src="js/mobileMenu.js"></script>

</body>

</html>
