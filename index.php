<?php include 'header.php'; ?>
      <div class="content">
          <h1> Camagru </h1>
          <?php

            switch ($_GET['l']) {
                 case 1:
                    echo "<div class='error'> User not found. </div>";
                 break;
                case 2:
                    echo "<div class='error'> Wrong password. </div>";
                  break;
                case 4:
                  echo "<div class='error'> Vous n'avez pas validé votre compte.
                  <a href=''> [Send me a new mail] </a></div>";
                break;

                }
            ?>

          <?php if (!($_SESSION['login'])) {
         echo "
                <div class='connexion'>
                <form method='post' action='login.php'>
                <input type='text' name='login' placeholder='Identifiant' /><br />
                <input type='password' name='passwd' placeholder='Mot de passe' /><br />
                <input type='submit' name='submit' value='Login' />
                </form>
                <div class='suscribe'> <a href='forms.php'> Créer un compte </a> </div>
                </div>
          "; }
          else {
            echo "<h2> Welcome " . $_SESSION['login'] . $_SESSION['photo'] . " :)</h2>
            <div id='goapp'> <a href='application.php'> Create new image </a> </div>";
          }
          ?>

	</div>

</body>
</html>
