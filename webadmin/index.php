<?php
session_start();
include("../config/connection.php");
?>
<html>
<head>
<title> WhereSert : : : : : : : : :</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery.min.js"></script>
<style>
body
{
    background-image:url(images/bg-img-new.jpg);
    background-repeat:no-repeat;
    background-position:center middle;
}
#wrapper
{
    position:absolute;
    width:100%;
    height:100%;
    top:0;
    left:0;
    overflow:hidden;
    border:solid 0px #000;
}
.box
{
    position: relative;
    width:250px;
    height:170px;
    padding:20px;
    left:50%;
    margin-left:-125px;
    top:50%;
    margin-top:-85px;
    background-color:#424a5d;
    border-radius: 10px;
}
.text_SmallBlk {
    font-family: Arial, Verdana, Geneva, sans-serif;
    font-size: 10pt;
    color: #000;
    font-weight:normal;
}
.text_SmallWht {
    font-family: Arial, Verdana, Geneva, sans-serif;
    font-size: 10pt;
    color: #FFF;
    font-weight:normal;
}
</style>
<script language="javascript">
function validLogin()
{
    var myform = document.getElementById("myForm");

    if((myform.txt_user.value=="") || (myform.txt_user.value==" "))
    {
        alert("Please Enter User Name");
        myform.txt_user.focus();
        return
    }

    if((myform.txt_pass.value=="") || (myform.txt_pass.value==" "))
    {
        alert("Please Enter Password");
        myform.txt_pass.focus();
        return;
    }

}

$(document).ready(function(){

    //Function for Counting Table Rows
    $("#btnSave").click(function(){
        $.post("checkUserLogin",
        $("#myForm").serialize(),
        function(data){
            if(data==0)
            {
                $('#showAlert').html('Wrong Entry').fadeIn(300);
                $("#showAlert").delay(1500).fadeOut(300);
                $('#txt_user').val('');
                $('#txt_pass').val('');
            }
            else if(data==1)
            {
                $('#showAlert').html('Invalid User').fadeIn(300);
                $("#showAlert").delay(1500).fadeOut(300);
                $('#txt_user').val('');
                $('#txt_pass').val('');
            }
            else if(data==2)
            {
                $('#showAlert').html('Wrong Password').fadeIn(300);
                $("#showAlert").delay(1500).fadeOut(300);
                $('#txt_pass').val('');
            }
            else if(data==3)
            {
                $('#showAlert').html('Blocked User').fadeIn(300);
                $("#showAlert").delay(1500).fadeOut(300);
                $('#txt_user').val('');
                $('#txt_pass').val('');
            }
            else if(data==4)
            {
                $('#showAlert').html('User Authenticated...').fadeIn(300);
                $("#showAlert").delay(1500).fadeOut(300);
                window.location = 'home';
            }
        });
        return false;
    });

});
</script>
</head>

<body marginheight="0" marginwidth="0" topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0">
<div id="wrapper">
    <div class="box">
    <!-- Inner Box Starts -->
    <form name="myForm" id="myForm" method="POST">
        <div class="row" style="padding:5px">
            <div class="col-xs-12">
                <input name="txt_user" id="txt_user" id="txt_user" type="text" class="form-control" placeholder="User Name" />
            </div>
        </div>

        <div class="row" style="padding:5px">
            <div class="col-xs-12">
                <input name="txt_pass" id="txt_pass" type="password" id="txt_pass" class="form-control" placeholder="Password" />
            </div>
        </div>

        <div class="row" style="padding:5px">
            <div class="col-xs-12" style="text-align:right">
                <button type="submit" class="btn btn-warning" style="width:100%" id="btnSave" onMouseDown="validLogin()">Login</button>
            </div>
        </div>
    </form>
    <!-- Inner Box Ends -->
    <div id="showAlert" style="border:solid 1px #C00; margin-top:30px; height:25px; background-color:#F00; color:#FFF; text-align:center; display:none"></div>
    </div>

</div>
</body>
</html>
