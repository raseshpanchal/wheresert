<?php
include("../../config/connection.php");
include("../../config/myDecode.php");

$myFullName=$_POST['txt_fullName'];
$newFullName=filter_var($myFullName, FILTER_SANITIZE_STRING);

$myEmail=trim(strtolower($_POST['txt_email']));
$newEmail=str_replace(' ', '', $myEmail);

$myUserName=trim(strtolower($_POST['txt_username']));
$newUserName=str_replace(' ', '', $myUserName);
$newUserName=filter_var($newUserName, FILTER_SANITIZE_STRING);

$myPassword=rand(111111, 999999);

//Publish Online
$myPublish=$_POST['chk_publish'];
if(!$myPublish)
{
    $myPublish = 'No';
}
else
{
    $myPublish = 'Yes';
}

//Validate Email ID
if(!filter_var($newEmail, FILTER_VALIDATE_EMAIL) === false)
{
    //Check Existing Records
    $query_1=mysqli_query($link, "SELECT * FROM admin_login WHERE Email='$myEmail'");
    $email_rows=mysqli_num_rows($query_1);

    if($email_rows!=0)
    {
        echo 'errorEmailExist';
    }
    else
    {
        //Check Existing User Name
        $query_2=mysqli_query($link, "SELECT * FROM admin_login WHERE UserName='$newUserName'");
        $user_rows=mysqli_num_rows($query_2);

        if($user_rows!=0)
        {
            echo 'errorUserExist';
        }
        else
        {
            //Insert Into DB
            $query_3=mysqli_query($link, "INSERT INTO admin_login SET CreateDate=now(), UserType='Admin', FullName='$newFullName', Email='$newEmail', UserName='$newUserName', Password='$myPassword',  Publish='$myPublish'");

            //Find User ID
            $queryUID=mysqli_query($link, "SELECT * FROM admin_login WHERE Email='$newEmail'");
            $viewUID=mysqli_fetch_array($queryUID);
            $UID=$viewUID['ID'];

            //Insert Main-Section Rights
            $queryMain=mysqli_query($link, "SELECT * FROM rights_master_level_1 ORDER BY ID ASC");
            while($viewMain=mysqli_fetch_array($queryMain))
            {
                $SID=$viewMain['ID'];
                //Insert Into DB
                $queryLevel_1=mysqli_query($link, "INSERT INTO user_rights_level_1 SET UID='$UID', SID='$SID', Access='No'");
            }

            //Insert Sub-Section Rights
            $querySub=mysqli_query($link, "SELECT * FROM rights_master_level_2 ORDER BY ID ASC");
            while($viewSub=mysqli_fetch_array($querySub))
            {
                $SSID=$viewSub['ID'];
                $SID=$viewSub['MainSID'];
                //Insert Into DB
                $queryLevel_2=mysqli_query($link, "INSERT INTO user_rights_level_2 SET UID='$UID', SID='$SID', SSID='$SSID', Access='No', UserAdd='No', UserEdit='No', UserDel='No', UserView='No', UserExp='No'");
            }

            if($query_3)
            {
                echo 'regiSuccess';
            }
            /*
            if($query_3)
            {
                //Send Email
                $to=trim($newEmail);
                $from = 'Gismo Bucket'.PHP_EOL;
                $subject = 'Web Admin Registration'.PHP_EOL;
                $header = 'From:Gismo Bucket Registration <noreply@gismobucket.com>\r\n'.PHP_EOL;
                $header .= 'Reply-To:noreply@gismobucket.com\r\n'.PHP_EOL;
                $header .= 'MIME-Version: 1.0\r\n'.PHP_EOL;
                $header .= 'Content-Type: text/html; charset=ISO-8859-1\r\n'.PHP_EOL;

                $message = '<html><body>';
                $message .= '<p>Dear <b>'.$newFullName.'</b>,<p>';
                $message .= '<p>';
                $message .= 'Welcome to GismoBucket.com family. You have registered as an Admin User with Gismo Bucket.';
                $message .= '<br/><br/>';
                $message .= 'Your login details are as follows:<br/>';
                $message .= 'User : '.$newUserName.'<br/>';
                $message .= 'Pass : '.$myPassword.'<br/><br/>';
                $message .= 'You can login on the following URL to start using web admin.';
                $message .= 'http://www.gismobucket.com/webadmin';
                $message .= '</a><br/><br/>Note: If you have problems with the provided authentication details and/or system link, kindly contact Gismo Bucket System Administrator.';
                $message .= '<br/><br/>Please do not reply this message, as no recipient has been designated.<br/>';
                $message .= 'Replying this message will not confirm our registration.<br/><br/>';
                $message .= 'Yours Sincerely,<br/>The Gismo Bucket Team<br/><br/>';
                $message .= 'Privacy Statement: gismobucket.com takes your privacy seriously. Because we gather certain information about our sellers, we want you to clearly understand the terms and conditions surrounding collection and use of the information. We encourage you to review our privacy policy: ';
                $message .= '<a href="http://www.gismobucket.com/terms-and-conditions.html">Gismo Bucket Terms & Conditions.</a>';
                $message .= '</p>';
                $message .= '</body></html>';
                /////////////////////////////////////////

                $sentmail_1=mail($to, $subject, $message, $header, "noreply@gismobucket.com");

                if($sentmail_1)
                {
                    echo 'regiSuccess';
                }
                ///////////////
            }
            */
        ///////////////------------->
        }
    }
}
else
{
    echo 'errorValidEmail';
}
?>
