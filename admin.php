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
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //Passwort
    if (isset($_POST['password']) && !empty(trim($_POST['password']))) {
        $password = trim($_POST['password']);

        if (!preg_match("/(?=^.{8,}$)((?=.*\d+)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $password)) {
            $error .= "Das Passwort entspricht nicht dem geforderten Format.<br />";
        }
    } else {
        $error .= "Geben Sie bitte ein korrektes Passwort ein.<br />";
    }
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    $username = $_SESSION['username'];
    session_regenerate_id();
    if (empty($error)) {
        $query = "update tbl_benutzer set HashedPassword = ? where Username = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ss", $hashedpassword, $username);
        $stmt->execute();
        if (empty($mysqli->error)) {
            $message .= "Das Passwort wurde erfolgreich aktualisiert.";
        } else {
            $error .= "Folgender Fehler ist aufgetreten: " . $mysqli->error;
        }
        $mysqli->close();
    }
}
?>

<?php include("includes/filestart.php"); ?>
<!-- Fill content from here -->
<h1 class="title has-text-white">Konto</h1>
<p>Eingeloggt als: <b> <?php echo $_SESSION['username'] ?></b></p>
<br>
<h2 class="subtitle has-text-white">Passwort zurücksetzen</h2>
<form action="" method="post">

    <!-- Password -->
    <div class="field">
        <p class="control has-icons-left">
            <input name="password" class="input" type="password" placeholder="Passwort" required maxlength="50" pattern="(?!=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W+).{8,50}" title="Minimum 8 Zeichen, Gross/Kleinbuchstaben, Zahl und Sonderzeichen sind verlangt">
            <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
            </span>
        </p>
    </div>
    <!-- Buttons -->
    <div class="field">
        <button class="button is-success" type="submit">
            Passwort aktualisieren
        </button>
    </div>
</form>
<!-- Fill content to here -->
<?php include("includes/fileend.php"); ?>