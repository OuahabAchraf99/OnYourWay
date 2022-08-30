<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Notifications</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="notifications.css">
    <link rel="stylesheet" type="text/css" href="navbar.css">

    <style type="text/css">
        .timeNotif{
            margin-top: 8px;
            font-weight: lighter;
            font-size: 0.8em;
            color: #212533;
            opacity: 0.8;
        }
    </style>

    <style>
    .overlay {
       position: fixed;
       top: 0;
       bottom: 0;
       left: 0;
       right: 0;
       background: rgba(0, 0, 0, 0.7);
       transition: opacity 500ms;
       visibility: hidden;
       opacity: 0;
       z-index: 70000;
     }
     .overlay:target {
       visibility: visible;
       opacity: 1;
     }

     .popup {
       margin: 70px auto;
       padding: 20px;
       background: #fff;
       border-radius: 5px;
       width: 30%;
       position: relative;
       transition: all 5s ease-in-out;
     }

     .popup h2 {
       margin-top: 0;
       color: #333;
       font-family: Tahoma, Arial, sans-serif;
     }
     .popup .close {
       position: absolute;
       top: 20px;
       right: 30px;
       transition: all 200ms;
       font-size: 30px;
       font-weight: bold;
       text-decoration: none;
       color: #333;
     }
     .popup .close:hover {
       color: #06D85F;
     }
     .popup .content {
       max-height: 30%;
       overflow: auto;
     }

     @media screen and (max-width: 700px){
       .box{
         width: 70%;
       }
       .popup{
         width: 50%;
       }
     }
     </style>

</head>
<body>



<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

        <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text ">
                    <img src="assets/img/logo.svg" class="img-fluid">On your way
                </a>
            </div>

            <br>
            <div class="profile-info row ">
                <div class="profile-image ">
                    <a href="ui-profile.html">
                        <img alt="" src="https://lh3.googleusercontent.com/-uwagl9sPHag/WM7WQa00ynI/AAAAAAAADso/ZGTVC0LVk1cFReheTbZzpGa2aawWyV8QACL0B/w140-d-h148-p-rw/profile-pic.jpg" style="position: relative;left: 80px" class="img-circle img-inline class="img-responsive img-circle" >
                    </a>
                </div>
                <div class="profile-details">
                    <h3>
                        <a href="ui-profile.html" style="font-weight: bold;position: relative;left: 70px;top: -30px">Omar Ahmed</a>
                    </h3>
                    <p class="profile-title" style="font-weight: bold;text-align: center;position: relative;right:25px;top: -40px">Transporteur</p>

                </div>
            </div>
            <ul class="wraplist" style="height: auto;">
                <!--          <li class="menusection">Main</li>-->
                <li style="position: relative;left: 14px"><a href="" style="color: whitesmoke;font-size: 20px;position: relative;right: 50px;top: -30px"><span class="sidebar-icon"><i class="fa fa-user" ></i></span> <span class="menu-title">Profile</span></a></li>
                <br>
                <li><a href="" style="color: whitesmoke;font-size: 20px;margin-left: 0px;position: relative;right: 35px;top: -30px"><span class="sidebar-icon"><i class="fa fa-envelope"></i></span> <span class="menu-title">Messages</span></a></li>
                <br>
                <li><a href="" style="color: whitesmoke;font-size: 20px;margin-left: 0px;position: relative;right: 35px;top: -30px "><span class="sidebar-icon"><i class="fa fa-bell"></i></span> <span class="menu-title">Notifications</span></a></li>
                <br>
                <li><a href="" style="color: whitesmoke;font-size: 20px;margin-left: 0px;position: relative;right: 35px;top: -30px"><span class="sidebar-icon"><i class="fa fa-usd"></i></span> <span class="menu-title">Solde</span></a></li>
                <br>
                <li><a href="" style="color: whitesmoke;font-size: 20px;margin-left: 0px;position: relative;right: 35px;top: -30px"><span class="sidebar-icon"><i class="fa fa-sign-out"></i></span> <span class="menu-title">Déconnecter</span></a></li>

            </ul>
        </div>

    </div>
    <div class="collapse navbar-collapse" style="background-color: white">

        <ul class="nav navbar-nav navbar-btn" style="position: relative;left:290px">
            <li>
                <a href="">
                    <p>EXPEDIER UN COLIS</p>
                </a>
            </li>

            <li>
                <a href="#">
                    <p >PROPOSER UN TRAJET</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <p>VOIR LES ANNONCES</p>
                </a>
            </li>

            <li class="separator hidden-lg hidden-md"></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li style="position: relative;top: 5px">
                <a href="">
                    <p STYLE="font-weight: bold;color: black">SE CONNECTER</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="btn btn-primary  js-scroll-trigger" id="nav-btn-primary" href="" style="padding: 12px;padding-left:25px;
    padding-right:25px;">S'inscrire</a>
            </li>
            <li class="separator hidden-lg hidden-md"></li>
        </ul>
    </div>

    <div class="main-panel">



        <div class="content">
            <div class="container-fluid">
                <div class="card">

                    <div class="content">
                        <div class="row">
                            <div class="col-md-7">
                                <h5>Notifications</h5>
                                <?php ?>
                                <div id="notifications">

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                <!--   Core JS Files   -->
                <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
                <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

                <!--  Charts Plugin -->
                <script src="assets/js/chartist.min.js"></script>

                <!--  Notifications Plugin    -->
                <script src="assets/js/bootstrap-notify.js"></script>

                <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
                <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

                <script>
                    updateNotifications();

                    let notifications = []

                    let intervalHolder =  setInterval(updateNotifications, 2 * 1000);

                    function drawNotifications() {
                      let fullHtml = ''
                      console.log('drawing..')

                      for (let n of notifications) {
                          if (n.notifType.localeCompare("invitation")==0) {

                              const html = `

                                <div class="alert alert-info alert-with-icon" data-notify="container">

                                  <button type="button" aria-hidden="true" class="close" id=${n.idNotif}>×</button>
                                  <span data-notify="icon"><img src="images/deal.svg" /></span>
                                    <span data-messsage="message">${n.name} ${n.notif} </span>
                                  <span class="timeNotif">${n.timeSent}</span>

                                  <div>
                                    <a class="" href="#popup${n.idNotif}" style="font-weight: bold;color: #FFE63E;">Consulter le profile</a>
                                  </div>

                                  <div id="popup${n.idNotif}" class="overlay">
                                    <div class="popup">
                                      <h2 style="color: #Ffca28" align="center">Informations</h2>
                                      <a class="close" href="#">&times;</a>
                                      <div class="content">
                                        <div align="center"><span style='font-weight:bold;'>Nom: </span><span>${n.name}</span></div>
                                        <br>
                                        <div align="center"><span style='font-weight:bold;'>Experience: </span><span>${n.experience}</span></div>
                                        <br>
                                        <div align="center"><span style='font-weight:bold;'>Vehicule: </span><span>${n.vehicule}</span></div>
                                        <div style="text-align: center">
                                          <button data-id="${n.idNotif}" class="accepter btn btn-info btn-md" style="margin: 20px auto 0; height: 40px; width: 200px;">Accepter</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                            `
                              fullHtml += html
                          }
                          else {
                              const html = `

                          <div class="alert alert-info alert-with-icon" data-notify="container">
                            <button type="button" aria-hidden="true" class="close" id=${n.idNotif}>×</button>
                            <span data-notify="icon"><img src=${n.imgSource} /></span>
                            <span data-messsage="message">${n.notif}</span>
                            <span class="timeNotif">${n.timeSent}</span>
                            </div>

                          `
                              fullHtml += html
                          }


                      }

                      $('#notifications').html(fullHtml)
                    }

                    function updateNotifications() {
                        fetch('http://localhost/Projet/notification/getNotification.php')
                            .then(res => res.json())
                            .then(json => {
                                if (notifications.map(e => e.idNotif).toString() != json.map(e => e.idNotif).toString()) {
                                  notifications = json
                                  drawNotifications()
                                }
                            })

                    }

                </script>
                <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
                <script src="assets/js/demo.js"></script>

                <script>
                    $(document).on('click', '.close', function(){
                        var id = $(this).attr("id");
                        $.ajax({
                            url:"./upNotification.php",
                            method:"POST",
                            data:{id:id},
                            success:function(data){
                                updateNotifications()();
                            }
                        });

                    });

                    $(document).on('click', '.accepter', function(){
                        var id = $(this).attr("data-id");
                        $.ajax({
                            url:"./accepterInvitation.php",
                            method:"POST",
                            data:{id:id}
                        });

                    });
                </script>
            </div></div></div></div></body>


</html>
