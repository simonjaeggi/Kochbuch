<?php $nav = "<a href='/Kochbuch/' class='navbar-item'>Rezepte</a>
            <a href='rezeptaufnahme.php' class='navbar-item'>Rezeptaufnahme</a>
            <a href='impressum.php' class='navbar-item'>Impressum</a>";
$Login="<a class='navbar-item is-active' href='login.php' style='font-weight:bold;'>Login/Registrieren</a>";
include('php/db_connect.php');
$error = '';
$message = '';


// Formular wurde gesendet und Besucher ist noch nicht angemeldet.
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)) {
    // zutat
    if (!empty(trim($_POST['zutat']))) {
        $zutat = htmlspecialchars(trim($_POST['zutat']));
    } else {
        $error .= "Geben Sie bitte eine Zutat an.<br />";
    }

}

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

<h1 class="title has-text-white">Zutatenerfassen</h1>


<form action="" method="POST">


    <!-- Zutatenerfassen -->
    <div class="field">
        <p class="control has-icons-left has-icons-right">
            <input name="zutat" class="input" type="text" placeholder="Zutat">
            <span class="icon is-small is-left">
                <i class="fas fa-pepper-hot"></i>
            </span>
          </div>
            <div class="field">
                <button class="button is-success" type="submit">
                    Hinzufügen
                </button>
            </div>




    <!-- Buttons -->
    <!--
    <div class="field">
        <button class="button is-success" type="submit">
            Login
        </button>
    </div>
    //-->
</form>


<!-- Fill content to here -->
<?php include("includes/fileend.php"); ?>
