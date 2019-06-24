<?php $nav = "<a href='/Kochbuch/' class='navbar-item'>Rezepte</a>
            <a href='rezeptaufnahme.php' class='navbar-item'>Rezeptaufnahme</a>
            <a href='zutatenaufnahme.php' class='navbar-item is-active'>Zutatenaufnahme</a>
            <a href='impressum.php' class='navbar-item'>Impressum</a>";
$Login="<a class='navbar-item is-active' href='login.php' style='font-weight:bold;'>Login/Registrieren</a>";
session_start();
include("includes/LoginButton.php");
include('php/db_connect.php');
$error = '';
$message = '';


// Formular wurde gesendet und Besucher ist noch nicht angemeldet.
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)) {
    // zutat
    if (!empty(trim($_POST['zutat']))) {
        $zutat = htmlspecialchars(trim($_POST['zutat']));

        if(!preg_match("/(?=.*[a-z])(?=.*[A-Z])[a-zA-Z](?=.*\w+)/", $zutat)){
      			$error .= "Der Nachnamname entspricht nicht dem geforderten Format.<br />";
      		}
        }

     else {
        $error .= "Geben Sie bitte eine Zutat an.<br />";
    }

}
session_regenerate_id();
// kein fehler
if (empty($error)) {
    $query = "insert into tbl_zutat(Name)values (?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $zutat);
    $stmt->execute();
    $result = $stmt->get_result();
  }

$mysqli->close();

?>



<?php include("includes/filestart.php"); ?>
<!-- Fill content from here -->

<h1 class="title has-text-white">Zutaten erfassen</h1>


<form action="" method="POST">
  <!-- Zutatenerfassen -->
  <div class="field">
      <p class="control has-icons-left has-icons-right">
          <input name="zutat" class="input" type="text" placeholder="Zutat"   required="true">
          <span class="icon is-small is-left">
              <i class="fas fa-lemon"></i>
          </span>
      </p>
  </div>
            <div class="field">
                <button class="button is-success" type="submit">
                    Hinzufügen
                </button>
            </div>

</form>


<!-- Fill content to here -->
<?php include("includes/fileend.php"); ?>
