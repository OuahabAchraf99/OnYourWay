<?php
if ($_SESSION['contact']!=null) {
    $reqC = getConversation($_SESSION['contact']);
    while ($conversation = $reqC->fetch()) {
      echo '<script>
          var element = document.getElementById("'.$conversation['idRecepteur'].'");
          if(element){
              element.click();
          }else{
              element = document.getElementById("'.$conversation['idEnvoyeur'].'");
              element.click();
          }
       </script>';   
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
                    
  }      
?>