<?php
session_start();
$id = $_SESSION['ID'];
$idColis = $_SESSION['idColis'];
$host="127.0.0.1";
$user="root";
$password="";
$database="projet2cpi";
$connect=mysqli_connect($host,$user,$password,$database);
if(mysqli_connect_errno())
{
    die("error in connection to the database :".mysqli_connect_error());
}

$upd_query="UPDATE `colis` SET `Valid`=0 WHERE `idColis`='$idColis'";
$upd_result=mysqli_query($connect,$upd_query);



$query = "DELETE FROM `colis` WHERE `idColis`='$idColis'";
mysqli_query($connect, $query);
$rech_query="SELECT * FROM `envoyeur` WHERE `User_idUser`='$id'";
$rech_result= mysqli_query($connect,$rech_query);
$row = mysqli_fetch_array($rech_result);
$idEColis = $row[0];
$rech_query="SELECT * FROM `colis` WHERE(`Envoyeur_idEnvoyeur`='$idEColis')";
$rech_result= mysqli_query($connect,$rech_query);
$row = mysqli_fetch_array($rech_result);
if ($row[0] == NULL) {
	$query = "DELETE FROM `envoyeur` WHERE `User_idUser`='$id'";
	mysqli_query($connect, $query);
}

header("Location: mes_colis.php");
?>