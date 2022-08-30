<?php 
session_save_path();
session_start();
if (isset($_GET['msg'])) {
    include './msgBack.php';
    include './profileBack.php';
    $idmsg = $_SESSION['idMsg']+1;
    saveMsg($_SESSION['contact'],$_GET['msg']);
    nouveauMsgU($_SESSION['contact']);

    $reqNom = getCNomPrenom($_SESSION['contact']);
    $nom = $reqNom->fetch();
    echo ' <div class="container-fluid" style="background-color:#212533; padding:10px 35px 10px 8px;">
                <h5 style="color:#ffffff; margin-left:10px;">'.$nom['nom'].' '.$nom['prenom'].'</h5>
              </div>
              <div id="msg" class="msg_history">';
              
    $reqC = getConversation($_SESSION['contact']);
    while ($conversation = $reqC->fetch()) {  
        if ($conversation['idRecepteur']==$_SESSION['ID']) {
            echo '<div id="'.$conversation['id'].'" class="incoming_msg">
            <div class="incoming_msg_img"> <img src="assets/img/default-avatar.png" alt="sunil"> </div>
            <div class="received_msg">
              <div class="received_withd_msg">
                <p>'.$conversation['msg'].'</p>
                <span class="time_date">'.$conversation['msgDate'].'</span></div>
            </div>
          </div>';
        }else {
            echo'<div class="outgoing_msg">
            <div id ="'.$conversation['id'].'"class="sent_msg">
                <p>'.$conversation['msg'].'</p>
                <span class="time_date">'.$conversation['msgDate'].'</span> </div>
            </div>';
            
        }
        $_SESSION['idMsg']=$conversation['id'];
        
     }
     echo '</div><div class="type_msg">
     <div class="input_msg_write">
       <input id="sMsg" type="text" class="write_msg" name ="msg" placeholder="Type a message" />
       <button class="msg_send_btn" onClick="sendMsg(\'sMsg\');"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
     </div>
   </div>';
     
    
     

    }
    
    
if(isset($_GET['id']) ){
    include './msgBack.php';
    include './profileBack.php';
    $_SESSION['contact'] = (int)$_GET['id'];

    nouveauMsgC($_SESSION['contact']);
    nouveauMsgU($_SESSION['contact']);


    $reqNom = getCNomPrenom($_SESSION['contact']);
    $nom = $reqNom->fetch();
    echo ' <div class="container-fluid" style="background-color:#212533; padding:10px 35px 10px 8px;">
                <h5 style="color:#ffffff; margin-left:10px;">'.$nom['nom'].' '.$nom['prenom'].'</h5>
              </div>
              <div id="msg" class="msg_history">';
              
    $reqC = getConversation($_SESSION['contact']);
    while ($conversation = $reqC->fetch()) {  
        if ($conversation['idRecepteur']==$_SESSION['ID']) {
            echo '<div id="'.$conversation['id'].'" class="incoming_msg">
            <div class="incoming_msg_img"> <img src="assets/img/default-avatar.png" alt="sunil"> </div>
            <div class="received_msg">
              <div class="received_withd_msg">
                <p>'.$conversation['msg'].'</p>
                <span class="time_date">'.$conversation['msgDate'].'</span></div>
            </div>
          </div>';
        }else {
            echo'<div class="outgoing_msg">
            <div id ="'.$conversation['id'].'"class="sent_msg">
                <p>'.$conversation['msg'].'</p>
                <span class="time_date">'.$conversation['msgDate'].'</span> </div>
            </div>';
            
        }
        $_SESSION['idMsg']=$conversation['id'];
        
     }
     echo '</div><div class="type_msg">
     <div class="input_msg_write">
       <input id="sMsg" type="text" class="write_msg" name ="msg" placeholder="Type a message" />
       <button class="msg_send_btn" onClick="sendMsg(\'sMsg\');"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
     </div>
   </div>';
     

    }

?>