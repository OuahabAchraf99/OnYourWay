<?php


function getConversation($idContact){
    include 'config.php';
    if ($_SESSION['connected']) {
        $reqco = $bdd->prepare('SELECT id, idEnvoyeur , idRecepteur ,msg , 
        DATE_FORMAT(dateMsg,\'%h:%i %p    |   %M %e \') as msgDate
        FROM messages WHERE idEnvoyeur = :envoyeur1 or idRecepteur = :envoyeur1');
        $reqco->execute(array(
            'envoyeur1'=>$idContact
        ));
        return $reqco;
    }
}


function saveMsg($idRecepteur , $msg){
    include 'config.php';
    if($_SESSION['connected']){
        $reqid = $bdd->prepare('INSERT INTO messages (idEnvoyeur , idRecepteur , msg ,dateMsg,nouveau) VALUES(:id , :idR ,:messages ,NOW(),1)');
        $reqid->execute(
             array('id' => $_SESSION['ID'],
                   'idR'=> $idRecepteur,
                   'messages'=>$msg)
            );
        }

}

function getListMsg(){
    include 'config.php';
    if ($_SESSION['connected']) {
        $reqList = $bdd->prepare('SELECT idEnvoyeur,idRecepteur,
                DAY(dateMsg) as jour,
                MONTHNAME(dateMsg) as mois FROM messages WHERE idEnvoyeur = :idU or idRecepteur = :idU');
        $reqList->execute(
                array('idU' => $_SESSION['ID'] )
        );
        return $reqList;
    }
}

function selectMsg($id){
    include 'config.php';
    if ($_SESSION['connected']) {
            $reqMsg = $bdd->prepare('SELECT msg,nouveau FROM messages WHERE (idEnvoyeur=:util and idRecepteur=:cont) or (idEnvoyeur=:cont and idRecepteur=:util)');
            $reqMsg->execute(
                    array('util' =>$_SESSION['ID'] ,
                          'cont' =>$id )
    );
    return $reqMsg ;
    }

}

function nouveauMsgU($idC){
    include 'config.php';
    if ($_SESSION['connected']) {
        $reqN = $bdd->prepare('UPDATE messages SET nouveau = 0 WHERE idEnvoyeur = :idcontact and idRecepteur = :idutil');
        $reqN->execute(array(
            'idcontact'=>$idC,
            'idutil'=>$_SESSION['ID']
        ));
    }
}
function nouveauMsgC($idC){
    include 'config.php';
    if ($_SESSION['connected']) {
        $reqN = $bdd->prepare('UPDATE messages SET nouveau = 0 WHERE idEnvoyeur = :idutil and idRecepteur = :idcontact');
        $reqN->execute(array(
            'idcontact'=>$idC,
            'idutil'=>$_SESSION['ID']
        ));
    }
}
?>