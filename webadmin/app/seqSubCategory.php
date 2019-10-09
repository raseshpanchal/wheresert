<?php
include("../../config/connection.php");
$newID=$_GET['ID'];
$query_1=mysqli_query($link, "SELECT * FROM categories WHERE ID='$newID'");
$view_1=mysqli_fetch_array($query_1);
$newCatTitle=ucfirst($view_1['Category']);
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

#sortable-list{
    padding:0;
}

#sortable-list li{
    padding:0;
    color:#000;
    cursor:move;
    list-style:none;
    width:98%;
    background:#ddd;
    /*margin:10px 0;*/
    border:1px solid #999;
}
</style>
<script src="app/js/onlyAlpha.js"></script>
<script src="app/js/onlyNum.js"></script>
<script>
$(document).ready(function(){
    $("#sortable-list").sortable();

    var sortInput = jQuery('#sort_order');
    var submit = jQuery('#autoSubmit');
    var list = jQuery('#sortable-list');

    /* worker function */
    var fnSubmit = function(save){
        var sortOrder = [];

        list.children('li').each(function(){
            sortOrder.push(jQuery(this).data('id'));
            $("#message-box").html('');
        });

        sortInput.val(sortOrder.join(','));
        //Hide Show Buttons
        $("#table-1").hide();
        $("#table-2").show();
    };

    /* store values */
    list.children('li').each(function() {
        var li = jQuery(this);
        li.data('id',li.attr('title')).attr('title','');
    });
    /* sortables */
    list.sortable({
        opacity: 0.7,
        update: function() {
            fnSubmit(submit[0].checked);
        }
    });
    list.disableSelection();
    /* ajax form submission */
    jQuery('#myForm').bind('submit',function(e) {
        if(e) e.preventDefault();
        fnSubmit(true);
    });

    //Code for Confirm Button
    $("#btnSave").click(function(){
        $('#btnSave').attr("disabled", true);
        $.post("app/seqSubCategoryEntry",
        $("#myForm").serialize(),
            function(data){
                $('.success_alert').fadeIn(300);
                $(".success_alert").delay(1500).fadeOut(300);
                $('#btnSave').attr("disabled", false);
                closeFormDelete();
        });
        return false;
    });

    //Function for Cancel
    $(".btnCancel").click(function(){
        closeForm();
    });
});
</script>

<div class="formShadow"></div>

<div style="background-color:#424a5d; height:37px; border-top:solid 1px #FFF; border-bottom:solid 1px #044636; color:#FFF; padding-left:15px; padding-top:7px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Sequence Sub-Category under <?php echo $newCatTitle; ?></td>
  </tr>
</table>
</div>

<form name="myForm" id="myForm" method="POST">
<input type="hidden" name="sort_order" id="sort_order" />
<div class="row" style="padding:15px">
    <div class="col-xs-12" style="height:400px; overflow-y:auto;">
        <ul id="sortable-list">
        <?php
        $query_2=mysqli_query($link, "SELECT * FROM subcategories WHERE CatID='$newID' ORDER BY MyID ASC");
        while($view_2=mysqli_fetch_array($query_2))
        {
            $newSubCatID=$view_2['ID'];
            $newMyID=$view_2['MyID'];
            $newSubCatTitle=$view_2['SubCategory'];
            ?>

            <li title="<?php echo $newSubCatID; ?>"><?php echo '&nbsp;&nbsp;'.$newMyID.'.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$newSubCatTitle; ?><input name="txt_ID" type="hidden" id="txt_ID" value="<?php echo $newSubCatID; ?>"/></li>
            <?php
        }
        ?>
        </ul>
    </div>
</div>

<div class="row" style="padding:15px" id="table-1">
    <div class="col-xs-12">
        <button type="button" class="btn btn-primary btnCancel" style="padding:6px; width:100px;">Close</button>
        <input type="submit" id="mySub" name="mySub" class="btn btn-info" style="padding:6px; width:100px;" value="Update List" />
    </div>
</div>

<div class="row" style="padding:15px; display:none" id="table-2">
    <div class="col-xs-12">
        <button type="button" class="btn btn-primary btnCancel" style="padding:6px; width:100px;">Close</button>
        <button type="submit" class="btn btn-danger" style="padding:6px; width:100px;" id="btnSave">Confirm</button>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <div class="success_alert">Record added successfully!</div>
    </div>
</div>
</form>
