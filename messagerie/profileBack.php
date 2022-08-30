<?php

function getUIdTransporteur(){
    include 'config.php';
    if ($_SESSION['connected']){
        $req = $bdd->prepare('SELECT idTransporteur FROM transporteur WHERE User_idUser = ?');
        $req->execute(array($_SESSION['ID']));
        return $req;
    }
}

function getUIdEnvoyeur(){
    include 'config.php';
    if ($_SESSION['connected']){
        $req = $bdd->prepare('SELECT idEnvoyeur FROM envoyeur WHERE User_idUser = ?');
        $req->execute(array($_SESSION['ID']));
        return $req;
    }
}

function getTidUser($idT){
    include 'config.php';
    if ($_SESSION['connected']){
        $req = $bdd->prepare('SELECT User_idUser FROM transporteur WHERE idTransporteur = ?');
        $req->execute(array($idT));
        return $req;
    }

}
function getEidUser($idE){
    include 'config.php';
    if ($_SESSION['connected']){
        $req = $bdd->prepare('SELECT User_idUser FROM envoyeur WHERE idEnvoyeur = ?');
        $req->execute(array($idE));
        return $req;
    }

}

function getCNomPrenom($id){
    include 'config.php';
    if($_SESSION['connected']){
        $req = $bdd->prepare('SELECT nom,prenom FROM utilisateur WHERE idUser =?');
        $req->execute(array($id));
        return $req;
    }
}
  
function getEAvis($idE){
    include 'config.php';
    if($_SESSION['connected']){
        $req = $bdd->prepare('SELECT avis , rating , idTransporteur, DAY(dateAvis) AS jour,
        MONTH(dateAvis) AS mois,
        YEAR(dateAvis) AS annee
         FROM avis_rating_envo 
                                WHERE idEnvoyeur=?');
        $req->execute(array($idE));
      
}
    return $req;
    
}

function getTAvis($idT){
    include 'config.php';
    if($_SESSION['connected']){

        $req = $bdd->prepare('SELECT avis , rating,idEnvoyeur,DAY(dateAvis) AS jour,
        MONTH(dateAvis) AS mois,
        YEAR(dateAvis) AS annee FROM avis_rating_trans 
                                WHERE idTransporteur=?');
        $req->execute(array($idT));
      
}
    return $req;
    
}

function getRating($rating){

    $sup = ceil($rating);
    $inf = round($rating);
    if($sup>$inf){
        return ($sup*2-1);
    }else{
        return ($rating*2);
    }
}

function moyERating($realSRating , $nbRating){
    include 'config.php';
    $moy = 0;
    if ($_SESSION['connected']) {
        if($nbRating!=0){

       $moy = $realSRating/$nbRating;   
        }else{
            $moy = 0;
        }
       $reqMoy = $bdd->prepare('UPDATE envoyeur SET rating = :moyen WHERE User_idUser = :id');
       $reqMoy->execute(array(
           'moyen'=>$moy,
           'id'=>$_SESSION['ID']
       ));
       return $moy;
    }
}

function moyTRating($realSRating , $nbRating){
    include 'config.php';
    $moy = 0;
    if ($_SESSION['connected']) {
           if($nbRating!=0){$moy = $realSRating/$nbRating;}else{$moy=0;}
       $reqMoy = $bdd->prepare('UPDATE transporteur SET rating = :moyen WHERE User_idUser = :id');
       $reqMoy->execute(array(
           'moyen'=>$moy,
           'id'=>$_SESSION['ID']
       ));
       return $moy;
    }
}








?>