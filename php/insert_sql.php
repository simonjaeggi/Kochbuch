<?php
$autor = $_POST['autor'];
$gericht = $_POST['gericht'];

$InputCountZutaten = 1;
$InputCountZubereitung = 1;

$Zutaten = array();
$Mengen = array();
$Zubereitung = array();


#Variable die Bestimmt ob die While schleifen laufen oder nicht.
$a=0;

#Schleife zur Auslesung der dynamisch erstellten Textfelder Zutat und Menge
while ($a != 1) {
  #Falls zutat_id und menge_id nicht leer sind, werden die Werte abgespeichert. Anschliessend wird die id hochgezählt.
  if (!empty($_POST['zutat_' . $InputCountZutaten]) && !empty($_POST['menge_' . $InputCountZutaten])){
    $Zutaten[$InputCountZutaten] = $_POST['zutat_' . $InputCountZutaten];
    $Mengen[$InputCountZutaten] = $_POST['menge_' . $InputCountZutaten];
    $InputCountZutaten++;
  }
  #Falls menge_id leer ist, aber zutat_id einen Wert enthält, wird als Menge 1 abgespeichert und id hochgezählt.
  elseif (empty($_POST['menge_' . $InputCountZutaten]) && (!empty($_POST['zutat_' . $InputCountZutaten])) ) {
    $Mengen[$InputCountZutaten] = 1;
    $InputCountZutaten++;
  }
  #Falls zutat_id leer ist, wird die Schleife abgebrochen
  elseif (empty($_POST['zutat_' . $InputCountZutaten])) {
    $a = 1;
  }
}

#Variable die Bestimmt ob die While schleifen laufen oder nicht.
$a=0;

#Schleife zur Auslesung des dynamisch erstellten Textfeldes Zubereitung

while ($a != 1) {
  #Falls zubereitungsschritt_id  nicht leer ist, wird der Wert abgespeichert. Anschliessend wird die id hochgezählt.
  if (!empty($_POST['zubereitungsschritt_' . $InputCountZubereitung])){
    $Zubereitung[$InputCountZubereitung] = $_POST['zubereitungsschritt_' . $InputCountZubereitung];
    $InputCountZubereitung++;
  }
  #Falls zubereitungsschritt_id leer ist, wird die Schleife abgebrochen
  elseif (empty($_POST['zubereitungsschritt_' . $InputCountZubereitung])) {
    $a = 1;
  }
}

$tipp = $_POST['tipp'];

echo $autor;
echo $gericht;

foreach ($Zutaten as $zw) {
  echo $zw;
}
foreach ($Mengen as $zw) {
  echo $zw;
}
foreach ($Zubereitung as $zw) {
  echo $zw;
}

echo $tipp;
echo $a;

?>
