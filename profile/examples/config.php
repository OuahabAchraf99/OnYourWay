<?php
$host="127.0.0.1";
$user="root";
$password="";
$database="projet2cpi";
try{
	$bdd = new PDO('mysql:host=localhost;port=3306;dbname=projet2cpi','root','');
}catch(Exception $e){
	die('Erreur : '.$e->getMessage());
}
?>