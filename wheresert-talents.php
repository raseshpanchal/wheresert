<?php
    error_reporting(0);
    //session_start();
    include_once("config/connection.php");
    include_once('userInfo.php');
    include_once('pageInfo.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>WHERESERT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bulma.css">
    <link rel="stylesheet" href="css/website.css">
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>

<body>

    <!--Top Menu Starts-->
    <?php
    include_once('topInner.php');
    ?>
    <!--Top Menu Ends-->


    <section class="section greenSection" style="margin-top:50px">
        <div class="container">
            <h2 class="subtitle">
                WhereSert Talents
            </h2>
        </div>
    </section>

    <section class="section">
        <div class="container">

        </div>
    </section>


    <!--Footer Starts-->
    <?php include_once('footer.php'); ?>
    <!--Footer Ends-->

    <!--Copyrights Start-->
    <?php include_once('copyrights.php'); ?>
    <!--Copyrights End-->




</body>

</html>
