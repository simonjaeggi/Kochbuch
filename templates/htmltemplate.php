<?php
$message = "";
$error = "";
$nav = "<a href='/Kochbuch/' class='navbar-item  is-active'>Rezepte</a>
            <a href='rezeptaufnahme.php' class='navbar-item'>Rezeptaufnahme</a>
            <a href='zutatenaufnahme.php' class='navbar-item'>Zutatenaufnahme</a>
            <a href='impressum.php' class='navbar-item'>Impressum</a>";
session_start();
include('php/db_connect.php');
include("php/LoggedIn.php");
if (isset($_SESSION['loggedin'])) {
	
} else {

}

?>
 
<?php include("includes/filestart.php"); ?>
<!-- Fill content from here -->

<!-- Fill content to here -->
<?php include("includes/fileend.php"); ?>