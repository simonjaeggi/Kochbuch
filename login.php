<?php $nav = "<a href='/Kochbuch/' class='navbar-item'>Rezepte</a>
            <a href='rezeptaufnahme.php' class='navbar-item'>Rezeptaufnahme</a>
            <a href='impressum.php' class='navbar-item'>Impressum</a>";
$Login="<a class='navbar-item is-active' href='login.php' style='font-weight:bold;'>Login/Registrieren</a>";
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
    } else {
        $error .= "Geben Sie bitte das Passwort an.<br />";
    }
}
// kein fehler
if (empty($error)) {
    $query = "select * from tbl_benutzer where Username =?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    //abgleich

    while ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['HashedPassword'])) {
            $message .= "Sie sind nun eingeloggt";
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $row['ID'];
            echo $_SESSION['username'];
            echo $_SESSION['loggedin'];
            header('Location: index.php');
        }
        else {
            $error .= "Benutzername oder Passwort sind falsch";
        }
    }
}
$mysqli->close();
 
/*
//deaktivierung des login Buttons
$('').button("disable");​​​​​​​​​​​​​

$('.fields').bind('keyup', function() {
var nameLength = $("#sub_first_name").length;
var emailLength = $("#sub_email").length;

if ( usernameLength> 0 && passwordLength > 0){
  $
}
*/
?>


<?php include("includes/filestart.php"); ?>


<!-- Fill content from here -->




<h1 class="title has-text-white">Login</h1>


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
    </div>

</form>
Noch kein Account? Registrieren Sie sich <a href="register.php">hier</a>.


<!-- Fill content to here -->
<?php include("includes/fileend.php"); ?>
