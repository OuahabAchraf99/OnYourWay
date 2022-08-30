<?php
session_start();
require_once("dbcontroller.php");
$connect = new DBController();

if(!empty($_POST["idAnnonce"]))
{
	$t=1;
	//$qr="INSERT INTO `annonces`(`idColis_idTrajet`,`type`) VALUES ('".$_POST["idAnnonce"]."','".$_POST["type"]."')";
	$qr="INSERT INTO `annonces`(`User_idUser`,`idColis_idTrajet`,`type`) VALUES ('".$_SESSION["id"]."','".$_POST["idAnnonce"]."',".$t.")";
	$res=$connect->runQuery($qr);
}

echo print_r($_POST);
?>