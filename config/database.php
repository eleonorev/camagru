<?php
$DB_DSN = "localhost";
$DB_USER = "root";
$DB_PASSWORD = "eleonore";
$DB_NAME = "camagru";

$connection = mysqli_connect($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_NAME);
if (!$connection) {
   die("Connection failed: " . mysqli_connect_error());
}

?>
