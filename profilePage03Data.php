<?php
    error_reporting(0);
    include_once("config/connection.php");
    $newMainCatName=$_POST["mainCat"];
    $newMainCatID=myDecode($_POST["mainCatID"]);
    $newSubCatID=myDecode($_POST["subCatID"]);

?>

<form name="mySkillForm" id="mySkillForm" method="POST">
    <div class="columns">
        <div class="column">

            <div class="columns">
                <input type="hidden" name="txt_mainCat" id="txt_mainCat" value="<?=$newMainCatID?>" />
                <input type="hidden" name="txt_subCat" id="txt_subCat" value="<?=$newSubCatID?>" />
                <?php
            $myCount=1;
            $query_cat=mysqli_query($link, "SELECT * FROM subcategories WHERE Publish='Yes' AND CatID='$newSubCatID'");
            while($view_cat=mysqli_fetch_array($query_cat))
            {
                $newSubCatID=$view_cat['ID'];
                $newSubCatName=$view_cat['SubCategory'];
                //Fetch User's Skills
                $query_userSkill=mysqli_query($link, "SELECT * FROM freelancer_skills WHERE FreelancerID='$userID' AND SkillID='$newSubCatID'");
                $view_userSkill=mysqli_fetch_array($query_userSkill);
                $mySkillID=$view_userSkill['SkillID'];

                ?>
                <div class="column is-2 subCat" catID="<?=myEncode($newSubCatID)?>" style="text-align:left">
                    <input type="checkbox" id="checkboxvar[]" <?php
                            if($newSubCatID==$mySkillID)
                            {
                                echo 'checked="checked"';
                            }
                            ?> name="checkboxvar[]" value="<?=$newSubCatID?>" />
                    <?=$newSubCatName?>
                </div>
                <?php
                if($myCount==6)
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

            <div class="columns">
                <div class="column">
                    <button class="button is-danger is-pulled-right btnSave">Next</button>
                </div>
            </div>

        </div>
    </div>
</form>

<script>
    $(document).ready(function() {


        //Check Class
        $('.btnSave').click(function() {

            $('#btnSave').attr("disabled", true);

            $.post("app/wizardSkillsFormEntry",
                $("#mySkillForm").serialize(),
                function(data) {
                    //window.location.href = 'myAccount';

                    //Page Count Number
                    $('.pageCount').text('4');
                    //Load Next Page
                    $('.profilePages').load('profilePage04');
                });

            return false;
        });


    });

</script>
