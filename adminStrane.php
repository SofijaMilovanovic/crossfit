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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/dt-1.10.20/datatables.min.css"/>

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
          <h2 class="text-center">Administracija</h2>
          <h3 class="text-center" id="poruka">
          <?php
            if(isset($_GET['greska'])){
                echo $_GET['greska'];
            }
          ?>
          </h3>
          <div class="row">
          <div class="col-md-12" id="sviRezultati">

          </div>
        </div>

          <div class="row">
              <div class="col-md-9" >
                  <label for="user">Izaberi korinika</label>
                  <select class="form-control" id="user">

                  </select>
              </div>
              <div class="col-md-3" >
                  <label for="dugme">Promeni</label>

                  <button id="promeni" class="btn-primary" onclick="promeniRolu()">Promeni rolu korisnika</button>
              </div>
          </div>

          <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
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
  <script type="text/javascript" src="https://cdn.datatables.net/v/ju/dt-1.10.20/datatables.min.js"></script>

  <script src="js/main.js"></script>
  <script>
      $.ajax({
          url: 'vebServis/users',
          success: function (users) {
              let nalepi = '';
              $.each(users,function (i,user) {
                  nalepi += '<option value="'+ user.user_id + '">' + user.first_name + ' ' + user.last_name + '</option>';
              });
              $("#user").html(nalepi);
          }
      });
      function vratiRezultate(){
          $.ajax({
              url: 'kontroler.php?akcija=svi_rezultati',
              success: function (podaci) {
                  $("#sviRezultati").html(podaci);
                  $('#rez').DataTable();
              }
          });
      }
     vratiRezultate();

      function obrisiRezultat(id) {
          $.ajax({
              url: 'kontroler.php?akcija=obrisi&id='+id,
              success: function (poruka) {
                  $("#poruka").html(poruka);
                  vratiRezultate();
              }
          });
      }
      
      function promeniRolu() {
          let userID = $("#user").val();
          $.ajax({
              url: 'vebServis/promeniUAdmina/'+userID,
              type: 'PUT',
              success: function (poruka) {

                  $("#poruka").html(poruka);
              }
          });
      }
  </script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
      google.charts.load("current", {packages:['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

          let niz = [];
          niz.push(["WOD", "Broj unetih vremena", { role: "style" } ]);

          $.ajax({
              url: 'kontroler.php?akcija=grafik',
              success: function (podaci) {
                  let pod = JSON.parse(podaci);

                  $.each(pod,function (i,p) {
                      let clanNiza = [p.wod_name,parseInt(p.brojVremena),"gold"];
                      niz.push(clanNiza);
                  });
                  var data = google.visualization.arrayToDataTable(niz);

                  var view = new google.visualization.DataView(data);
                  view.setColumns([0, 1,
                      { calc: "stringify",
                          sourceColumn: 1,
                          type: "string",
                          role: "annotation" },
                      2]);

                  var options = {
                      title: "Broj unosa po wod-u",
                      width: 600,
                      height: 400,
                      bar: {groupWidth: "95%"},
                      legend: { position: "none" },
                  };
                  var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                  chart.draw(view, options);
              }
          });


      }
  </script>
  </body>
</html>