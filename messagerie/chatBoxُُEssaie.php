<?php session_save_path();
session_start();
if($_SESSION['connected']==false){
  header('Location: ../connexion.html');
}
include '../msgBack.php';
include '../profileBack.php';
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
    <link rel="stylesheet" href="../chatBox.css">

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
  //var dataMsg ="msg="+msg;
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
    document.getElementById("affichage").innerHTML = " ";
    document.getElementById("affichage").innerHTML=xmlhttp.responseText;
    var element= document.getElementById("msg");
                element.scrollTop = element.scrollHeight;
    }
  }
xmlhttp.open("GET","configMsg.php?msg="+msg,true);
xmlhttp.send();
/*$.ajax({
			type: "POST",
		    url: "configMsg.php",
		    data: dataMsg,
		    	success: function(){
					$('.success').fadeIn(200).show();
		    		$('.error').fadeOut(200).hide();
					/* UNCOMMNENT TO SEND TO CONSOLE */
					/*
					console.log (dataString);	
					console.log ("AJAX DONE");
					
        }
			}); */
    
  }
  
}
</script>
<!--<script type="text/javascript">
                var element= document.getElementById("affichage").childNodes[0];
                element.scrollTop = element.scrollHeight;
                </script>-->
    
   
</head>
<body style="background-color:#c9c9c9;">

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Creative Tim
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.html">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="user.html">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="pe-7s-note2"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li>
                    <a href="typography.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li class="active">
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
				<li class="active-pro">
                    <a href="upgrade.html">
                        <i class="pe-7s-rocket"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid container">
        <div class="messaging">
              <div class="inbox_msg">
                <div class="inbox_people">
                  <div class="headind_srch">
                    
                    <div class="srch_bar">
                      <div class="input-group">
                        <input type="texte" class="form-control" name="contactRecherche" placeholder="Rechercher un contact..." id="myInput">
                        <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                      </div>

                    </div>
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
                <!--
                if (isset($_SESSION['contact'])and $_SESSION['contact']!=null) {
                $reqNom = getCNomPrenom($_SESSION['contact']);
                $nom = $reqNom->fetch();
                echo ' <div class="container-fluid" style="background-color:#212533; padding:10px 35px 10px 8px;">
                <h5 style="color:#ffffff; margin-left:10px;">'.$nom['nom'].' '.$nom['prenom'].'</h5>
              </div>
              <div id="msg" class="msg_history">';
                    include 'lireMsg.php';
                echo '</div>';
                }else{
                  if (!isset($_SESSION['contact'])) {
                    $_SESSION['contact']=$id;
                    $reqNom = getCNomPrenom($_SESSION['contact']);
                    $nom = $reqNom->fetch();
                    echo '<div class="container-fluid" style="background-color:#212533; padding:10px 35px 10px 8px;">
                    <h5 style="color:#ffffff; margin-left:10px;">'.$nom['nom'].' '.$nom['prenom'].'</h5>
                    </div>
                  <div id="msg" class="msg_history">';

                        include 'lireMsg.php';
                   
                  echo '</div>';
                  }else{
                    echo '<div id="msg" class="msg_history"></br></br></br></br></br></br><p>Aucun message à afficher</p></br></br></br></br></br></br></div>';
                  }
                } -->
               
                  <!--<div class="type_msg">
                    <div class="input_msg_write">
                    <form action="configMsg.php" method="post">
                      <input type="text" class="write_msg" name ="msg" placeholder="Type a message" />
                      <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                      </form>
                    </div>
                  </div>-->
                 
                </div>
              </div>
         </div>
         </div>
         </nav> 
        
         <script>
          $("document").ready(function(){
            $("#myInput").on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $(".chat_list").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
          });
          </script>  
           

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
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
