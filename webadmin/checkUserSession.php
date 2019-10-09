<?php
error_reporting(0);
session_start();
if(!$_SESSION['wsAdminUser'])
{
    ?>
    <script type="text/javascript">
    window.location="./";
    </script>
    <?php
}
else
{
    $username=$_SESSION['wsAdminUser'];
}
?>
