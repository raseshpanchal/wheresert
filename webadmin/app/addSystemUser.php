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
<script src="app/js/validSystemUser.js"></script>
<script src="app/js/onlyAlpha.js"></script>
<script src="app/js/onlyNum.js"></script>
<script>
$(document).ready(function(){	
	//Function for Counting Table Rows
	var i=$('#middleArea .table tbody tr').length;
	
	$("#btnSave").click(function(){
		if ($('#chk_publish').is(":checked"))
		{
		 	var myShow = '<img src="images/bullet_green.png" border="0" />&nbsp;&nbsp;';
		}
		else
		{
			var myShow = '<img src="images/bullet_red.png" border="0" />&nbsp;&nbsp;';
		}
		var myCity = $( "#select_cityID option:selected" ).text();
		$('#btnSave').attr("disabled", true);
		$.post("app/addSystemUserEntry",
		$("#myForm").serialize(),
		function(data){
			if(data=='errorValidEmail')
			{
				$('.success_alert').fadeIn(300);
				$('.success_alert').html('Incorrect Email Format');
				$('#btnSave').attr("disabled", false);
			}
			else if(data=='errorEmailExist')
			{
				$('.success_alert').fadeIn(300);
				$('.success_alert').html('Email ID is already registered');
				$('#btnSave').attr("disabled", false);
			}
			else if(data=='errorUserExist')
			{
				$('.success_alert').fadeIn(300);
				$('.success_alert').html('User Name is already used');
				$('#btnSave').attr("disabled", false);
			}
			else if(data=='regiSuccess')
			{
				//Show Added Table Row
				html = '<tr>';
				html += '<td align="center"><img src="images/mark-yes.png" width="16" height="16" /></td>';
				html += '<td>'+$("#txt_fullName").val()+'</td>';
				html += '<td>'+$("#txt_username").val()+'</td>';
				html += '<td>'+$("#txt_email").val()+'</td>';
				html += '<td align="center"><img src="images/lock.png" width="16" height="16" /></td>';
				html += '<td align="center"><img src="images/edit.gif" width="16" height="16" /></td>';
				html += '<td align="center"><img src="images/delete.gif" width="16" height="16" /></td>';
				html += '</tr>';
				$('.table tbody').prepend(html);
				i++;
				$('#txt_title').focus();
				$('.success_alert').fadeIn(300);
				$(".success_alert").delay(1500).fadeOut(300);
				$('#txt_title').val('');
				$('#btnSave').attr("disabled", false);
				/////////////
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

<div style="background-color:#424a5d; height:37px; border-top:solid 1px #FFF; border-bottom:solid 1px #044636; color:#FFF; padding-left:15px; padding-top:7px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Add New System User</td>
  </tr>
</table>
</div>

<form name="myForm" id="myForm" method="POST">
<div class="row" style="padding:15px; margin-top:20px;">
    <div class="col-xs-12">
        <input type="text" class="form-control form-require" id="txt_fullName" name="txt_fullName" placeholder="Enter Full Name*" required />
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <input type="email" class="form-control form-require" id="txt_email" name="txt_email" placeholder="Enter Email ID*" required />
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <input type="email" class="form-control form-require" id="txt_username" name="txt_username" placeholder="Enter User Name*" required />
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-6">
        <label><input type="checkbox" checked="checked" id="chk_publish" name="chk_publish" value="Yes"> Valid User</label>
    </div>
    <div class="col-xs-6" style="text-align:right">
        <span style="color:#C00">* Mandatory Fields</span>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <button type="button" class="btn btn-primary" style="padding:6px; width:100px;" id="btnCancel">Close</button>
        <button type="submit" class="btn btn-danger" style="padding:6px; width:100px;" id="btnSave" onMouseDown="validSystemUser()">Save</button>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <div class="success_alert">Record added successfully!</div>
    </div>
</div>
</form>