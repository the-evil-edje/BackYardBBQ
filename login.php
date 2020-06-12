<?php
      //database connection includen
      include("inc/database-connection.php");

      $loginCorrect = "";

      // als er iets in de input velden veranderd word dat hier in deze variables gezet.
      if (isset($_GET['gebruikersNaam'])) {
        $gebruikersnaam = $_GET['gebruikersNaam'];
      }

      if (isset($_GET['Wachtwoord'])) {
        $wachtwoord = $_GET['Wachtwoord'];
      }
  ?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>BackYardBBQ</title>
  <meta name="deze pagina is gemaakt om een BBQ the huren" content="BackYardBBQ">
  <meta name="Eddie Beelen" content="Bits ’N Bytes">


  <?php
        //Stylesheets includen
        include("inc/stylesheets.php");
    ?>
</head>
<body>
  <?php
        //header includen
        include("inc/header.php");
    ?>

    <div class="container">
      <div class="row">
        <div class="col-2">

        </div>
        <div class="col-7 login">
          <h1>Login</h1>
        </div>
        <div class="col-3">

        </div>
      </div>
      <div class="row">
        <div class="col-3">

        </div>
        <div class="col-6">
          <!-- in deze form zit het inloggen -->
          <form id="reserveringen" method="GET">
                <table>
                  <!-- gebruikers naam -->
                  <tr>
                    <td>Gebruikers naam:</td>
                    <td><input type="text" name="gebruikersNaam" required></td>
                  </tr>
                  <!-- wachtwoord -->
                  <tr>
                    <td>Wachtwoord:</td>
                    <td><input type="password" name="Wachtwoord"></td>
                  </tr>
                </table>
                <input type="submit" class="tableButton" name="Submit" value="Inloggen">
                <?php
                      // als er op de submit button gedrukt word dan word deze functie aangeroepen
                      if (isset($_GET['Submit'])) {
                        // deze sql query haalt de gebruikersnaam en wachtwoord op
                        $sql = "SELECT Gebruikers_Naam, Wachtwoord
                          FROM gebruikers";

                          $result = mysqli_query($conn, $sql);

                          if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                              // hier word er gekeken of de gebruikersnaam en het wachtwoord kloppen
                              if ($row['Gebruikers_Naam'] == $gebruikersnaam && $row['Wachtwoord'] == $wachtwoord) {

                                // hier word er weer een session gestart
                                session_start();
                                // hier word er variable in de session gezet
                                $_SESSION['LoggedIn'] = 'true';
                                $loginCorrect = "true";
                              }
                            }
                          }
                          if ($loginCorrect == "true") {
                            // hier sturen we je door naar de reserveringslijst pagina
                            header("Location: reserveringslijst.php");
                          }
                          else {
                            echo "gebruikersnaam of wachtwoord onjuist";
                          }
                      }
                  ?>
              </form>

        </div>
        <div class="col-3">

        </div>
      </div>
    </div>
      <?php
          //Scripts includen
          include("inc/scripts.php");
      ?>
</body>

</html>
