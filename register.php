<!-- Fill navbar -->
<?php $nav = "<a href='/Kochbuch/' class='navbar-item'>Rezepte</a>
            <a href='rezeptaufnahme.php' class='navbar-item'>Rezeptaufnahme</a>
            <a href='impressum.php' class='navbar-item'>Impressum</a>";


include('php/db_connect.php');

// Initialisierung
$error = $message =  '';
$firstname = $lastname = $email = $username = '';

// Wurden Daten mit "POST" gesendet?
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['firstname']) && !empty(trim($_POST['firstname']))) {
        $firstname = htmlspecialchars(trim($_POST['firstname']));
    } else {
        $error .= "Geben Sie bitte einen korrekten Vornamen ein.<br />";
    }
    if (isset($_POST['lastname']) && !empty(trim($_POST['lastname']))) {
        $lastname = htmlspecialchars(trim($_POST['lastname']));
    }
    if (isset($_POST['email']) && !empty(trim($_POST['email']))) {
        $email = htmlspecialchars(trim($_POST['email']));
    }
    if (isset($_POST['username']) && !empty(trim($_POST['username']))) {
        $username = htmlspecialchars(trim($_POST['username']));
    }
    if (isset($_POST['password']) && !empty(trim($_POST['password']))) {
        $password = trim($_POST['password']);
    }
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    if (empty($error)) {
        $query = "insert into users (firstname, lastname, username, password, email)
                          values (?,?,?,?,?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("sssss", $firstname, $lastname, $username, $hashedpassword, $email);
        $stmt->execute();
        $mysqli->close();

        //header('Location: login.php');
    }
}


?>

<?php include("includes/filestart.php"); ?>
<!-- Fill content from here -->
<h1 class="title has-text-white">Registration</h1>

<?php
// fehlermeldung oder nachricht ausgeben
if (!empty($message)) {
    echo "<div class=\"notification is-info\">" . $message . "<button class=\"delete\"></button></div>";
} else if (!empty($error)) {
    echo "<div class=\"notification is-danger\">" . $error . "<button class=\"delete\"></button></div>";
}
?>
<form action="" method="post">
    <!-- vorname -->
    <div class="field">
        <p class="control has-icons-left has-icons-right">
            <input name="firstname" class="input" type="text" placeholder="Vorname" >
            <span class="icon is-small is-left">
                <i class="far fa-id-badge"></i>
            </span>
        </p>
    </div>
    <!-- nachname -->
    <div class="field">
        <p class="control has-icons-left has-icons-right">
            <input name="lastname" class="input" type="text" placeholder="Nachname">
            <span class="icon is-small is-left">
                <i class="fas fa-id-badge"></i>
            </span>
        </p>
    </div>


    <!-- email -->
    <div class="field">
        <p class="control has-icons-left has-icons-right">
            <input name="email" class="input" type="email" placeholder="Email">
            <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
            </span>
        </p>
    </div>
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
            <input name="password" class="input" type="password" placeholder="Passwort">
            <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
            </span>
        </p>
    </div>

    <!-- Buttons -->
    <div class="field">
        <button class="button is-success" type="submit">
            Registrieren
        </button>
        <button id="buttonRegister" type="reset" class="button is-danger">
            Reset
        </button>


    </div>


</form>


<!-- Fill content to here -->
<?php include("includes/fileend.php"); ?>