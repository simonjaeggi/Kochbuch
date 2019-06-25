<?php $nav = "<a href='/Kochbuch/' class='navbar-item'>Rezepte</a>
            <a href='rezeptaufnahme.php' class='navbar-item'>Rezeptaufnahme</a>
            <a href='zutatenaufnahme.php' class='navbar-item'>Zutatenaufnahme</a>
            <a href='impressum.php' class='navbar-item is-active'>Impressum</a>";
session_start();

include("php/LoggedIn.php");
include("includes/filestart.php");
?>
<!-- Fill content from here -->

<h1 class="title has-text-white">Impressum</h1>
<div class="has-text-white">


  <h2>Kontaktadresse</h2>
  <p>Simon&nbsp;Jäggi</p>
  <p>Schweiz</p>
  <p>&nbsp;</p>
  <h2>Haftungsausschluss</h2>
  <p>Der Autor übernimmt keinerlei Gewähr hinsichtlich der inhaltlichen Richtigkeit, Genauigkeit,
    Aktualität, Zuverlässigkeit und Vollständigkeit der Informationen.</p>
  <p>Haftungsansprüche gegen den Autor wegen Schäden materieller oder immaterieller Art, welche aus dem
    Zugriff oder der Nutzung bzw. Nichtnutzung der veröffentlichten Informationen, durch Missbrauch der
    Verbindung oder durch technische
    Störungen entstanden sind, werden ausgeschlossen.</p>
  <p>Alle Angebote sind unverbindlich. Der Autor behält es sich ausdrücklich vor, Teile der Seiten oder das
    gesamte Angebot ohne gesonderte Ankündigung zu verändern, zu ergänzen, zu löschen oder die
    Veröffentlichung zeitweise oder
    endgültig einzustellen.</p>
  <p>&nbsp;</p>
  <h2>Haftung für Links</h2>
  <p>Verweise und Links auf Webseiten Dritter liegen ausserhalb unseres Verantwortungsbereichs Es wird
    jegliche Verantwortung für solche Webseiten abgelehnt. Der Zugriff und die Nutzung solcher Webseiten
    erfolgen auf eigene Gefahr des
    Nutzers oder der Nutzerin. </p>
  <p>&nbsp;</p>
  <h2>Urheberrechte</h2>
  <p>Die Urheber- und alle anderen Rechte an Inhalten, Bildern, Fotos oder anderen Dateien auf der Website
    gehören ausschliesslich <strong>Simon Jäggi</strong> oder den speziell genannten Rechtsinhabern. Für die
    Reproduktion jeglicher
    Elemente ist die schriftliche Zustimmung der Urheberrechtsträger im Voraus einzuholen.</p>
  <p>&nbsp;</p>
  <h2>Datenschutz</h2>
  <p>Gestützt auf Artikel 13 der schweizerischen Bundesverfassung und die datenschutzrechtlichen
    Bestimmungen des Bundes (Datenschutzgesetz, DSG) hat jede Person Anspruch auf Schutz ihrer Privatsphäre
    sowie auf Schutz vor Missbrauch ihrer
    persönlichen Daten. Wir halten diese Bestimmungen ein. Persönliche Daten werden streng vertraulich
    behandelt und weder an Dritte verkauft noch weiter gegeben.</p>
  <p>In enger Zusammenarbeit mit unseren Hosting-Providern bemühen wir uns, die Datenbanken so gut wie
    möglich vor fremden Zugriffen, Verlusten, Missbrauch oder vor Fälschung zu schützen.</p>
  <p>Beim Zugriff auf unsere Webseiten werden folgende Daten in Logfiles gespeichert: IP-Adresse, Datum,
    Uhrzeit, Browser-Anfrage und allg. übertragene Informationen zum Betriebssystem resp. Browser. Diese
    Nutzungsdaten bilden die Basis
    für statistische, anonyme Auswertungen, so dass Trends erkennbar sind, anhand derer wir unsere Angebote
    entsprechend verbessern können. </p>
  <p>&nbsp;</p>
  <h2>Quelle</h2>
  <p> Dieses Impressum wurde am <strong>14.04.2019</strong> mit dem Impressum-Generator <strong><a href="http://www.bag.ch/impressum-generator">http://www.bag.ch/impressum-generator</a></strong> der
    Firma Brunner Medien AG in Kriens
    erstellt. Die Brunner Medien AG in Kriens übernimmt keine Haftung. </p>
  <p style="visibility:hidden;"></p>
</div>
<!-- Fill content to here -->
<?php include("includes/fileend.php"); ?>