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
          <h2 class="text-center">Rezultati korisnika</h2>
          <p class="text-center" id="poruka"></p>

          <div class="row">
          <div class="col-md-12">
              <input type="hidden" value="<?= $_SESSION['user']->getUserID(); ?>" id="userID" name="userID">

              <label for="wod">Izaberi wod za pretragu</label>
              <select class="form-control" id="wod">

              </select>

              <label for="sort">Poredjaj vremena</label>
              <select class="form-control" id="sort">
                  <option value="asc">Najbolja ka najgorem</option>
                  <option value="desc">Najgora ka najboljem</option>
              </select>
              <hr>
              <button onclick="pretraziISortiraj()" class="btn-primary btn">Pretrazi</button>
          </div>
              <br>
          <div class="col-md-12" id="rezultati">

          </div>
          <div class="col-md-12">
              <a href="generisiPDF.php" class="btn-primary btn btn-lg">Odstampaj sve rezultate</a>
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
  <script>
      $.ajax({
          url: 'vebServis/wods',
          success: function (treninzi) {
              console.log(treninzi);
              let nalepi = '';
              $.each(treninzi,function (i,wod) {
                  nalepi += '<option value="'+ wod.id + '">' + wod.wod_name + '</option>';
              });
              $("#wod").html(nalepi);
              pretraziISortiraj();
          }
      });
      
      function pretraziISortiraj() {
          $.ajax({
              url: 'vebServis/rezultati/' + $("#sort").val() + '/'+ $("#wod").val(),
              success: function (rezultati) {

                  let nalepi = '<table class="table">';
                  nalepi += '<thead>';
                  nalepi += '<tr>';
                  nalepi += '<th>Rank</th>';
                  nalepi += '<th>Korisnik</th>';
                  nalepi += '<th>WOD</th>';
                  nalepi += '<th>Vreme</th>';
                  nalepi += '</tr>';
                  nalepi += '</thead>';
                  nalepi += '<tbody>';

                  let counter = 0;

                  $.each(rezultati,function (i,rezultat) {
                      counter++;
                      if(rezultat.user_id == $("#userID").val()){
                          nalepi += '<tr style="color:red">';
                      }else{
                          nalepi += '<tr>';
                      }

                      nalepi += '<td>'+counter+'</td>';
                      nalepi += '<td>'+rezultat.first_name+' '+rezultat.last_name+'</td>';
                      nalepi += '<td>'+rezultat.wod_name+'</td>';
                      nalepi += '<td>'+rezultat.minutes+':'+rezultat.seconds+'</td>';
                      nalepi += '</tr>';
                  });
                  nalepi += '</tbody>';
                  nalepi += '</table>';
                  $("#rezultati").html(nalepi);
              }
          })
      }
  </script>

  </body>
</html>