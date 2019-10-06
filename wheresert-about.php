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

    <!--About Wheresert Starts-->
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <div class="colums" style="margin-top:30px">
                        <div class="column is-square is-pulled-left">
                            <img src="images/wheresert-about.png" />
                        </div>
                        <div class="column">
                            <h1 class="about">
                                About WhereSert
                            </h1>
                        </div>
                        <div class="content">
                            <strong>WHERESERT GROUP</strong>
                            <p style="font-style:italic; color:#2c3637">
                                We empower people to upgrade their lives. Our services make the exchange of goods and services easy and convenient for everyone. This benefits local communities and beyond, getting one step closer.
                            </p>
                        </div>
                        <!--
                        <div class="block">
                            <h2 class="title is-size-4">Life at WhereSert &nbsp;<img src="images/arrow.png" alt=""></h2>
                            <ul class="showBox">
                                <li>Careers <span><img src="images/arrowWhite.png" style="margin-bottom:-5px" /></span></li>
                                <li style="background-color:#a6ce39">Blog <span><img src="images/arrowWhite.png" style="margin-bottom:-5px" /></span></li>
                            </ul>
                        </div>
-->
                        <div class="columns">
                            <div class="column">
                                <div class="box">
                                    <article class="media">
                                        <div class="media-content">
                                            <div class="content">
                                                <p>
                                                    <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                                                    <br>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                                                </p>
                                                <strong style="color: #fff; font-size:13pt;">Careers</strong><img src="images/arrowWhite.png" style="margin-bottom:-5px" />
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="column">
                                <div class="box" style="background-color: #a6ce39;">
                                    <article class="media">

                                        <div class="media-content">
                                            <div class="content">
                                                <p>
                                                    <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                                                    <br>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                                                </p>
                                                <strong style="color: #fff; font-size:13pt;">Blog</strong><img src="images/arrowWhite.png" style="margin-bottom:-5px" />
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column" style="margin-top: 50px;">
                    <div class="videoHolder"></div>
                    <div class="videoHolder"></div>
                    <div class="videoHolder"></div>
                </div>
            </div>
        </div>
    </section>
    <!--About Wheresert Ends-->

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
