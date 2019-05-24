<?php $nav="<a href='/Kochbuch/' class='navbar-item'>Rezepte</a>
            <a href='rezeptaufnahme.php' class='navbar-item is-active'>Rezeptaufnahme</a>
            <a href='impressum.php' class='navbar-item'>Impressum</a>"
?>


<!DOCTYPE>
<html>
<?php include("includes/head.html"); ?>

<body class="has-background-grey-darker">
	<div id="wrapper">
		<?php include("includes/nav.php"); ?>
		<div id="content">
			<!-- Fill content from here -->


			<div class="block">
				<div class="columns">
					<div class="column">

					</div>
					<div class="column is-half">
						<form action="php/insert_sql.php" method="post">
							<h1 class="title has-text-white">Rezeptaufnahme</h1>
							<!-- Autor -->
							<div class="block">
								<h2 class="subtitle has-text-white">Autor des Rezepts</h2>
								<input type="text" name="autor" placeholder="Jamie Oliver" class="Input">


							</div>


							<!-- Gericht -->
							<div class="block">
								<h2 class="subtitle has-text-white">Gericht</h2>
								<input type="text" name="gericht" placeholder="zB. Lasagne" class="Input">


							</div>


							<!-- Zutaten -->
							<div id="Zutaten" class="block has-text-white">
								<h2 class="subtitle has-text-white">Benötigte Zutaten</h2>
								<input class="button" type="button" value="Zutat hinzufügen" onclick="createTextInputZutat()">

								<div class="columns">
									<div id="Zutaten_Zutat" class="column is-two-thirds">

									</div>
									<div id="Zutaten_Menge" class="column">

									</div>
								</div>

							</div>

							<!-- Zubereitung -->
							<div id="Zubereitung" class="block has-text-white">
								<h2 class="subtitle has-text-white">Zubereitung</h2>
								<input class="button" type="button" value="Zubereitungsschritt hinzufügen"
									onclick="createTextAreaZubereitung()">
							</div>


							<!-- Tipp -->
							<div class="block">
								<h2 class="subtitle has-text-white">Tipp</h2>
								<textarea name="tipp" placeholder="Tipps zum Rezept" class="Textarea"></textarea>
							</div>

							<!-- Submit -->
							<input class="button" type="submit">
						</form>

					</div>
					<div class="column">

					</div>
				</div>
			</div>
			<!-- Fill content to here -->
		</div>


		<?php include("includes/footer.html"); ?>
	</div>
</body>
<script src="js/navbar_toggle_isactive.js" charset="utf-8"></script>

</html>



