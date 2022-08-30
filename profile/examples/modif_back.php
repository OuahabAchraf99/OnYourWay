<?php
session_start();
$_SESSION['err'] = '';
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
if(isset($_POST["submit"]))
{
//On sélectionne tout dans la table correspondant à l'id
$rech_query="SELECT * FROM `utilisateur` WHERE(`idUser`='$id')";
$rech_result= mysqli_query($connect,$rech_query);
$row = mysqli_fetch_array($rech_result);
$mdp = $row[5];
$cpt = 0;

//On attribue une variable pour chaque champ du formulaire
$user=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["user"])));
$nom=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["nom"])));
$prenom=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["prenom"])));
$email=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["mail"])));
$pass=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["pass"])));
$pass=sha1($pass);
$new=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["new"])));
$new=sha1($new);
$confirm=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["confirm"])));
$confirm=sha1($confirm);
$telephone=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["num"])));
$vehicule=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["vehicule"])));
$description=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["description"])));

//Vérification du mdp

    if ($pass == $mdp) {
    	$rech_query1="SELECT COUNT(`userName`) FROM `utilisateur` WHERE(`userName`='$user')";
    	$rech_result1= mysqli_query($connect,$rech_query1);
    	$row1 = mysqli_fetch_array($rech_result1);
    	$NbOcc = $row1[0];
        
    	if($NbOcc==0)
    	{
            $rech_query1="SELECT COUNT(`Email`) FROM `utilisateur` WHERE(`Email`='$mail')";
            $rech_result1= mysqli_query($connect,$rech_query1);
            $row1 = mysqli_fetch_array($rech_result1);
            $NbOcc = $row1[0];

            if($NbOcc==0)
            {
    	       // Insertion 
                if ($_POST["new"] != NULL) {
                    if ($_POST["confirm"] != NULL) {
                        if ($new == $confirm) {
                            $upd_query1="UPDATE `utilisateur` SET `Password`='$new' WHERE `idUser`='$id'";
                            $upd_result1=mysqli_query($connect,$upd_query1);
                        }
                        else {
                            $_SESSION['err'] = 'mot de passe et confirmation non identiques';
                        }
                    }
                    else {
                        $_SESSION['err'] = 'champ de confirmation vide';
                    }
                }
                if ($_POST["user"] != NULL) {
                    $upd_query2="UPDATE `utilisateur` SET `Nom_utilisateur`='$user' WHERE `idUser`='$id'";
                    $upd_result2=mysqli_query($connect,$upd_query2);                  
                }
    	        if ($_POST["nom"] != NULL) {
                    $upd_query2="UPDATE `utilisateur` SET `Nom`='$nom' WHERE `idUser`='$id'";
                    $upd_result2=mysqli_query($connect,$upd_query2);
                    $cpt ++;
                }
                if ($_POST["prenom"] != NULL) {
                    $upd_query3="UPDATE `utilisateur` SET `Prenom`='$prenom' WHERE `idUser`='$id'";
                    $upd_result3=mysqli_query($connect,$upd_query3);
                }
                if ($_POST["mail"] != NULL) {
                    $upd_query4="UPDATE `utilisateur` SET `Email`='$email' WHERE `idUser`='$id'";
                    $upd_result4=mysqli_query($connect,$upd_query4);
                }
                if ($_POST["num"] != NULL) {
                    $upd_query4="UPDATE `utilisateur` SET `Numero_Telephone`='$telephone' WHERE `idUser`='$id'";
                    $upd_result4=mysqli_query($connect,$upd_query4);
                }
                if ($_POST["vehicule"] != NULL) {
                    $upd_query2="UPDATE `utilisateur` SET `Vehicule`='$vehicule' WHERE `idUser`='$id'";
                    $upd_result2=mysqli_query($connect,$upd_query2);
                }
                if ($_POST["description"] != NULL) {
                    $upd_query2="UPDATE `utilisateur` SET `Description`='$description' WHERE `idUser`='$id'";
                    $upd_result2=mysqli_query($connect,$upd_query2);
                }
            }
    	}
        else {
            $_SESSION['err'] = 'Email où nom d\'utilisateur exist déjà';
        }
    }
    elseif ($_POST["pass"] == NULL) {
        $_SESSION['err'] = 'Veillez inserer votre mot de passe actuel';
    } 
    else {
        $_SESSION['err'] = 'mot de passe incorrect';
    }
    header("Location: profile.php");
}


?>