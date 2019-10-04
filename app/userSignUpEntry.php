<?php

    if(empty($_POST["txt_fname"]))
    {
        echo 'NameEmptyErr';
    }
    else
    {
        $name = test_input($_POST["txt_fname"]);
        //Check if name only contains letters
        if(!preg_match("/^[a-zA-Z' ]*$/",$name))
        {
            echo 'NameNumberErr';
        }
        else
        {
            //$myFirstName = $_POST['txt_fname'];
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
                    $myFirstName = $_POST['txt_fname'];
                    $myLastName = $_POST['txt_lname'];
                    $myContact = $_POST['txt_contact'];
                    $myPassword = $_POST['txt_pass'];
                    $myGender = $_POST['userGender'];
                    $userDD=$_GET['DD'];
                    $userMM=$_GET['MM'];
                    $userYY=$_GET['YY'];
                    $userBOD=$userDD.'/'.$userMM.'/'.$userYY;
                    //Insert Into DB
                    $query_1=mysqli_query($link, "INSERT INTO freelancer_registration SET FirstName='$myFirstName', LastName='$myLastName', Mobile='$myContact', DOB='$userBOD', Gender='$myGender', Password='$myPassword', CreateDate=now(), CreateTime=now(), PaidPhoto='No', PaidBanners='No', PaidListing='No', Status='New'");
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
                    $myFirstName = $_POST['txt_fname'];
                    $myLastName = $_POST['txt_lname'];
                    $myContact = $_POST['txt_contact'];
                    $myPassword = $_POST['txt_pass'];    
                    $myGender = $_POST['userGender'];
                    $userDD=$_GET['DD'];
                    $userMM=$_GET['MM'];
                    $userYY=$_GET['YY'];
                    $userBOD=$userDD.'/'.$userMM.'/'.$userYY;
                    //Insert Into DB
                    $query_1=mysqli_query($link, "INSERT INTO freelancer_registration SET FirstName='$myFirstName', LastName='$myLastName', EmailID='$myContact', DOB='$userBOD', Gender='$myGender', Password='$myPassword', CreateDate=now(), CreateTime=now(), PaidPhoto='No', PaidBanners='No', PaidListing='No', Status='New'");
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
