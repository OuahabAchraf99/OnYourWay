<?php
session_save_path();
session_start();
// on initialise les nom de variable de session qu'on a besoin
$_SESSION['ID'] = 0;
$_SESSION['connected'] = false;
$_SESSION['nom'] = null;
$_SESSION['prenom'] = null;
$_SESSION['sexe'] = null;
$_SESSION['password'] = null;
$_SESSION['number'] = null;
$_SESSION['Nom_utilisateur']=null;
$_SESSION['email'] = null;
$_SESSION['contact']=0;
?>
<?php
    if(isset($_COOKIE['email'])&&isset($_COOKIE['password'])){
        $_SESSION['connected'] = true;
        header("Location: ../dashboard/Dashboard1.php");
    }
  if( isset($_POST['email'] ) and isset($_POST['password']) ){                                        


    try{
        $bdd = new PDO('mysql:host=localhost;port=3306;dbname=projet2cpi','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }catch(Exception $e){

        die('Erreur : '.$e->getMessage());
    }

   // $_SESSION['email'] = $_POST['email'];
    $req = $bdd->prepare('SELECT Email,Password,Nom,Prenom,Nom_utilisateur,idUser as ID FROM utilisateur WHERE (Email = :logIn OR Nom_utilisateur= :logIn ) AND Password = :pw');
    $req->execute(
        array(
            'logIn'=>$_POST['email'],
            'pw'=>$hash_pass = sha1(htmlspecialchars($_POST['password'])),
        )
        );
    $_SESSION = $req->fetch();
    $_SESSION['connected'] = true;
    if(($_SESSION['Email']!=$_POST['email'] && $_SESSION['Nom_utilisateur']!=$_POST['email'] )|| $_SESSION['Password']!=$hash_pass){
        // si le mot de passe ou l'adresse son incorrecte on se redirige vers la page de connexion
         header("Location: connexion.php?_emp=1");
    }else{
        //on vérifie si l'utilisateur à cocher se souvenir de moi
         if(isset($_POST['rememberme'])){
            setCookie('email' ,urlencode($_POST['email']),time()+365*24*3600,'/','localhost',false,true);
            setCookie('password',sha1(htmlspecialchars($_POST['password'])),time()+365*24*3600,'/','localhost',false,true);

        }else{
            setCookie('email' ,null,-1,'/','localhost',false,true);
            setCookie('password',null,-1,'/','localhost',false,true);
        }
        
        $req = $bdd->prepare('UPDATE utilisateur SET date_der_connexion = Now() WHERE idUser = :id');
        $req->execute(array('id'=>$_SESSION['ID']));
        $req->closeCursor();
       // echo '<script>alert("'.$_SESSION['Nom'].'.")</script>';
        header("Location: ../dashboard/Dashboard1.php");

    }


}


?>
<!--copier le back de connexion ds cette page et supprimer la page connexion_back.php-->
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
          <!--<li class="nav-item">
            <a class="btn btn-secondary   js-scroll-trigger" href="" id="nav-btn-secondary">Se connecter</a>
          </li>-->
          <li class="nav-item">
            <a class="btn btn-primary  js-scroll-trigger" id="nav-btn-primary" href="../inscription/inscription.php">S'inscrire</a>
          </li>
          
          
        </ul>

        
      </div>
    </nav>


    <?php
    if(isset($_GET['_emp'])&& !empty($_GET['_emp'])){

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

    </style><div class="erreur"><p>Erreur : Adresse email ou mot de passe erroné</p></div>';
    }
    ?>
    <!--End of navbar-->

        <h1 style="font-weight: bold;color: black;text-align: center;opacity: 0.6;"><br />Renseignez les champs suivants<br /><br /></h1>

                                                                                                                                      <section class=" titre text-center" style="margin-top: -50px;">


                                                                                                                                                                                                    <div class="wrapper fadeInDown">
                                                                                                                                                                                                                                   <div id="formContent">
    <!-- Login Form -->
    <form action="" method = "post" >
                                    <input   type="text" id="login" class="fadeIn second" name="email" placeholder="Email" autocomplete="off" required ><br>
                                                                                                                                            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" autocomplete="off"  value="<?php if(isset($_COOKIE['password'])){echo Chiffrement::decrypt($_COOKIE['password'],$key);} ?>" required ><br>

                                                                                                                                                                                                                                                                                                                                                                        <input type="submit" class="fadeIn fourth" value="se connecter">
                                                                                                                                                                                                                                                                                                                                                                                                                                       <div>
                                                                                                                                                                                                                                                                                                                                                                                                                                       <label class="radio-inline" style="font-weight: bold;margin-top: -40px;position: relative;right: 40px">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             <input id="save" type="checkbox" name="rememberme" checked> Se souvenir de moi.
    </label>

      </div>
        </form>

          </div>
            </div>


              <div>
              <p class="pasinscription" align="center">Pas encore membre? N'attendez plus, <a href="../inscription/inscription.php" style="color: #FFCA28;font-weight: bold;">inscrivez vous </a><br/> gratuitement </p>
    </div>
      </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>