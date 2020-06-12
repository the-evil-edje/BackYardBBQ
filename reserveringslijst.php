<?php
      //database connection includen
      include("inc/database-connection.php");
      // hier word er een session gestart
      session_start();
      // hier word er gekeken of de sesion variable true is. zo niet ben je niet ingelogd en word je meteen terug gestuurd naar de login pagina
      if ($_SESSION['LoggedIn'] == !'true') {
        header("Location: login.php");
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

    <div class="container" id="reserveringsBtn">
      <!-- in deze row zitten 2 buttons -->
      <div class="row">
        <div class="col-6">
          <!-- bij deze button zit een onclick event dat wanneer je er op klikt de vragenlijst invisible word en de reserveringen lijst visible -->
          <div class="reserveringLijstBtn btnBeheerder">
            Kijk naar reserveringen
          </div>
        </div>
        <div class="col-6">
          <!-- bij deze button zit een onclick event dat wanneer je er op klikt de reserveringen invisible word en de vragenlijst lijst visible -->
          <div class="vragenLijstBtn btnBeheerder">
            Kijk naar vragen
          </div>
        </div>
      </div>
    </div>

    <!-- in deze container zitten de reserveringen -->
    <div class="container-fluid" id="reserveringsLijst">
      <div class="row">
        <div class="col">
        </div>
        <div class="col-10">
          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Naam</th>
                <th scope="col">Adres</th>
                <th scope="col">Email</th>
                <th scope="col">Telefoon nummer</th>
                <th scope="col">Product</th>
                <th scope="col">Leveren of ophalen</th>
                <th scope="col">#Start huur periode</th>
                <th scope="col">Opmerkingen</th>
                <th scope="col">Totale prijs</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // deze sql query haalt alle informatie uit de reservering database. hij ordend dat met de reserverings nummer van hoog naar laag
              $sql = "SELECT Reserverings_Nummer, Voornaam, Insertion, Achternaam, Adres, Email, Telefoon_Nummer, Product_ID, Leveren, Start_Huur_Periode, Opmerkingen, Totale_Prijs
                FROM resevering
                ORDER BY Reserverings_Nummer DESC";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                      <th scope="row"><?php echo $row['Reserverings_Nummer']; ?></th>
                      <td><?php echo $row['Voornaam']; ?>&nbsp<?php echo $row['Insertion']; ?>&nbsp<?php echo $row['Achternaam']; ?></td>
                      <td><?php echo $row['Adres']; ?></td>
                      <td><?php echo $row['Email']; ?></td>
                      <td><?php echo $row['Telefoon_Nummer']; ?></td>
                      <td><?php echo $row['Product_ID']; ?></td>
                      <td><?php echo $row['Leveren']; ?></td>
                      <td><?php echo $row['Start_Huur_Periode']; ?></td>
                      <td><?php echo $row['Opmerkingen']; ?></td>
                      <td><?php echo $row['Totale_Prijs']; ?></td>
                    </tr>

                    <?php
                  }
                }
                else {echo "0 results";}
                   ?>
            </tbody>
          </table>
        </div>
        <div class="col">

        </div>
      </div>
    </div>

    <!-- in deze container zit de vragenlijst -->
    <div class="container-fluid" id="vragenLijst">
      <div class="row">
        <div class="col">

        </div>
        <div class="col-10">
          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Naam</th>
                <th scope="col">Email</th>
                <th scope="col-7">Vraag</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // deze sql query haalt alle informatie van de vragen op. deze worden gesorteerd van hoog naar laag aan de hand van de vraag id.
              $sql = "SELECT Vraag_ID, Voornaam, Insertion, Achternaam, Email, Vraag
                FROM vragen
                ORDER BY Vraag_ID DESC";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                      <th scope="row"><?php echo $row['Vraag_ID']; ?></th>
                      <td><?php echo $row['Voornaam']; ?>&nbsp<?php echo $row['Insertion']; ?>&nbsp<?php echo $row['Achternaam']; ?></td>
                      <td><?php echo $row['Email']; ?></td>
                      <td><?php echo $row['Vraag']; ?></td>
                    </tr>

                    <?php
                  }
                }
                else {echo "0 results";}
                   ?>
            </tbody>
          </table>
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
