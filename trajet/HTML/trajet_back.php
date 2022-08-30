<?php
session_start();
header("Location: annonceTrajetSuccessfull.html");

$connect = mysqli_connect("127.0.0.1","root","","projet2cpi");
    if(isset($_POST["submit"]))
    {

      
        /*$DepWilaya=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["DepWilaya"])));
        $DepCommmune=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["DepCommune"])));
        $DepRue=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["DepRue"])));*/
        $Dep=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["Dep"])));
        /*$ArvWilaya=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["ArvWilaya"])));
        $ArvCommmune=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["ArvCommune"])));
        $ArvRue=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["ArvRue"])));*/
        $Arv=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["Arv"])));
        $DepDateDebut=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["DepDateDebut"])));
        $DepDateFin=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["DepDateFin"])));
        $ArvDateDebut=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["ArvDateDebut"])));
        $ArvDateFin=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["ArvDateFin"])));
        $MoyenDeTrans=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["MoyenDeTrans"])));
        $Deviation=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["Deviation"])));
        $Arrets=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["Arrets"])));
        $FreqVoy=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["FreqVoy"])));
        $FormatColis=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["FormatColis"])));
        $PoidsColis=mysqli_real_escape_string($connect,htmlspecialchars(trim($_POST["PoidsColis"])));
        $ID=$_SESSION["ID"];
        //$ID=62;
        /*** Insertion ***/
        $ins_query1="INSERT INTO  `transporteur` (`MoyenDeTrans`,`Deviation`,`FrequenceVoyage`,`FormatColis`,`PoidsColis`,`Arrets`,`dateDepot`,`User_idUser`) VALUES ('$MoyenDeTrans','$Deviation','$FreqVoy','$FormatColis','$PoidsColis','$Arrets','".date("y/m/d")."','$ID')";
        if($ins_res1=$connect->query($ins_query1)== TRUE)
        {
            echo "New record created successfully <br><br>";
        } else  
        {
            echo "Error: ".$ins_query1."<br>" . $connect->error;
        }

        //$trans_ID=18;
        $trans_ID=$connect->insert_id;
        /*$ins_query2="INSERT INTO `trajettransporteur` (`DepWilaya`,`DepCommune`,`DepRue`,`ArvWilaya`,`ArvCommune`,`ArvRue`,`DepDateDebut`,`DepDateFin`,`ArvDateDebut`,`ArvDateFin`,`Transporteur_idTransporteur`) VALUES ('$DepWilaya','$DepCommmune','$DepRue','$ArvWilaya','$ArvCommmune','$ArvRue','$DepDateDebut','$DepDateFin','$ArvDateDebut','$ArvDateFin','$trans_ID')";*/
        $ins_query2="INSERT INTO `trajettransporteur` (`Depart`,`Arivee`,`DepDateDebut`,`DepDateFin`,`ArvDateDebut`,`ArvDateFin`,`Transporteur_idTransporteur`) VALUES ('$Dep','$Arv','$DepDateDebut','$DepDateFin','$ArvDateDebut','$ArvDateFin','$trans_ID')";
        if($ins_res2=$connect->query($ins_query2)== TRUE)
        {
            echo "New record created successfully";
        } else  
        {
            echo "Error: ".$ins_query2."<br>" . $connect->error;
        }
        /***********************************/



   }



?>

