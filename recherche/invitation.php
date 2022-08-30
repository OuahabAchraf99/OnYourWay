<?php
session_start();
require_once("dbcontroller.php");
$connect = new DBController();

if(!empty($_POST["recepteur_id"]))
{
	$qr="INSERT INTO `notification`(`senderId`,`userId`,`notifType`) VALUES ('".$_SESSION["id"]."','".$_POST["recepteur_id"]."','invitation')";
	//$qr="INSERT INTO `notification`(`senderId`,`userId`) VALUES ('".$_SESSION["id"]."','".$_POST["recepteur_id"]."')";
	$res=$connect->runQuery($qr);
}

echo print_r($_POST);
?>