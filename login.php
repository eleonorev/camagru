<?php
session_start();

if (strlen($_POST['login']) < 3 || strlen($_POST['login']) > 18) {
	$error = 12;
}

$login = $_POST['login'];
$pass = hash("whirlpool", $_POST['passwd']);

include 'config/database.php';

$req_pre = mysqli_prepare($connection, 'SELECT pass FROM users WHERE login = ?');
mysqli_stmt_bind_param($req_pre, "s", $login);
mysqli_stmt_execute($req_pre);
mysqli_stmt_bind_result($req_pre, $result);

$req_pre2 = mysqli_prepare($connection, 'SELECT validation FROM users WHERE login = ?');
mysqli_stmt_bind_param($req_pre2, "s", $login);
mysqli_stmt_execute($req_pre2);
mysqli_stmt_bind_result($req_pre2, $validation);

$req_pre3 = mysqli_prepare($connection, 'SELECT photo FROM users WHERE login = ?');
mysqli_stmt_bind_param($req_pre3, "s", $login);
mysqli_stmt_execute($req_pre3);
mysqli_stmt_bind_result($req_pre3, $photo);

if (mysqli_stmt_fetch($req_pre)) {
	if ($validation != NULL)
	{ $error = 4;}
	else if ($pass == $result && ($validation == 0)) {
		$_SESSION['login'] = $login;
		$_SESSION['photo'] = $photo;
		$error = 3;
	}
	else {
		$error = 2;
	}
}
else {
	$error = 1;
}
header('Location: index.php?l=' . $error)
?>
