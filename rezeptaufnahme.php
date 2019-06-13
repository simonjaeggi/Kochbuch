<?php $nav = "<a href='/Kochbuch/' class='navbar-item'>Rezepte</a>
            <a href='rezeptaufnahme.php' class='navbar-item is-active'>Rezeptaufnahme</a>
            <a href='impressum.php' class='navbar-item'>Impressum</a>";

$message = "";
$error = "";

session_start();
if (isset($_SESSION['loggedin'])) {
	$Login = "<a class='navbar-item' href='php/logout.php' style='font-weight:bold;'>Logout: ".$_SESSION['username']."</a>";
} else {
	$Login = "<a class='navbar-item' href='login.php' style='font-weight:bold;'>Login/Registrieren</a>";
}
?>



<?php include("includes/filestart.php"); ?>
<!-- Fill content from here -->
<form action="php/insert_sql.php" method="post">
	<h1 class="title">Rezeptaufnahme</h1>
	<!-- Autor -->
	<div class="block">
		<h2 class="subtitle">Autor des Rezepts</h2>
		<input type="text" name="autor" placeholder="Jamie Oliver" class="Input">


	</div>


	<!-- Gericht -->
	<div class="block">
		<h2 class="subtitle">Gericht</h2>
		<input type="text" name="gericht" placeholder="zB. Lasagne" class="Input">


	</div>


	<!-- Zutaten -->
	<div id="Zutaten" class="block has-text-white">
		<h2 class="subtitle">Benötigte Zutaten</h2>
		<input class="button is-primary" type="button" value="Zutat hinzufügen" onclick="createTextInputZutat()">

		<div class="columns">
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