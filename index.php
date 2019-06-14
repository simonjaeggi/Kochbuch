<?php
$message="";
$error="";
$nav = "<a href='/Kochbuch/' class='navbar-item  is-active'>Rezepte</a>
            <a href='rezeptaufnahme.php' class='navbar-item'>Rezeptaufnahme</a>
            <a href='impressum.php' class='navbar-item'>Impressum</a>";
session_start();
?>
<?php include("includes/LoginButton.php"); ?>



<?php include("includes/filestart.php"); ?>
<!-- Fill content from here -->


<!-- Fill content to here -->
<?php include("includes/fileend.php"); ?>