<?php
session_start();
if (!isset($_SESSION['login']))
  header('Location: index.php');
$login = $_SESSION['login'];
$photoprofil = $_SESSION['photo'];
include 'header.php';

include 'config/database.php';
$req_pre = mysqli_prepare($connection, 'SELECT photo FROM users WHERE login = ?');
mysqli_stmt_bind_param($req_pre, "s", $login);
mysqli_stmt_execute($req_pre);
mysqli_stmt_bind_result($req_pre, $photo);
?>

<div class="content">
  <?php
    echo "<img class='photoprofil' src='upload/" . $photoprofil . "'/>"; ?>
<h1> <?php echo $login . "'s profile" . $_SESSION['photo'] ; ?> </h1>

<?php
  switch ($_GET['e']) {
    case 1:
      echo "<div class='error'> The new password and the confirmation are differents.</div>";
      break;
    case 2:
      echo "<div class='error'> The password length must be between 8 and 40 chars.</div>";
      break;
    case 3:
      echo "<div class='error'>Wrong password.</div>";
      break;
    case 4:
      echo "<div class='ok'>Success !</div>";
      break;
    case  5:
      echo "<div class='ok'>Photo de profil mise a jour !</div>";
      break;
    case 6:
    echo "<div class='error'>Désolé, ça n'a pas marché :( </div>";
      break;
    case 7:
      echo "<div class='error'>Vous devez uploader un fichier de type png, gif, jpg ou jpeg.</div>";
    break;
  }
?>
<div class="info">
  <div class="pass">
  <h2> Mot de passe </h2>
  <form method="post" action="change_pw.php">
      Mot de passe actuel: <input type="password" name="old_pwd" /><br />
      Nouveau mot de passe: <input type="password" name="new_pwd" /><br />
      Repeter mot de passe: <input type="password" name="confirm" /><br />
      <input type="submit" name="submit" value="Change" />
  </form>
  </div>
  <div class="pass">
    <h2> Compte </h2>
    <h3> Modifier photo de profil </h3>

<form method="POST" action="upload.php" enctype="multipart/form-data">
   Fichier : <input type="file" name="avatar">
   <input type="submit" name="envoyer" value="Changer de photo">
</form>

  </div>
</div>
</div>
</body>
</html>
