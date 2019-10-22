<?php
    error_reporting(0);
    include_once("config/connection.php");
    //Get Value
    $keyword=myDecode($_GET['LF']);
    //Find Skill ID
    $query_skill=mysqli_query($link, "SELECT * FROM  subcategories WHERE SubCategory LIKE '%$keyword%'");
    $view_skill=mysqli_fetch_array($query_skill);
    $mySkillID=$view_skill['ID'];
    $mySubCategory=$view_skill['SubCategory'];

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
        h4 {
            font-size: 12pt !important;
        }

        .card:hover {
            cursor: pointer;
        }

    </style>
</head>

<body>

    <!--Nav Starts-->
    <?php include_once('topInner.php'); ?>
    <!--Nav Ends-->

    <section class="section" style="margin-top:15px; padding-bottom:0px">
        <div class="container">
            <h1>Search Result</h1>
            <h4>Showing results for <i><b><?=$mySubCategory?></b></i> instead of <i><b><?=ucwords($keyword)?></b></i></h4>
        </div>
    </section>

    <!--Search Result Starts-->
    <section class="section" style="margin-bottom:50px;">
        <div class="container">

            <div class="columns is-multiline">

                <?php
                $query_pro=mysqli_query($link, "SELECT * FROM  freelancer_skills WHERE SkillID='$mySkillID'");
                while($view_pro=mysqli_fetch_array($query_pro))
                {
                    $myFreelancerID=$view_pro['FreelancerID'];

                    //Fetch Profile Details
                    $query_proDetails=mysqli_query($link, "SELECT * FROM  freelancer_registration WHERE ID='$myFreelancerID' AND Status='Active'");
                    $view_proDetails=mysqli_fetch_array($query_proDetails);
                    $myFirstName=$view_proDetails['FirstName'];
                    $myLastName=$view_proDetails['LastName'];
                    $myProfilePic=$view_proDetails['ProfilePic'];
                    $myCity=$view_proDetails['City'];
                    $myDescription=urldecode($view_proDetails['Description']);
                    $myCreateDate=date("M d, Y", strtotime($view_proDetails['CreateDate']));
                    $myCreateTime=$view_proDetails['CreateTime'];

                    ?>
                <div class="column is-one-quarter-desktop is-half-tablet">

                    <div class="card" ID="<?=myEncode($myFreelancerID)?>">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                    <figure class="image is-48x48">
                                        <img class="is-rounded" src="profilePics/<?=$myProfilePic?>" style="width:48px; height:48px">
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <p class="title is-6"><?=$myFirstName?> <?=$myLastName?></p>
                                    <p class="subtitle is-7"><?=$myCity?></p>
                                </div>
                            </div>

                            <div class="content">
                                <p style="height:70px;">
                                    <?=substr($myDescription, 0, 100)?>
                                </p>
                                <small style="float:right">
                                    User Since
                                    <time datetime="2016-1-1"><?=$myCreateDate?></time>
                                </small>

                            </div>
                        </div>
                    </div>

                </div>
                <?php
                }
                ?>




            </div>


        </div>
    </section>
    <!--Search Result Ends-->

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

            $("#btnFindMobile").click(function() {
                $.post("app/findProfile",
                    $("#myFormMobile").serialize(),
                    function(data) {
                        //alert(data);
                        window.location.href = "searchList?LF=" + data;
                    });
                return false;
            });

            //Click on Thumbnail
            $('.card').click(function() {
                var myID = $(this).attr('ID');
                window.location.href = "userProfile?ID=" + myID;
            })

        });

    </script>

    <script src="js/mobileMenu.js"></script>

</body>

</html>
