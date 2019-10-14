<?php
    //error_reporting(0);
    include_once("config/connection.php");
    include_once("userInfo.php");
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
    <div style="margin-top:55px"></div>
    <section class="hero is-dark">
        <div class="hero-body">
            <div class="container" style="text-align:center;">
                <h1 class="loveTitle" style="color:#FFF !important;">
                    Dear <?=$userFirstName?> please complete your profile!
                </h1>
            </div>
        </div>
    </section>

    <div class="pageCount profilePageSeries is-hidden-mobile"></div>
    <div class="pageCount profilePageSeriesMobile is-hidden-desktop"></div>

    <section class="hero is-light">
        <div class="hero-body">
            <div class="container profilePages" style="text-align:center;">



            </div>
        </div>
    </section>
    <!--Main Content Area Ends-->


    <!--Explore Professionals Start-->
    <?php //include_once('exploreProfessionals.php'); ?>
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

            <?php
            if($userStatus=='Wizard')
            {
                echo "$('.pageCount').text('1');";
                echo "$('.profilePages').load('profilePage01');";
            } else if($userStatus=='Wizard04')
            {
                echo "$('.pageCount').text('4');";
                echo "$('.profilePages').load('profilePage04');";
            } else if($userStatus=='Wizard05')
            {
                echo "$('.pageCount').text('5');";
                echo "$('.profilePages').load('profilePage05');";
            } else if($userStatus=='Wizard06')
            {
                echo "$('.pageCount').text('6');";
                echo "$('.profilePages').load('profilePage06');";
            } else if($userStatus=='Active')
            {
                echo "window.location.href='myAccount';";
            }
            ?>




        });

    </script>

    <script src="js/mobileMenu.js"></script>

</body>

</html>
