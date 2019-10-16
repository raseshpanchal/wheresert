<?php
    error_reporting(0);
    include_once("config/connection.php");
    include_once("userInfo.php");

    if(!$myEmail)
    {
        header("Location: ./");
    }

    //Fetch Main Category
    $cat_user=mysqli_query($link, "SELECT * FROM freelancer_categories WHERE UserID='$userID'");
    $view_cat=mysqli_fetch_array($cat_user);
    $newMainCatID=$view_cat['MainCatID'];
    $newSubCatID=$view_cat['SubCatID'];

    //Main Category Name
    $maincat_user=mysqli_query($link, "SELECT * FROM main_categories WHERE ID='$newMainCatID'");
    $view_maincat=mysqli_fetch_array($maincat_user);
    $newMainCatName=strtoupper($view_maincat['MainCat']);

    //Sub Category Name
    $subcat_user=mysqli_query($link, "SELECT * FROM categories WHERE ID='$newSubCatID'");
    $view_subcat=mysqli_fetch_array($subcat_user);
    $newSubCatName=strtoupper($view_subcat['Category']);
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

        .boxTitle {
            margin-bottom: 15px;
            background-color: #636363;
            border-radius: 5px;
            padding: 15px;
        }

        .pageTitle {
            text-align: left;
            font-size: 11pt !important;
            color: #FFF !important;
            font-weight: 400;
        }

        h2 {
            color: #000 !important;
            font-weight: 600;
            padding-top: 10px;
        }

        .settingIcon {
            float: right;
            border: solid 1px #C6C2C1;
            padding: 5px;
            border-radius: 3px;
            background-color: #F5F0EF;
            margin-top: -5px;
        }

        .settingIcon:hover {
            cursor: pointer;
        }

        .myList li {
            border-bottom: dotted 1px #333;
            padding: 5px;
            font-size: 11pt !important;
        }

        /*
        .myList li span {
            float: right;
            font-size: 10pt !important;
        }
        */

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

                </div>
                <div class="column">

                    <!--Page Title Starts-->
                    <div class="boxTitle">
                        <h3 class="pageTitle"><?=$newMainCatName?>&nbsp;&nbsp;>&nbsp;&nbsp;<?=$newSubCatName?>
                            <img src="images/home.png" class="settingIcon" id="myHome" />
                        </h3>
                    </div>
                    <!--Page Title Ends-->

                    <!--Services List Starts-->
                    <div class="box">
                        <form name="mySkillForm" id="mySkillForm" method="POST">
                            <ul class="myList">
                                <?php
                        $query_mainCatList=mysqli_query($link, "SELECT * FROM categories WHERE ID='$newSubCatID' ORDER BY Category ASC");
                        while($view_mainCatList=mysqli_fetch_array($query_mainCatList))
                        {
                            $newCatID=$view_mainCatList['ID'];
                            $newCategory=$view_mainCatList['Category'];
                            //Find Skills List
                            $query_skillsList=mysqli_query($link, "SELECT * FROM subcategories WHERE Publish='Yes' AND CatID='$newCatID' ORDER BY SubCategory ASC");
                            while($view_skillsList=mysqli_fetch_array($query_skillsList))
                            {
                                $newSubCatID=$view_skillsList['ID'];
                                $newSubCategory=$view_skillsList['SubCategory'];
                                //Fetch User's Skills
                                $query_userSkill=mysqli_query($link, "SELECT * FROM freelancer_skills WHERE FreelancerID='$userID' AND SkillID='$newSubCatID'");
                                $view_userSkill=mysqli_fetch_array($query_userSkill);
                                $mySkillID=$view_userSkill['SkillID'];
                                ?>
                                <li>
                                    <input type="checkbox" id="checkboxvar[]" <?php
                                if($newSubCatID==$mySkillID)
                                {
                                    echo 'checked="checked"';
                                }
                                ?> name="checkboxvar[]" value="<?=$newSubCatID?>" />
                                    &nbsp;&nbsp;
                                    <?php
                                if($newSubCatID==$mySkillID)
                                {
                                    ?>
                                    <span style="color:red"><?=$newSubCategory?></span>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <?=$newSubCategory?>
                                    <?php
                                }
                                ?>
                                </li>
                                <?php
                            }
                        }
                        ?>
                                <li style="border:0; text-align:right">
                                    <button class="button is-danger is-small btnSave">UPDATE</button>
                                </li>
                            </ul>
                        </form>

                    </div>
                    <!--Services List Ends-->

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


    <script>
        $(document).ready(function() {

            $(" #btnFind").click(function() {
                $.post("app/findProfile", $("#myForm").serialize(), function(data) {
                    window.location.href = "searchList?LF=" + data;
                });
                return false;
            });

            //Back to MyAccount
            $("#myHome").click(function() {
                window.location.href = "myAccount";
            });

            //Update Skills
            $('.btnSave').click(function() {

                $('#btnSave').attr("disabled", true);

                $.post("app/skillsEditFormEntry",
                    $("#mySkillForm").serialize(),
                    function(data) {
                        if (data == 'skills_1') {
                            location.reload();
                        }
                        if (data == 'skills_0') {
                            alert('Check Connection!');
                            //$('#skills').load('skillsShow');
                        }
                    });

                return false;
            });

        });

    </script>
    <script src="js/mobileMenu.js">
    </script>

</body>

</html>
