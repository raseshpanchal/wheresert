<?php
error_reporting(0);
include("../../config/connection.php");
?>
<div style="background-color:#ff865c; height:37px; border-top:solid 1px #FFF; border-bottom:solid 1px #f2f2f2; color:#FFF; padding-left:15px; padding-top:3px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Sub-Section User Rights</td>
    <td width="200" id="searchArea"><input type="text" id="search" placeholder="Search" style="color:#fff; height:35px; margin-top:-3px; border:0px; padding-left:5px; width:200px; background-color:#666" /></td>
    <td width="75"><button type="submit" class="btn btn-success myBtn" id="btnAdd">Add</button></td>
    <td width="75"><button type="submit" class="btn btn-warning myBtn" id="btnRefresh">Refresh</button></td>
    <td width="75"><button type="submit" class="btn btn-primary myBtn" id="btnExport">Export</button></td>
    <!--<td width="75"><button type="submit" class="btn btn-danger myBtn" id="btnSearch">Search</button></td>-->
  </tr>
</table>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr style="background-color:#d9592d; color:#FFF; border-top:solid 1px #d9592d">
                <th width="40" align="center">Sr.</th>
                <th>Full Name</th>
                <th width="400" align="center">Main Section</th>
                <th width="40" align="center">Sub</th>
            </tr>
        </thead>
        <div class="contentHolder">
        <tbody style="color:#666" id="table">
            <?php
            $i=1;
            $query_1=mysqli_query($link, "SELECT * FROM user_rights_level_1 WHERE Access='Yes' ORDER BY ID ASC");
            while($view_1=mysqli_fetch_array($query_1))
            {
                $newID=$view_1['ID'];
                $newUID=$view_1['UID'];
                $newSID=$view_1['SID'];
                //Fetch User Full Name
                $query_2=mysqli_query($link, "SELECT * FROM admin_login WHERE ID='$newUID'");
                $view_2=mysqli_fetch_array($query_2);
                $newFullName=ucfirst($view_2['FullName']);
                //Fetch Section Name
                $query_3=mysqli_query($link, "SELECT * FROM rights_master_level_1 WHERE ID='$newSID'");
                $view_3=mysqli_fetch_array($query_3);
                $newMainSection=ucfirst($view_3['MainSection']);
            ?>
             <tr <?php echo 'id="td'.$newID.'"'; ?>>
                <td id="1_<?php echo $newID ?>" width="40" align="center"><?php echo $i; ?></td>
                <td id="2_<?php echo $newID ?>"><?php echo $newFullName; ?></td>
                <td id="3_<?php echo $newID ?>" width="400"><?php echo $newMainSection; ?></td>
                <td width="40" align="center"><a href="app/subUserRights?ID=<?php echo $newUID; ?>&amp;SID=<?php echo $newSID; ?>" class="btnSub"><img src="images/lock.png" border="0" /></a></td>
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
    window.open("exportTaxes", "myWindow", "scrollbars=no, toolbar=no, menubar=no, status=no, width=550, height=325, resizable=0");
}

//Main jQuery Functions Start
$(document).ready(function(){
    //Function for Adding New Event
    $("#btnAdd").click(function(){
        addForm('app/addSystemUser');
    });

    //This is Main function
    $('.btnSub').click(function(){
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
        $("#middleArea").load("view/userRights");
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
