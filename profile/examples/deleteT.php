<?php
session_start();
$id = $_SESSION['ID'];
$idTrajet = $_SESSION['idTrajet'];
$host="127.0.0.1";
$user="root";
$password="";
$database="projet2cpi";
$connect=mysqli_connect($host,$user,$password,$database);
if(mysqli_connect_errno())
{
    die("error in connection to the database :".mysqli_connect_error());
}

$upd_query="UPDATE `trajettransporteur` SET `Valid`=0 WHERE `idTrajetTransporteur`='$idTrajet'";
$upd_result=mysqli_query($connect,$upd_query);



$query = "DELETE FROM `trajettransporteur` WHERE `idTrajetTransporteur`='$idTrajet'";
mysqli_query($connect, $query);
$rech_query="SELECT * FROM `transporteur` WHERE(`User_idUser`='$id')";
$rech_result= mysqli_query($connect,$rech_query);
$row = mysqli_fetch_array($rech_result);
$idTTrajet = $row[0];
$rech_query="SELECT * FROM `trajettransporteur` WHERE(`Transporteur_idTransporteur`='$idTTrajet')";
$rech_result= mysqli_query($connect,$rech_query);
$row = mysqli_fetch_array($rech_result);
if ($row[0] == NULL) {
	$query = "DELETE FROM `transporteur` WHERE `User_idUser`='$id'";
	mysqli_query($connect, $query);
}

header("Location: mes_trajets.php");
?>