<?php
$message = "";
$error = "";
$nav = "<a href='/Kochbuch/' class='navbar-item  is-active'>Rezepte</a>
            <a href='rezeptaufnahme.php' class='navbar-item'>Rezeptaufnahme</a>
            <a href='zutatenaufnahme.php' class='navbar-item'>Zutatenaufnahme</a>
            <a href='impressum.php' class='navbar-item'>Impressum</a>";
session_start();
include('php/db_connect.php');
include("php/LoggedIn.php");

if (isset($_SESSION['loggedin'])) {
    $message .= "Eingeloggt als: " . $_SESSION['username'];
} else {
    $message .= "Sie sind als Gast unterwegs. Um selbst Rezepte erfassen zu können, loggen Sie sich bitte ein.";
}

if (empty($error)) {
    $query = "select Name, Tipp, ExtAutor from tbl_Rezept ORDER BY Name Asc";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
}
$mysqli->close();

?>




<?php include("includes/filestart.php"); ?>
<!-- Fill content from here -->
<h1 class="title has-text-white">Index</h1>

<?php
echo "<table class='table is-bordered is-hoverable is-fullwidth is-striped'><tr class='has-text-white'><th>Gericht</th><th>Tipp</th><th>Autor</th></tr>";
while ($row = $result->fetch_assoc()) {   //Creates a loop to loop through results
    echo
        '<tr>
            <td>' . $row["Name"] . '</td>
            <td>' . $row["Tipp"] . '</td>
            <td>' . $row["ExtAutor"] . '</td>
        </tr>';
}

echo "</table>"; //Close the table in HTML
?>

<!-- Fill content to here -->
<?php include("includes/fileend.php"); ?>