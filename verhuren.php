<?php
      //database connection includen
      include("inc/database-connection.php");

      // het starten van de session
      session_start();

      $Verhuren = $_SESSION['BbqVerhuren'];

    // init variables
		$firstName = "";
		$insertion = "";
		$lastName = "";
    $adres = "";
		$emailAdress = "";
		$telefoonNummer = "";
		$product = "";
		$leveren = "";
    $startHuurPeriode = "";
    $opmerkingen = "";
    $totalePrijs = "30";

//als er iets in de input velden veranderd word word het hier in de variables gezet
if (isset($_GET['firstName'])) {
	$firstName = $_GET['firstName'];
}

if (isset($_GET['insertion'])) {
	$insertion = $_GET['insertion'];
}

if (isset($_GET['lastName'])) {
	$lastName = $_GET['lastName'];
}

if (isset($_GET['adress'])) {
	$adres = $_GET['adress'];
}

if (isset($_GET['emailAdress'])) {
	$emailAdress = $_GET['emailAdress'];
}

if (isset($_GET['telefoonNummer'])) {
	$telefoonNummer = $_GET['telefoonNummer'];
}

if (isset($_GET['product'])) {
  $product = $_GET['product'];
}

if (isset($_GET['leveren'])) {
	$leveren = $_GET['leveren'];
}

if (isset($_GET['startHuurPeriode'])) {
	$startHuurPeriode = $_GET['startHuurPeriode'];
}

if (isset($_GET['opmerkingen'])) {
	$opmerkingen = $_GET['opmerkingen'];
}

//de functie die je doorstuurd naar de bevesteging van de reservering
function NaarBevesteging() {
  header("Location: bevestegingreservering.php");
}

// als er op de submit button geklikt word dan word deze functie aangeroepen
if (isset($_GET['Submit'])) {
  //hier word de totale prijs berekend die je moet gaan betalen.
  if ($leveren == 'leveren') {
    $totalePrijs = $totalePrijs + 15;
  }

  //hier is de sql query die gedraaid word om de reserveringen in de database te zetten.
  $sql = "INSERT INTO resevering (Voornaam, Insertion, Achternaam, Adres, Email, Telefoon_Nummer , Product_ID, Leveren, Start_Huur_Periode, Opmerkingen, Totale_Prijs)
  VALUES ('$firstName', '$insertion', '$lastName', '$adres', '$emailAdress', '$telefoonNummer', '$product', '$leveren', '$startHuurPeriode', '$opmerkingen', '$totalePrijs')";

  //hier worde alle variables weer geleegd
  $firstName = "";
  $insertion = "";
  $lastName = "";
  $adres = "";
  $emailAdress = "";
  $telefoonNummer = "";
  $product = "";
  $leveren = "";
  $startHuurPeriode = "";
  $opmerkingen = "";
  $totalePrijs = "30";

  //hier word er een nieuwe sql aangeroepen om de laatste(degene die je net hebt aangemaakt) reservering op te roepen.
   if (mysqli_query($conn, $sql)) {
     //hier is de sql query die gedraaid word om de laatste reservering op te halen.
     $sql = "SELECT MAX(Reserverings_Nummer) AS Max_Reserverings_Nummer
       FROM resevering";

       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($result);

       // hier word de reservering id van de laatste reservering in een sesion variable gezet.
       $_SESSION['reserveringId'] = $row['Max_Reserverings_Nummer'];

       // hier word de functie aangeroepen om naar de bevestegings pagina te gaan.
       NaarBevesteging();
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  };
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
        <div class="col-3">

        </div>
        <div class="col-6 verhurenInfo">
          <h1>Verhuren</h1>
          <p>Door het invullen van deze gegevens kunt u nu uw eigen BBQ huren</p>
        </div>
        <div class="col-3">

        </div>
      </div>
      <div class="row">
        <div class="col">

        </div>
        <div class="col-10">
          <!-- hier zie je alle invul velden die je moet invullen voor de reservering. -->
          <form id="reserveringen" method="GET">
                <table class="tableText">
                  <!-- hier is de naam input -->
                  <tr>
                    <td>First name:</td>
                    <td><input Action="none" type="text" name="firstName" class="tableInputText" required></td>
                  </tr>
                  <!-- hier is de insertion input -->
                  <tr>
                    <td>Insertion:</td>
                    <td><input Action="none" type="text" name="insertion" class="tableInputText"></td>
                  </tr>
                  <!-- hier is de achternaam input -->
                  <tr>
                    <td>Last name:</td>
                    <td><input Action="none" type="text" name="lastName" class="tableInputText" required></td>
                  </tr>
                  <!-- hier is het adres input -->
                  <tr>
                    <td>Adress:</td>
                    <td><input Action="none" type="text" name="adress" class="tableInputText" required></td>
                  </tr>
                  <!-- hier is de email input -->
                  <tr>
                    <td>Email adress:</td>
                    <td><input Action="none" type="email" name="emailAdress" class="tableInputText" required></td>
                  </tr>
                  <!-- hier is de telefoon nummer input -->
                  <tr>
                    <td>Telefoon nummer:</td>
                    <td><input Action="none" type="number" max="9999999999" min="1" name="telefoonNummer" class="tableInputText" required></td>
                  </tr>
                  <!-- elke product naam word uit de database gehaald. deze kun je selecteren doormiddel van een dropdown -->
                  <tr>
                    <td>Product:</td>
                    <td>

                      <!-- hier is de dropdown -->
                      <select Action="none" name="product" form="reserveringen" class="tableInputText" required>
                        <?php
                        // hier is de sql query die gedraaid word om elke product naam op te halen samen met het product ID
                        $sql = "SELECT Product_Naam, Product_ID
                          FROM product";

                          $result = mysqli_query($conn, $sql);

                          if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                              if ($Verhuren == $row['Product_Naam']) {
                                ?>
                                <!-- hier word elke optie weergeven van elk product. elk product heeft een waarde met zn product id -->
                                <option value="<?php echo $row['Product_ID']; ?>" selected><?php echo $row['Product_Naam']; ?></option>
                                <?php
                              }
                              else {
                                ?>
                                <!-- hier word elke optie weergeven van elk product. elk product heeft een waarde met zn product id -->
                                <option value="<?php echo $row['Product_ID']; ?>"><?php echo $row['Product_Naam']; ?></option>
                                <?php
                              }
                            }
                          }
                          else {echo "0 results";}
                             ?>
                      </select>
                    </td>
                  </tr>
                  <!-- hier is de input waar je aangeeft of je het product komt ophalen of afgeleverd wil hebben -->
                  <tr>
                    <td>Wil je het product geleverd krijgen of wil je het ophalen?</td>
                    <td>
                      <select Action="none" form="reserveringen" name="leveren" class="tableInputText" required>
                        <option value="leveren">leveren</option>
                        <option value="ophalen">ophalen</option>
                      </select>
                    </td>
                  </tr>
                  <!-- hier geef je de start van je huur periode aan -->
                  <tr>
                    <td>Start van de huur periode:</td>
                    <td><input Action="none" type="date" name="startHuurPeriode" class="tableInputText" required></td>
                  </tr>
                  <!-- hier geef je eventueel nog extra opmerkingen aan -->
                  <tr>
                    <td>opmerkingen</td>
                    <td><textarea name="opmerkingen" rows="3" cols="40"></textarea></td>
                    <!-- <td><input Action="none" type="text" name="opmerkingen"></td> -->
                  </tr>
                  <!-- hier is een check box om de klant overeenkomst te accepteren -->
                  <tr>
                    <!-- hier is een link naar de klantovereenkomst die een extra tab opent om de klantovereenkomst te lezen -->
                    <td><a href="klantovereenkomst.php" target="_blank" class="klantOvereenkomstTekst"><p>Klik hier om de klant overeenkomst te zien:</p></a></td>
                    <td><p>Ik accepteer de klantovereenkomst:<input type="checkbox" name="" value="" required></P></td>
                  </tr>
                </table>
                <!-- hier is de submit button -->
              <input class="tableText tableButton" Action="none" type="submit" name="Submit" value="Submit">
              </form>
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
