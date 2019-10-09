<?php
include("../../config/connection.php");
$newID=$_GET['ID'];
//Fetch Records
$query_1=mysqli_query($link, "SELECT * FROM faqs WHERE ID='$newID'");
$view_1=mysqli_fetch_array($query_1);
$newFaqTitle=ucfirst($view_1['Title']);
$newFaqDesc=$view_1['Description'];
$newPublish=$view_1['Publish'];
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
.textarea{
	font-family: 'Ruda', sans-serif;
}
</style>
<!-- WYSIWYG Starts -->
<!--<link rel="stylesheet" type="text/css" href="wysiwyg/lib/css/prettify.css"></link>-->
<link rel="stylesheet" type="text/css" href="wysiwyg/src/bootstrap-wysihtml5.css">
<!-- WYSIWYG Ends -->
<script src="app/js/validFaqPage.js"></script>
<script src="app/js/onlyAlpha.js"></script>
<script src="app/js/onlyNum.js"></script>
<script>
$(document).ready(function(){	
	$('#txt_title').focus();
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
		$('#btnSave').attr("disabled", true);
		$.post("app/deleteFaqsEntry?ID=<?php echo $newID; ?>",
		$("#myForm").serialize(),
		function(data){
			$('.success_alert').fadeIn(300);
			$(".success_alert").delay(1500).fadeOut(300);
			$('#middleArea .table tbody #td<?php echo $newID ?>').hide('slow');
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
    <td>Delete FAQ Details</td>
  </tr>
</table>
</div>

<form name="myForm" id="myForm" method="POST">
<div class="row" style="padding:15px; padding-bottom:5px;">
    <div class="col-xs-12">
        <input type="text" class="form-control form-require" value="<?php echo $newFaqTitle; ?>" readonly="readonly" />
    </div>
</div>

<div class="row" style="padding:15px; padding-top:0px;">
    <div class="col-xs-12">
        <textarea class="form-control form-require textarea" style="resize: none; height:300px;" readonly="readonly"><?php echo urldecode($newFaqDesc); ?></textarea>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-6">
        <label><input type="checkbox" <?php if($newPublish=='Yes') echo 'checked="checked"'; ?> disabled="disabled"> Publish Online</label>
    </div>
    <div class="col-xs-6" style="text-align:right">
        <span style="color:#C00">Note: Deleted item cannot be retrieved</span>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <button type="button" class="btn btn-primary" style="padding:6px; width:100px;" id="btnCancel">Close</button>
        <button type="submit" class="btn btn-danger" style="padding:6px; width:100px;" id="btnSave" onMouseDown="validFaqPage()">Delete</button>
    </div>
</div>

<div class="row" style="padding:15px">
    <div class="col-xs-12">
        <div class="success_alert">Record deleted successfully!</div>
    </div>
</div>
</form>
<script src="wysiwyg/lib/js/wysihtml5-0.3.0.js"></script>
<script src="wysiwyg/src/bootstrap-wysihtml5.js"></script>

<script>
	$('.textarea').wysihtml5();
</script>

<script type="text/javascript" charset="utf-8">
	$(prettyPrint);
</script>