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
        $username = trim($_POST['username']);
        if (strlen($username) <= 30 && strlen($username) >= 6) {
            $username = htmlspecialchars($username);
        } else {
            $error .= "Länge und/oder Format des Benutzernamens stimmt nicht. <br>";
        }
        
    }
} else {
    $error .= "Geben Sie bitte den Benutzername an.<br />";
}
// password
if (!empty(trim($_POST['password']))) {
    $password = trim($_POST['password']);
    // passwort gültig?
    if (!preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $password)) {
        $error .= "Das Passwort entspricht nicht dem geforderten Format.<br />";
    }
} else {
    $error .= "Geben Sie bitte das Passwort an.<br />";
}

// kein fehler
if (empty($error)) {

    // TODO SELECT Query erstellen, user und passwort mit Datenbank vergleichen
    $query = "select password from users where username =?";
    // TODO prepare()
    $stmt = $mysqli->prepare($query);

    // TODO bind_param()
    $stmt->bind_param("s", $username);

    // TODO execute()
    $stmt->execute();
    // TODO Passwort auslesen und mit dem eingegeben Passwort vergleichen
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            // TODO: wenn Passwort korrekt:  $message .= "Sie sind nun eingeloggt"; 
            $message .= "Sie sind nun eingeloggt";
        } else {
            $error .= "Benutzername oder Passwort sind falsch";
        }
    }
    // TODO: wenn Passwort korrekt:  $message .= "Sie sind nun eingeloggt"; 
    // TODO: wenn Passwort falsch, oder kein Benutzer mit diesem Benutzernamem in DB: $error .= "Benutzername oder Passwort sind falsch";
}
$mysqli->close();

?>


<!DOCTYPE>
<html>
<?php include("includes/head.html"); ?>

<body class="has-background-grey-darker has-text-white">
    <div id="wrapper">
        <?php include("includes/nav.php"); ?>
        <div id="content">


            <div class="block">
                <div class="columns">
                    <div class="column"></div>
                    <div class="column is-half">
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
                                    <input name="username" class="input" type="text" placeholder="Benutzername" maxlength="30" required="true" pattern="[a-zA-Z1-9._]{6,}" title="6-30 Zeichen. Grossbuchstaben, Kleinbuchstaben, 1-9, Sonderzeichen: ._">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </p>
                            </div>

                            <!-- Password -->
                            <div class="field">
                                <p class="control has-icons-left">
                                    <input name="password" class="input" type="password" placeholder="Password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title=" 8-30 Zeichen, keine Umlaute. Mindestens einen Gross-, einen Kleinbuchstaben und eine Zahl.">
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

                    </div>
                    <div class="column">

                    </div>
                </div>
            </div>






        </div>
        <?php include("includes/footer.html"); ?>
    </div>
</body>
<script src="js/navbar_toggle_isactive.js" charset="utf-8"></script>

</html>