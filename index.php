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
    <?php include_once('top.php'); ?>
    <!--Nav Ends-->


    <section class="section">
        <div class="container">
            <div class="columns is-tablet">
                <div class="column is-one-third-tablet">
                    <h1 class="subtitle">
                        Welcome to the world of skilled, professionals, and handicraft users.
                    </h1>

                    <form name="myForm" id="myForm" method="POST">
                        <div class="field has-addons">
                            <div class="control">
                                <input type="text" class="input myInput" name="txt_search" id="txt_search" placeholder="I am looking for...">
                            </div>
                            <div class="control">
                                <button class="button myButton" id="btnFind">Find Now</button>
                                <!--
                                <a class="button myButton" id="btnFind">
                                    Find Now
                                </a>
                                -->
                            </div>
                        </div>
                    </form>

                    <div class="is-hidden-desktop">
                        <img src="images/wheresert-search.png" />
                    </div>

                    <div>
                        <h2 class="subtitle">
                            Popular Searches
                        </h2>

                        <div class="tags">
                            <span class="tag is-success" find="<?=myEncode('Driver')?>">Driver</span>
                            <span class="tag is-success" find="<?=myEncode('Doctor')?>">Doctor</span>
                            <span class="tag is-success" find="<?=myEncode('Car Washer')?>">Car Washer</span>
                            <span class="tag is-success" find="<?=myEncode('Painter')?>">Painter</span>
                            <span class="tag is-success" find="<?=myEncode('Plumber')?>">Plumber</span>
                            <span class="tag is-success" find="<?=myEncode('Cook')?>">Cook</span>
                            <span class="tag is-success" find="<?=myEncode('Laundry Services at Home')?>">Laundry Services at Home</span>
                            <span class="tag is-success" find="<?=myEncode('House Keeping Services')?>">House Keeping Services</span>
                            <span class="tag is-success" find="<?=myEncode('Carpenter')?>">Carpenter</span>
                            <span class="tag is-success" find="<?=myEncode('Baby Sitter')?>">Baby Sitter</span>
                            <span class="tag is-success" find="<?=myEncode('Part-time Maid')?>">Part-time Maid</span>
                        </div>

                    </div>

                    <div class="colums" style="margin-top:30px">
                        <div class="column is-square is-pulled-left">
                            <img src="images/wheresert-community.png" />
                        </div>
                        <div class="column">
                            <h2 class="subtitle">
                                Join Comminuty
                            </h2>
                            <a href="wheresert-sign-up" class="button is-primary is-outlined">
                                Join Now
                            </a>
                        </div>
                    </div>

                </div>
                <div class="column is-square is-pulled-right is-hidden-mobile">
                    <img src="images/wheresert-search.png" />
                </div>
            </div>
        </div>
    </section>

    <!--Explore Professionals Start-->
    <?php include_once('exploreProfessionals.php'); ?>
    <!--Explore Professionals End-->

    <!--Visibile Only Desktop-->
    <section class="section is-hidden-mobile" style="margin-bottom:50px;">
        <div class="container">
            <div class="columns">
                <div class="column is-5">
                    <!--Left Columns Starts-->
                    <div class="columns">
                        <div class="column is-6">
                            <h2 class="halfTitle">
                                If you are <b>thinking</b> why do you want <b>WHERE</b><span>SERT</span>
                            </h2>
                            <a href="#" class="button is-danger is-outlined">
                                Know More
                            </a>
                        </div>

                        <div class="column is-6">
                            <img src="images/manHead.png" />
                        </div>
                    </div>
                    <!--Left Columns Ends-->
                </div>
                <div class="column">
                    &nbsp;
                </div>
                <div class="column is-5">
                    <!--Right Columns Starts-->
                    <div class="columns">
                        <div class="column is-6" style="text-align:right">
                            <h2 class="halfTitle">
                                Get connected and find people you know
                            </h2>
                            <a href="wheresert-sign-up" class="button is-danger is-outlined">
                                Know More
                            </a>
                        </div>

                        <div class="column is-6">
                            <img src="images/wheresert-people.png" />
                        </div>
                    </div>
                    <!--Right Columns Ends-->
                </div>
            </div>
        </div>
    </section>
    <!--Visibile Only Desktop-->

    <!--Visibile Only Mobile-->
    <section class="section is-hidden-desktop">
        <div class="container">
            <div class="columns is-mobile">
                <div class="column is-7 is-pulled-left">
                    <h2 class="halfTitle">
                        If you are <b>thinking</b> why do you want <b>WHERE</b><span>SERT</span>
                    </h2>
                </div>
                <div class="column is-5 is-pulled-right">
                    <img src="images/manHead.png" />
                </div>
            </div>
            <div class="columns is-mobile">
                <div class="column is-12" style="text-align:center">
                    <a href="#" class="button is-medium is-danger is-outlined">
                        Know More
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--Visibile Only Mobile-->

    <!--Visibile Only Mobile-->
    <section class="section is-hidden-desktop" style="margin-bottom:50px;">
        <div class="container">
            <div class="columns is-mobile">
                <div class="column is-6 is-pulled-left">
                    <img src="images/wheresert-people.png" />
                </div>
                <div class="column is-6 is-pulled-right">
                    <h2 class="halfTitle">
                        Get connected and find people you know
                    </h2>
                </div>
            </div>
            <div class="columns is-mobile">
                <div class="column is-12" style="text-align:center">
                    <a href="wheresert-sign-up" class="button is-medium is-danger is-outlined">
                        Know More
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--Visibile Only Mobile-->

    <!--Express Love Starts-->
    <img src="images/expressLove.png" class="expressLove is-hidden-mobile" />
    <img src="images/expressLove.png" class="expressLoveMobile is-hidden-desktop" />
    <section class="hero is-light">
        <div class="hero-body">
            <div class="container" style="text-align:center">
                <h1 class="loveTitle">
                    If you <span>love</span> us then don’t forget to <span>express</span> it!
                </h1>
                <a href="whereser-motivate-us" class="button is-medium is-danger is-outlined">
                    Motivate Us
                </a>
            </div>
        </div>
    </section>
    <!--Express Love Ends-->

    <!--Testimonial Starts-->
    <?php include_once('testimonials.php'); ?>
    <!--Testimonial Ends-->

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


            $('.tag').click(function() {
                var lookingFor = $(this).attr('find');
                //alert(lookingFor);
                window.location.href = "searchList?LF=" + lookingFor;
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

    <script>
        (function() {
            var burger = document.querySelector('.burger');
            var nav = document.querySelector('#' + burger.dataset.target);

            burger.addEventListener('click', function() {
                burger.classList.toggle('is-active');
                nav.classList.toggle('is-active');
            });
        })();

    </script>

</body>

</html>
