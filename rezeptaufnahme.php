<?php $nav = "<a href='/Kochbuch/' class='navbar-item'>Rezepte</a>
            <a href='rezeptaufnahme.php' class='navbar-item is-active'>Rezeptaufnahme</a>
            <a href='impressum.php' class='navbar-item'>Impressum</a>";
 
$message = "";
$error = "";
$autor=$gericht=$tipp=$user=""; 
session_start();
include("includes/LoginButton.php");
include('php/db_connect.php');

// Wurden Daten mit "POST" gesendet?
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $user = $_SESSION['userid'];

  if (isset($_POST['autor']) && !empty(trim($_POST['autor']))) {
    $autor = htmlspecialchars(trim($_POST['autor']));
  } else {
    $error .= "Geben Sie bitte einen Autor an.";
  }

  if (isset($_POST['gericht']) && !empty(trim($_POST['gericht']))) {
    $gericht = htmlspecialchars(trim($_POST['gericht']));
  } else {
    $error .= "Geben Sie bitte den Namen des Gerichts an.";
  }

  if (isset($_POST['tipp']) && !empty(trim($_POST['tipp']))) {
    $tipp = htmlspecialchars(trim($_POST['tipp']));
  }else{
    $message .= "Sie haben keinen Tipp angegeben.";
  }

  if (empty($error)) {
    $query = "insert into tbl_Rezept (ExtAutor, Benutzer_ID, Name, Tipp)
                        values (?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("siss", $autor, $user, $gericht, $tipp);
    $stmt->execute();
    $mysqli->close();

    $message .= 'Rezept erfolgreich abgesendet.';
  }
}

?>

<?php include("includes/filestart.php"); ?>

<!-- Fill content from here -->
<form action="" method="post">


  <h1 class="title has-text-white">Rezeptaufnahme</h1>


  <!-- Autor -->
  <h2 class="subtitle has-text-white">Autor des Rezepts</h2>
  <div class="field">
    <p class="control has-icons-left has-icons-right">
      <input name="autor" class="input" type="text" placeholder="Jamie Oliver">
      <span class="icon is-small is-left">
        <i class="fas fa-user"></i>
      </span>
    </p>
  </div>


  <!-- Gericht -->
  <h2 class="subtitle has-text-white">Gericht</h2>
  <div class="field">
    <p class="control has-icons-left has-icons-right">
      <input name="gericht" class="input" type="text" placeholder="Lasagne">
      <span class="icon is-small is-left">
        <i class="fas fa-hamburger"></i>
      </span>
    </p>
  </div>


  <!-- Tipp -->
  <div class="block">
    <h2 class="subtitle has-text-white">Tipp</h2>
    <textarea name="tipp" placeholder="Tipps zum Rezept" class="Textarea"></textarea>
  </div>

  <!-- Submit -->
  <input class="button is-primary" type="submit">
</form>

<!-- Fill content to here -->
<?php include("includes/fileend.php"); ?>