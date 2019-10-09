<?php
include_once("../../config/connection.php");
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="app/js/validFreelancer.js"></script>
<script src="app/js/onlyAlpha.js"></script>
<script src="app/js/onlyNum.js"></script>
<script>  
$(document).ready(function(){
   //Function for Counting Table Rows
    var i=$('#middleArea .table tbody tr').length;

    $("#btnSave").click(function(){
 
        
        var myFirstName = $("#txt_firstname").val();
        var myLastName = $("#txt_lastname").val();
        var myEmail = $("#txt_email").val();
        var myMobile = $("#txt_mobile").val();
        var myDob = $("#txt_dob").val();
        var myGender = $("input[name='radio_gender']:checked").val();
        var myStatus = $("input[name='radio_status']:checked").val();
        
         if(myStatus=='Valid')
        {
            var myShow = '<img src="images/bullet_gray.png" border="0" />';
        }
        else if(myStatus=='Active')
        {
            var myShow = '<img src="images/bullet_green.png" border="0" />';
        }
        else if(myStatus=='Blocked')
        {
            var myShow = '<img src="images/bullet_red.png" border="0" />';
        }
        
        //$('#btnSave').attr("disabled", true);
        $.post("app/addFreelancerEntry",
        $("#myForm").serialize(),
        function(data){
            //Show Added Table Row
            html = '<tr>';
            html += '<td align="center"><img src="images/mark-yes.png" width="16" height="16" /></td>';
            html += '<td>'+myFirstName+'</td>';
            html += '<td align="center">'+myLastName+'</td>';
            html += '<td align="center">'+myEmail+'</td>';
            html += '<td align="center">'+myMobile+'</td>';
            html += '<td align="center">'+myShow+'</td>';
            html += '<td align="center"><img src="images/edit.gif" width="16" height="16" /></td>';
            html += '<td align="center"><img src="images/delete.gif" width="16" height="16" /></td>';
            html += '</tr>';
            $('.table tbody').prepend(html);
            i++;
            $('.success_alert').fadeIn(300);
            $(".success_alert").delay(1500).fadeOut(300);
            $('#txt_firstname').val('');
            $('#txt_lastname').val('');
            $('#txt_dob').val('');
            $('#txt_mobile').val('');
            $('#txt_email').val('');
            $('#btnSave').attr("disabled", false);
         });
        return false;
    });
    
    $("#txt_dob").datepicker({dateFormat: 'dd/mm/yy'});
    
    
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
    <td>Add New Freelancers</td>
  </tr>
</table>
</div>

<form name="myForm" id="myForm" method="POST">

<div class="row" style="padding:15px; padding-top:25px;">
    <div class="col-xs-12">
        <input type="text" class="form-control form-require" id="txt_firstname" name="txt_firstname" placeholder="First Name*" required />
    </div>
</div>
   
<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <input type="text" class="form-control form-require" id="txt_lastname" name="txt_lastname" placeholder="Last Name*" required />
    </div>
</div>
    
    
<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <input type="email" class="form-control form-require" id="txt_email" name="txt_email" placeholder="Email ID*" required />
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <input type="text" class="form-control form-require" id="txt_mobile" name="txt_mobile" placeholder="Mobile Number*" required maxlength="10" onKeyPress="return numbersonly(event, false)" />
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <input type="text" class="form-control form-require" id="txt_dob" name="txt_dob" placeholder="Date of Birth*" required />
    </div>
</div>  

<div class="row" style="padding:15px;">
    <div class="col-xs-4">
        <input type="text" class="form-control form-require" id="txt_gender" name="txt_gender"  placeholder="Gender*" Disabled required />
    </div>
    <div class="col-xs-8">
        <label>
            <input type="radio" id="radio_gender" name="radio_gender" value="Male" checked="checked"> Male&nbsp;&nbsp;&nbsp;
        </label>
        <label>
            <input type="radio" id="radio_gender" name="radio_gender" value="Female"> Female
        </label>
    </div>
</div>
    
<div class="row" style="padding:15px">
    <div class="col-xs-8">
     
        <label>
            <input type="radio" id="radio_status" name="radio_status" value="Valid" checked="checked"> Valid&nbsp;&nbsp;&nbsp;
        </label>
        <label>
            <input type="radio" id="radio_status" name="radio_status" value="Active"> Active&nbsp;&nbsp;&nbsp;
        </label>
        <label>
            <input type="radio" id="radio_status" name="radio_status" value="Blocked"> Blocked
        </label>
        
    </div>
    <div class="col-xs-4" style="text-align:right">
        <span style="color:#C00">* Mandatory Fields</span>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <button type="button" class="btn btn-primary" style="padding:6px; width:100px;" id="btnCancel">Close</button>
        <button type="submit" class="btn btn-danger" style="padding:6px; width:100px;" id="btnSave" onMouseDown="validFreelancer()">Save</button>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <div class="success_alert">Record added successfully!</div>
    </div>
</div>
</form>
