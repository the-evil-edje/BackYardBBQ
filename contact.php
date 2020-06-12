<?php
      //database connection includen
      include("inc/database-connection.php");

      // dit is de start van een session
      session_start();

      // hier worden de variables aangemaakt
      $firstName = "";
      $insertion = "";
      $lastName = "";
      $emailAdress = "";
      $vraag = "";

  // //als er iets in de input velden veranderd word word het hier in de variables gezet
  if (isset($_GET['firstName'])) {
    $firstName = $_GET['firstName'];
  }

  if (isset($_GET['insertion'])) {
    $insertion = $_GET['insertion'];
  }

  if (isset($_GET['lastName'])) {
    $lastName = $_GET['lastName'];
  }

  if (isset($_GET['emailAdress'])) {
    $emailAdress = $_GET['emailAdress'];
  }

  if (isset($_GET['vraag'])) {
    $vraag = $_GET['vraag'];
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
          <div class="col">

          </div>
          <div class="col-10 contactInfo">
            <h1>Vraag stellen</h1>
            <p>Als je een vraag hebt kun je dat hier ingeven</p>
          </div>
          <div class="col">

          </div>
        </div>
        <div class="row">
          <div class="col-3">

          </div>
          <div class="col-6">
            <!-- in deze form kun je de vragen formulier invullen. -->
            <form id="reserveringen" class="tableText" method="GET">
            			<table>
                    <!-- hier vul je je voornaam in -->
            				<tr>
            					<td>First name:</td>
            					<td><input type="text" name="firstName" class="tableInputText" required></td>
            				</tr>
                    <!-- hier vul je je insertion in -->
            				<tr>
            					<td>Insertion:</td>
            					<td><input type="text" name="insertion" class="tableInputText"></td>
            				</tr>
                    <!-- hier vul je je achternaam in -->
            				<tr>
            					<td>Last name:</td>
            					<td><input type="text" name="lastName" class="tableInputText" required></td>
            				</tr>
                    <!-- hier vul je je email in -->
            				<tr>
            					<td>Email adress:</td>
            					<td><input type="email" name="emailAdress" class="tableInputText" required></td>
            				</tr>
                    <!-- hier stel je je vraag -->
                    <tr>
            					<td>Vraag:</td>
                      <td><textarea name="vraag" rows="4" cols="40"></textarea></td>
            					<!-- <td><input type="text" name="vraag" required></td> -->
            				</tr>
            			</table>
                <!-- hier is de submit button. als je op deze klikt word de vraag verwerkt -->
              	<input type="submit" class="tableText tableButton" name="Submit" value="Submit">
            		<?php
                // als er op de submit button geklikt word word deze functie aangeroepen.
                if (isset($_GET['Submit'])) {

                  // deze sql query word gedraaid om de vraag in de database te zetten.
            			$sql = "INSERT INTO vragen (Voornaam, Insertion, Achternaam, Email, Vraag)
            			VALUES ('$firstName', '$insertion', '$lastName', '$emailAdress', '$vraag')";

                  // hier worden de variables geleegd.
                  $firstName = "";
                  $insertion = "";
                  $lastName = "";
                  $emailAdress = "";
                  $vraag = "";

                  // in deze fuctie word de laatste (degene die je net hebt gemaakt) opgehaald
          				 if (mysqli_query($conn, $sql)) {
                     // deze sql query haalt de laatste vraag op
                     $sql = "SELECT MAX(Vraag_ID) AS Max_Vraag
                       FROM vragen";


                       $result = mysqli_query($conn, $sql);
                       $row = mysqli_fetch_assoc($result);

                    // hier word de vraag id opgeslagen in een session variable
                     $_SESSION['vraagId'] = $row['Max_Vraag'];

                     // hier word je doorverwezen naar de bevestegingsformulier pagina
                     header("Location: bevestegingformulier.php");
          				} else {
          						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          				};
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
