<?php
session_save_path();
session_start();



    if ($_SESSION['connected']==false){
        header('LOCATION: ../../connexion/connexion.php');}
        else{
$id = $_SESSION['ID'];
$host="127.0.0.1";
$user="root";
$password="";
$database="projet2cpi";
$connect1=mysqli_connect($host,$user,$password,$database);
if(mysqli_connect_errno())
{
    die("error in connection to the database :".mysqli_connect_error());
}

include_once './profileBack.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="logoDark.ico"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Profile</title>
 

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href="bootstrap.min.css" rel="stylesheet" />
  <link href="../avis.css" rel="stylesheet"/>
</head>

<body class="dark-edition" style="background-color: #f8f9fa;color: #212533">
  
  <div class="wrapper ">
    <div class="sidebar" data-color="#FFCA28" data-background-color="black" data-image="../assets/img/livraison.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo" style="background-color: #212533">
        <a class="navbar-brand mr-1" href="../../dashboard/Dashboard1.php" style="position: relative;right: -50px;font-weight: bold;font-size: 30px;color: white" >O<span style="color: #FFCA28">Y</span>W</a>
        <a href="../../accueil/index.php"><img class="navbar-brand mr-1"  SRC="../assets/img/logo.svg" ALT="some text" WIDTH=80 HEIGHT=60 style="position: relative;right: -50px"></a>
      </div>

      <div class="sidebar-wrapper" style="background-color: #212533;">
        <ul class="nav">
         
          <li class="nav-item active ">
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
          <li class="nav-item  ">
            <a class="nav-link" href="mesdettes.php">
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
    <div class="main-panel">
      <!-- Navbar -->

      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-md-8">
              <div class="card" style="background-color: #f8f9fa">
                <div class="card-header card-header-primary" >
                  <h4 class="card-title" style="font-weight: bold;color: #212533">Compléter votre profile</h4>
                  <p class="card-category" style="font-weight: bold;color: #212533">Changer vos informations</p>
                </div>
                <div class="card-body" style="background-color: #f8f9fa">
                  <form action="modif_back.php" method="POST">

                    <div class="row">

                      <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating" style="color: #212533">Nom d'utilisateurs</label>
                          <input type="text" class="form-control" name="user" style="color: black">
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating" style="color: #212533">Email</label>
                          <input type="email" class="form-control" name="mail" style="color: black">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating" style="color: #212533">Nom</label>
                          <input type="text" class="form-control" name="nom" style="color: black">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating" style="color: #212533">Prénom</label>
                          <input type="text" class="form-control" name="prenom" style="color: black">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating" style="color: #212533">Description</label>
                          <input type="text" class="form-control" name="description" style="color: black">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating" style="color: #212533">Numéro de téléphone</label>
                        <input type="tel" class="form-control" name="num" style="color: black">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating" style="color: #212533">Véhicule</label>
                        <input type="text" class="form-control" name="vehicule" style="color: black">
                      </div>
                    </div>

                  </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating" style="color: #212533">Mot de passe</label>
                          <input type="password" class="form-control" name="new" style="color: black">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating" style="color: #212533">Confirmer le mot de passe</label>
                          <input type="password" class="form-control" name="confirm" style="color: black">
                        </div>
                      </div>

                    </div>
                    <br>


                            <?php
                            if(isset($_SESSION['err'])){
                              echo '<p style="color: red">'.$_SESSION['err'].'</p>';
                            $_SESSION['err'] = '';
                            }

                            ?>

                    <br><br>
                    <div class="row">

                      <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating" style="color: #212533">votre mot de passe actuel</label>
                          <input type="password" class="form-control" name="pass" style="color: black">
                        </div>
                      </div>

                      <button type="submit" class="btn btn-primary pull-right" style="background-color: #FFCA28;font-weight: bold" name="submit">Enregistrer les modifications</button>

                    </div>


                    <?php
                    $rech_query="SELECT * FROM `utilisateur` WHERE(`idUser`='$id')";
                    $rech_result= mysqli_query($connect1,$rech_query);
                    $row = mysqli_fetch_array($rech_result);

                    $nom = $row[1];
                    $prenom = $row[2];
                    $tlp = $row[4];
                    $description = $row[15];
                    $sexe = $row[12];
                    $vehicule = $row[16];
                    $depuis = $row[17];
                    $experiance = $row[18];
                    $usr = $row[14];
                     ?>



                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile" style="background-color: #f8f9fa">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="../assets/img/faces/marc.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category" style="font-weight: bold"><?php echo '@_'.$usr; ?></h6>
                  <h4 class="card-title" style="font-weight: bold ;color: #212533"><?php echo $nom.' '.$prenom; ?></h4>
                  <p class="card-description">
                 <?php echo $description; ?>
                  </p>


                   <div class="rating" style="margin-left: 60px;margin-right: 10px;" title="envoyeur">

                        <input type="radio" id="star5" name="ratingE" value="5" disabled /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half" name="ratingE" value="4 and a half" disabled /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4" name="ratingE" value="4" disabled /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3half" name="ratingE" value="3 and a half" disabled /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input type="radio" id="star3" name="ratingE" value="3" disabled /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half" name="ratingE" value="2 and a half" disabled /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="ratingE" value="2" disabled /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1half" name="ratingE" value="1 and a half" disabled /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input type="radio" id="star1" name="ratingE" value="1" disabled /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="starhalf" name="ratingE" value="half" disabled/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>

                  </div>
                  </div>

                  <div class="rating" style="margin-left: 60px;margin-right: 10px;position: relative;right: 105px" title="transporteur">
                      <input type="radio" id="star5" name="ratingT" value="5" disabled /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                      <input type="radio" id="star4half" name="ratingT" value="4 and a half" disabled /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                      <input type="radio" id="star4" name="ratingT" value="4" disabled /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                      <input type="radio" id="star3half" name="ratingT" value="3 and a half" disabled /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                      <input type="radio" id="star3" name="ratingT" value="3" disabled /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                      <input type="radio" id="star2half" name="ratingT" value="2 and a half" disabled /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                      <input type="radio" id="star2" name="ratingT" value="2" disabled /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                      <input type="radio" id="star1half" name="ratingT" value="1 and a half" disabled /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                      <input type="radio" id="star1" name="ratingT" value="1" disabled /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                      <input type="radio" id="starhalf" name="ratingT" value="half" disabled/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                  </div>
                    <?php
                      $someRatingE=0;
                      $cpt = 0;
                      $reqUidEnv = getUIdEnvoyeur();
                      while ($idEnv = $reqUidEnv->fetch()) {
                        $avisRating= getEAvis($idEnv['idEnvoyeur']);
                        while($avis = $avisRating->fetch()){
                            $someRatingE = $someRatingE+$avis['rating'];
                            $cpt++;
                        }
                      }
                      $realMoy = moyERating($someRatingE,$cpt);
                      $rEn = getRating((float)$realMoy);
                      $rEn  = 10-$rEn ;
                      echo '<script language="javascript">var inputeE=document.getElementsByName("ratingE");inputeE['.$rEn .'].checked=true;</script>';

                      $someRatingT=0;
                      $cpt = 1;
                      $reqUidTrans = getUIdTransporteur();
                      while ($idTrans = $reqUidTrans->fetch()) {
                        $avisRating= getTAvis($idTrans['idTransporteur']);
                        while($avis = $avisRating->fetch()){
                            $someRatingT = $someRatingT+$avis['rating'];
                            $cpt++;
                        }
                      }
                      $realMoy = moyTRating($someRatingT,$cpt);
                      $rTrans = getRating((float)$realMoy);
                      $rTrans = 10-$rTrans ;
                      echo '<script language="javascript">var inputeT=document.getElementsByName("ratingT");inputeT['.$rTrans.'].checked=true;</script>';
                      ?>

                  <p style="text-align: left;font-weight: bold;color: #212533">Expérience: <span style="color: #FFCA28"><?php echo $experiance; ?></span></p>
                  <p style="text-align: left;font-weight: bold; color: #212533">Sexe: <span style="color: #FFCA28"><?php echo $sexe; ?></span></p>
                  <p style="text-align: left;font-weight: bold;color: #212533">Numéro de téléphone: <span style="color: #FFCA28"><?php echo $tlp; ?></span></p>
                  <p style="text-align: left;font-weight: bold;color: #212533">Véhicule: <span style="color: #FFCA28"><?php echo $vehicule; ?></span></p>
                  <p style="text-align: left;font-weight: bold;color: #212533">Membre depuis: <span style="color: #FFCA28"><?php echo $depuis; ?></span></p>
                  <div style="color: white;opacity: 0.8">---------------------------------------------------------</div>
                  <i class="material-icons" style="color: #FFCA28;margin-left: 10px;display: inline">check</i>
                  <p style="color: #212533;font-weight: bold;display: inline">Adresse e-mail vérifiée</p>
                   <br>
                  <i class="material-icons" style="color: #FFCA28;margin-left: 10px;display: inline">check</i>
                  <p style="color: #212533;font-weight: bold;display: inline">Numéro de téléphone vérifié</p>

                  <div style="position: relative;left: -50px;top: 10px">
                    <style>
                      body {font-family: Arial, Helvetica, sans-serif;}
                      * {box-sizing: border-box;}

                      /* Button used to open the contact form - fixed at the bottom of the page */
                      .open-button {
                        background-color: #FFCA28;
                        color: white;
                        padding: 16px 20px;
                        border: none;
                        cursor: pointer;
                        opacity: 0.8;
                        position: fixed;
                        bottom: 23px;
                        right: 28px;
                        width: 280px;
                      }

                      /* The popup form - hidden by default */
                      .form-popup {
                        display: none;
                        position: fixed;
                        bottom: 0;
                        right: 15px;
                        border: 3px solid #f1f1f1;
                        z-index: 9;
                      }

                      /* Add styles to the form container */
                      .form-container {
                        max-width: 300px;
                        padding: 10px;
                        background-color: white;
                      }

                      /* Full-width input fields */
                      .form-container input[type=text], .form-container input[type=password] {
                        width: 100%;
                        padding: 15px;
                        margin: 5px 0 22px 0;
                        border: none;
                        background: #f1f1f1;
                      }

                      /* When the inputs get focus, do something */
                      .form-container input[type=text]:focus, .form-container input[type=password]:focus {
                        background-color: #ddd;
                        outline: none;
                      }

                      /* Set a style for the submit/login button */
                      .form-container .btn {
                        background-color: #FFCA28;
                        color: white;
                        padding: 16px 20px;
                        border: none;
                        cursor: pointer;
                        width: 100%;
                        margin-bottom:10px;
                        opacity: 0.8;
                      }

                      /* Add a red background color to the cancel button */
                      .form-container .cancel {
                        background-color: #FFCA28;
                      }

                      /* Add some hover effects to buttons */
                      .form-container .btn:hover, .open-button:hover {
                        opacity: 1;
                      }
                    </style>
                    <!--<button class="open-button" onclick="openForm()" style="font-weight: bold;color: white">Envoyer un message</button>

                    <div class="form-popup" id="myForm" style="border-radius: 6px">
                      <form action="/action_page.php" class="form-container">
                        <h2 style="font-weight: bold">Message</h2>

                        <label for="email"><b>Envoyer</b></label>

                        <input type="text" placeholder="Enter votre message"  name="email" required>


                        <div>
                        <button type="submit" class="btn" style="font-weight: bold">Envoyer un message</button>
                        </div>
                        <button  type="button"  class="btn cancel" style="font-weight: bold" onclick="closeForm()" >Fermer</button>
                      </form>
                    </div>

                    <script>
                        function openForm() {
                            document.getElementById("myForm").style.display = "block";
                        }

                        function closeForm() {
                            document.getElementById("myForm").style.display = "none";
                        }
                    </script>-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>
  <div class="fixed-plugin">

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
  <footer class="footer " >
            <div class="container-fluid">
                <nav class="ml-auto " style="margin-left:35px;">
                    <ul>
                        <li>
                            <a href="../../accueil/index.php">
                                Accueil
                            </a>
                        </li>
                        <li>
                            <a href="../../colis/HTML/colisForm.php">
                                Expédier un colis
                            </a>
                        </li>
                        <li>
                            <a href="../../trajet/HTML/trajetForm.php">
                                Proposer un trajet
                            </a>
                        </li>
                        <li>
                            <a href="../../recherche/recherch_final.php">
                               Voir les annonces
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright float-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href=""><span style="color: #212533;font-weight: bold">O</span> <span style="color: #FFCA28;font-weight: bold">Y</span> <span style="color:#212533;font-weight: bold">W</span></a>, tous droits réservés
                </p>
            </div>
        </footer>

</body>

</html>



<?php } ?>
