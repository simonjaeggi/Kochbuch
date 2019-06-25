<?php
//Falls Admin nicht definiert wird, muss die Variable initialisiert werden, um einen Error zu vermeiden.
if(empty($admin)){
 $admin = "";
}
//Falls der Benutzer eingeloggt ist, wird anstelle von Login/Registrieren ein Logout Button angezeigt. Zusätzlich sieht der Benutzer eine Admin Seite, auf der er seien Kontoinformationen verwalten kann.
if (isset($_SESSION['loggedin'])) {
    $Login = "<a class='navbar-item' href='php/logout.php' style='font-weight:bold;'>Logout (".$_SESSION['username'].")</a>";
    //Die Variable $adin wird in der admin.php Seite verwendet, um das Element in der Navbar aktiv zu setzen. 
    $nav .= "<a href='admin.php' class='navbar-item".$admin."'>Konto</a>";
} else {
    //Falls der Benutzer nicht eingeloggt ist, sieht er einen Button, mit welchem er sich einloggen kann.
    $Login="<a class='navbar-item' href='login.php' style='font-weight:bold;'>Login/Registrieren</a>";
}
?>
 