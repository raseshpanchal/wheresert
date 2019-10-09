<?php
error_reporting(0);
include("../../config/connection.php");
?>
<div style="background-color:#ff865c; height:37px; border-top:solid 1px #FFF; border-bottom:solid 1px #f2f2f2; color:#FFF; padding-left:15px; padding-top:3px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>List of System Users</td>
    <td width="200" id="searchArea"><input type="text" id="search" placeholder="Search" style="color:#fff; height:35px; margin-top:-3px; border:0px; padding-left:5px; width:200px; background-color:#666" /></td>
    <td width="75"><button type="submit" class="btn btn-success myBtn" id="btnAdd">Add</button></td>
    <td width="75"><button type="submit" class="btn btn-warning myBtn" id="btnRefresh">Refresh</button></td>
    <!--
    <td width="75"><button type="submit" class="btn btn-primary myBtn" id="btnExport">Export</button></td>
    <td width="75"><button type="submit" class="btn btn-danger myBtn" id="btnSearch">Search</button></td>
    -->
  </tr>
</table>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr style="background-color:#d9592d; color:#FFF; border-top:solid 1px #d9592d">
                <th width="40" align="center">Sr.</th>
                <th>Full Name</th>
                <th width="150" align="center">User Name</th>
                <th width="300" align="center">Email</th>
                <th width="40" align="center">Main</th>
                <th width="40" align="center">Edit</th>
                <th width="40" align="center">Del</th>
            </tr>
        </thead>
        <div class="contentHolder">
        <tbody style="color:#666" id="table">
            <?php
            $i=1;
            $query_1=mysqli_query($link, "SELECT * FROM admin_login WHERE UserType='Admin' ORDER BY ID ASC");
            while($view_1=mysqli_fetch_array($query_1))
            {
                $newID=$view_1['ID'];
                $newFullName=ucfirst($view_1['FullName']);
                $newUserName=$view_1['UserName'];
                $newEmail=$view_1['Email'];
                $newPublish=$view_1['Publish'];
            ?>
             <tr <?php echo 'id="td'.$newID.'"'; ?>>
                <td id="1_<?php echo $newID ?>" width="40" align="center"><?php echo $i; ?></td>
                <td id="2_<?php echo $newID ?>">
                <?php
                    if($newPublish=='Yes')
                    {
                        echo '<img src="images/bullet_green.png" border="0" />&nbsp;&nbsp;';
                    }
                    else
                    {
                        echo '<img src="images/bullet_red.png" border="0" />&nbsp;&nbsp;';
                    }
                    echo $newFullName;
                ?>
                </td>
                <td id="3_<?php echo $newID ?>" width="150"><?php echo $newUserName; ?></td>
                <td id="3_<?php echo $newID ?>" width="300"><?php echo $newEmail; ?></td>
                <td width="40" align="center"><a href="app/mainUserRights?ID=<?php echo $newID; ?>" class="btnMain"><img src="images/lock.png" border="0" /></a></td>
                <td width="40" align="center"><a href="app/editSystemUser?ID=<?php echo $newID; ?>" class="btnEdit"><img src="images/edit.gif" border="0" /></a></td>
                <td width="40" align="center"><a href="app/deleteSystemUser?ID=<?php echo $newID; ?>" class="btnDelete"><img src="images/delete.gif" border="0" /></a></td>
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
    $('.btnMain').click(function(){
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
        $("#middleArea").load("view/systemUsers");
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
