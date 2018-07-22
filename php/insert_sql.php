<?php
$autor = $_POST['autor'];
$gericht = $_POST['gericht'];

$InputCountZutaten = 1;
$InputCountZubereitung = 1;

if(isset( $_POST['zutat_' + $InputCountZutaten]  && !empty( $_POST['zutat_' + $InputCountZutaten] )) {
      $Zutat[$InputCountZutaten] = $_POST['zutat_' + $InputCountZutaten];
      $Menge[$InputCountZutaten] = $_POST['menge_' + $InputCountZutaten];
}
if(isset( $_POST['zubereitungsschritt_' + $InputCountZubereitung]  && !empty( $_POST['zubereitungsschritt_' + $InputCountZubereitung] )) {
      $Zubereitung[$InputCountZubereitung] = $_POST['zubereitungsschritt_' + $InputCountZubereitung];

}
$tipp = $_POST['tipp'];

echo $autor;
echo $gericht;

foreach ($Zutat as $zw) {
  echo $zw;
}
foreach ($Menge as $zw) {
  echo $zw;
}
foreach ($Zubereitung as $zw) {
  echo $zw;
}

echo $tipp;


?>
