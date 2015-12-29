<?php
session_start();
include('database.php');


$connection = mysqli_connect($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_NAME);
if (!$connection) {
   die("Connection failed: " . mysqli_connect_error());
}

$users = "CREATE TABLE IF NOT EXISTS `users` (
       `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
       `login` varchar(20) NOT NULL,
       `pass` text NOT NULL,
       `prenom` text NOT NULL,
       `nom` text NOT NULL,
       `mail` text NOT NULL,
       `photo` text NOT NULL,
       `validation` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$photo = "CREATE TABLE IF NOT EXISTS `photo` (
       `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
       `name` varchar(100) NOT NULL,
       `descr` text NOT NULL,
       `image` text NOT NULL,
       `categorie` text NOT NULL,
       `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$comments = "CREATE TABLE IF NOT EXISTS `comments` (
	  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  `iduser` int(11) NOT NULL,
	  `idphoto` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

if (mysqli_query($connection, $users)) {
   echo "Table Users created. <font color='green'>Success.</font><br />";
}
else {
     echo "Table Users not created. <font color='red'>Failure.</font><br />";
}
if (mysqli_query($connection, $photo)) {
   echo "Table Photo created. <font color='green'>Success.</font><br />";
}
else {
     echo "Table Photo not created. <font color='red'>Failure.<br />";
}
if (mysqli_query($connection, $comments)) {
   echo "Table Comments created. <font color='green'>Success.</font><br />";
}
else {
     echo "Table Comments not created. <font color='red'>Failure.</font><br />";
}

$admin = "admin";
$adminpw = hash("whirlpool", "hello");

mysqli_close($connection);
include 'database.php';

$req_pre = mysqli_prepare($connection, 'INSERT INTO users (login, pass) VALUES (?, ?)') or die(mysqli_error($connection));
mysqli_stmt_bind_param($req_pre, "ss", $admin, $adminpw);
mysqli_stmt_execute($req_pre);

mysqli_close($connection);

?>
