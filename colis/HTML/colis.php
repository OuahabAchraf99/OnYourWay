<?php
session_start();
$id =$_SESSION['ID'];
require('frais.php');


setcookie('detes', 'default', time() + 365*24*3600, null, null, false, true);
setcookie('price', 'default', time() + 365*24*3600, null, null, false, true);
$conn = mysqli_connect("127.0.0.1","root","","projet2cpi");
//if (mysqli_connect_errno($conn))
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
else {
    if (!empty($_POST['objet']) and !empty($_POST['descriptionColis'])) {
        $objet = mysqli_real_escape_string($conn, $_POST['objet']);
        $description = mysqli_real_escape_string($conn, $_POST['descriptionColis']);
    }
    if (!empty($_POST['from'])) {
        $lieuDepart = mysqli_real_escape_string($conn, $_POST['from']);


    }
    if (!empty($_POST['to'])) {
        $lieuArrive = mysqli_real_escape_string($conn, $_POST['to']);


    }

    if (!empty($_POST['dateEnvoi']) and !empty($_POST['optionPoids']) and !empty($_POST['optionFormat'])) {
        $datelimite = mysqli_real_escape_string($conn, $_POST['dateEnvoi']);
        $poidColis = mysqli_real_escape_string($conn, $_POST['optionPoids']);
        $tailleColis = mysqli_real_escape_string($conn, $_POST['optionFormat']);
    }
    if (!empty($_POST['objetFragile'])) {
        $fragile = 1;
    } else {
        $fragile = 0;
    }
    if (!empty($_POST['demandeUrgente'])) {
        $urgente = 1;
    } else {
        $urgente = 0;
    }
    if (!empty($_POST['demandeSpeciale'])) {
        $special = 1;
    } else {
        $special = 0;
    }
    // Now we need to add the image to the database :
    if (!empty($_FILES['photoColis'])){
        $file=$_FILES['photoColis'];
        $fileName=$_FILES['photoColis']['name'];
        $fileTmpName=$_FILES['photoColis']['tmp_name'];
        $fileSize=$_FILES['photoColis']['size'];
        $fileError=$_FILES['photoColis']['error'];
        $fileType=$_FILES['photoColis']['type'];
        $fileExt = explode(".",$fileName);
        $fileActExt=strtolower(end($fileExt));
        $allowed=array('jpg','jpeg','png');
        if (in_array($fileActExt,$allowed)){
            if ($fileError === 0){
                if ($fileSize <10^7){
                    $fileNewName= uniqid('',true).".".$fileActExt ;
                    $fileDestination='../uploads/'.$fileNewName;
                    move_uploaded_file($fileTmpName,$fileDestination);

                }else{
                    die("Your file is too big") ;
                }

            }else{
                die("There was an error uploading your file !") ;
            }

        }
    }
        else{
            die("You cannot upload files of this type !") ;
        }
        echo "la distance est : ".$_POST['dist'];
        $dist = ((double)$_POST['dist'])/1000;
        echo " la distance de cette trajet est : ".$dist ;
        // 2- on a besoin de calculer les niveaux de taille et poid et aussi calculer le temps :
        $Taille = Taille($tailleColis);
        echo " la taille de cette colis est ".$Taille ;
        $Poid   = Poid($poidColis);
        echo " le poid de cette colis est : ".$Poid ;
        $temp=ceil((strtotime($datelimite)-strtotime(date("Y-m-d")))/86400);
        echo " le TEMP:  de cette colis est : ".$temp ;
        $lePrix =price($dist,$Taille,$Poid,$temp);
        echo "\n"."le prix de cet service est: ".$lePrix ."DA";
        // 3 - on a calculer le prix .. donc on a besoin de l'afficher dans une autre page donc
        // on a besoin de stocker le prix dans un cookie.
        $_COOKIE['price']=$lePrix;
        $_COOKIE['detes']=0.05*$lePrix ;

    // calculation of the price of this service :
// 1- we need to calculate the distance between the departadress and arriveadress :
    // $url ='https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$lieuDepartCommune.'&destinations='.$lieuArriveCommune.'&departure_time=now&key=AIzaSyDKF7kJODEZpgKLxSK2dI4atx5hMuhkLkU' ;
    // $json = file_get_contents($url);
    // $response = json_decode($json,true);
    // if($response['status'] == "OK")
    // {
        // $dist = ($response['rows'][0]['elements'][0]['distance']['value'])/1000;
        // // 2- on a besoin de calculer les niveaux de taille et poid et aussi calculer le temps :
        // $Taille = Taille($tailleColis);
        // $Poid   = Poid($poidColis);
        // $temp=ceil((strtotime($datelimite)-strtotime(date("Y-m-d")))/86400);
        // $lePrix =price($dist,$Taille,$Poid,$temp);
        // echo "le prix de cet service est: ".$lePrix ."DA";
        // // 3 - on a calculer le prix .. donc on a besoin de l'afficher dans une autre page donc
        // // on a besoin de stocker le prix dans un cookie.
        // $_COOKIE['price']=$lePrix;
        // $_COOKIE['detes']=0.05*$lePrix ;
    // }
    // else
    // {
    //     echo $response['error_message'];
    // }



//Insert into tables of database :
//create a new row of 'envoyeur' :
  //  $INSERT1 = "INSERT INTO `envoyeur` (`idEnvoyeur`,`Rating`,`User_idUser`) VALUES (NULL,'0','24') WHERE NOT EXISTS (SELECT * FROM envoyeur WHERE User_idUser=24)";
    $q="SELECT * FROM envoyeur WHERE User_idUser=$id";
    $resds=mysqli_query($conn,$q);
    if (!$resds) {
      // code...
      die('Erreur12 : '.mysqli_error($conn));
    }
    else {
      // code...
      if(mysqli_num_rows($resds)==0){
        $INSERT1 = "INSERT INTO `envoyeur` (`idEnvoyeur`,`Rating`,`User_idUser`) VALUES (NULL,'0','$id')";
        mysqli_query($conn,$INSERT1);
        $dataNedded1 = mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM `envoyeur` WHERE User_idUser=$id"));
        $idEnvoyeur = $dataNedded1[0];
      }
      else {
        $dataNedded1 = mysqli_fetch_row($resds);
        $idEnvoyeur = $dataNedded1[0];
      }
    }

  /*  if(!mysqli_query($conn,$INSERT1)){
        die('ERROR008: '.mysqli_error($conn));
    }
    //now we should get the id of envoyeur to insert it in colis :
        $sql ="SELECT * FROM envoyeur ORDER BY idEnvoyeur DESC  LIMIT 1";
        if(!mysqli_query($conn,$sql))
        {
            die('Error0: ' . mysqli_error($conn));
        }
        else{
            $result0 = mysqli_query($conn,$sql);
            $dataNedded1 = mysqli_fetch_row($result0);
            $idEnvoyeur = $dataNedded1[0];
        }
        $sql ="SELECT * FROM envoyeur WHERE User_idUser=24";
        if(!mysqli_query($conn,$sql))
        {
            die('Error0: ' . mysqli_error($conn));
        }
        else{
            $result0 = mysqli_query($conn,$sql);
            $dataNedded1 = mysqli_fetch_row($result0);
            $idEnvoyeur = $dataNedded1[0];
        }*/
        $INSERT2 = "INSERT INTO `colis` (`idColis`,`DescriptionColis`,`TailleColis`,`PoidsColis`,`Objet`,`Envoyeur_idEnvoyeur`,`Valid`,`objetFrajile`,`demandeUrgente`,`demandeSpec`,`imagePath`,`imageName`,`Prix`)
              VALUES (NULL,'$description','$tailleColis','$poidColis','$objet','$idEnvoyeur','1','$fragile','$urgente','$special','$fileDestination','$fileNewName','$lePrix')";
        //chek if there is errors :
        if (!mysqli_query($conn, $INSERT2)) {
            die('Error1: ' . mysqli_error($conn));
        }
        //searching for the id of Colis to insert it into the last column of the trajetColis table :
        $sql ="SELECT * FROM Colis ORDER BY idColis DESC  LIMIT 1";
        if (!mysqli_query($conn, $sql)) {
            die('Error2: ' . mysqli_error($conn));
        }
        if ($result=mysqli_query($conn,$sql))
        {
            $CurrentDate = date("Y-m-d");
            $dataNedded = mysqli_fetch_row($result);
            $idColis = $dataNedded[0];// the id of the last iserted colis
            $INSERT3 = "INSERT INTO `trajetcolis` (`idTrajetColis`,`Depart`,`Arivee`,`datelimit`,`currentDate`,`Colis_idColis`)
            VALUES (NULL,'$lieuDepart','$lieuArrive','$datelimite','$CurrentDate','$idColis')   ";
            if (!mysqli_query($conn, $INSERT3)) {
                die('Error3: ' . mysqli_error($conn));
            }
        }
        mysqli_close($conn);
        header("LOCATION: ./annonceColisSuccessfull.php");
//=========================================================================================================================

//=========================================================================================================================
} //fin else
    exit;
    

?>



========================================================================================================================
========================================================================================================================
========================================================================================================================
