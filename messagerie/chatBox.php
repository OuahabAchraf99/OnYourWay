<?php session_save_path();
session_start();
if($_SESSION['connected']==false){
  header('Location: ../connexion/connexion.php');
}
include './msgBack.php';
include './profileBack.php';

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>ChatBox</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/chatBox3.css">

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
     <script type="text/javascript">
function showMsg(str)
{
if (str=="")
  {
  document.getElementById("affichage").innerHTML="";
  return;
  } 

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("affichage").innerHTML=xmlhttp.responseText;
    var element= document.getElementById("msg");
                element.scrollTop = element.scrollHeight;
    }
  }
xmlhttp.open("GET","configMsg.php?id="+str,true);
xmlhttp.send();
}
function sendMsg(idMsg) {
  var msg = $("#sMsg").val();
  var month = (new Date()).getMonth();
  var monthOfTheYear= ["January","February","March","April","May","June","July","August","September","October","November","December"];
  var day = (new Date()).getDate();
  $("#sMsg").val("");
  if ((msg!="")&&(msg!=null)) {
    if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      $(".chat_ib > p").html(msg);
      $("span.chat_date").html(monthOfTheYear[month]+' '+day);
    document.getElementById("affichage").innerHTML = " ";
    document.getElementById("affichage").innerHTML=xmlhttp.responseText;
    var element= document.getElementById("msg");
                element.scrollTop = element.scrollHeight;
    }
  }
xmlhttp.open("GET","configMsg.php?msg="+msg,true);
xmlhttp.send();
    
  }
  
}
</script>
   
</head>
<body style="background-color:#c9c9c9;">
   
  <div class="wrapper">
    <div class="sidebar" data-color="blue" onmouseover="scrollbarAppear()" onmouseout="scrollbarDisappear()" >
    <!-- Code concernant l'apparition et la disparition du scroll bar -->
        
    <!-- ************************************************************ -->


    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

      <div class="sidebar-wrapper" id="filtre">
        
            <div class="logo">

                <a href="" class="simple-text ">
                  <img src="assets/img/logo.svg" class="img-fluid">On your way
                </a>
            </div>
            <form method="POST" id="filtreTrajet" style="display:block" class="form-group">
            <ul class="nav">
        <div class="page-sidebar expandit" ">
          <div class="sidebar-inner" id="main-menu-wrapper" >
            <br>

            <ul class="wraplist" style="height: auto;">
              <!--          <li class="menusection">Main</li>-->
              <li><a href="../profile/examples/profile.php" style="color: whitesmoke;font-size: 20px;position: relative;right: 50px;top: -30px"><span class="sidebar-icon"><i class="fa fa-user" ></i></span> <span class="menu-title">Profile</span></a></li>
              <br>
              <li><a href="./chatBox.php" style="color: whitesmoke;font-size: 20px;margin-left: 0px;position: relative;right: 35px;top: -30px"><span class="sidebar-icon"><i class="fa fa-envelope"></i></span> <span class="menu-title">Messages</span></a></li>
              <br>
              <li><a href="../notification/notifcation.html" style="color: whitesmoke;font-size: 20px;margin-left: 0px;position: relative;right: 35px;top: -30px "><span class="sidebar-icon"><i class="fa fa-bell"></i></span> <span class="menu-title">Notifications</span></a></li>
              <br>

              <br>
              <li><a href="../dashboard/deconnexion.php" style="color: whitesmoke;font-size: 20px;margin-left: 0px;position: relative;right: 35px;top: -30px"><span class="sidebar-icon"><i class="fa fa-sign-out"></i></span> <span class="menu-title">Déconnecter</span></a></li>

            </ul>
          </div>
        </div>












  

            </ul> 

           
            </form>
        
            
            

      </div>
    </div>

    <div>

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	
    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid container">
        <div class="messaging">
              <div class="inbox_msg">
                <div class="inbox_people">
                  <div class="headind_srch">               
                    
                    <!--<div class="srch_bar">
                      <div class="input-group">
                        <input type="texte" class="form-control" name="contactRecherche" placeholder="Rechercher un contact..." id="myInput">
                        <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                      </div>
                     
                    </div>-->
                    <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Rechercherun contact..." aria-label="Search" id="myInput" style="width:80%;background-color:#f8f9fa;">
                    <i class="fa fa-search" aria-hidden="true" style="color:#ffca28; opacity:0.8;padding-left:8px;"></i>
                    
                    </form>
                  </div>
                  <div class="inbox_chat">
                  <?php  
                    $contactNom = array('nom1','nom2');
                    $contactPrenom = array('prenom1','prenom2' );
                    $Recepteur = null;   
                    $id = 0;                 
                    $reqList = getListMsg() ;
                    while($list = $reqList->fetch()){
                      if($list['idEnvoyeur']!=$_SESSION['ID']){
                        $id = $list['idEnvoyeur'];
                        $reqNom = getCNomPrenom($list['idEnvoyeur']);
                        $Recepteur = $reqNom->fetch();
                      }else{
                        $id = $list['idRecepteur'];
                        $reqNom = getCNomPrenom($list['idRecepteur']);
                        $Recepteur = $reqNom->fetch();
                      }                      
                      if(in_array($Recepteur['nom'], $contactNom)==false and in_array($Recepteur['prenom'], $contactPrenom)==false ){
                        $reqMsg = selectMsg($id);
                        $messages = [];
                        $new = [];
                        if ($list['idEnvoyeur']==$_SESSION['ID']) {
                          $new[$reqMsg->rowCount()-1]=0;
                        }
                        while($msgs = $reqMsg->fetch()){
                            $messages[]=$msgs['msg'];
                            $new[]=$msgs['nouveau'];
                        }

                        if ($new[$reqMsg->rowCount()-1]==1) {
                          echo '<div id="'.$id.'" class="chat_list new_chat" onClick="turnToActive(this)">
                        
                          <div class="chat_people">
                            <div class="chat_img"> <img src="assets/img/default-avatar.png" alt="sunil"> </div>
                            <div class="chat_ib">
                              <h5>'.$Recepteur['nom'].' '.$Recepteur['prenom'].' <span class="chat_date">'.$list['mois'].' '.$list['jour'].'</span></h5>
                              <p>'.$messages[$reqMsg->rowCount()-1].'</p>
                            </div>
                          </div>
                          
                        </div>';}else{
                          echo '<div id="'.$id.'" class="chat_list" onClick="turnToActive(this)">
                          <div class="chat_people">
                            <div class="chat_img"> <img src="assets/img/default-avatar.png" alt="sunil"> </div>
                            <div class="chat_ib">
                              <h5>'.$Recepteur['nom'].' '.$Recepteur['prenom'].' <span class="chat_date">'.$list['mois'].' '.$list['jour'].'</span></h5>
                              <p>'.$messages[$reqMsg->rowCount()-1].'</p>
                            </div>
                          </div>
                          
                        </div>';    

                        }
                        echo ' <script>
                        function turnToActive(element){
                          var html = document.getElementsByTagName(\'html\'); 
                          var elements = html[0].getElementsByClassName("active_chat");
                          if(elements[0]!=null){
                              elements[0].classList.remove("active_chat");
                          }
                          element.classList.add("active_chat");
                          if(html[0].getElementsByClassName("new_chat")){
                          element.classList.remove("new_chat");
                          }
                          showMsg(element.id);
                        }
                      </script>';
                    }
                    $contactNom[] = $Recepteur['nom'];
                    $contactPrenom[] = $Recepteur['prenom'];
                  }
                  ?>
                 
                  </div>
                </div>
               
               
                <div id="affichage" class="mesgs">
                  <?php 

                  echo '<script>showMsg("'.$id.'")</script>'


                  ?>
                
                </div>
              </div>
         </div>
         </div>
         </nav> 
        <!-- <script type="text/javascript">
                var element=document.getElementById("msg");
                element.scrollTop = element.scrollHeight;
                </script>  -->
         <script>
          $(document).ready(function(){
            $("#myInput").on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $(".chat_list").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
          });
          </script>  
        
           

        <footer class="footer " >
            <div class="container-fluid">
                <nav class="ml-auto " style="margin-left:35px;">
                    <ul>
                        <li>
                            <a href="#">
                                Accueil
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Expédier un colis
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Proposer un trajet
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Voir les annonces
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="">OYW</a>, tous droits réservés
                </p>
            </div>
        </footer>


    </div>
</div>


</body>

       <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
