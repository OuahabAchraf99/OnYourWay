<?php
session_start();
if ($_SESSION['connected']==false){
        header('LOCATION: ../../connexion/connexion.php');}
        else{
$id = $_SESSION['ID'];
$host="127.0.0.1";
$user="root";
$password="";
$database="projet2cpi";
$connect=mysqli_connect($host,$user,$password,$database);
if(mysqli_connect_errno())
{
    die("error in connection to the database :".mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Mes dettes</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="dark-edition" style="background-color: #f8f9fa">
  <!-- <nav class="navbar navbar-expand-lg navbar-light " >
      <a class="navbar-brand" href="../accueil/index.php">
        <img src="logoDark.svg" width="auto" height="60px;" style="margin-top:-24px; margin-bottom:-20px; margin-left:5px;" alt="Logo OYW">
        O<span>Y</span>W
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto text-uppercase" style="position: relative;left: 100px">
          <li class="nav-item">
            <a class="nav-link" href="../colis/HTML/colisForm.php">Expédier un colis</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../trajet/HTML/trajetForm.php">Proposer un trajet</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../recherche/recherch_final.php">Voir les annonces</a>
          </li>
          
        </ul>
        <ul class="navbar-nav ml-auto text-uppercase">
          
          <!--<li class="nav-item">
            <a class="btn btn-primary  js-scroll-trigger" id="nav-btn-primary" href="">S'inscrire</a>
          </li>
          
          
        </ul>

        
      </div>
    </nav> -->
  <div class="wrapper ">
    <div class="sidebar" data-color="#FFCA28" data-background-color="#B7B5BE" data-image="../assets/img/livraison.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
     <div class="logo" style="background-color: #212533">
        <a class="navbar-brand mr-1" href="../../accueil/index.php" style="position: relative;right: -50px;font-weight: bold;font-size: 30px;color: white" >O<span style="color: #FFCA28">Y</span>W</a>
        <a href="../../accueil/index.php"><img class="navbar-brand mr-1"  SRC="../assets/img/logo.svg" ALT="some text" WIDTH=80 HEIGHT=60 style="position: relative;right: -50px"></a>
      </div>

      <div class="sidebar-wrapper" style="background-color: #212533;">
        <ul class="nav">
          <li class="nav-item  ">
            <a class="nav-link" href="../../dashboard/Dashboard1.php">
              <i class="material-icons">dashboard</i>
              <p style="font-weight: bold;color: white">Dashboard</p>
            </a>
          </li>
          <li class="nav-item  ">
            <a class="nav-link" href="profile.php">
              <i class="material-icons">person</i>
              <p style="font-weight: bold;color: white">Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="mes_trajets.php">
              <i class="material-icons">directions_car</i>
              <p style="font-weight: bold;color: white">Mes trajets</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="mes_colis.php">
              <i class="material-icons">local_grocery_store</i>
              <p style="font-weight: bold;color: white">Mes colis</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="avis.php">
              <i class="material-icons">bubble_chart</i>
              <p style="font-weight: bold;color: white">Avis</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="mesdettes2.php">
              <i class="material-icons">dashboard</i>
              <p style="font-weight: bold;color: white">Mes dettes</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mes_annonces.php">
              <i class="material-icons">bubble_chart</i>
              <p style="font-weight: bold;color: white">Mes annonces</p>
            </a>
          </li>


        </ul>
      </div>
    </div>
    <div class="main-panel" >
      <div class="content">
        <div class="container-fluid">
          <div class="card" style="background-color: #f8f9fa">
            <div class="card-header card-header-primary">
              <h4 class="card-title" style="font-weight: bold;color:#212533">Mes dettes</h4>
            </div>
           

            <?php
  $rech_query="SELECT * FROM `utilisateur` WHERE(`idUser`='$id')";
  $rech_result= mysqli_query($connect,$rech_query);
  $row = mysqli_fetch_array($rech_result);
  $dettes = $row[13];

   ?>
    <div class="main-panel">



        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card" style="background-color: white;position: relative;top: -80px">
                            <div class="header">
                                <!-- <h4 class="title">Light Bootstrap Table Heading</h4>
                                <p class="category">Created using Roboto Font Family</p> -->
                            </div>
                            <div class="content">



                             <h4 class="text-center" style="color:#212533;font-weight:900; font-size:1.8em;"><img src="images/money.svg" style="width:50px; height:auto;"> Dettes</h4>

                               <p class="text-center">Vos dettes s'élèvent à: </p>
                               <p class="text-center"><span style="color:#ffca28;font-weight:900; font-size:1.5em;"><?php echo $dettes." DA"; ?></span></p>


                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <!--footer-->


    </div>
</div>


              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">

          <div class="copyright float-right" id="date">
            , All copyrights <span style="color: white;font-weight: bold"> O</span> <span style="color: #FFCA28;font-weight: bold"> Y</span> <span style="color: white;font-weight: bold">W</span> team
          </div>
        </div>
      </footer>
      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
</body>

</html>
<?php } ?>
