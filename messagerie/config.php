<?php
$host="127.0.0.1";
$user="root";
$password="";
$database="projet2cpi";
$connect=mysqli_connect($host,$user,$password,$database);
if(mysqli_connect_errno())
{
    die("error in connection to the database :".mysqli_connect_error());
}
try{
        $bdd = new PDO('mysql:host=localhost;port=3306;dbname=projet2cpi','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }catch(Exception $e){
    
        die('Erreur : '.$e->getMessage());
    }
?>