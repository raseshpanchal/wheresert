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
    <td>List of All Review</td>
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
                <th>Name</th>
                <th width="200" style="text-align:left">Email</th>
                <th width="500" style="text-align:left">Review</th>
                <th width="20" style="text-align:center">Rating</th>
                <th width="100" style="text-align:center">ReviewDate</th>
                <th width="40" style="text-align:center">Status</th>
                <th width="40" style="text-align:center">View</th>
            </tr>
        </thead>
        <div class="contentHolder">
        <tbody style="color:#666" id="table">
            <?php
			$i=1;
			$query_1=mysqli_query($link, "SELECT * FROM freelancer_reviews WHERE Status='Blocked' ORDER BY ReviewDate DESC");
			while($view_1=mysqli_fetch_array($query_1))
			{
				$newID=$view_1['ID'];
				$newName=$view_1['Name'];
				$newEmail=$view_1['Email'];
				$newReview=urldecode($view_1['Review']);
				$newRating=$view_1['Rating'];
				$newReviewDate=$view_1['ReviewDate'];
				$newStatus=$view_1['Status'];

                if($newStatus=='Approved')
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
                <td id="2_<?php echo $newID ?>"><?php echo $newName; ?></td>
                <td id="3_<?php echo $newID ?>" width="200" align="left"><?php echo $newEmail; ?></td>
                <td id="4_<?php echo $newID ?>" width="500" align="left"><?php echo $newReview; ?></td>
                <td id="5_<?php echo $newID ?>" width="20" align="center"><?php echo $newRating; ?></td>
                <td id="6_<?php echo $newID ?>" width="100" align="center"><?php echo $newReviewDate; ?></td>
                <td id="8_<?php echo $newID ?>" width="40" align="center"><?php echo $showImage; ?></td>
                <td width="40" align="center"><a href="app/viewReview?ID=<?php echo $newID; ?>" class="btnView"><img src="images/doc.png" border="0" /></a></td>
                
<!--                <td width="40" align="center"><a href="app/editFreelancer?ID=<?php echo $newID; ?>" class="btnEdit"><img src="images/edit.gif" border="0" /></a></td>-->
<!--                <td width="40" align="center"><a href="app/deleteFreelancer?ID=<?php echo $newID; ?>" class="btnDelete"><img src="images/delete.gif" border="0" /></a></td>-->
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
	//Function for View
	$('.btnView').click(function(){
		addForm($(this).attr("href"));
		$('html, body').animate({scrollTop : 0},800);
		return false;
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
        $("#middleArea").load("view/reviewsBlocked");
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
