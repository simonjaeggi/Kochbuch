<?php
$message = "";
$error = "";
$nav = "<a href='/Kochbuch/' class='navbar-item'>Rezepte</a>
            <a href='rezeptaufnahme.php' class='navbar-item'>Rezeptaufnahme</a>
            <a href='zutatenaufnahme.php' class='navbar-item'>Zutatenaufnahme</a>
            <a href='impressum.php' class='navbar-item'>Impressum</a>";
$admin = " is-active";
session_start();
include('php/db_connect.php');
include("php/LoggedIn.php");
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
}

?>
 
<?php include("includes/filestart.php"); ?>
<!-- Fill content from here -->
<h1 class="title has-text-white">Konto</h1>
Eingeloggt als:  <?php echo $_SESSION['username'] ?>
<h2 class="subtitle has-text-white">Passwort zurücksetzen</h2>


<!-- Fill content to here -->
<?php include("includes/fileend.php"); ?>