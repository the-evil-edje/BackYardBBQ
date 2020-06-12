<?php
      //database connection includen
      include("inc/database-connection.php");
      // hier word een sessie gestart
      session_start();
      // hier word de session variable vraag id in de locale variable gezet
      $VraagId = $_SESSION['vraagId'];
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
          // deze sql query word gedraaid om de vragen op te halen.
          $sql = "SELECT Vraag_ID, Voornaam, Insertion, Achternaam, Email, Vraag
            FROM vragen";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
                // hier word gekeken naar de vraag id om de informatie van de juiste vraag op te halen.
                if ($VraagId ==  $row['Vraag_ID']) {
                  ?>
                  <h1>dit is uw vraag:</h1>
                  <table>
                    <tbody>
                      <!-- hier word je naam weergeven -->
                      <tr>
                        <th>Naam:</th>
                        <td><?php echo $row['Voornaam']; ?>&nbsp<?php echo $row['Insertion']; ?>&nbsp<?php echo $row['Achternaam']; ?></td>
                      </tr>
                      <!-- hier word je email weergegeven -->
                      <tr>
                        <th>Email:</th>
                        <td><?php echo $row['Email']; ?></td>
                      </tr>
                      <!-- hier word je vraag weergegeven -->
                      <tr>
                        <th>Vraag:</th>
                        <td><?php echo $row['Vraag']; ?></td>
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
