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

      <!-- Hier laten we de slide show zien -->
      <div id="carouselExampleControls" class="carousel slide w-75 sliderCenter" data-ride="carousel">
        <div class="carousel-inner ">
          <div class="carousel-item">
            <img class="d-block w-100" src="img\slideshow\CloseUp.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="img\slideshow\MeatGrill.jpg" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="img\slideshow\OnFarm.jpg" alt="Third slide">
          </div>
          <div class="carousel-item active">
            <img class="d-block w-100" src="img\slideshow\bbw-junkie-1024x683.jpg" alt="First slide">
          </div>
        </div>

        <div class="container" id="hoofdpagina">
          <!-- In deze row laten we de introductie van de pagina zien -->
          <div class="row">
            <div class="col">

            </div>
            <div class="col-5 ">
              <img class="homePageImg" src="img\fixed\The_Bastard_Large\CloseUp.jpg" alt="">
            </div>
            <div class="col-5">
              <h1>De prefecte zomer</h1>
              <p>De zomer staat weer voor de boeg. Het blijft weer langer licht. Het word weer warmer. Krijg je dan ook geen zin om te gaan BBQ'en. BackYardBBQ verkoopt een aantal van de beste BBQ's van de wereld. Deze BBQ's zijn op zoek naar echte Grill Masters. Ben jij er een die deze beesten kan temmen en je vrienden jaloers maakt met het best bereide vlees?</p>
            </div>
            <div class="col">

            </div>
          </div>
          <!-- In deze row geven we de introductie naar het verhuren en is er een buttom om naar de BBQ pagina te gaan -->
          <div class="row">
            <div class="col">

            </div>
            <div class="col-5">
              <h1>Huren</h1>
              <p>BackYardBBQ geeft je de mogelijkheid om een BBQ te huren. Door te huren kunt u de BBQ zelf testen of de BBQ bij je past. Ben jij bereid om de Grill Master van de buurt te worden?</p>
              <!-- hier is de button die je naar de BBQ pagina brengt -->
              <div class="BBQBtn">
                Kijk naar BBQ's
              </div>
            </div>
            <div class="col-5">
              <img class="homePageImg" src="img\fixed\Big_Green_Egg_Medium\OnWheels.jpg" alt="">
            </div>
            <div class="col">

            </div>
          </div>
          <!-- in deze row laten we de social media zien -->
          <div class="row">
            <div class="col">

            </div>
            <div class="col-5">
              <img class="homePageImg" src="img\fixed\Big_Green_Egg_Large\WithTable.jpg" alt="">
            </div>
            <div class="col-5" id="socialMediaData">
              <h1>Social Media</h1>
              <table>
                <tr>
                  <td class="imgTableCell"><img src="img\socialmedia\facebook.png" class="socialMediaImg" alt=""></td>
                  <td><p>@BackYardBBQ</p></td>
                </tr>
                <tr>
                  <td class="imgTableCell"><img src="img\socialmedia\instagram.png" class="socialMediaImg" alt=""></td>
                  <td><p>@BackYardBBQ</p></td>
                </tr>
                <tr>
                  <td class="imgTableCell"><img src="img\socialmedia\twitter.png" class="socialMediaImg" alt=""></td>
                  <td><p>@BackYardBBQ</p></td>
                </tr>
              </table>
            </div>
            <div class="col">

            </div>
          </div>
        </div>
      </div>
      <?php
                  //Scripts includen
            include("inc/scripts.php");
        ?>
  </body>
</html>
