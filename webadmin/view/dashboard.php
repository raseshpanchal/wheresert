<?php
error_reporting(0);
include("../../config/connection.php");
?>
<style>
.row.no-gutter {
  margin-left: 0;
  margin-right: 0;
}

.box{
    background-color:#ffffff;
    border:solid 1px #bbbfca;
    height:125px;
    border-radius:5px;
}

.icon-01-img{
    background-image:url(./dashboard/icon-01.png);
    background-repeat:no-repeat;
    background-position:bottom left;
    background-position: 15px 50px;
    text-align:right;
}
.icon-02-img{
    background-image:url(./dashboard/icon-02.png);
    background-repeat:no-repeat;
    background-position:bottom left;
    background-position: 15px 50px;
    text-align:right;
}
.icon-03-img{
    background-image:url(./dashboard/icon-03.png);
    background-repeat:no-repeat;
    background-position:bottom left;
    background-position: 15px 50px;
    text-align:right;
}
.icon-04-img{
    background-image:url(./dashboard/icon-04.png);
    background-repeat:no-repeat;
    background-position:bottom left;
    background-position: 15px 50px;
    text-align:right;
}


.bigFig{
    /*font-family:Verdana, Geneva, sans-serif;*/
    font-family:Arial, Helvetica, sans-serif;
    font-weight:normal;
    color:#ffd777;
    font-size:45pt;
    padding-top:10px;
}

.title{
    font-family:Verdana, Geneva, sans-serif;
    color:#4a5779;
    font-weight:bold;
}


</style>
<!-- Row-1 Starts -->
<div class="row no-gutter" style="padding:15px;">
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding-left:0px;">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box icon-01-img" style="padding-left:95px;">
            <p align="right" class="bigFig" style="border:solid 0px #30F; height:80px;" id="dis_001">0</p>
            <span class="title">Total Freelancers</span>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding-left:0px;">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box icon-02-img">
            <p align="right" class="bigFig" style="border:solid 0px #30F; height:80px;" id="dis_002">0</p>
            <span class="title">Total Recruiters</span>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding-left:0px; padding-right:0px;">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box icon-03-img">
            <p align="right" class="bigFig" style="border:solid 0px #30F; height:80px;" id="dis_003">0</p>
            <span class="title">Total Service Request</span>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding-right:0px">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box icon-04-img">
            <p align="right" class="bigFig" style="border:solid 0px #30F; height:80px;" id="dis_004">0</p>
            <span class="title">Active Paid Banners</span>
        </div>
    </div>
</div>
<!-- Row-1 Ends -->

<!-- Row-2 Starts -->
<div class="row" style="padding-left:15px; padding-right:15px; height:80%">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="height:100%;">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box" style="margin-bottom:15px; height:50%; padding-top:10px;">
            <span class="title">This Month's Sales</span>
            <div id="dis_005">
            Records not available
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-left:0px; padding-right:0px; height:100%">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box" style="height:50%; padding-top:10px;">
                <span class="title">Quick Reminders</span>
                <div id="dis_006">
                Records not available
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-right:0px; height:100%">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box" style="height:50%; padding-top:10px;">
                <span class="title">Top Services</span>
                <div id="dis_007">
                Records not available
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="height:100%; padding-left:0px; padding-right:6px;">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box" style="margin-bottom:15px; height:100%; padding-top:10px;">
            <span class="title">Delivering Invoices</span>
            <div id="dis_008">
            Records not available
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="height:100%; padding-left:7px;">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box" style="height:50%; margin-bottom:15px; padding-top:10px;">
            <span class="title">Delivered Invoices</span>
            <div id="dis_009">
            Records not available
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box" style="height:50%; padding-top:10px;">
            <span class="title">Non-Delivering Invoices</span>
            <div id="dis_010">
            Records not available
            </div>
        </div>
    </div>
</div>
<!-- Row-2 Ends -->
