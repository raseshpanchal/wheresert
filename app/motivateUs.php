<?php

    if(empty($_POST["txt_name"]))
    {
        echo 'NameEmptyErr';
    }
    else
    {
        $name = test_input($_POST["txt_name"]);
        //Check if name only contains letters
        if(!preg_match("/^[a-zA-Z' ]*$/",$name))
        {
            echo 'NameNumberErr';
        }
        else
        {
            $myName = $_POST['txt_name'];
            checkContact();
        }
    }


    function checkContact()
    {
        include_once("../config/connection.php");
        //Contact Input //Email OR Mobile
        if(empty($_POST["txt_contact"]))
        {
            echo 'ContactEmptyErr';
        }
        else
        {
            //Check Contact is Number OR Email
            $checkContact=is_numeric($_POST["txt_contact"]);

            if($checkContact==1)
            {
                if(!preg_match("/^[7-9]{1}[0-9]{9}$/i", $_POST["txt_contact"]))
                {
                    echo 'ContactMobileErr';
                }
                else
                {
                    $myName = $_POST['txt_name'];
                    $myContact = $_POST['txt_contact'];
                    $myComment = urlencode($_POST['txt_comment']);
                    //Insert Into DB
                    $query_1=mysqli_query($link, "INSERT INTO motivate_us SET UserName='$myName', EmailMobile='$myContact', UserComment='$myComment', PostDate=now(), PostTime=now(), Publish='Yes'");
                    if($query_1)
                    {
                        echo '1';
                    }
                    else
                    {
                        echo '0';
                    }
                }
            }
            else
            {
                $email = test_input($_POST["txt_contact"]);
                if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    echo 'ContactEmailErr';
                }
                else
                {
                    $myName = $_POST['txt_name'];
                    $myContact = $_POST['txt_contact'];
                    $myComment = urlencode($_POST['txt_comment']);
                    //Insert Into DB
                    $query_1=mysqli_query($link, "INSERT INTO motivate_us SET UserName='$myName', EmailMobile='$myContact', UserComment='$myComment', PostDate=now(), PostTime=now(), Publish='Yes'");
                    if($query_1)
                    {
                        echo '1';
                    }
                    else
                    {
                        echo '0';
                    }
                }
            }

        }
    ////////////////////////////
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


?>
