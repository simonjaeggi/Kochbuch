<?php $nav = "<a href='/Kochbuch/' class='navbar-item'>Rezepte</a>
            <a href='rezeptaufnahme.php' class='navbar-item'>Rezeptaufnahme</a>
            <a href='impressum.php' class='navbar-item'>Impressum</a>";

include('php/db_connect.php');
$error = '';
$message = '';


// Formular wurde gesendet und Besucher ist noch nicht angemeldet.
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)) {
    // username
    if (!empty(trim($_POST['username']))) {
        $username = htmlspecialchars(trim($_POST['username']));
    } else {
        $error .= "Geben Sie bitte den Benutzername an.<br />";
    }
    // password
    if (!empty(trim($_POST['password']))) {
        $password = trim($_POST['password']);
        // passwort gültig?
    } else {
        $error .= "Geben Sie bitte das Passwort an.<br />";
    }
}
// kein fehler
if (empty($error)) {
    $query = "select HashedPassword from tbl_benutzer where Username =?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    //abgleich
    while ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['HashedPassword'])) {
            $message .= "Sie sind nun eingeloggt";
        } else {
            $error .= "Benutzername oder Passwort sind falsch";
        }
    }
}
$mysqli->close();

?>


<?php include("includes/filestart.php"); ?>
<!-- Fill content from here -->




<h1 class="title has-text-white">Login</h1>

<?php
// fehlermeldung oder nachricht ausgeben
if (!empty($message)) {
    echo "<div class=\"notification is-info\">" . $message . "<button class=\"delete\"></button></div>";
} else if (!empty($error)) {
    echo "<div class=\"notification is-danger\">" . $error . "<button class=\"delete\"></button></div>";
}
?>
<form action="" method="POST">


    <!-- Username -->
    <div class="field">
        <p class="control has-icons-left has-icons-right">
            <input name="username" class="input" type="text" placeholder="Benutzername">
            <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
            </span>
        </p>
    </div>

    <!-- Password -->
    <div class="field">
        <p class="control has-icons-left">
            <input name="password" class="input" type="password" placeholder="Password">
            <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
            </span>
        </p>
    </div>

    <!-- Buttons -->
    <div class="field">
        <button class="button is-success" type="submit">
            Login
        </button>

        <button id="buttonRegister" class="button is-info">
            Registrieren
        </button>

    </div>

</form>



<!-- Fill content to here -->
<?php include("includes/fileend.php"); ?>