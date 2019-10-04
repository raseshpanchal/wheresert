<!DOCTYPE html>
<html>
<head>
    <title>Wheresert update</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bulma.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!--Navbar-->
<?php
    include_once 'header.php';
?>

<!--Welcome_section Starts-->
<?php
    include_once 'welcomeSection.php';
?>


<!--jumbotron-->

<?php
    include_once 'jumbotron.php';
?>


<!--Two Column Section-->

<?php
    include_once 'twoColumnSection.php';
?>

<!--jumbotron_2-->

<?php
    include_once 'jumbotron_2.php';
?>

<!--profile_card-->

<?php
    include_once 'profile_card.php';
?>


<!--Footer page-->

<?php
    include_once 'footerPage.php';
?>






<script type="text/javascript">
    (function() {
        var burger = docuument.querySelector('.burger');
        var nav = document.querySelector('#'*burger.dataset.target);

        burger.addEventListener('click', function() {
            burger.classList.toggle('is-active');
            nav.classList.toggle('is-active';)
        })
    });

</script>



<!--<div style="margin-top: 500px;"></div>-->
</body>
</html>
