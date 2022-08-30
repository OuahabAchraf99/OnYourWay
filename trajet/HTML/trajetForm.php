<?php
session_save_path();
session_start();
if ($_SESSION['connected']==false){
        header('LOCATION: ../../connexion/connexion.php');
        $_SESSION['link'] = "../trajet/HTML/trajetForm.php";}
        else{
        	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Proposer un trajet</title>
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="../CSS/colisForm.css">
	<!-- <link rel="stylesheet" type="text/css" href="../../startbootstrap/startbootstrap-agency-gh-pages/agency.min.css"> -->


	<!-- style nav -->
	
    <link rel="stylesheet"  href="./navbar_template/css/navbar.css">

    <!-- fin style nav-->


	
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>

	<!-- -->
		<nav class="navbar navbar-expand-lg navbar-light " style="margin-bottom: 0px">
      <a class="navbar-brand" href="">
        <img src="./navbar_template/logoDark.svg" width="auto" height="60px;" style="margin-top:-24px; margin-bottom:-20px; margin-left:5px; position: absolute;" alt="Logo OYW">
       <span style="position: relative; right: -54px"> O<span>Y</span>W</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <ul class="navbar-nav ml-auto text-uppercase" style="margin-right: 430px;">
          <li class="nav-item">
            <a class="nav-link" href="">Expédier un colis</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Proposer un trajet</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Voir les annonces</a>
          </li>
          
        </ul>
        <ul class="navbar-nav mr-auto text-uppercase">
          <li class="nav-item">
            <a class="btn btn-secondary   js-scroll-trigger" href="" id="nav-btn-secondary">Se connecter</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary  js-scroll-trigger" id="nav-btn-primary" href="">S'inscrire</a>
          </li>
          
          
        </ul>

        
      </div>
    	</nav>

		<!-- -->

	<div style="background-image: linear-gradient(to right,#586388,#32384d, #212533 80%, #12141c);padding:20px; height: 290px;" id="headDiv">
		<h1>Proposer un trajet</h1>
		<h2>Veuillez remplir ce formulaire</h2>
	</div>
	

	<form style="margin:5%; top:-160px; position:relative;" action="trajet_back.php" method="POST">
	     <div class="form-group">
	     	<fieldset class="fieldset">
	     		<legend>Itinéraire</legend>
	      		<label>De</label>
		      	<div class="container-fluid">
				    <div class="row">
			   			
			    		<!--<div class="col-lg-4 col-md-4 col-sm-12 lieu">
			    			<input type="text" class="form-control" placeholder="Wilaya de départ" name="wilayaDepart" required>
			    		</div>
			    		<div class="col-lg-4 col-md-4 col-sm-12 lieu">
			    			<input type="text" class="form-control" placeholder="Commune de départ" name="communeDepart" required>
			    		</div>
			    		<div class="col-lg-4 col-md-4 col-sm-12 lieu">
			    			<input type="text" class="form-control" placeholder="Rue de départ" name="rueDepart" required>
			    		</div>-->
			    		<div class="col-lg-4 col-md-4 col-sm-12 lieu">
			    		<input type="text" class="form-control" id="from" placeholder="Départ" name="Dep" onchange="calcRoute();" required>
			    		</div>
			  		</div>
			  	</div>
		  		<label>A</label>
		  		<div class="container-fluid">
				    <div class="row">
			   			<!--
			    		<div class="col-lg-4 col-md-4 col-sm-12 lieu">
			    			<input type="text" class="form-control" placeholder="Wilaya d'arrivée" name="wilayaArrivee" required>
			    		</div>
			    		<div class="col-lg-4 col-md-4 col-sm-12 lieu">
			    			<input type="text" class="form-control" placeholder="Daira d'arrivée" name="dairaArrivee" required>
			    		</div>
			    		<div class="col-lg-4 col-md-4 col-sm-12 lieu">
			    			<input type="text" class="form-control" placeholder="Rue d'arrivée" name="rueArrivee" required>
			    		</div>-->
			    		<div class="col-lg-4 col-md-4 col-sm-12 lieu">
			    			<input type="text" class="form-control" id="to" placeholder="Arrivée" name="Arv" onchange="calcRoute();" required>
			    		</div>
			    	
			  		</div>
		  		</div>
		  		<br>

<!-- test api-->
		<div class="container-fluid">
           <div id="googleMap">
           </div>
           
           <div id="output">
               
           </div>
       </div>
		  	<!-- end of test api-->


<!-- Probleme avec ce code // verifier la biblio js-->
				<div class="col">
	    			<label>Détour maximal</label>
	    			<!-- Range slider pour le detour en km-->
	    			<div class="slidecontainer">
  						<input type="range" min="0" max="30" value="0" class="slider" id="myRange" name="Deviation">
					</div>
					<p id="demo"></p>
					<script type="text/javascript">
						var slider = document.getElementById("myRange");
						var output = document.getElementById("demo");
						output.innerHTML = slider.value+" km"; // Display the default slider value

						// Update the current slider value (each time you drag the slider handle)
						slider.oninput = function() {
  						output.innerHTML = this.value+" km";
						}	
					</script>

	    		</div>
	    	</fieldset>	
	    	<fieldset class="fieldset">
	     	<legend>Etapes du trajet</legend>
		     	<label>Arrêts</label>
		    	<p>Augmentez vos chances d'être contacté en rajoutant les arrêts où vous pouvez déposer ou récupérer des colis </p>
		    	<input type="text" class="form-control" placeholder="Adresse de l'arrêt" name="Arrets">

		    	<br>
	    		
	    	</fieldset>
	    		


	  		

		
<!-- ************************************************************************************************************************************************-->		
			<fieldset class="fieldset">
	     	<legend>Etapes du trajet</legend>  
				<label>Moyen de transport</label>
				<div class="radio">
				  <label><input type="radio" name="MoyenDeTrans" value="Voiture" required>Je fais le trajet en voiture</label>
				</div>
				<div class="radio">
				  <label><input type="radio" name="MoyenDeTrans" value="Camion" required>Je fais le trajet en camion</label>
				</div>
				<div class="radio">
				  <label><input type="radio" name="MoyenDeTrans" value="Train" required>Je fais le trajet en train</label>
				</div>
				<div class="radio">
				  <label><input type="radio" name="MoyenDeTrans" value="Bus" required>Je fais le trajet en bus</label>
				</div>
				</br>
			</fieldset>
		
		
		<!--Format du colis (poids, taille, particularités)-->
		<fieldset>
			<legend>Format du colis</legend>

		
			<label>Taille du colis:</label>
			<p>Préciser la taille maximalle du colis que vous pouvez acheminer</p>
			
			
			<div class="btn-group btn-group-toggle" data-toggle="buttons">
			  <label class="btn btn-secondary active">
			  	<img src="../images/icones/mail-black-envelope-symbol.svg" class="img-responsive center-block"  title="Extra Small">
			    <input type="radio" name="FormatColis" id="option1" autocomplete="off" value="XS" checked> XS
			  </label>
			  <label class="btn btn-secondary">
			  	<img src="../images/icones/book.svg" class="img-responsive center-block"  title="Small">
			    <input type="radio" name="FormatColis" id="option2" autocomplete="off" value="S"> S
			  </label>
			  <label class="btn btn-secondary">
			  	<img src="../images/icones/parcel.svg" class="img-responsive center-block"  title="Medium">
			    <input type="radio" name="FormatColis" id="option3" autocomplete="off" value="M"> M
			  </label>
			  <label class="btn btn-secondary">
			  	<img src="../images/icones/armchair.svg" class="img-responsive center-block"  title="Large">
			    <input type="radio" name="FormatColis" id="option4" autocomplete="off" value="L"> L
			  </label>
			  <label class="btn btn-secondary">
			  	<img src="../images/icones/closet.svg" class="img-responsive center-block"  title="Extra Large">
			    <input type="radio" name="FormatColis" id="option5" autocomplete="off" value="XL"> XL
			  </label>
			</div>
			<br>
			<a href="#info-formatColis" data-toggle="collapse"> <i class="fa fa-info-circle" aria-hidden="true"></i> Plus d'informations sur les tailles</a>

			<div id="info-formatColis" class="collapse">
				Taille XS : tient dans une boîte à chaussures (téléphone, clés...)
				<br>
				Taille S : tient dans une petite valise (ordinateur, livres, vêtements...)
				<br>
				Taille M : tient dans une voiture de taille moyenne (tableau, guitare, vélo...)
				<br>
				Taille L : tient dans un break ou un monospace (commode, chaise, lit bébé...)
				<br>
				Taille XL : nécessite une camionnette (plusieurs cartons, matelas, canapé...)
				<br>
			</div>
			<br>

			<label>Poids du colis:</label>
			<p>Préciser le poids maximal du colis que vous pouvez acheminer</p>
			
			<div class="btn-group btn-group-toggle" data-toggle="buttons">
			  <label class="btn btn-secondary active">
			    <img src="../images/icones/feather1.svg" class="img-responsive center-block" title="Très Léger">
			    <input type="radio" name="PoidsColis" id="option1" autocomplete="off" value="T.Léger" checked>T.Léger
			  </label>
			  <label class="btn btn-secondary" >
			  	<img src="../images/icones/suitcase.svg" class="img-responsive center-block"  title="Léger">
			    <input type="radio" name="PoidsColis" id="option2" autocomplete="off" value="Léger" > Léger
			  </label>
			  <label class="btn btn-secondary">
			  	<img src="../images/icones/dumbbell.svg" class="img-responsive center-block" title="Lourd">
			    <input type="radio" name="PoidsColis" id="option3" autocomplete="off" value="Lourd"> Lourd
			  </label>
			  <label class="btn btn-secondary">
			  	<img src="../images/icones/weight-tool.svg" class="img-responsive center-block" title="Très Lourd">
			    <input type="radio" name="PoidsColis" id="option4" autocomplete="off" value="T.lourd"> T.lourd
			  </label>
			</div>

			<br>
			<a href="#info-poidsColis" data-toggle="collapse"> <i class="fa fa-info-circle" aria-hidden="true"></i> Plus d'informations sur les tailles</a>

			<div id="info-poidsColis" class="collapse">
				Très léger: tient dans une boîte à chaussures (téléphone, clés...)
				<br>
				Léger : tient dans une petite valise (ordinateur, livres, vêtements...)
				<br>
				Lourd : tient dans une voiture de taille moyenne (tableau, guitare, vélo...)
				<br>
				Trés lourd : tient dans un break ou un monospace (commode, chaise, lit bébé...)
				<br>
				
			</div>
			<br>
			</fieldset>

		<!--****************************************************-->
		<fieldset>
			<legend>Dates de départ</legend>
			<div class="container">
			    <div class="row">
			        <div class='col-sm-6'>
			            <div class="form-group">
			            <label>Plage de date de départ</label>
			            	<br>
			            	<label>Du:</label>
			                <div class='input-group date' id='datetimepicker2'>
			                    <input type="date" class="form-control"  name="DepDateDebut" required/>
			                    
			                </div>
		
			                <label>Au:</label>
			                <div class='input-group date' id='datetimepicker3'>
			                    <input type="date" class="form-control"  name="DepDateFin" required/>
			                    
			                </div>
			            </div>
			        </div>
			        <script type="text/javascript">
			            $(function () {
			                $('#datetimepicker2').datetimepicker({
			                    locale: 'fr'
			                });
			            });
			        </script>
			        <script type="text/javascript">
			            $(function () {
			                $('#datetimepicker3').datetimepicker({
			                    locale: 'fr'
			                });
			            });
			        </script>

			    </div>
			</div>
			</fieldset>
			<!--****************************************************-->
			<fieldset>
			<legend>Dates de retour</legend>
				<div class="container">
				    <div class="row">
				        <div class='col-sm-6'>
				            <div class="form-group">
				            <label>Date de retour <span>(Facultative)</span></label>
				            <br>
				            <label>Du:</label>
				                <div class='input-group date' id='datetimepicker4'>
				                    <input type="date" class="form-control"  name="ArvDateDebut"/>
				                    
				                </div>
				             <label>Au:</label>
				             <br>
				             <div class='input-group date' id='datetimepicker5'>
				                    <input type="date" class="form-control"  name="ArvDateFin"/>
				                    
				        	</div>   
				            </div>
				        </div>
				        <script type="text/javascript">
				            $(function () {
				                $('#datetimepicker4').datetimepicker({
				                    locale: 'fr'
				                });
				            });
				        </script>
				        
				        <script type="text/javascript">
				            $(function () {
				                $('#datetimepicker5').datetimepicker({
				                    locale: 'fr'
				                });
				            });
				        </script>
				    </div>
				</div>
			   </fieldset>

			<!--****************************************************-->
			<fieldset>
				<legend>Fréquence</legend>
				<label>Fréquence du trajet:</label>
				<div class="radio">
				  <label><input type="radio" id="Regulier" name="FreqVoy" onclick="myRadioFunction1()" value="Regulier" required>Je fais ce trajet régulièrement</label>
				</div>
				<div class="radio">
				  <label><input type="radio" name="FreqVoy" onclick="myRadioFunction2()" value="Occasionnel" required >Je fais ce trajet une fois</label>
				</div>
			



			<!--****************************************************-->
				<div id="divCasRegulier" style="display:none;">
					<label>Jours de départs:</label>	
					<div class="custom-control custom-switch">
					
					  <input type="checkbox" class="custom-control-input" id="customSwitch1" name="Dimanche">
					  <label class="custom-control-label" for="customSwitch1">Dimanche</label>
					</div>
					<div class="custom-control custom-switch">
					  <input type="checkbox" class="custom-control-input" id="customSwitch2" name="Lundi">
					  <label class="custom-control-label" for="customSwitch2">Lundi</label>
					</div>

					<div class="custom-control custom-switch">
					  <input type="checkbox" class="custom-control-input" id="customSwitch3" name="Mardi">
					  <label class="custom-control-label" for="customSwitch3">Mardi</label>
					</div>
					<div class="custom-control custom-switch">
					  <input type="checkbox" class="custom-control-input" id="customSwitch4" name="Mercredi">
					  <label class="custom-control-label" for="customSwitch4">Mercredi</label>
					</div>
					<div class="custom-control custom-switch">
					  <input type="checkbox" class="custom-control-input" id="customSwitch5" name="Jeudi">
					  <label class="custom-control-label" for="customSwitch5">Jeudi</label>
					</div>
					<div class="custom-control custom-switch">
					  <input type="checkbox" class="custom-control-input" id="customSwitch6" name="Vendredi">
					  <label class="custom-control-label" for="customSwitch6">Vendredi</label>
					</div>
					<div class="custom-control custom-switch">
					  <input type="checkbox" class="custom-control-input" id="customSwitch7" name="Samedi">
					  <label class="custom-control-label" for="customSwitch7">Samedi</label>
					</div>
				</div>
				<br>
			<!--Ce code ne marche pas-->
				<script type="text/javascript">
					// var x = document.getElementById("divCasRegulier");
					// if (document.getElementById('Regulier').checked){
		   //  			x.style.display = "block";

	    //             }else{
	    //             	x.style.display = "none";
	    //             }
	    		function myRadioFunction1() {
	 				 var x = document.getElementById("divCasRegulier");
	 				 x.style.display = "block";
				}
				function myRadioFunction2() {
	 				 var x = document.getElementById("divCasRegulier");
	 				 x.style.display = "none";
				}
	             
		
				</script>
			
			
		</fieldset>		
	     <div class="container" style="padding:28px;">
		    <div class="row">
		 		<input type="submit" class="btn btn-primary btn-lg col-lg-2  pull-right" name="submit" value="Publier l'annonce"></input>
				<input type="reset" class="btn btn-primary btn-lg col-lg-3 pull-right" value="Réinitialiser le formulaire"></input>
			</div>
		</div>
	</div>
	</form>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKHMVCsGXT3wzJxO0hCsh_enpT8ZDQZ8c&libraries=places"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="javascript.js" type="text/javascript"></script>
</body>
</html>
<?php } ?>
