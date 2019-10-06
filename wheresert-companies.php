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
                WhereSert Companies
            </h2>
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
