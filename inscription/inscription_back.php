<?php
session_start();
//require_once("dbcontroller.php");
$host="127.0.0.1";
$user="root";
$password="";
$database="projet2cpi";
$connect=mysqli_connect($host,$user,$password,$database);
if(mysqli_connect_errno())
{
    die("error in connection to the database :".mysqli_connect_error());
}//$connect = new DBController();
if(isset($_POST["submit"]))
{
    $nom=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["Nom"])));
    $prenom=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["Prenom"])));
    $user=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["user"])));
    $email=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["Email"])));
    $sexe=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["Sexe"])));
    $passwd=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["Password"])));
    $passwd=sha1($passwd);
    $telephone=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["Numero_Telephone"])));
    $_SESSION["Nom"]=$nom;
    $_SESSION["Prenom"]=$prenom;
    $_SESSION["Email"]=$email;
    $_SESSION["Sexe"]=$sexe;
    $_SESSION["Password"]=$passwd;
    $_SESSION["Numero_Telephone"]=$telephone;

    $rech_query="SELECT COUNT(`Email`) FROM `utilisateur` WHERE(`Email`='$email')";
    $rech_result= mysqli_query($connect,$rech_query);
    $row = mysqli_fetch_array($rech_result);
    $NbOcc = $row[0];
    if($NbOcc==0)
    {
        /*** Insertion ***/
        
        $ins_query="INSERT INTO `utilisateur` (`Nom`,`Prenom`,`Email`,`Sexe`,`Password`,`Numero_Telephone`,`Nom_utilisateur`,`Valid`,`DateInscription`) VALUES('$nom','$prenom','$email','$sexe','$passwd','$telephone','$user',1,".date("y/m/d").")";
        $ins_result=mysqli_query($connect,$ins_query);
        if(!$ins_result)
        {
          die("error :".mysqli_error($connect) );
        }
        $_SESSION["Exist"]=false;
        $_SESSION["connected"]=true;
        $_SESSION["ID"]=$connect->insert_id;
        header("Location: ../dashboard/Dashboard1.php");
    }
    else /*** Compte existe deja ***/
    {
        header("Location: inscription.php");
        $_SESSION["Exist"]=true;
    }





}

mysqli_close($connect);

?>

