<?php
session_start();
if (isset($_SESSION['login']))
   header('Location: index.php');
if ($_GET['l'] == 3)
   header('Location: index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/form.css">
	<title>Camagru</title>
</head>
<body>

		<div id="nav">
		     <div class="con"><a href="index.php">< Go back</a></div>
</div>

	<br />
	<div class="content">
	<h1> Creer un compte </h1>

	<?php
	switch ($_GET['r']) {
	       case 2:
			echo "Your passwords are differents.<br />";
			     	   break;
					case 3:
						echo "<div class='error'>Your password must be between 8 and 40 chars.<br /> </div>";
						     	   break;
								case 4:
									echo "<div class='error'>Your login must be between 3 and 18 chars.<br /></div>";
									     	   break;
											case 5:
												echo "<div class='error'>This login is already in use.<br /></div>";
												     	   break;
                              case 7:
           												echo "<div class='error'>Not valable.<br /></div>";
           												 break;
														case 6:
															echo "<div class='ok'>Account created successfuly, you can now login.<br /></div>";
															     	      break;
																  default:
																     echo "<br />";
																	 }
																	 ?>

																	 <form method="post" action="register.php">
																	       Username: <br> <input type="text" name="login" /><br />
																	       		 Password: <br> <input type="password" name="passwd_one" /><br />
																			 	   Confirm: <br> <input type="password" name="passwd_two" /><br />
                                          Nom: <br> <input type="text" name="nom" /><br />
                                          Prenom: <br> <input type="text" name="prenom" /><br />
                                          Mail: <br> <input type="text" name="mail" /><br />
                                                 <input type="submit" name="submit" value="Register" />
																					     </form>
</div>
</body>
</html>
