<?php
//Benötigte Informationen
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'user';

//Instanzierung der Verbindungsvariable
$mysqli = new mysqli($host, $username, $password, $database);

//Fehlermeldung falls Verbindung fehlschlägt. 
if ($mysqli->connect_error) {
  die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
