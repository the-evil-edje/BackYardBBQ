<?php
$SlideshowNumber = 0;


if (isset($_GET['Submit'])) {
  //hier word de totale prijs berekend die je moet gaan betalen.
  session_start();
  $_SESSION['BbqVerhuren'] = $_GET['Submit'];
  header("Location: verhuren.php");
}


?>


<?php
      //database connection includen
      include("inc/database-connection.php");
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

    <div>
      <div class="BbqContainer container">
      <!-- hier halen we de data op vanuit de database om all BBQ informatie te laten zien -->
			<?php
      // hier word de sql query gedraaid om alle informatie van de producten uit de database te halen.
			$sql = "SELECT Product_ID, Product_Naam, Product_Merk, Close_Up_Foto, Foto_1, Foto_2, Kg, Grid_Diameter, Oppervlakte, Hoogte, Korte_Omschrijving
			  FROM product";

				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
  				// output data of each row
  				while($row = mysqli_fetch_assoc($result)) {
            $SlideshowNumber = $SlideshowNumber + 1;
						?>
              <!-- in elke row laten we aan de linker kant de fotoslideshow zien en aan de rechter kant laten we de data van elk product zien. -->
              <div class="row">
                <div class="col">
                </div>
                <!-- hier komt de slideshow te staan -->
                  <div class="BbqImageContainer col-5">
                    <!-- Slideshow container -->
                    <div class="slideshow-container ">

                      <!-- Full-width images with number and caption text -->
                      <div class="mySlides<?php echo $SlideshowNumber; ?>">
                        <img src="<?php echo $row['Close_Up_Foto']; ?>" style="width:100%">
                      </div>

                      <div class="mySlides<?php echo $SlideshowNumber; ?>">
                        <img src="<?php echo $row['Foto_1']; ?>" style="width:100%">
                      </div>

                      <div class="mySlides<?php echo $SlideshowNumber; ?>">
                        <img src="<?php echo $row['Foto_2']; ?>" style="width:100%">
                      </div>

                      <!-- Next and previous buttons -->
                      <a class="prev" onclick="plusSlides(-1, <?php echo $SlideshowNumber - 1; ?>)">&#10094;</a>
                      <a class="next" onclick="plusSlides(1, <?php echo $SlideshowNumber - 1; ?>)">&#10095;</a>
                    </div>
                  </div>
                  <!-- hier komt de product informatie te staan -->
                  <div class="BbqInfoContainer col-5">
                    <div class="BbqData">
                      <p><h1><?php echo $row['Product_Naam']; ?></h1></p>
                      <p><?php echo $row['Korte_Omschrijving']; ?></p>
                      <table class="tableText">
                        <tr>
                          <td>Grid diameter: &nbsp</td>
                          <td> <?php echo $row['Grid_Diameter']; ?> cm</td>
                        </tr>
                        <tr>
                          <td>Oppervlakte: &nbsp</td>
                          <td> <?php echo $row['Oppervlakte']; ?> cm2</td>
                        </tr>
                        <tr>
                          <td>Hoogte: &nbsp</td>
                          <td> <?php echo $row['Hoogte']; ?> cm</td>
                        </tr>
                        <tr>
                          <td>Gewicht: &nbsp</td>
                          <td> <?php echo $row['Kg']; ?> kg</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="col">

                  </div>
                </div>
                <div class="row">
                  <div class="col-6">

                  </div>
                  <div class="col-5">
                    <form class="" method="get">
                        <input class="naarVerhuurBtn" Action="none" type="submit" name="Submit" value="Klik hier om de <?php echo $row['Product_Naam']; ?> verhuren?">
                    </form>

                  </div>
                  <div class="col">

                  </div>

                </div>

  						<?php
  					}
  				}
  				else {echo "0 results";}
  				   ?>
      </div>
		</div>
    <?php
          //Scripts includen
          include("inc/scripts.php");
      ?>
</body>

</html>
