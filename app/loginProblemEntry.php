<?php
//error_reporting(0);
include_once("../config/connection.php");


$newEmail=$_POST['txt_email'];

if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL))
{
    echo 'notEmail';
}
else
{
    //Check Existing Record of Email ID
    $query_1=mysqli_query($link, "SELECT * FROM freelancer_registration WHERE EmailID='$newEmail'");
    $view_email=mysqli_num_rows($query_1);
    if($view_email!=0)
    {
        //Fetch User's Data
        $query_2=mysqli_query($link, "SELECT * FROM freelancer_registration WHERE EmailID='$newEmail'");
        $view_2=mysqli_fetch_array($query_2);
        $newFirstName=$view_2['FirstName'];
        $newLastName=$view_2['LastName'];

        $newFullName=$newFirstName.' '.$newLastName;

        //Code for Sending e-mail to User
        $to=$newEmail;
        $from = "WhereSert";
        $subject="WhereSert Change Password";
        $header = "From:WhereSert <noreply@wheresert.com>"."\r\n";
        $header .= "Reply-To:noreply@wheresert.com";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = '<html>

            <body>';
                $message .= '<p>Dear <b>'.$newFullName.'</b>,<p>';
                        $message .= '<p>';
                            $message .= 'Thank you for using password recovery services at wheresert.com!<br /><br />In order to retrieve your password,<br />please click the link below to confirm your request and verify your registered e-mail ID:';
                            $message .= '<br /><br />';
                            $message .= '<a href="https://www.wheresert.com/changePassword?ID='.myEncode($newEmail).'">';
                                $message .= 'https://www.wheresert.com/changePassword?ID='.myEncode($newEmail);
                                $message .= '</a><br /><br />Note: If you have problems with the provided link, simply copy and paste the link above into your browser address bar.';
                            $message .= '<br /><br />If you not requested for password recovery request, then simply ignore this email<br />';
                            $message .= 'This is system generated email. ';
                            $message .= 'Please do not reply this message, as no recipient has been designated.<br /><br />';
                            $message .= 'Yours Sincerely,<br />WhereSert Team<br /><br />';
                            $message .= '</p>';
                        $message .= '</body>

            </html>';

            $sentmail_1=mail($to, $subject, $message, $header, "noreply@wheresert.com");
            /////////////////////////////////////////

            if($sentmail_1)
            {
                //Alert for Front End Page
                echo 'emailSuccess';
            }
        }
        else
        {
            echo 'emailErr';
        }
}
?>
