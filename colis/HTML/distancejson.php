<?php
session_start();
//setcookie('distanceW', 'default', time() + 365*24*3600, null, null, false, true);
//declaration des fichier qu'on a besoin :
//===============================================================================================
require('frais.php');
//===============================================================================================
//on a besoin d'utiliser ces variables la pour le calcule de distance donc le prix :
$adresseD = $_COOKIE['adresseDepart'];
$adresseA = $_COOKIE['adresseArrive'];
//on a besoin du taille et poid pour les pourcentage concerne dans la formule de calcule de prix :
$PoidColis =$_COOKIE['poid'];
$tailleColis=$_COOKIE['taille'];
//===============================================================================================
//clacule de distance :
$url ='https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$adresseD.'&destinations='.$adresseA.'&departure_time=now&key=AIzaSyCxYEjCTW4vF8Hu3XlySpgPKL5iusVTLyw' ;
$json = file_get_contents($url);
$response = json_decode($json,true);
if($response['status'] == "OK") {
    $distance = $response['rows'][0]['elements'][0]['distance']['text'];
    echo $distance;}
else{
    echo $response['error_message'];
}
//$_COOKIE['distancew'] = $distance ;
//===============================================================================================
//now we need to calculate : "les frais "
$prPoid = pourcPoid($PoidColis) ;
$prTaille = pourcTaille($tailleColis) ;
$DateExColis = strtotime($_COOKIE['datelimit']);
$DateExCurrent = strtotime($_COOKIE['CurrenDate']) ;
$temp = ceil(($DateExColis - $DateExCurrent)/86400 );

$prix=frais($distance,$prTaille,$prPoid,$temp);
?>