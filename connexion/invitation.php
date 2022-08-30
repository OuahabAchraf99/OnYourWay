<?php
session_start();
require_once("dbcontroller.php");
$connect = new DBController();

if(!empty($_POST["recepteur_id"]))
{
	$qr="INSERT INTO `invitation`(`idEnv`,`idRecp`) VALUES ('".$_SESSION["id"]."','".$_POST["recepteur_id"]."')";
	$res=$connect->runQuery($qr);
}
?>