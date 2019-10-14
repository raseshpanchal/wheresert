<?php
    error_reporting(0);
    include_once("config/connection.php");
    $newMainCatName=$_POST["mainCat"];
    $query_mainCat=mysqli_query($link, "SELECT * FROM main_categories WHERE MainCat='$newMainCatName'");
    $view_mainCat=mysqli_fetch_array($query_mainCat);
    $newMainCatID=$view_mainCat['ID'];
    $newMainCat=$view_mainCat['MainCat'];
?>

<style>
    .myCat:hover {
        cursor: pointer;
    }

</style>

<!--Main Categories-->
<div class="columns">
    <?php
    $myCount=1;
    $query_cat = mysqli_query($link, "SELECT * FROM categories WHERE MainCatID='$newMainCatID' AND Publish='Yes' ORDER BY Category ASC");
    while($view_cat=mysqli_fetch_array($query_cat))
    {
        $newCatID=$view_cat['ID'];
        $newCategory=$view_cat['Category'];
        $newIcons=$view_cat['Icons'];
        ?>

    <div class="column is-3">
        <div class="card">
            <div class="card-content myCat" mainID="<?=myEncode($newMainCatID)?>" subID="<?=myEncode($newCatID)?>">
                <div class="media-content">
                    <div class="columns">
                        <div class="column is-pulled-left is-6" style="padding:0px; text-align:center; padding-top:10px;">
                            <img src="icons/<?=$newIcons?>" class="catIcon" style="width:70px; margin-bottom:10px" />
                        </div>

                        <div class="column is-6" style="text-align:center">
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
<!--Main Categories-->

<script>
    $(document).ready(function() {

        localStorage.removeItem('mainCatID');
        localStorage.removeItem('subCatID');

        $('.myCat').click(function() {
            var mainCatID = $(this).attr('mainID');
            var subCatID = $(this).attr('subID');
            localStorage.setItem('mainCatID', mainCatID);
            localStorage.setItem('subCatID', subCatID);
            //Page Count Number
            $('.pageCount').text('3');
            //Load Next Page
            $('.profilePages').load('profilePage03');
        });

        $('#btnBack').click(function() {
            location.reload();
        });

    });

</script>
