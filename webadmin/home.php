<?php
error_reporting(0);
if (!isset($_SESSION)) { session_start(); }
include_once("checkUserSession.php");
include_once("../config/connection.php");
//Find UID
$query_1=mysqli_query($link, "SELECT * FROM admin_login WHERE UserName='$username'");
$view_1=mysqli_fetch_array($query_1);
$newUID=$view_1['ID'];
$newUserType=$view_1['UserType'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>WhereSert</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/style-responsive.css" rel="stylesheet" type="text/css">
    <link href="css/table-responsive.css" rel="stylesheet" type="text/css">
    <link href="css/to-do.css" rel="stylesheet" type="text/css">
    <link href="css/zabuto_calendar.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="css/webadmin.css" rel="stylesheet" type="text/css">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body marginheight="0" marginwidth="0">
    <!-- Top Navigation Starts -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="color:#0f1524">WHERESERT</a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" id="dashboard"><i class="glyphicon glyphicon-dashboard"></i>&nbsp;&nbsp;<span class="textGrey">Dashboard</span></a></li>
                    <li><a href="#" id="newOrders"><i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;&nbsp;<span class="textGrey">New Orders</span>&nbsp;&nbsp;<span class="badge" id="resultNewOrders"></span></a></li>
                    <li><a href="#" id="newUsers"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<span class="textGrey">New Users</span>&nbsp;&nbsp;<span id="resultNewUsers" class="badge"></span></a></li>

                    <li>
                    <?php
                    if($newUserType=='Super')
                    {
                        ?>
                        <a href="#" id="btnSuperSettings"><i class="glyphicon glyphicon-wrench"></i>&nbsp;&nbsp;<span class="textGrey">Settings</span></a>
                        <?php
                    }
                    else
                    {
                        ?>
                        <a href="#" id="btnAdminSettings"><i class="glyphicon glyphicon-wrench"></i>&nbsp;&nbsp;<span class="textGrey">Settings</span></a>
                        <?php
                    }
                    ?>
                    </li>

                    <!--
                    <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;<span class="textGrey">Reports</span></a></li>
                    -->
                    <li><a href="logoff"><i class="glyphicon glyphicon-off"></i>&nbsp;&nbsp;<span class="textGrey">Logout</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Top Navigation Ends -->

    <!-- Work Area Starts -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar" style="background-color:#424a5d;">
                <!-- Left Menu Starts -->
                <ul id="menu" style="margin-left:-20px; margin-top:-20px;">
                    <?php
                    //Section 1 Access
                    $query_main_1=mysqli_query($link, "SELECT * FROM user_rights_level_1 WHERE UID='$newUID' AND SID='1'");
                    $view_main_1=mysqli_fetch_array($query_main_1);
                    $newUserType_1=$view_main_1['UserType'];
                    $newAccess_1=$view_main_1['Access'];
                    if($newAccess_1=='Yes' || $newUserType=='Super')
                    {
                    ?>
                    <li>
                        <a href="#">Freelancers</a>
                        <ul>
                            <?php
                            if($newUserType=='Super')
                            {
                                //Sub Section 1 Super Access
                                $query_sub_1=mysqli_query($link, "SELECT * FROM rights_master_level_2 WHERE MainSID='1' ORDER BY ID ASC");
                                while($view_sub_1=mysqli_fetch_array($query_sub_1))
                                {
                                    $newSectionTitle=$view_sub_1['SectionTitle'];
                                    $newURL=$view_sub_1['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                //////////////////
                            }
                            else
                            {
                                //Sub Section 1 Admin Access
                                $query_sub_1=mysqli_query($link, "SELECT * FROM user_rights_level_2 WHERE UID='$newUID' AND SID='1' AND Access='Yes'");
                                while($view_sub_1=mysqli_fetch_array($query_sub_1))
                                {
                                    $newSSID=$view_sub_1['SSID'];
                                    //Fetch Sub Section Details
                                    $query_sub_sec_1=mysqli_query($link, "SELECT * FROM rights_master_level_2 WHERE ID='$newSSID'");
                                    $view_sub_sec_1=mysqli_fetch_array($query_sub_sec_1);
                                    $newSectionTitle=$view_sub_sec_1['SectionTitle'];
                                    $newURL=$view_sub_sec_1['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                /////////////////
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                    }
                    //Section 2 Access
                    $query_main_2=mysqli_query($link, "SELECT * FROM user_rights_level_1 WHERE UID='$newUID' AND SID='2'");
                    $view_main_2=mysqli_fetch_array($query_main_2);
                    $newAccess_2=$view_main_2['Access'];
                    if($newAccess_2=='Yes' || $newUserType=='Super')
                    {
                    ?>
                    <li>
                        <a href="#">Freelancer Profiles</a>
                        <ul>
                            <?php
                            if($newUserType=='Super')
                            {
                                //Sub Section 2 Super Access
                                $query_sub_2=mysqli_query($link, "SELECT * FROM rights_master_level_2 WHERE MainSID='2' ORDER BY ID ASC");
                                while($view_sub_2=mysqli_fetch_array($query_sub_2))
                                {
                                    $newSectionTitle=$view_sub_2['SectionTitle'];
                                    $newURL=$view_sub_2['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                //////////////////
                            }
                            else
                            {
                                //Sub Section 2 Admin Access
                                $query_sub_2=mysqli_query($link, "SELECT * FROM user_rights_level_2 WHERE UID='$newUID' AND SID='2' AND Access='Yes'");
                                while($view_sub_2=mysqli_fetch_array($query_sub_2))
                                {
                                    $newSSID=$view_sub_2['SSID'];
                                    //Fetch Sub Section Details
                                    $query_sub_sec_2=mysqli_query($link, "SELECT * FROM rights_master_level_2 WHERE ID='$newSSID'");
                                    $view_sub_sec_2=mysqli_fetch_array($query_sub_sec_2);
                                    $newSectionTitle=$view_sub_sec_2['SectionTitle'];
                                    $newURL=$view_sub_sec_2['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                /////////////////
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                    }
                    //Section 3 Access
                    $query_main_3=mysqli_query($link, "SELECT * FROM user_rights_level_1 WHERE UID='$newUID' AND SID='3'");
                    $view_main_3=mysqli_fetch_array($query_main_3);
                    $newAccess_3=$view_main_3['Access'];
                    if($newAccess_3=='Yes' || $newUserType=='Super')
                    {
                    ?>
                    <li>
                        <a href="#">Recruiters</a>
                        <ul>
                            <?php
                            if($newUserType=='Super')
                            {
                                //Sub Section 3 Super Access
                                $query_sub_3=mysqli_query($link, "SELECT * FROM rights_master_level_2 WHERE MainSID='3' ORDER BY ID ASC");
                                while($view_sub_3=mysqli_fetch_array($query_sub_3))
                                {
                                    $newSectionTitle=$view_sub_3['SectionTitle'];
                                    $newURL=$view_sub_3['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                //////////////////
                            }
                            else
                            {
                                //Sub Section 3 Admin Access
                                $query_sub_3=mysqli_query($link, "SELECT * FROM user_rights_level_2 WHERE UID='$newUID' AND SID='3' AND Access='Yes'");
                                while($view_sub_3=mysqli_fetch_array($query_sub_3))
                                {
                                    $newSSID=$view_sub_3['SSID'];
                                    //Fetch Sub Section Details
                                    $query_sub_sec_3=mysqli_query($link, "SELECT * FROM rights_master_level_2 WHERE ID='$newSSID'");
                                    $view_sub_sec_3=mysqli_fetch_array($query_sub_sec_3);
                                    $newSectionTitle=$view_sub_sec_3['SectionTitle'];
                                    $newURL=$view_sub_sec_3['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                /////////////////
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                    }
                    //Section 4 Access
                    $query_main_4=mysqli_query($link, "SELECT * FROM user_rights_level_1 WHERE UID='$newUID' AND SID='4'");
                    $view_main_4=mysqli_fetch_array($query_main_4);
                    $newAccess_4=$view_main_4['Access'];
                    if($newAccess_4=='Yes' || $newUserType=='Super')
                    {
                    ?>
                    <li>
                        <a href="#">Service Requests</a>
                        <ul>
                            <?php
                            if($newUserType=='Super')
                            {
                                //Sub Section 4 Super Access
                                $query_sub_4=mysqli_query($link, "SELECT * FROM rights_master_level_2 WHERE MainSID='4' ORDER BY ID ASC");
                                while($view_sub_4=mysqli_fetch_array($query_sub_4))
                                {
                                    $newSectionTitle=$view_sub_4['SectionTitle'];
                                    $newURL=$view_sub_4['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                //////////////////
                            }
                            else
                            {
                                //Sub Section 4 Admin Access
                                $query_sub_4=mysqli_query($link, "SELECT * FROM user_rights_level_2 WHERE UID='$newUID' AND SID='4' AND Access='Yes'");
                                while($view_sub_4=mysqli_fetch_array($query_sub_4))
                                {
                                    $newSSID=$view_sub_4['SSID'];
                                    //Fetch Sub Section Details
                                    $query_sub_sec_4=mysqli_query($link,  "SELECT * FROM rights_master_level_2 WHERE ID='$newSSID'");
                                    $view_sub_sec_4=mysqli_fetch_array($query_sub_sec_4);
                                    $newSectionTitle=$view_sub_sec_4['SectionTitle'];
                                    $newURL=$view_sub_sec_4['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                /////////////////
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                    }
                    //Section 5 Access
                    $query_main_5=mysqli_query($link, "SELECT * FROM user_rights_level_1 WHERE UID='$newUID' AND SID='5'");
                    $view_main_5=mysqli_fetch_array($query_main_5);
                    $newAccess_5=$view_main_5['Access'];
                    if($newAccess_5=='Yes' || $newUserType=='Super')
                    {
                    ?>
                    <li>
                        <a href="#">User Reviews</a>
                        <ul>
                            <?php
                            if($newUserType=='Super')
                            {
                                //Sub Section 5 Super Access
                                $query_sub_5=mysqli_query($link, "SELECT * FROM rights_master_level_2 WHERE MainSID='5' ORDER BY ID ASC");
                                while($view_sub_5=mysqli_fetch_array($query_sub_5))
                                {
                                    $newSectionTitle=$view_sub_5['SectionTitle'];
                                    $newURL=$view_sub_5['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                //////////////////
                            }
                            else
                            {
                                //Sub Section 5 Admin Access
                                $query_sub_5=mysqli_query($link, "SELECT * FROM user_rights_level_2 WHERE UID='$newUID' AND SID='5' AND Access='Yes'");
                                while($view_sub_5=mysqli_fetch_array($query_sub_5))
                                {
                                    $newSSID=$view_sub_5['SSID'];
                                    //Fetch Sub Section Details
                                    $query_sub_sec_5=mysqli_query($link, "SELECT * FROM rights_master_level_2 WHERE ID='$newSSID'");
                                    $view_sub_sec_5=mysqli_fetch_array($query_sub_sec_5);
                                    $newSectionTitle=$view_sub_sec_5['SectionTitle'];
                                    $newURL=$view_sub_sec_5['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                /////////////////
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                    }
                    //Section 6 Access
                    $query_main_6=mysqli_query($link, "SELECT * FROM user_rights_level_1 WHERE UID='$newUID' AND SID='6'");
                    $view_main_6=mysqli_fetch_array($query_main_6);
                    $newAccess_6=$view_main_6['Access'];
                    if($newAccess_6=='Yes' || $newUserType=='Super')
                    {
                    ?>
                    <li>
                        <a href="#">Banner Management</a>
                        <ul>
                            <?php
                            if($newUserType=='Super')
                            {
                                //Sub Section 6 Super Access
                                $query_sub_6=mysqli_query($link, "SELECT * FROM rights_master_level_2 WHERE MainSID='6' ORDER BY ID ASC");
                                while($view_sub_6=mysqli_fetch_array($query_sub_6))
                                {
                                    $newSectionTitle=$view_sub_6['SectionTitle'];
                                    $newURL=$view_sub_6['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                //////////////////
                            }
                            else
                            {
                                //Sub Section 6 Admin Access
                                $query_sub_6=mysqli_query($link, "SELECT * FROM user_rights_level_2 WHERE UID='$newUID' AND SID='6' AND Access='Yes'");
                                while($view_sub_6=mysqli_fetch_array($query_sub_6))
                                {
                                    $newSSID=$view_sub_6['SSID'];
                                    //Fetch Sub Section Details
                                    $query_sub_sec_6=mysqli_query($link, "SELECT * FROM rights_master_level_2 WHERE ID='$newSSID'");
                                    $view_sub_sec_6=mysqli_fetch_array($query_sub_sec_6);
                                    $newSectionTitle=$view_sub_sec_6['SectionTitle'];
                                    $newURL=$view_sub_sec_6['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                /////////////////
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                    }
                    //Section 7 Access
                    $query_main_7=mysqli_query($link, "SELECT * FROM user_rights_level_1 WHERE UID='$newUID' AND SID='7'");
                    $view_main_7=mysqli_fetch_array($query_main_7);
                    $newAccess_7=$view_main_7['Access'];
                    if($newAccess_7=='Yes' || $newUserType=='Super')
                    {
                    ?>
                    <li>
                        <a href="#">Categories</a>
                        <ul>
                            <?php
                            if($newUserType=='Super')
                            {
                                //Sub Section 7 Super Access
                                $query_sub_7=mysqli_query($link, "SELECT * FROM rights_master_level_2 WHERE MainSID='7' ORDER BY ID ASC");
                                while($view_sub_7=mysqli_fetch_array($query_sub_7))
                                {
                                    $newSectionTitle=$view_sub_7['SectionTitle'];
                                    $newURL=$view_sub_7['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                //////////////////
                            }
                            else
                            {
                                //Sub Section 7 Admin Access
                                $query_sub_7=mysqli_query($link, "SELECT * FROM user_rights_level_2 WHERE UID='$newUID' AND SID='7' AND Access='Yes'");
                                while($view_sub_7=mysqli_fetch_array($query_sub_7))
                                {
                                    $newSSID=$view_sub_7['SSID'];
                                    //Fetch Sub Section Details
                                    $query_sub_sec_7=mysqli_query($link, "SELECT * FROM rights_master_level_2 WHERE ID='$newSSID'");
                                    $view_sub_sec_7=mysqli_fetch_array($query_sub_sec_7);
                                    $newSectionTitle=$view_sub_sec_7['SectionTitle'];
                                    $newURL=$view_sub_sec_7['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                /////////////////
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                    }
                    //Section 8 Access
                    $query_main_8=mysqli_query($link, "SELECT * FROM user_rights_level_1 WHERE UID='$newUID' AND SID='8'");
                    $view_main_8=mysqli_fetch_array($query_main_8);
                    $newAccess_8=$view_main_8['Access'];
                    if($newAccess_8=='Yes' || $newUserType=='Super')
                    {
                    ?>
                    <li>
                        <a href="#">Blogs</a>
                        <ul>
                            <?php
                            if($newUserType=='Super')
                            {
                                //Sub Section 8 Super Access
                                $query_sub_8=mysqli_query($link, "SELECT * FROM rights_master_level_2 WHERE MainSID='8' ORDER BY ID ASC");
                                while($view_sub_8=mysqli_fetch_array($query_sub_8))
                                {
                                    $newSectionTitle=$view_sub_8['SectionTitle'];
                                    $newURL=$view_sub_8['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                //////////////////
                            }
                            else
                            {
                                //Sub Section 8 Admin Access
                                $query_sub_8=mysqli_query($link, "SELECT * FROM user_rights_level_2 WHERE UID='$newUID' AND SID='8' AND Access='Yes'");
                                while($view_sub_8=mysqli_fetch_array($query_sub_8))
                                {
                                    $newSSID=$view_sub_8['SSID'];
                                    //Fetch Sub Section Details
                                    $query_sub_sec_8=mysqli_query($link, "SELECT * FROM rights_master_level_2 WHERE ID='$newSSID'");
                                    $view_sub_sec_8=mysqli_fetch_array($query_sub_sec_8);
                                    $newSectionTitle=$view_sub_sec_8['SectionTitle'];
                                    $newURL=$view_sub_sec_8['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                /////////////////
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                    }
                    //Section 8 Access
                    $query_main_8=mysqli_query($link, "SELECT * FROM user_rights_level_1 WHERE UID='$newUID' AND SID='9'");
                    $view_main_8=mysqli_fetch_array($query_main_8);
                    $newAccess_8=$view_main_8['Access'];
                    if($newAccess_8=='Yes' || $newUserType=='Super')
                    {
                    ?>
                    <li>
                        <a href="#">System Settings</a>
                        <ul>
                            <?php
                            if($newUserType=='Super')
                            {
                                //Sub Section 8 Super Access
                                $query_sub_8=mysqli_query($link, "SELECT * FROM rights_master_level_2 WHERE MainSID='9' ORDER BY ID ASC");
                                while($view_sub_8=mysqli_fetch_array($query_sub_8))
                                {
                                    $newSectionTitle=$view_sub_8['SectionTitle'];
                                    $newURL=$view_sub_8['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                //////////////////
                            }
                            else
                            {
                                //Sub Section 8 Admin Access
                                $query_sub_8=mysqli_query($link, "SELECT * FROM user_rights_level_2 WHERE UID='$newUID' AND SID='9' AND Access='Yes'");
                                while($view_sub_8=mysqli_fetch_array($query_sub_8))
                                {
                                    $newSSID=$view_sub_8['SSID'];
                                    //Fetch Sub Section Details
                                    $query_sub_sec_8=mysqli_query($link, "SELECT * FROM rights_master_level_2 WHERE ID='$newSSID'");
                                    $view_sub_sec_8=mysqli_fetch_array($query_sub_sec_8);
                                    $newSectionTitle=$view_sub_sec_8['SectionTitle'];
                                    $newURL=$view_sub_sec_8['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                /////////////////
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                    }
                    //Section 9 Access
                    $query_main_9=mysqli_query($link, "SELECT * FROM user_rights_level_1 WHERE UID='$newUID' AND SID='10'");
                    $view_main_9=mysqli_fetch_array($query_main_9);
                    $newAccess_9=$view_main_9['Access'];
                    if($newAccess_9=='Yes' || $newUserType=='Super')
                    {
                    ?>
                    <li>
                        <a href="#">Website Controls</a>
                        <ul>
                            <?php
                            if($newUserType=='Super')
                            {
                                //Sub Section 9 Super Access
                                $query_sub_9=mysqli_query($link, "SELECT * FROM rights_master_level_2 WHERE MainSID='10' ORDER BY ID ASC");
                                while($view_sub_9=mysqli_fetch_array($query_sub_9))
                                {
                                    $newSectionTitle=$view_sub_9['SectionTitle'];
                                    $newURL=$view_sub_9['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                //////////////////
                            }
                            else
                            {
                                //Sub Section 9 Admin Access
                                $query_sub_9=mysqli_query($link, "SELECT * FROM user_rights_level_2 WHERE UID='$newUID' AND SID='10' AND Access='Yes'");
                                while($view_sub_9=mysqli_fetch_array($query_sub_9))
                                {
                                    $newSSID=$view_sub_9['SSID'];
                                    //Fetch Sub Section Details
                                    $query_sub_sec_9=mysqli_query($link, "SELECT * FROM rights_master_level_2 WHERE ID='$newSSID'");
                                    $view_sub_sec_9=mysqli_fetch_array($query_sub_sec_9);
                                    $newSectionTitle=$view_sub_sec_9['SectionTitle'];
                                    $newURL=$view_sub_sec_9['URL'];
                                    ?>
                                    <li><a href="#" id="<?php echo $newURL; ?>"><?php echo $newSectionTitle; ?></a></li>
                                    <?php
                                }
                                /////////////////
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
                <!-- Left Menu Ends -->
            </div>

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="padding:0px" id="dataPanel">

                <!-- Content Holder Row Starts -->
                <div id="middleArea" style="margin-top:50px; height:92vh; overflow:hidden; overflow-y:auto; border:solid 0px #CC0"></div>
                <!-- Content Holder Row Ends -->

            </div>

            <!--<div class="hidden" style="margin-top:50px; padding:0px;" id="formPanel">-->
            <div style="margin-top:50px; padding:0px;" id="formPanel">
                <!-- Form Panel Starts -->
                <div id="formArea">
                    Form Panel
                </div>
                <!-- Form Panel Ends -->
            </div>

        </div>
    </div>

    <!-- Work Area Ends -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/common-functions.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/menu.js"></script>
    <!--<script src="js/docs.min.js"></script>-->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <!--<script src="js/jquery.nicescroll.js"></script>-->

    <script>
    $(document).ready(function(){
        //Default Dashbard Page///////////
        $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Dashboard...<br/><br/><img src="images/preloader_clock.gif" /></div>');
        closeForm();
        $("#middleArea").load("view/dashboard");

        //Function for Freelancers Ragistration
        $('#freelancersAll').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Freelancers Ragistrations...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/freelancersAll");
        });

        //Function for New Users
        $('#newUsers').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading New Users...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/newUsers");
        });

        //Function for Admin Settings
        $('#btnAdminSettings').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Settings...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/settingsAdmin");
        });

        //Function for Super Settings
        $('#btnSuperSettings').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Settings...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/settingsSuper");
        });

        //////TOP LEVEL LINKS////////////
        //Function for Dashboard
        $('#dashboard').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Dashboard...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/dashboard");
        });

        //Function for New Orders
        $('#newOrders').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading New Orders...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/newOrders");
        });

        //Function for New Users
        $('#newUsers').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading New Users...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/newUsers");
        });

        //Function for Admin Settings
        $('#btnAdminSettings').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Settings...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/settingsAdmin");
        });

        //Function for Super Settings
        $('#btnSuperSettings').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Settings...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/settingsSuper");
        });





        //////LEVEL-ONE FREELANCERS////////////
        //Function for Freelancer Registrations
        $('#freelancerNewRegistration').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading New Registrations...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/freelancerNewRegistration");
        });

        //Function for Active Freelancers
        $('#freelancerActive').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Active Registration...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/freelancerActive");
        });

        //Function for Blocked Freelancers
        $('#freelanceBlocked').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Blocked Registrations...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/freelanceBlocked");
        });




        //////LEVEL-TWO FREELANCERS PROFILE////////////
        //Function for New Profiles
        $('#freelancerProfiles').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Freelancer Profiles...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/freelancerProfiles");
        });

        //Function for Active Profiles
        $('#freelancerActiveProfile').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Active Profile...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/freelancerActiveProfile");
        });

        //Function for Blocked Profiles
        $('#freelancerBlockedProfile').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Blocked Profile...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/freelancerBlockedProfile");
        });




        //////LEVEL-THREE RECRUITERS////////////
        //Function for Recruiter Registratons
        $('#recruiterNewRegistration').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Recruiters Registrations...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/recruiterNewRegistration");
        });

        //Function for Active Recruiters
        $('#recruiterActive').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Active Recruiters...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/recruiterActive");
        });

        //Function for Blocked Recruiters
        $('#recruiterBlocked').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Blocked Recruiters...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/recruiterBlocked");
        });




        //////LEVEL-FOUR SERVICES REQUEST////////////
        //Function for New Requests
        $('#servicesNewRequest').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading New Service Request...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/servicesNewRequest");
        });

        //Function for Post Requests
        $('#servicesPastRequest').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Past Service Request...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/servicesPastRequest");
        });





        //////LEVEL-FIVE REVIEWS////////////
        //Function for New Reviews
        $('#reviewsNew').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Latest Reviews...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/reviewsNew");
        });

        //Function for Active Reviews
        $('#reviewsActive').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Active Reviews...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/reviewsActive");
        });

        //Function for Blocked Reviews
        $('#reviewsBlocked').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Blocked Reviews...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/reviewsBlocked");
        });




        //////LEVEL-SIX BANNERS////////////
        //Function for Home Banners
        $('#bannerHomePage').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Home Page Banners...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/bannerHomePage");
        });

        //Function for Listing Page Banners
        $('#bannerListingPage').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Listing Page Banners...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/bannerListingPage");
        });

        //Function for Profile Page Banners
        $('#bannerProfilePage').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Profile Page Banners...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/bannerProfilePage");
        });

        //Function for Registration Page Banners
        $('#bannerRegistrationPage').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Registration Page Banners...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/bannerRegistrationPage");
        });





        //////LEVEL-SEVEN CATEGORIES////////////
        //Function for Main Categories
        $('#categoriesMain').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Main Categories...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/categoriesMain");
        });

        //Function for Sub-Categories
        $('#categoriesSub').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Sub Categories...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/categoriesSub");
        });




        //////LEVEL-EIGHT BLOGS////////////
        //Function for All Blogs
        $('#blogAll').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading All Blog...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/blogAll");
        });

        //Function for Blog Comments
        $('#blogComments').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Blog Comments...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/blogComments");
        });

        //Function for Blog Authours
        $('#blogAuthour').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Blog Authour...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/blogAuthour");
        });




        //////LEVEL-NINE SYSTEM SETTINGS////////////
        //Function for Languages
        $('#languages').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Languages...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/languages");
        });

        //Function for System Users
        $('#systemUsers').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading System Users...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/systemUsers");
        });

        //Function for User Rights
        $('#userRights').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading User Rights...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/userRights");
        });





        //////LEVEL-TEN WEBSITE CONTROLS////////////
        //Function for Themes
        $('#themes').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Themes...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/themes");
        });

        //Function for Theme Customization
        $('#themeCustomization').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Customize Theme...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/themeCustomization");
        });

        //Function for SEO Home Page
        $('#seoHomePage').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading SEO Home Page...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/seoHomePage");
        });

        //Function for SEO Listing Page
        $('#seoListingPage').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading SEO Listing Page...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/seoListingPage");
        });

        //Function for SEO Profile Page
        $('#seoProfilePage').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading SEO Profile Page...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/seoProfilePage");
        });

        //Function for Manage About Us
        $('#manageAboutUs').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Manage About Us...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/manageAboutUs");
        });

        //Function for Manage FAQs
        $('#manageFaqs').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Manage Faqs...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/manageFaqs");
        });

        //Function for Manage Terms of Services
        $('#manageTermsOfServices').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Manage Terms Of Services...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/manageTermsOfServices");
        });

        //Function for Manage Privacy Policy
        $('#managePrivacyPolicy').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Manage Privacy Policy...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/managePrivacyPolicy");
        });

        //Function for Manage Bottom Links
        $('#manageBottomLinks').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Manage Bottom Links...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/manageBottomLinks");
        });

        //Function for Manage Social Network
        $('#manageSocialNetwork').click(function(){
            $("#middleArea").html('<div style="margin-top:25px; margin-left:25px">Loading Manage Social Network...<br/><br/><img src="images/preloader_clock.gif" /></div>');
            closeForm();
            $("#middleArea").load("view/manageSocialNetwork");
        });

    });

    //Fetch New Orders ------------------------------>>
    if(typeof(EventSource) !== "undefined")
    {
        var source = new EventSource("checkNewOrders.php");
        source.onmessage = function(event)
        {
            document.getElementById("resultNewOrders").innerHTML = event.data;
        };
    }
    else
    {
        document.getElementById("resultNewUsers").innerHTML = "0";
    }

    //Fetch New Users ------------------------------->>
    if(typeof(EventSource) !== "undefined")
    {
        var source = new EventSource("checkNewUsers.php");
        source.onmessage = function(event)
        {
            document.getElementById("resultNewUsers").innerHTML = event.data;
        };
    }
    else
    {
        document.getElementById("resultNewUsers").innerHTML = "0";
    }
    </script>

  </body>
</html>
