<?php
include("../../config/connection.php");
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

<script src="app/js/validLanguage.js"></script>
<script src="app/js/onlyAlpha.js"></script>
<script src="app/js/onlyNum.js"></script>
<script>
$(document).ready(function(){
    //Function for Counting Table Rows
    var i=$('#middleArea .table tbody tr').length;

    $("#btnSave").click(function(){
        if ($('#chk_publish').is(":checked"))
        {
             var myShow = '<img src="images/mark-yes.png" border="0" />';
        }
        else
        {
            var myShow = '<img src="images/reject.png" border="0" />';
        }
        var myTitle = $("#txt_title").val();

        //$('#btnSave').attr("disabled", true);
        $.post("app/addLanguageEntry",
        $("#myForm").serialize(),
        function(data){
            if(data==1)
            {
                //Show Added Table Row
                html = '<tr>';
                html += '<td align="center">'+myShow+'</td>';
                html += '<td>'+myTitle+'</td>';
                html += '<td align="center"><img src="images/edit.gif" width="16" height="16" /></td>';
                html += '<td align="center"><img src="images/delete.gif" width="16" height="16" /></td>';
                html += '</tr>';
                $('.table tbody').prepend(html);
                i++;
                //alert('Record Addedd Successully!');
                $('.success_alert').fadeIn(300);
                $(".success_alert").delay(1500).fadeOut(300);
                //closeFormDelete();
                $('#txt_title').val('');
                $('#txt_title').focus();
                $('#btnSave').attr("disabled", false);
            }
            else if(data==0)
            {
                alert('This language is already added');
                $('#btnSave').attr("disabled", false);
            }
            else if(data==2)
            {
                alert('Error occured');
            }
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

<div style="background-color:#424a5d; height:37px; border-top:solid 1px #FFF; border-bottom:solid 1px #044636; color:#FFF; padding-left:15px; padding-top:10px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Add New Language</td>
  </tr>
</table>
</div>

<form name="myForm" id="myForm" method="POST">
<div class="row" style="padding:15px;">
    <div class="col-xs-12">
        <input type="text" class="form-control form-require" id="txt_title" name="txt_title" required placeholder="Title*" />
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-6">
        <label>
            <input type="checkbox" checked="checked" id="chk_publish" name="chk_publish" value="Yes"> Publish Online
        </label>
    </div>
    <div class="col-xs-6" style="text-align:right">
        <span style="color:#C00">* Mandatory Fields</span>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <button type="button" class="btn btn-primary" style="padding:6px; width:100px;" id="btnCancel">Close</button>
        <button type="submit" class="btn btn-danger" style="padding:6px; width:100px;" id="btnSave" onMouseDown="validLanguage()">Save</button>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <div class="success_alert">Record added successfully!</div>
    </div>
</div>
</form>
