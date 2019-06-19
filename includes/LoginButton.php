<?php
if (isset($_SESSION['loggedin'])) {
	$Login = "<a class='navbar-item' href='php/logout.php' style='font-weight:bold;'>Logout (".$_SESSION['username'].")</a>";
} else {
    $Login="<a class='navbar-item' href='login.php' style='font-weight:bold;'>Login/Registrieren</a>";
}
?>
 