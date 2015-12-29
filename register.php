<?php
$error = 0;
if ($_POST['passwd_one'] != $_POST['passwd_two']) {
   $error = 2;
}
else {
     $pass = hash("whirlpool", $_POST['passwd_one']);
}
if (strlen($_POST['passwd_one']) < 8 || strlen($_POST['passwd_one']) > 40) {
   $error = 3;
}
if (strlen($_POST['login']) < 3 || strlen($_POST['login']) > 18) {
   $error = 4;
}
if (strlen($_POST['prenom']) < 3 || strlen($_POST['nom']) < 3 || strlen($_POST['mail']) < 7) {
  $error = 7;
}

else {
     $login = $_POST['login'];
}

if ($error != 0) {
   header('Location: forms.php?r=' . $error);
   exit;
}

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$mail = $_POST['mail'];
$val = uniqid();

include 'config/database.php';
$req_pre = mysqli_prepare($connection, 'SELECT * FROM users WHERE login = ?');\
mysqli_stmt_bind_param($req_pre, "s", mysql_real_escape_string($login));
mysqli_stmt_execute($req_pre);
if (mysqli_stmt_fetch($req_pre)) {
   $error = 5;
}
else if ($error == 0) {
     mysqli_close($connection);
     include 'config/database.php';
     $req_pre = mysqli_prepare($connection, 'INSERT INTO users (login, pass, prenom, nom, mail, validation) VALUES (?, ?, ?, ?, ?, ?)');
     mysqli_stmt_bind_param($req_pre, "sssssi", $login, $pass, $prenom, $nom, $mail, $val);
     mysqli_stmt_execute($req_pre);

     $destinataire = $mail;
     $sujet = "Camagru Activation" ;
     $entete = "From: inscription@camagru.com" ;

     $message = '
     Pour activer votre compte, veuillez cliquer sur le lien ci dessous
     ou copier/coller dans votre navigateur internet.

     http://localhost:8080/camagru/validation.php?log='.$login.'&cle='.$val.'


     ---------------
     Ceci est un mail automatique, Merci de ne pas y répondre.';


     mail($destinataire, $sujet, $message, $entete);
     $error = 6;
}

header('Location: forms.php?r=' . $error);
exit;
?>
