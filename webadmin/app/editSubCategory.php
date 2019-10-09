<?php
include("../../config/connection.php");
$newID=$_GET['ID'];
//Fetch Records
$query_1=mysqli_query($link, "SELECT * FROM subcategories WHERE ID='$newID'");
$view_1=mysqli_fetch_array($query_1);
$newCatID=$view_1['CatID'];
$newTitle=ucfirst($view_1['SubCategory']);
$newPublish=$view_1['Publish'];
//Fetching Category Name
$query_2=mysqli_query($link, "SELECT * FROM categories WHERE ID='$newCatID'");
$view_2=mysqli_fetch_array($query_2);
$newCat=ucfirst($view_2['Category']);
?>
<style>
.success_alert{
    background-color:#6C3;
    color:#FFF;
    border:dashed 1px #666;
    width:100%;
    height:30px;
    padding-top:4px;
    text-align:center;
    display:none;
}
</style>
<script src="app/js/validSubCategory.js"></script>
<script src="app/js/onlyAlpha.js"></script>
<script src="app/js/onlyNum.js"></script>
<script>
$(document).ready(function(){
    $("#btnSave").click(function(){
        if ($('#chk_publish').is(":checked"))
        {
             var myShow = '<img src="images/bullet_green.png" border="0" />';
        }
        else
        {
            var myShow = '<img src="images/bullet_red.png" border="0" />';
        }
        $('#btnSave').attr("disabled", true);
        $.post("app/editSubCategoryEntry?ID=<?php echo $newID ?>",
        $("#myForm").serialize(),
        function(data){
            //Show Edited Table Row
            $("#1_<?php echo $newID ?>").css('background-color','#a3d3d1');
            $("#2_<?php echo $newID ?>").html(myShow+' '+$('#txt_title').val());
            //Additional Actions
            $('.success_alert').fadeIn(300);
            $(".success_alert").delay(1500).fadeOut(300);
            closeFormDelete();
            $('#btnSave').attr("disabled", false);
        });
        return false;
    });

    //Function for Cancel
    $("#btnCancel").click(function(){
        closeForm();
    });
});
</script>

<div class="formShadow"></div>

<div style="background-color:#424a5d; height:37px; border-top:solid 1px #FFF; border-bottom:solid 1px #044636; color:#FFF; padding-left:15px; padding-top:7px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Edit Sub-Category</td>
  </tr>
</table>
</div>

<form name="myForm" id="myForm" method="POST">
<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <input type="text" class="form-control form-require" id="txt_sub" name="txt_sub" value="<?php echo $newCat; ?>" readonly="readonly" />
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <input type="text" class="form-control form-require" id="txt_title" name="txt_title" placeholder="Title*" required value="<?php echo $newTitle ?>" />
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-6">
        <label><input type="checkbox" id="chk_publish" name="chk_publish" <?php if($newPublish=='Yes') echo 'checked="checked"'; ?>> Publish Online</label>
    </div>
    <div class="col-xs-6" style="text-align:right">
        <span style="color:#C00">* Mandatory Fields</span>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <button type="button" class="btn btn-primary" style="padding:6px; width:100px;" id="btnCancel">Close</button>
        <button type="submit" class="btn btn-danger" style="padding:6px; width:100px;" id="btnSave" onMouseDown="validSubCategory()">Update</button>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <div class="success_alert">Record updated successfully!</div>
    </div>
</div>
</form>
