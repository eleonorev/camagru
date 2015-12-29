<?php
session_start();
if ($_SESSION['login'] != 'admin')
   header('Location: index.php');

include 'config/database.php';

if (strlen($_POST['name']) > 1 && strlen($_POST['desc']) > 1 && strlen($_POST['img']) > 1) {
   $req_pre = mysqli_prepare($connection, 'INSERT INTO articles (name, descr, image, categorie, price) VALUES (?, ?, ?, ?, ?)');
   mysqli_stmt_bind_param($req_pre, "ssssi", $_POST['name'], $_POST['desc'], $_POST['img'], $_POST['cate'], $_POST['price']);
   mysqli_stmt_execute($req_pre);
}

$result = mysqli_query($connection, 'SELECT * FROM users');
$users = array();
while ($datas = mysqli_fetch_assoc($result)) {
      array_push($users, $datas);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Camagru</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/form.css">
</head>

<body>
	<div id="nav">
	     <div class="con"><a href="index.php">< Go back</a></div>
	     </div>

	     <h1> Administation </h1>


<div class="content user">
     <h2>Users</h2>
     <?php
     foreach ($users as $user) {
          if ($user['login'] != 'admin') {
     	     echo "- " . $user['login'] . "   <a class='croix' href='del_user?user=" . $user['id'] . "'>[delete]</a><br />"; }
	     }
	     ?>
</div>



</body>
</html>
