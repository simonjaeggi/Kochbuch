<!-- Fill navbar -->
<?php
$message="";
$error="";
$nav = "<a href='/Kochbuch/' class='navbar-item  is-active'>Rezepte</a>
            <a href='rezeptaufnahme.php' class='navbar-item'>Rezeptaufnahme</a>
            <a href='zutatenaufnahme.php' class='navbar-item'>Zutatenaufnahme</a>
            <a href='impressum.php' class='navbar-item'>Impressum</a>";
session_start();
include("includes/LoginButton.php");

include('php/db_connect.php');

// Initialisierung
$firstname = $lastname = $email = $username = '';

// Wurden Daten mit "POST" gesendet?
//Vorname
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['firstname']) && !empty(trim($_POST['firstname']))) {
        $firstname = htmlspecialchars(trim($_POST['firstname']));
    if(!preg_match("/(?=.*[a-z])(?=.*[A-Z])[a-zA-Z](?=.*\w+)/", $firstname)){
  			$error .= "Der Vorname entspricht nicht dem geforderten Format.<br />";
  		  }
      }
      else {
        $error .= "Geben Sie bitte einen korrekten Vornamen ein.<br />";
    }
//Nachname
    if (isset($_POST['lastname']) && !empty(trim($_POST['lastname']))) {
        $lastname = htmlspecialchars(trim($_POST['lastname']));
        if(!preg_match("/(?=.*[a-z])(?=.*[A-Z])[a-zA-Z](?=.*\w+)/", $lastname)){
      			$error .= "Der Nachnamname entspricht nicht dem geforderten Format.<br />";
      		}
        }
      else {
        $error .= "Geben Sie bitte einen korrekten Nachnamen ein.<br />";
    }
//emailadresse
    if (isset($_POST['email']) && !empty(trim($_POST['email']))) {
        $email = htmlspecialchars(trim($_POST['email']));
        //validirung nach RFC 822
      if(!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
        $error .= "die emailadresse entspricht nicht dem geforderten Format.<br />";
        }
    }
    else {
      $error .= "Geben Sie bitte einen korrekte emailadresse ein.<br />";
    }
//Username
    if (isset($_POST['username']) && !empty(trim($_POST['username']))) {
        $username = htmlspecialchars(trim($_POST['username']));

        if(!preg_match("/(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{5,}/", $username)){
    			$error .= "Der Benutzername entspricht nicht dem geforderten Format.<br />";
    		}
    }
    else {
      $error .= "Geben Sie bitte einen korrekten Benutzernamen ein.<br />";
    }
//Passwort
    if (isset($_POST['password']) && !empty(trim($_POST['password']))) {
        $password = trim($_POST['password']);

        if(!preg_match("/(?=^.{8,}$)((?=.*\d+)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $password)){
          $error .= "Das Passwort entspricht nicht dem geforderten Format.<br />";
        }
    }else {
      $error .= "Geben Sie bitte ein korrektes Passwort ein.<br />";
    }
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    session_regenerate_id();
    if (empty($error)) {
        $query = "insert into tbl_benutzer (Firstname, Lastname, Username, HashedPassword, Email)
                          values (?,?,?,?,?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("sssss", $firstname, $lastname, $username, $hashedpassword, $email);
        $stmt->execute();
        $mysqli->close();

        header('Location: login.php');
    }
}


?>

<?php include("includes/filestart.php"); ?>
<!-- Fill content from here -->
<h1 class="title has-text-white">Registration</h1>
<form action="" method="post">
    <!-- vorname -->
    <div class="field">
        <p class="control has-icons-left has-icons-right">
            <input name="firstname" class="input" type="text" placeholder="Vorname"
            required="true"
            maxlength="50">
            <span class="icon is-small is-left">
                <i class="far fa-id-badge"></i>
            </span>
        </p>
    </div>
    <!-- nachname -->
    <div class="field">
        <p class="control has-icons-left has-icons-right">
            <input name="lastname" class="input" type="text" placeholder="Nachname"
            required="true"
            maxlength="50">
            <span class="icon is-small is-left">
                <i class="fas fa-id-badge"></i>
            </span>
        </p>
    </div>


    <!-- email -->
    <div class="field">
        <p class="control has-icons-left has-icons-right">
            <input name="email" class="input" type="email" placeholder="Email"
            required="true"
            maxlength="50">
            <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
            </span>
        </p>
    </div>
    <!-- Username -->
    <div class="field">
        <p class="control has-icons-left has-icons-right">
            <input name="username" class="input" type="text" placeholder="Benutzername"
            required="true"
            minlength= "5"
            maxlength="50">
            <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
            </span>
        </p>
    </div>

    <!-- Password -->
    <div class="field">
        <p class="control has-icons-left">
            <input name="password" class="input" type="password" placeholder="Passwort"
            required="true"
            required="true"
            minlength= "5"
            pattern="(?=^.{8,50}$)((?=.*\d+)(?!=.*\w+))(?![.\n])(?=.*[A-Z])(?=.*[a-z])" title="Minimum 8 Zeichen, Gross/Kleinbuchstaben, Zahl und Sonderzeichen sind verlangt">
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
