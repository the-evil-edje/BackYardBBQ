
<?php
      //database connection includen
      include("inc/database-connection.php");

      // de start of een sesion
      session_start();
      // hier word de sesion variable van reserverings id opgehaald en in een locale variable gezet.
      $ReserveringId = $_SESSION['reserveringId'];
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
          <div class="col">

          </div>
          <div class="col-10">
            <?php
            //hier word de sql query gedraait om de reserveringen op te halen.
            $sql = "SELECT Reserverings_Nummer, Voornaam, Insertion, Achternaam, Adres, Email, Telefoon_Nummer, Product_ID, Leveren, Start_Huur_Periode, Opmerkingen, Totale_Prijs
              FROM resevering";

              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                  // hier word de juiste reservering opgehaald die je als laatste hebt aangemaakt.
                  if ($ReserveringId ==  $row['Reserverings_Nummer']) {
                    ?>
                    <h1>dit is uw reservering:</h1>
                    <!-- in deze table word de reservering weergegeven -->
                    <table>
                      <tbody>
                        <!-- hier word je naam weergegeven -->
                        <tr>
                          <th>Naam:</th>
                          <td><?php echo $row['Voornaam']; ?>&nbsp<?php echo $row['Insertion']; ?>&nbsp<?php echo $row['Achternaam']; ?></td>
                        </tr>
                        <!-- hier word je adress weergegeven -->
                        <tr>
                          <th>Adres:</th>
                          <td><?php echo $row['Adres']; ?></td>
                        </tr>
                        <!-- hier word je email adress weergegeven -->
                        <tr>
                          <th>Email:</th>
                          <td><?php echo $row['Email']; ?></td>
                        </tr>
                        <tr>
                          <!-- hier word je telefoon nummer weergegeven -->
                          <th>Telefoon nummer:</th>
                          <td><?php echo $row['Telefoon_Nummer']; ?></td>
                        </tr>
                        <tr>
                          <!-- hier word je product weergegeven -->
                          <th>Product:</th>
                          <td><?php echo $row['Product_ID']; ?></td>
                        </tr>
                        <!-- hier word weergegeven of je het product opgehaald of afgeleverd wil hebben -->
                        <tr>
                          <th>Leveren of ophalen?</th>
                          <td><?php echo $row['Leveren']; ?></td>
                        </tr>
                        <!-- hier zie je de start datum van je reservering -->
                        <tr>
                          <th>Start huur periode:</th>
                          <td><?php echo $row['Start_Huur_Periode']; ?></td>
                        </tr>
                        <!-- hier zie je de opmerking die je eventueel geplaatst hebt -->
                        <tr>
                          <th>Opmerkingen:</th>
                          <td><?php echo $row['Opmerkingen']; ?></td>
                        </tr>
                        <!-- hier zie je de totale prijs van je reservering -->
                        <tr>
                          <th>Totale prijs:</th>
                          <td><?php echo $row['Totale_Prijs']; ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <?php
                  }
                }
              }
              else {echo "0 results";}
                 ?>
          </div>
          <div class="col">

          </div>
        </div>
      </div>
    <?php
                      //Scripts includen
          include("inc/scripts.php");
      ?>
</body>

</html>
