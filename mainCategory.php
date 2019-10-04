<?php
    error_reporting(0);
    include_once("config/connection.php");

    $newMainCatID=myDecode($_GET['ID']);
    $query_mainCat=mysqli_query($link, "SELECT * FROM main_categories WHERE ID='$newMainCatID'");
    $view_mainCat=mysqli_fetch_array($query_mainCat);
    $newMainCategory=$view_mainCat['MainCat'];
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

    <!--Breadcrums Starts-->
    <section class="section" style="margin-top:20px; padding-bottom:20px;">
        <div class="container">

            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li><a href="#">Main Categories</a></li>
                    <li class="is-active"><a href="#" aria-current="page">Professionals</a></li>
                </ul>
            </nav>

        </div>
    </section>
    <!--Breadcrums Ends-->

    <!--Content Area Starts-->
    <section class="section" style="padding-top:20px; margin-bottom:50px;">
        <div class="container">
            <div class="columns">
                <?php
                $myCount=1;
                $query_cat = mysqli_query($link, "SELECT * FROM categories WHERE Publish='Yes' AND MainCatID='$newMainCatID' ORDER BY Category ASC");
                while($view_cat=mysqli_fetch_array($query_cat))
                {
                    $newCatID=$view_cat['ID'];
                    $newCategory=$view_cat['Category'];
                    $newIcons=$view_cat['Icons'];
                    ?>

                <div class="column is-3" mainID="<?=myEncode($newMainCatID)?>" catID="<?=myEncode($newCatID)?>">
                    <div class="card">
                        <div class="card-content">
                            <div class="media-content">
                                <div class="columns">
                                    <div class="column is-pulled-left is-4" style="padding:0px; text-align:center; padding-top:10px;">
                                        <img src="icons/<?=$newIcons?>" class="catIcon" style="width:60%; margin-bottom:10px" />
                                    </div>
                                    <div class="column">
                                        <span class="title is-6"><?=$newCategory?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if($myCount==4)
                {
                    $myCount=1;
                    echo '</div>';
                    echo '<div class="columns">';
                }
                else
                {
                    $myCount++;
                }
            }
            ?>

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
