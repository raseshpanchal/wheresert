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
                Copyrights Notifications
            </h2>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    Copyright © WhereSert 2019 All Rights Reserved
                    <br>
                    <br>
                    <p class="content has-text-justified">
                        <p class="title is-4">Notice of Copyright</p>
                        1. All files and information contained in this Website or Blog are copyright by WhereSert, and may not be duplicated, copied, modified or adapted, in any way without our written permission.
                        <br>
                        <br>
                        2. Our Website or Blog may contain our service marks or trademarks as well as those of our affiliates or other companies, in the form of words, graphics, and logos.
                        <br>
                        <br>
                        3. Your use of our Website, Blog or Services does not constitute any right or license for you to use our service marks or trademarks, without the prior written permission of WhereSert.
                        <br>
                        <br>
                        4. The copying, redistribution, use or publication by you of any such Content, is strictly prohibited.
                        <br>
                        <br>
                        5. Your use of our Website and Services does not grant you any ownership rights to our Content.
                    </p>
                    <br>
                    <br>

                    Copyright © WhereSert. All Rights Reserved. www.wheresert.com
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
