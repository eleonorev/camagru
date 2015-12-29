<?php

$req_pre = mysqli_prepare($connection, 'SELECT validation FROM users WHERE login = ?');
mysqli_stmt_bind_param($req_pre, "s", $login);
mysqli_stmt_execute($req_pre);
mysqli_stmt_bind_result($req_pre, $result);

if (mysqli_stmt_fetch($req_pre)) {
	if ($_GET['v'] == $result)
  {
    $error = 1;
  }
  else { $error = 0; }

if ($error == 1) {
  $val = NULL;
  include 'config/database.php';
  $req_pre = mysqli_prepare($connection, 'INSERT INTO users (validation) VALUES (?)');
  mysqli_stmt_bind_param($req_pre, "i", $val);
  mysqli_stmt_execute($req_pre);
}



?>
