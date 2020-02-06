<?php
include "autoload.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Crossfit - District 11010</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body style="background-image: url('images/bg.jpg');">
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <?php include "meni.php"; ?>
  
    <div class="slide-one-item home-slider owl-carousel">
      
      <div class="site-blocks-cover inner-page" style="background-image: url(images/bg.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h1>Dobrodosli u district</h1>
              <span class="caption d-block text-white">Proveri nase grupne treninge</span>
            </div>
          </div>
      </div>

      <div class="site-blocks-cover inner-page" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h1>Takmici se sa samim sobom</h1>
              <span class="caption d-block text-white">Pogledaj nase treninge i postavi svoje vreme</span>
            </div>
          </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <p class="mb-5"><img src="images/trening.jpg" alt="Image" class="img-fluid"></p>
          </div>
          <div class="col-lg-5 ml-auto">
            <h2 class="site-section-heading mb-3">O Klubu</h2>
            <p>Nalazimo se na lokaciji Vojvode Stepe 344 na Voždovcu, gde su svi treneri licencirani od strane CrossFit-a, licencama CF L1 Trainer, sa dugogodišnjim iskustvom u radu sa klijentima, na 300m2 prijatnog prostora i pozitivne atmosfere, vode grupu pazeći na tehniku izvodjenja pokreta, bodreći i motivišući sve članove.</p>
            <p><a href="wods.php" class="btn btn-outline-primary py-2 px-4">Pogledaj neke od nasih treninga</a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <h2 class="site-section-heading text-center">Vrste vezbi</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 text-center mb-4">
            <div class="border p-4 text-with-icon">
              <span class="flaticon-weightlifting icon display-4 mb-4 d-block text-primary"></span>
              <h2 class="h5">Vezbe snage</h2>
              <p>Pomericete granicu vase snage</p>
            </div>
          </div>
          <div class="col-md-4 text-center mb-4">
            <div class="border p-4 text-with-icon">
              <span class="flaticon-exercise-1 icon display-4 mb-4 d-block text-primary"></span>
              <h2 class="h5">Bicikla</h2>
              <p>Popularni assault bike je nesto sto vase noge mrze</p>
            </div>
          </div>
          <div class="col-md-4 text-center mb-4">
            <div class="border p-4 text-with-icon">
              <span class="flaticon-exercise-2 icon display-4 mb-4 d-block text-primary"></span>
              <h2 class="h5">Trbusnjaci</h2>
              <p>Za jak stomak i pravo telo</p>
            </div>
          </div>
          <div class="col-md-4 text-center mb-4">
            <div class="border p-4 text-with-icon">
              <span class="flaticon-weightlifting-1 icon display-4 mb-4 d-block text-primary"></span>
              <h2 class="h5">Pomoc trenera</h2>
              <p>Uvek mozete ocekivati pomoc trenera, pogotovu sa vecim kilazama</p>
            </div>
          </div>
          <div class="col-md-4 text-center mb-4">
            <div class="border p-4 text-with-icon">
              <span class="flaticon-exercise-3 icon display-4 mb-4 d-block text-primary"></span>
              <h2 class="h5">Roleri za stomak</h2>
              <p>U klubu mozete naci veliki broj rolera za stomak</p>
            </div>
          </div>
          <div class="col-md-4 text-center mb-4">
            <div class="border p-4 text-with-icon">
              <span class="flaticon-exercise icon display-4 mb-4 d-block text-primary"></span>
              <h2 class="h5">Iskoraci</h2>
              <p>Sveta vezba svih zena</p>
            </div>
          </div>

        </div>
      </div>
    </div>

    <footer class="site-footer">
      <div class="container">

        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            Copyright &copy; <script>document.write(new Date().getFullYear());</script> All Rights Reserved
            </p>
          </div>
          <div class="col-md-12">
            <p>
              <a href="#" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
              <a href="#" class="p-2"><span class="icon-twitter"></span></a>
              <a href="#" class="p-2"><span class="icon-instagram"></span></a>
              <a href="#" class="p-2"><span class="icon-vimeo"></span></a>

            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

  </body>
</html>