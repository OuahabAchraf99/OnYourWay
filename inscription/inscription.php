<?php
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet"  href="css/navbar.css">

    <title></title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light ">
      <a class="navbar-brand" href="../accueil/index.php">
        <img src="logoDark.svg" width="auto" height="60px;" style="margin-top:-24px; margin-bottom:-20px; margin-left:5px;" alt="Logo OYW">
        O<span>Y</span>W
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto text-uppercase">
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
          <li class="nav-item">
            <a class="btn btn-primary   js-scroll-trigger" href="../connexion/connexion.php" id="nav-btn-primary">Se connecter</a>
          </li>
          <!--<li class="nav-item">
            <a class="btn btn-primary  js-scroll-trigger" id="nav-btn-primary" href="">S'inscrire</a>
          </li>-->
          
          
        </ul>

        
      </div>
    </nav>
    <h1 style="font-weight: bold;color: black;text-align: center;opacity: 0.6;"><br />Renseignez les champs suivants<br /><br /></h1>

    <section class=" titre text-center" style="margin-top: -50px;">

      <div class="wrapper fadeInDown">
        <div id="formContent">
          <!-- Login Form -->
          <form   action = "inscription_back.php" method = "POST">
            <input type="email"  class="fadeIn second" name="Email"  placeholder="Votre email" required>
            <span class="error"> <?php if(isset($_SESSION["Exist"])){if ($_SESSION["Exist"]==true){


echo '<style>
    .erreur > p{
    position: relative;
    top: -15px;
    text-align: center;
    background-color: #f2dede;
    border-color: #eed3d7;
    color: #b94a48;
    width:100%;
    height: 5%;
    margin:0;
    padding:2%;
    -webkit-animation-duration: 8s;animation-duration: 8s;
    -webkit-animation-fill-mode: both;animation-fill-mode: both;
    -webkit-animation-name: fadeOut;
    animation-name: fadeOut;
    }
    @-webkit-keyframes fadeOut {
    0% {opacity: 1;}
    100% {opacity: 0;}
    }

    @keyframes fadeOut {
    0% {opacity: 1;}
    100% {opacity: 0;}
    }

    </style>


    <div class="erreur"><p>Erreur : This email exist</p></div>';
    }}
  ?></span>
            <input type="text"  class="fadeIn second" name="Nom" placeholder="Votre nom" required>
            <input type="text" class="fadeIn second" name="Prenom" placeholder="Votre prénom" required>
            <input type="text" class="fadeIn second" name="user" placeholder="Votre nom d'utilisateur" required>
            <div class="form-group col-md-11" style="position: relative;left: 17px;color: black" >
              <label for="inputState" style="font-weight: bold">Votre sexe</label>
              <select id="inputState" class="form-control" name="Sexe">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>


            <input type="password" id="password" class="fadeIn third" name="Password" placeholder="password" oncopy="return false" onpaste="return false" oncut="return false" required>
            <label for="phonenum" style="font-weight:bold; ">Phone Number :</label><br/>
            <input id="phonenum" type="tel" name="Numero_Telephone" required >

            <div class="forgot">
              <label>
                <label class="radio-inline" style="font-weight: bold"><input type="checkbox" name="optradio"> Je veux être informé des nouveautés, cadeaux et
                  bon plans!</label>

              </label>

            </div>

            <input type="submit" name="submit" class="fadeIn fourth" value="submit">

          </form>
        </div>
      </div>
    </section>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
<?php $_SESSION["Exist"]=false; ?>