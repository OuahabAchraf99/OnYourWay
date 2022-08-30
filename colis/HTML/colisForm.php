<?php
session_save_path();
session_start();
if ($_SESSION['connected']==false){
        header('LOCATION: ../../connexion/connexion.php');
        $_SESSION['link'] = "../colis/HTML/colisForm.php";}
        else{
        	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Expédier un colis</title>
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="../CSS/colisForm.css">
	<!-- <link rel="stylesheet" type="text/css" href="../../startbootstrap/startbootstrap-agency-gh-pages/css/agency.min.css"> -->


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

		<!-- <div style="background-image: linear-gradient(to right,#fed96b,#fed136,#ffca28,#FEBF00,#D5A81E);padding:20px; height: 290px;" id=""> -->
	<div style="background-image: linear-gradient(to right,#586388,#32384d, #212533 80%, #12141c);padding:20px; height: 290px;" id="headDiv">
		<h1>Expédier un colis</h1>
		<h2>Veuillez remplir ce formulaire</h2>
	</div>

	<form style="margin:5%; top:-210px; position:relative;" action="colis.php" method="POST" enctype="multipart/form-data">
	     <div class="form-group">
	     	<fieldset class="fieldset">
	     		<legend>Colis</legend>
	     		<label for="formGroupExampleInput">Type d'objet:</label>
		    	<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Vélo,Téléviseur,Canapé,Ordinateur...." name="objet"  required>

		    	<label for="exampleFormControlTextarea1">Description du colis:</label>
		    	<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descriptionColis" placeholder="Soyez le plus précis possible. S'il s'agit d'un contenant du type valise ou carton, merci d'en préciser le contenu dans la description. Précisez également les caractéristiques (dimension, poids, fragilité...) ou une demande spécifique (besoin d'aide pour porter...)."></textarea>

		    <!--Rajouter une fonction pour faire disparaitre le texte au toucher -->
		    <!--Ma fonction ICI! -->

	     	</fieldset>

		   	<fieldset>
		   		<legend>Itinéraire</legend>


					<div class="row">
						<form class="form-horizontal">
							 <div class="form-group">
								<label for="from" class="col-xs-2 control-label">From: </label>
								 <div class="col-xs-10">
										 <input type="text" name="from" id="it_from" placeholder="Depart" class="form-control" onchange="calcRoute()">
								 </div>

							 </div>

								 <div class="form-group">
								<label for="to" class="col-xs-2 control-label">To: </label>
								 <div class="col-xs-10">
										 <input type="text" name="to" id="it_to" placeholder="Destination" class="form-control" onchange="calcRoute()">
								 </div>
							 </div>
					 </form>
					</div>

				 <div class="row">
				 		<div id="google-map"></div>

				 </div>

				 <div id="output">

				 </div>
				 <input type="hidden" name="dist" id="distance" value="">
		   		<!-- <label>De:</label>
			    <div class="row">

		    		<div class="col">
		    			<input type="text" class="form-control" placeholder="Wilaya de départ" name="wilayaDepart" required>
		    		</div>
		    		<div class="col">
		    			<input type="text" class="form-control" placeholder="Commune de départ" name="CommuneDepart" required>
		    		</div>
		    		<div class="col">
		    			<input type="text" class="form-control" placeholder="Rue de départ" name="rueDepart" required>
		    		</div>

		  		</div>
		  		<label>A:</label>
			    <div class="row">

		    		<div class="col">
		    			<input type="text" class="form-control" placeholder="Wilaya d'arrivée" name="wilayaArrivee" required>
		    		</div>
		    		<div class="col">
		    			<input type="text" class="form-control" placeholder="Commune d'arrivée" name="communeArrivee" required>
		    		</div>
		    		<div class="col">
		    			<input type="text" class="form-control" placeholder="Rue d'arrivée" name="rueArrivee" required>
		    		</div>

		  		</div> -->
		   	</fieldset>



	  		<fieldset>
	  			<legend>Date limite d'envoi</legend>
	  			<label>Date limite d'envoi:</label>

				<div class="container">
				    <div class="row">
				        <div class='col-xs-6 col-sm-6'>
				            <div class="form-group">
				                <div class='input-group date' id='datetimepicker2'>
				                    <input type="date" class="form-control"  name="dateEnvoi" id="dateLimiteEnvoi" required/>
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
				            </div>
				        </div>
				        <script type="text/javascript">
				            $(function () {
				                // $('#datetimepicker2').datetimepicker({
				                //     locale: 'fr'
				                // });
				            });
				        </script>
				    </div>
				</div>
				<script type="text/javascript">
					var today = new Date();

					var mm = today.getMonth()+1; //January is 0!
					var yyyy = today.getFullYear();
					document.getElementById("dateLimiteEnvoi").addEventListener("change", function() {
						var dd = today.getDate();
					    var input = this.value; // Ici , je récupère la valeur de mon objet
					    var dateEntered = new Date(input);// Ici je récupère l'objet lui-même
					    if(dateEntered.getFullYear() < yyyy){
					    	alert("La date limite d'envoi de votre colis a expiré. Veuillez revérifier cette dernière.");
					    }
					    else if(dateEntered.getMonth()<mm-1){
					    	alert("La date limite d'envoi de votre colis a expiré. Veuillez revérifier cette dernière.");
					    }
					    else if(dateEntered.getDate()<dd){
					    	alert("La date limite d'envoi de votre colis a expiré. Veuillez revérifier cette dernière.");
					    }

					});
				</script>

	  		</fieldset>

<!-- ************************************************************************************************************************************************-->

		<!--Format du colis (poids, taille, particularités)-->
		<fieldset>
			<legend>Format du colis</legend>
			<label>Taille du colis:</label>
			<br>

			<div class="btn-group btn-group-toggle" data-toggle="buttons">
			  <label class="btn btn-secondary active">
			  	<img src="../images/icones/mail-black-envelope-symbol.svg" class="img-responsive center-block"  title="Extra Small">
			    <input type="radio" name="optionFormat" id="option1" autocomplete="off" value="XS" > XS
			  </label>
			  <label class="btn btn-secondary">
			  	<img src="../images/icones/book.svg" class="img-responsive center-block"  title="Small">
			    <input type="radio" name="optionFormat" id="option2" autocomplete="off" value="S"> S
			  </label>
			  <label class="btn btn-secondary">
			  	<img src="../images/icones/parcel.svg" class="img-responsive center-block"  title="Medium">
			    <input type="radio" name="optionFormat" id="option3" autocomplete="off" value="M"> M
			  </label>
			  <label class="btn btn-secondary">
			  	<img src="../images/icones/armchair.svg" class="img-responsive center-block"  title="Large">
			    <input type="radio" name="optionFormat" id="option4" autocomplete="off" value="L"> L
			  </label>
			  <label class="btn btn-secondary">
			  	<img src="../images/icones/closet.svg" class="img-responsive center-block"  title="Extra Large">
			    <input type="radio" name="optionFormat" id="option5" autocomplete="off" value="XL"> XL
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
			<br>
			<div class="btn-group btn-group-toggle" data-toggle="buttons">
			  <label class="btn btn-secondary active">
			    <img src="../images/icones/feather1.svg" class="img-responsive center-block" title="Très Léger">
			    <input type="radio" name="optionPoids" id="option1" autocomplete="off"  value="T.Léger" >T.Léger
			  </label>
			  <label class="btn btn-secondary" >
			  	<img src="../images/icones/suitcase.svg" class="img-responsive center-block"  title="Léger">
			    <input type="radio" name="optionPoids" id="option2" autocomplete="off" value="Léger"> Léger
			  </label>
			  <label class="btn btn-secondary">
			  	<img src="../images/icones/dumbbell.svg" class="img-responsive center-block" title="Lourd">
			    <input type="radio" name="optionPoids" id="option3" autocomplete="off" value="Lourd"> Lourd
			  </label>
			  <label class="btn btn-secondary">
			  	<img src="../images/icones/weight-tool.svg" class="img-responsive center-block" title="Très Lourd">
			    <input type="radio" name="optionPoids" id="option4" autocomplete="off" value="T.lourd"> T.lourd
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



			<label>Options supplémentaires:</label>
			<br>
			<div class="custom-control custom-switch">
			  <input type="checkbox" class="custom-control-input" id="customSwitch1" name="objetFragile">
			  <label class="custom-control-label" for="customSwitch1">Objet fragile</label>
			</div>
			<div class="custom-control custom-switch">
			  <input type="checkbox" class="custom-control-input" id="customSwitch2" name="demandeUrgente">
			  <label class="custom-control-label" for="customSwitch2">Demande urgente</label>
			</div>

			<div class="custom-control custom-switch">
			  <input type="checkbox" class="custom-control-input" id="customSwitch3" name="demandeSpeciale">
			  <label class="custom-control-label" for="customSwitch3">Demande spéciale</label>
			</div>


		</fieldset>
		<!-- Rajouter une photo -->
		<fieldset>
			<legend>Photo</legend>
			<div>
				<label for="exampleFormControlFile1">Rajouter une photo <i class="fa fa-camera" aria-hidden="true"></i> :</label>
		        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="photoColis">
			</div>

		<br>
		</fieldset>
		<input type="submit" class="btn btn-primary pull-right btn-lg" value="Publier l'annonce"></input>
		<input type="reset" class="btn btn-primary pull-right btn-lg" value="Réinitialiser le formulaire"></input>
		</div>

	</form>
	<!--script nav -->
	<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="./navbar_template/js/bootstrap.min.js"></script>-->
	
	<!-- fin script nav -->

	<script src="../js/itineraire.js" type="text/javascript"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKHMVCsGXT3wzJxO0hCsh_enpT8ZDQZ8c&libraries=places&callback=init"></script>

	

</body>
</html>

<?php } ?>