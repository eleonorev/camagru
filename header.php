<?php
session_start();
include 'config/database.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Camagru</title>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
  <div id="nav">
    <div class="con">
      <?php if (!($_SESSION['login'])):  ?>
      <a class="loginregister" href="forms.php" title="connexion">Login & Register</a>
      <?php else: ?>
      <a href="disconnect.php">Logout</a> <a href="profile.php">Profile</a>
      <?php
       if ($_SESSION['login'] == "admin")
        echo " <a href='admin.php'>Administration</a>";
	 ?>
      <?php endif ?>
