<?php

    include_once("../config/connection.php");

    //Check Existing Records
    $existingContact=is_numeric($_POST["txt_contact"]);

    if($existingContact==1)
    {
        //If Entered Mobile Number
        $checkMobile=$_POST["txt_contact"];
        $queryFindMobile = mysqli_query($link,"SELECT * FROM recruiter_registration WHERE Mobile='$checkMobile'");
        $queryCountMobile = mysqli_num_rows($queryFindMobile);
        
        if($queryCountMobile!=0)
        {
            //Mobile Number is Already Used
            echo 'MobileRepeat';
        }
        else
        {
            //Mobile Number New Entry
            //Check First Name
            if(empty($_POST["txt_fname"]))
            {
                echo 'FNameEmptyErr';
            }
            else
            {
                //Check First Name String
                $name = test_input($_POST["txt_fname"]);
                if(!preg_match("/^[a-zA-Z' ]*$/",$name))
                {
                    echo 'FNameNumberErr';
                }
                else
                {
                    //First Name OK - Check Last Name
                    //Check Last Name
                    if(empty($_POST["txt_lname"]))
                    {
                        echo 'LNameEmptyErr';
                    }
                    //Check Latst Name String
                    $name = test_input($_POST["txt_lname"]);
                    if(!preg_match("/^[a-zA-Z' ]*$/",$name))
                    {
                        echo 'LNameNumberErr';
                    }
                    else
                    {
                        //Check Empty Password
                        if(empty($_POST["txt_pass"]))
                        {
                            echo 'PassEmptyErr';
                        }
                        else
                        {
                            //Insert Records with Mobile Number
                            $newFName=ucfirst(strtolower($_POST["txt_fname"]));
                            $newLName=ucfirst(strtolower($_POST["txt_lname"]));
                            $newContact=$_POST["txt_contact"];
                            $newPass=$_POST["txt_pass"];
                            $newGender=$_POST["userGender"];
                            $userDD=$_GET['DD'];
                            $userMM=$_GET['MM'];
                            $userYY=$_GET['YY'];
                            $userBOD=$userDD.'/'.$userMM.'/'.$userYY;
                            
                            //Insert Into DB
                            $query_1=mysqli_query($link, "INSERT INTO recruiter_registration SET FirstName='$newFName', LastName='$newLName', Mobile='$newContact', DOB='$userBOD', Gender='$newGender', Password='$newPass', CreateDate=now(), CreateTime=now(), PaidPhoto='No', PaidBanners='No', PaidListing='No', Status='Wizard'");
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
            }
        }
        
    }
    else
    {
        //If Entered Email ID
        $checkEmail=$_POST["txt_contact"];
        $queryFindEmail = mysqli_query($link,"SELECT * FROM recruiter_registration WHERE EmailID='$checkEmail'");
        $queryCountEmail = mysqli_num_rows($queryFindEmail);
        
        if($queryCountEmail!=0)
        {
            //Email ID is Already Used
            echo 'EmailRepeat';
        }
        else
        {
            //Email ID New Entry
            //Check First Name
            if(empty($_POST["txt_fname"]))
            {
                echo 'FNameEmptyErr';
            }
            else
            {
                //Check First Name String
                $name = test_input($_POST["txt_fname"]);
                if(!preg_match("/^[a-zA-Z' ]*$/",$name))
                {
                    echo 'FNameNumberErr';
                }
                else
                {
                    //First Name OK - Check Last Name
                    //Check Last Name
                    if(empty($_POST["txt_lname"]))
                    {
                        echo 'LNameEmptyErr';
                    }
                    //Check Latst Name String
                    $name = test_input($_POST["txt_lname"]);
                    if(!preg_match("/^[a-zA-Z' ]*$/",$name))
                    {
                        echo 'LNameNumberErr';
                    }
                    else
                    {
                        //Check Empty Password
                        if(empty($_POST["txt_pass"]))
                        {
                            echo 'PassEmptyErr';
                        }
                        else
                        {
                            //Insert Records with Mobile Number
                            $newFName=ucfirst(strtolower($_POST["txt_fname"]));
                            $newLName=ucfirst(strtolower($_POST["txt_lname"]));
                            $newContact=strtolower($_POST["txt_contact"]);
                            $newPass=$_POST["txt_pass"];
                            $newGender=$_POST["userGender"];
                            $userDD=$_GET['DD'];
                            $userMM=$_GET['MM'];
                            $userYY=$_GET['YY'];
                            $userBOD=$userDD.'/'.$userMM.'/'.$userYY;
                            
                            //Insert Into DB
                            $query_1=mysqli_query($link, "INSERT INTO recruiter_registration SET FirstName='$newFName', LastName='$newLName', EmailID='$newContact', DOB='$userBOD', Gender='$newGender', Password='$newPass', CreateDate=now(), CreateTime=now(), PaidPhoto='No', PaidBanners='No', PaidListing='No', Status='Wizard'");
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
            }
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
