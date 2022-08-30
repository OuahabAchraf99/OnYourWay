<?php
session_save_path();
session_start(); 
include 'config.php';
if ($_SESSION['connected']==true) {

    if ((isset($_FILES['photo-file']['name'])or isset($_POST['photo-url'])) and ( isset($_FILES['contrat-file']['name'])or isset($_POST['contrat-url']) ) and ( isset($_FILES['atsh-file']['name'])or isset($_POST['atsh-url']) ) and ( isset($_FILES['identite-file']['name'])or isset($_POST['identite-url']) ) ) {
       if ($_FILES['photo-file']['name']!=null) {
        
            $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
        //1. strrchr renvoie l'extension avec le point (« . »).
        //2. substr(chaine,1) ignore le premier caractère de chaine.
        //3. strtolower met l'extension en minuscules.
            $extension_upload = strtolower(  substr(  strrchr($_FILES['photo-file']['name'], '.')  ,1)  );
            if (!in_array($extension_upload,$extensions_valides) ) {echo "Extension non-valide";
             }else{
                $lienP  = md5(uniqid(rand(), true));
                $resultat = move_uploaded_file($_FILES['photo-file']['tmp_name'],"./up_file/{$lienP}.{$extension_upload}");
                if (!$resultat) {echo "Transfert non réussi";
                 }
                }
        }else {
           if ($_POST['photo-url']!=null) {
            $lienP = $_POST['photo-url'];
        }else{
            header('LOCATION: Dashboard1.php#popup2');
           }
           
       }

       if ($_FILES['contrat-file']['name']!=null) {
        $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
        //1. strrchr renvoie l'extension avec le point (« . »).
        //2. substr(chaine,1) ignore le premier caractère de chaine.
        //3. strtolower met l'extension en minuscules.
            $extension_upload = strtolower(  substr(  strrchr($_FILES['contrat-file']['name'], '.')  ,1)  );
            if (!in_array($extension_upload,$extensions_valides) ) {echo "Extension non-valide";
             }else{
                $lienC  = md5(uniqid(rand(), true));
                $resultat = move_uploaded_file($_FILES['contrat-file']['tmp_name'],"./up_file/{$lienC}.{$extension_upload}");
                if (!$resultat) {echo "Transfert non réussi";
                 }
                }
         
        }else {
            if ($_POST['contrat-url']!=null){
                $lienC = $_POST['contrat-url'];
            }else{
                header('LOCATION: Dashboard1.php#popup2');
            }
            
        }
        if ($_FILES['atsh-file']['name']!=null) {
            $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
            //1. strrchr renvoie l'extension avec le point (« . »).
            //2. substr(chaine,1) ignore le premier caractère de chaine.
            //3. strtolower met l'extension en minuscules.
                $extension_upload = strtolower(  substr(  strrchr($_FILES['atsh-file']['name'], '.')  ,1)  );
                if (!in_array($extension_upload,$extensions_valides) ) {echo "Extension non-valide";
                 }else{
                    $lienDH  = md5(uniqid(rand(), true));
                   // $nom = "D:/wamp64/www/up_file/{$nom}.{$extension_upload}";
                    $resultat = move_uploaded_file($_FILES['atsh-file']['tmp_name'],"./up_file/{$lienDH}.{$extension_upload}");
                    if (!$resultat) {echo "Transfert non réussi";
                     }
                    }
            
            }else {
                if ($_POST['atsh-url']!=null) {
                    $lienDH  = $_POST['atsh-url'];
                }else{
                    header('LOCATION: Dashboard1.php#popup2');
                }
           
            }
        if ($_FILES['identite-file']['name']!=null) {
            $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
            //1. strrchr renvoie l'extension avec le point (« . »).
            //2. substr(chaine,1) ignore le premier caractère de chaine.
            //3. strtolower met l'extension en minuscules.
                $extension_upload = strtolower(  substr(  strrchr($_FILES['identite-file']['name'], '.')  ,1)  );
                if (!in_array($extension_upload,$extensions_valides) ) {echo "Extension non-valide";
                 }else{
                    $lienId  = md5(uniqid(rand(), true));
                   // $nom = "D:/wamp64/www/up_file/{$nom}.{$extension_upload}";
                    $resultat = move_uploaded_file($_FILES['identite-file']['tmp_name'],"./up_file/{$lienId}.{$extension_upload}");
                    if (!$resultat) {echo "Transfert non réussi";
                     }
                    }
            }else {
                if ($_POST['identite-url']!=null) {
                    $lienId  = $_POST['identite-url'];
                }else{
                    header('LOCATION: Dashboard1.php#popup2');
                }
            
            }
            $reqpremium = $bdd->prepare('UPDATE utilisateur SET UserType = 1, PhotoProfil=:lienP ,Contrat=:lienC ,Declaration_honneur=:lienDH,PieceIdentite=:lienId');
            $reqpremium->execute(
            array('lienP' =>$lienP, 
            'lienC' =>$lienC,
            'lienDH'=>$lienDH,
            'lienId'=>$lienId ));
        
        $_SESSION['premium'] = 1;
        header('LOCATION: Dashboard.php');
    }
}else{
    header('LOCATION: connexion.php');
}

?>