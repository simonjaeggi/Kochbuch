<?php
$message="";
$error="";
$nav = "<a href='/Kochbuch/' class='navbar-item  is-active'>Rezepte</a>
            <a href='rezeptaufnahme.php' class='navbar-item'>Rezeptaufnahme</a>
            <a href='impressum.php' class='navbar-item'>Impressum</a>";
session_start();
if (isset($_SESSION['loggedin'])) {
	$Login = "<a class='navbar-item' href='php/logout.php' style='font-weight:bold;'>Logout: ".$_SESSION['username']."</a>";
} else {
    $Login="<a class='navbar-item' href='login.php' style='font-weight:bold;'>Login/Registrieren</a>";
}

?>



<?php include("includes/filestart.php"); ?>
<!-- Fill content from here -->


<!-- Fill content to here -->
<?php include("includes/fileend.php"); ?>