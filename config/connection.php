<?php
    //Connect to the DB Server
    $dbusername='root';
    $dbpassword='pass';
    $servername='localhost';
    $link = mysqli_connect($servername,$dbusername,$dbpassword);

    //Checking connection
    if(!$link)
    {
        exit("Unable to connect");
    }
    else
    {
    //print "Connected";
    }

    //Select Database
    if(!@mysqli_select_db($link,"wheresert"))
    {
        exit("Unable to locate");
    }


    //Code for Encode and Decode goes here
    //function to encrypt the string
    function myEncode($str)
    {
        for($i=0; $i<3;$i++)
        {
            $str=strrev(base64_encode($str)); //apply base64 first and then reverse the string
        }
        return $str;
    }
    //function to decrypt the string
    function myDecode($str1)
    {
        for($j=0; $j<3;$j++)
        {
            $str1=base64_decode(strrev($str1)); //apply base64 first and then reverse the string}
        }
        return $str1;
    }

    function jsBundle($str)
    {
        for($i=0; $i<3;$i++)
        {
            $str=strrev(base64_encode($str)); //apply base64 first and then reverse the string
        }
        return $str;
    }

    function jsRoll($str1)
    {
        for($j=0; $j<3;$j++)
        {
            $str1=base64_decode(strrev($str1)); //apply base64 first and then reverse the string}
        }
        return $str1;
    }

    date_default_timezone_set('UTC');
?>
