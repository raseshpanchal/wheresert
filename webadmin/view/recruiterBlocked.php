<?php
error_reporting(0);
if (!isset($_SESSION)) { session_start(); }
include_once("../../config/connection.php");
//Find UID
$username=$_SESSION['wsAdminUser'];
$query_1=mysqli_query($link, "SELECT * FROM admin_login WHERE Email='$username'");
$view_1=mysqli_fetch_array($query_1);
$newUID=$view_1['ID'];
?>

<div style="background-color:#ff865c; height:37px; border-top:solid 1px #FFF; border-bottom:solid 1px #f2f2f2; color:#FFF; padding-left:15px; padding-top:3px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>List of All Recruiter</td>
    <td width="200" id="searchArea"><input type="text" id="search" placeholder="Search" style="color:#fff; height:35px; margin-top:-3px; border:0px; padding-left:5px; width:200px; background-color:#666" /></td>
<!--    <td width="75"><button type="submit" class="btn btn-success myBtn" id="btnAdd">Add</button></td>-->
    <td width="75"><button type="submit" class="btn btn-warning myBtn" id="btnRefresh">Refresh</button></td>
    <td width="75"><button type="submit" class="btn btn-primary myBtn" id="btnExport">Export</button></td>
  </tr>
</table>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr style="background-color:#d9592d; color:#FFF; border-top:solid 1px #d9592d">
                <th width="40" align="center">Sr.</th>
                <th>First Name</th>
                <th width="250" style="text-align:center">Last Name</th>
                <th width="250" style="text-align:center">Email</th>
                <th width="200" style="text-align:center">Mobile</th>
                <th width="40" style="text-align:center">Status</th>
                <th width="40" style="text-align:center">Edit</th>
                <th width="40" style="text-align:center">Del</th>
            </tr>
        </thead>
        <div class="contentHolder">
        <tbody style="color:#666" id="table">
            <?php
			$i=1;
			$query_1=mysqli_query($link, "SELECT * FROM recruiter_registration WHERE Status='Blocked' ORDER BY ID DESC");
			while($view_1=mysqli_fetch_array($query_1))
			{
				$newID=$view_1['ID'];
				$newFirstName=$view_1['FirstName'];
				$newLastName=$view_1['LastName'];
				$newEmailID=$view_1['EmailID'];
				$newMobile=$view_1['Mobile'];
				$newDOB=$view_1['DOB'];
				$newStatus=$view_1['Status'];

                if($newStatus=='Valid')
                {
                    $showImage = '<img src="images/bullet_gray.png" border="0" />';
                }
                else if($newStatus=='Active')
                {
                    $showImage = '<img src="images/bullet_green.png" border="0" />';
                }
                else
                {
                    $showImage = '<img src="images/bullet_red.png" border="0" />';
                }
			?>
             <tr <?php echo 'id="td'.$newID.'"'; ?>>
                <td id="1_<?php echo $newID ?>" width="40" align="center"><?php echo $i; ?></td>
                <td id="2_<?php echo $newID ?>"><?php echo $newFirstName; ?></td>
                <td id="3_<?php echo $newID ?>" width="250" align="center"><?php echo $newLastName; ?></td>
                <td id="4_<?php echo $newID ?>" width="250" align="center"><?php echo $newEmailID; ?></td>
                <td id="5_<?php echo $newID ?>" width="200" align="center"><?php echo $newMobile; ?></td>
                <td id="6_<?php echo $newID ?>" width="40" align="center"><?php echo $showImage; ?></td>
                
                
                <td width="40" align="center"><a href="app/editRecruiter?ID=<?php echo $newID; ?>" class="btnEdit"><img src="images/edit.gif" border="0" /></a></td>
                <td width="40" align="center"><a href="app/deleteRecruiter?ID=<?php echo $newID; ?>" class="btnDelete"><img src="images/delete.gif" border="0" /></a></td>
            </tr>
            <?php
				$i++;
			}
			?>
        </tbody>
        </div>
    </table>
</div>

<script>
function dataExport()
{
	window.open("exportAreas", "myWindow", "scrollbars=no, toolbar=no, menubar=no, status=no, width=550, height=325, resizable=0");
}

//Main jQuery Functions Start
$(document).ready(function(){
	//Function for Adding New Event
	$("#btnAdd").click(function(){
		addForm('app/addRecruiter');
	});
	
	//This is Edit function
	$('.btnEdit').click(function(){
		addForm($(this).attr("href"));
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
	//This is Delete function
	$('.btnDelete').click(function(){
		addForm($(this).attr("href"));
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
	//Function for Export Data
	$("#btnExport").click(function(){
		dataExport();
		return false;
	});

    //Function for Refresh
    $("#btnRefresh").click(function(){
        $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading updated data...<br/><br/><img src="images/preloader_clock.gif" /></div>');
        closeForm();
        $("#middleArea").load("view/recruiterBlocked");
    });

    //////////////////Script For Live Search Starts////////////////////
    var $rows = $('#table tr');
    $('#search').keyup(function() {
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $rows.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
    //////////////////Script For Live Search Ends//////////////////////

});
</script>
