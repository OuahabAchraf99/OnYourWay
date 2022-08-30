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

    <title>Connexion</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light ">
      <a class="navbar-brand" href="#">
        <img src="logoDark.svg" width="auto" height="60px;" style="margin-top:-24px; margin-bottom:-20px; margin-left:5px;" alt="Logo OYW">
        O<span>Y</span>W
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto text-uppercase">
          <li class="nav-item">
            <a class="nav-link" href="">Expédier un colis</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Proposer un trajet</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Voir les annonces</a>
          </li>
          
        </ul>
        <ul class="navbar-nav ml-auto text-uppercase">
          <li class="nav-item">
            <a class="btn btn-secondary   js-scroll-trigger" href="" id="nav-btn-secondary">Se connecter</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary  js-scroll-trigger" id="nav-btn-primary" href="">S'inscrire</a>
          </li>
          
          
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
            <span class="error"> <?php if ($_SESSION["Exist"]==true){echo "<br> This email exist";}?></span>
            <input type="text"  class="fadeIn second" name="Nom" placeholder="Votre nom" required>
            <input type="text" class="fadeIn second" name="Prenom" placeholder="Votre prénom" required>
            <input type="text" class="fadeIn second" name="user" placeholder="Votre nom d'utilisateur" required>
            <div class="form-group col-md-11" style="position: relative;left: 17px;color: black" >
              <label for="inputState" style="font-weight: bold">Votre sexe:</label>
              <select id="inputState" class="form-control">
                <option hidden value="">Votre sexe</option>
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