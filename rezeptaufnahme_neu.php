<?php $nav = "<a href='/Kochbuch/' class='navbar-item'>Rezepte</a>
            <a href='rezeptaufnahme.php' class='navbar-item is-active'>Rezeptaufnahme</a>
            <a href='impressum.php' class='navbar-item'>Impressum</a>";

$message = "";
$error = "";
session_start();
?>
<?php include("includes/LoginButton.php"); ?>



<?php include("includes/filestart.php"); ?>
<!-- Fill content from here -->
<form action="php/insert_sql.php" method="post">


<h1 class="title">Rezeptaufnahme</h1>


<!-- Autor -->
<h2 class="subtitle">Autor des Rezepts</h2>
<div class="field">
    <p class="control has-icons-left has-icons-right">
        <input name="autor" class="input" type="text" placeholder="Jamie Oliver">
        <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
        </span>
    </p>
</div>


	<!-- Gericht -->
<h2 class="subtitle">Gericht</h2>
  <div class="field">
      <p class="control">
          <input name="gericht" class="input" type="text" placeholder="z.B Lasagne">
      </p>
  </div>


	<!-- Zutaten -->
  <div id="Zutaten" class="block has-text-white">
    <h2 class="subtitle">Benötigte Zutaten</h2>
    <input class="button is-primary" type="button" value="Zutat hinzufügen" onclick="createTextInputZutat()">

    <div class="column">
      <div id="Zutaten_Zutat" class="column is-two-thirds">

      </div>
      <div id="Zutaten_Menge" class="column">

      </div>
    </div>

  </div>

	<!-- Zubereitung -->
	<div id="Zubereitung" class="block">
		<h2 class="subtitle">Zubereitung</h2>
		<input class="button is-primary" type="button" value="Zubereitungsschritt hinzufügen" onclick="createTextAreaZubereitung()">
	</div>


	<!-- Tipp -->
	<div class="block">
		<h2 class="subtitle">Tipp</h2>
		<textarea name="tipp" placeholder="Tipps zum Rezept" class="Textarea"></textarea>
	</div>

	<!-- Submit -->
	<input class="button is-primary" type="submit">
</form>

<!-- Fill content to here -->
<?php include("includes/fileend.php"); ?>
