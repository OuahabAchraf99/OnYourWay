<?php
$adresseD ="Algiers";
$adresseA ="Bouhmama";
$url ='https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$adresseD.'&destinations='.$adresseA.'&departure_time=now&key=AIzaSyACUQazZ3d3BeXr68GvQu9lIjHk_1t8S0Y' ;
$json = file_get_contents($url);
$response = json_decode($json,true);
if($response['status'] == "OK") {
    $dist = $response['rows'][0]['elements'][0]['distance']['value'];
    echo $dist;}
else{
echo $response['error_message'];
}
?>