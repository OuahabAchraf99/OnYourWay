<?php
session_start();
require_once ("dbcontroller.php");
//$_SESSION["ID"]=56;
$connect=new DBController();
/************ wilayas display ***************/
$query1 ="SELECT * FROM `wilayas`";
$result1=$connect->runQuery($query1);
 /********************* Filtrage 01 ************************/
 if (isset($_GET["submit1"]))
 {
 	//echo print_r($_GET);

$rech_query="SELECT * FROM `trajettransporteur` WHERE (Depart='".$_GET["Dep1"]."' AND Arivee='".$_GET["Arv1"]."')";
$results=$connect->runQuery($rech_query);
$cpt=0;$newRes=array();
if(!empty($_GET["DepDate"]))
{
    $i=0;
    foreach ($results as $row)
    {
        if(($_GET["DepDate"] >= $row["DepDateDebut"])&($_GET["DepDate"] <= $row["DepDateFin"]))
        {
            $newRes[$i]=$row;
            $i++;
        }
        else;
    }
    $results=$newRes;
    $newRes=array();
}else;
if(!empty($_GET["ArvDate"]))
{
    $i=0;
    foreach ($results as $row)
    {
        if(($_GET["ArvDate"] >= $row["ArvDateDebut"])&($_GET["ArvDate"] <= $row["ArvDateFin"]))
        {
            $newRes[$i]=$row;
            $i++;
        }
        else;
    }
    $results=$newRes;
    $newRes=array();
}else;
//echo "<script type='text/javascript'>alert('".empty($_GET["FormatColis1"])."');</script>";
if(!empty($_GET["FormatColis1"]))
{
    $i=0;
    //echo print_r($results);
    //echo "<script type='text/javascript'>alert('format colis');</script>";
    foreach ($results as $row)
    {

    	$trans=$connect->simpleSearch("transporteur","idTransporteur",$row["Transporteur_idTransporteur"]);
    	/*$qq="SELECT *FROM `transporteur` WHERE (idTransporteur='".$row["Transporteur_idTransporteur"]."')";
    	$trans=$connect->runQuery($qq);*/
        if($_GET["FormatColis1"]== $trans[0]["FormatColis"])
        {
        	//echo $trans[0]["FormatColis"];
            $newRes[$i]=$row;
            $i++;
        }
        else;
    }
    //$cpt=$i;
    $results=$newRes;
    $newRes=array();
}else;
if (!empty($_GET["MoyenDeTrans1"]))
{
    $nbmoy=0;
    $i=0;
    $moys=array(4);
    $moys[0]="";
    $moys[1]="";
    $moys[2]="";
    $moys[3]="";
    foreach ($_GET["MoyenDeTrans1"] as $moy)
    {
        $moys[$nbmoy]=$moy;
        $nbmoy++;
    }
    foreach ($results as $row)
    {
    	/*$qr3="SELECT * FROM `transporteur` WHERE (idTransporteur='".$row["Transporteur_idTransporteur"]."')";
	    $trans=$connect->runQuery($qr3);*/
	    $trans=$connect->simpleSearch("transporteur","idTransporteur",$row["Transporteur_idTransporteur"]);
        if($moys[0] == $trans[0]["MoyenDeTrans"] or $moys[1] == $trans[0]["MoyenDeTrans"] or $moys[2] == $trans[0]["MoyenDeTrans"] or $moys[3] == $trans[0]["MoyenDeTrans"] )
        {
            $newRes[$i]=$row;
            $i++;
        }else;
    }
    $results=$newRes;
    $newRes=array();
}else;
    $cpt=count($results);
    
    // pagination 
$results_per_page = 5;
$number_of_pages = ceil($cpt/$results_per_page);
if (!isset($_GET['page'])) {
					  $page = 1;
					} else {
					  $page = $_GET['page'];
					}


}else;
/*************************************** Forme Colis**********************************************/

if(isset($_GET["submit2"]))
{


	$rech_query2="SELECT * FROM `trajetcolis` WHERE (Depart='".$_GET["Dep2"]."' AND Arivee='".$_GET["Arv2"]."')";
	$results2=$connect->runQuery($rech_query2);

	$cpt2=0;$newRes2=array();
	if(!empty($_GET["dateEnvoi"]))
	{
	    $i=0;
	    foreach ($results2 as $row2)
	    {
	        if($_GET["dateEnvoi"] <= $row2["datelimite"])
	        {
	            $newRes2[$i]=$row2;
	            $i++;
	        }
	        else;
	    }
	    $results2=$newRes2;
	    $newRes2=array();
	}else;

	if(!empty($_GET["FormatColis2"]))
	{
	    $i=0;
	    foreach ($results2 as $row2)
	    {
	    	$colis=$connect->simpleSearch("colis","idColis",$row2["Colis_idColis"]);
	        if($_GET["FormatColis2"]== $colis[0]["TailleColis"])
	        {
	            $newRes2[$i]=$row2;
	            $i++;
	        }
	        else;
	    }
	    //$cpt=$i;
	    $results2=$newRes2;
	    $newRes2=array();
	}else;
	$cpt2=count($results2);

	// pagination 
/*$results_per_pageB = 1;
$number_of_pagesB = ceil($cpt2/$results_per_pageB);
if (!isset($_GET['pageB'])) {
	$pageB = 1;
	} else {
	$pageB = $_GET['pageB'];
	}

echo print_r($results2);
echo "<br><br>".$cpt2;*/
}else;

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<!--pour ajouter une image-->
	<link rel="icon" type="image/png" href="assets/img/logoDark.ico"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Rechercher annonce</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link  type="text/css" href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <!-- Concerne le slider du détour -->
    <link rel="stylesheet" type="text/css" href="proposerTrajet.css">

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />


   

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" onmouseover="scrollbarAppear()" onmouseout="scrollbarDisappear()" >
    <!-- Code concernant l'apparition et la disparition du scroll bar -->
    		<script type="text/javascript">

	    		function scrollbarAppear(){
	    			document.getElementById("filtre").style.overflow="auto";
	    		}
	    		function scrollbarDisappear(){
	    			document.getElementById("filtre").style.overflow="hidden";
	    		}


    		</script>
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
            <form method="GET" id="filtreTrajet" style="display:block" class="form-group">
            <ul class="nav">
                <label>Taille maximale du colis</label>
            	<div class="btn-block btn-group btn-group-toggle" data-toggle="buttons">
				  <label class="btn btn-secondary active">
				  	<img src="images/icones/mail-black-envelope-symbol.svg" class="img-responsive center-block"  title="Extra Small">
				    <input type="radio" name="FormatColis1" id="option1" autocomplete="off" value="XS">XS
				  </label>
				  <label class="btn btn-secondary">
				  	<img src="images/icones/book.svg" class="img-responsive center-block"  title="Small">
				    <input type="radio" name="FormatColis1" id="option1" autocomplete="off" value="S">S
				  </label>
				  <label class="btn btn-secondary">
				  	<img src="images/icones/parcel.svg" class="img-responsive center-block"  title="Medium">
				    <input type="radio" name="FormatColis1" id="option1" autocomplete="off" value="M">M
				  </label>
				  <label class="btn btn-secondary">
				  	<img src="images/icones/armchair.svg" class="img-responsive center-block"  title="Large">
				    <input type="radio" name="FormatColis1" id="option1" autocomplete="off" value="L">L
				  </label>
				  <label class="btn btn-secondary">
				  	<img src="images/icones/closet.svg" class="img-responsive center-block"  title="Extra Large">
				    <input type="radio" name="FormatColis1" id="option1" autocomplete="off" value="XL">XL
				  </label>
				</div>  
				<!--<br>
				<br>
				<hr style="border-color:rgba(120,120,120,0.3); margin-top:0px;">
				<label>Poids maximal du colis</label>
				<div class="btn-group btn-group-toggle" data-toggle="buttons">
				  <label class="btn btn-secondary active">
				    <img src="images/icones/feather1.svg" class="img-responsive center-block" title="Très Léger">
				    <input type="radio" name="optionPoids" id="option1" autocomplete="off" checked>T.léger
				  </label>
				  <label class="btn btn-secondary" >
				  	<img src="images/icones/suitcase.svg" class="img-responsive center-block"  title="Léger">
				    <input type="radio" name="optionPoids" id="option2" autocomplete="off">Léger
				  </label>
				  <label class="btn btn-secondary">
				  	<img src="images/icones/dumbbell.svg" class="img-responsive center-block" title="Lourd">
				    <input type="radio" name="optionPoids" id="option3" autocomplete="off">Lourd
				  </label>
				  <label class="btn btn-secondary">
				  	<img src="images/icones/weight-tool.svg" class="img-responsive center-block" title="Très Lourd">
				    <input type="radio" name="optionPoids" id="option4" autocomplete="off">T.lourd
				  </label>
				</div>-->
				<br>
				<br>
				<hr style="border-color:rgba(120,120,120,0.3); margin-top:0px;">
				<label>Itinéraire</label>
				<br>
		   		<label>De:</label>
			    <div class="row monItineraire">
			    	
		    		<div class="col lieu">
		    			<input type="text" class="form-control" id="from1" placeholder="Départ" name="Dep1" onchange="calcRoute1();">
		    		</div>
		    	
		  		</div>
		  		<br>
		  		<label>A:</label>
			    <div class="row monItineraire">

		    		<div class="col lieu">
		    			<input type="text" class="form-control" id="to1" placeholder="Arrivée" name="Arv1" onchange="calcRoute1();">
		    		</div>
		    	
		  		</div>

				<div class="container-fluid">
		           <div id="googleMap1">
		           </div>
		           
		           <div id="output1">
		               
		           </div>
		       </div>
				<hr style="border-color:rgba(120,120,120,0.3); margin-top:0px;">
				<!-- Plage des dates de départ -->
				<label>Date de départ </label>
				<!-- Date de départ 1 -->
				<br>
				<div class="container-fluid">
				    <div class="row">
				        
				            <div class="form-group">
				                <div class='input-group date' id='datetimepicker2'>
				                    <input type="date" class="form-control"  name="DepDate" id="dateDepart1"/>
				                </div>
				            </div>
				        
				        <script type="text/javascript">
				            $(function () {
				                $('#dateDepart1').datetimepicker({
				                    locale: 'fr'
				                });
				            });
				        </script>
				    </div>
				</div>
				<script type="text/javascript">
					
					
					
					document.getElementById("dateDepart1").addEventListener("change", function() {
						var today = new Date();
						var mm = today.getMonth()+1; //January is 0!
					    var yyyy = today.getFullYear();
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

				<!-- Date de départ 2 -->
				<!--<label>A:</label>
				<div class="container-fluid">
				    <div class="row">
				        
				            <div class="form-group">
				                <div class='input-group date' id='datetimepicker3'>
				                    <input type="date" class="form-control"  name="dateDepart2" id="dateDepart2"/>
				                    
				                </div>
				            </div>
				        
				        <script type="text/javascript">
				            $(function () {
				                $('#dateDepart2').datetimepicker({
				                    locale: 'fr'
				                });
				            });
				        </script>
				    </div>
				</div>
				<script type="text/javascript">
					
					
					
					document.getElementById("dateDepart2").addEventListener("change", function() {
						var today = new Date();
						var mm = today.getMonth()+1; //January is 0!
					    var yyyy = today.getFullYear();
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
				</script>-->
				
				<!-- Fin de la plage des dates de départ -->
				<hr style="border-color:rgba(120,120,120,0.3); margin-top:0px;">

				<!-- Plage des dates d'arrivée -->
				<label>Date de retour</label>
				<!-- Date d'arrivée 1 -->
				<br>
				<div class="container-fluid">
				    <div class="row">
				        
				            <div class="form-group">
				                <div class='input-group date' id='datetimepicker4'>
				                    <input type="date" class="form-control"  name="ArvDate" id="dateArrivee1"/>
				                    
				                </div>
				            </div>
				        
				        <script type="text/javascript">
				            $(function () {
				                $('#dateArrivee1').datetimepicker({
				                    locale: 'fr'
				                });
				            });
				        </script>
				    </div>
				</div>
				<script type="text/javascript">
					
					
					
					document.getElementById("dateArrivee1").addEventListener("change", function() {
						var today = new Date();
						var mm = today.getMonth()+1; //January is 0!
					    var yyyy = today.getFullYear();
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
				
				<!-- Date d'arrivée 2 -->
				<!--<label>A:</label>
				<div class="container-fluid">
				    <div class="row">
				        
				            <div class="form-group">
				                <div class='input-group date' id='datetimepicker5'>
				                    <input type="date" class="form-control"  name="dateArrivee2" id="dateArrivee2"/>
				                   
				                </div>
				            </div>
				        
				        <script type="text/javascript">
				            $(function () {
				                $('#dateArrivee2').datetimepicker({
				                    locale: 'fr'
				                });
				            });
				        </script>
				    </div>
				</div>
				<script type="text/javascript">
					
					
					
					document.getElementById("dateArrivee2").addEventListener("change", function() {
						var today = new Date();
						var mm = today.getMonth()+1; //January is 0!
					    var yyyy = today.getFullYear();
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
				</script>-->

					<hr style="border-color:rgba(120,120,120,0.3); margin-top:0px;">
	    			<label>Détour minimal</label>
	    			<!-- Range slider pour le detour en km-->
	    			<div class="slidecontainer">
  						<input type="range" min="0" max="30" value="0" class="slider" id="myRange">
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

	    		
	    		<br>
	    		<hr style="border-color:rgba(120,120,120,0.3); margin-top:0px;">
	    		
	    			<label>Moyen de transport</label>
					<div class="checkbox">
						<input type="checkbox" name="MoyenDeTrans1[]" id="optinosCheckbox1" value="Camion">
						<label for="optinosCheckbox1">
							En camion
						</label>
					</div>
					<div class="checkbox">
						<input type="checkbox" name="MoyenDeTrans1[]" id="optinosCheckbox2" value="Voiture">
						<label for="optinosCheckbox2">
							En voiture
						</label>
					</div>
					<div class="checkbox">
						<input type="checkbox" name="MoyenDeTrans1[]" id="optinosCheckbox3" value="Bus">
						<label for="optinosCheckbox3">
							En bus
						</label>
					</div>
					<div class="checkbox">
						<input type="checkbox" name="MoyenDeTrans1[]" id="optinosCheckbox4" value="Train">
						<label for="optinosCheckbox4">
							En train
						</label>
				    </div>
	
				<!-- Fin de la plage des dates d'arrivée -->

				 <hr style="border-color:rgba(120,120,120,0.3); margin-top:0px;">
				 <label>Fréquence du trajet</label>
				 <!-- <div class="custom-control custom-switch">
				   <input type="checkbox" class="custom-control-input" id="regulariteTrajet" name="regulariteTrajet">
				   <label class="custom-control-label" for="regulariteTrajet">Trajet régulier</label>
				 </div> -->
				 <br>
				 <label id="switch" name="regulariteTrajet">
				  <input type="checkbox">
				  <span id="sliderRound"></span>
				</label>
				<span style="font-weight:bolder">Trajet régulier</span>
            <br>
            </ul> 
             <br>
             <br>
            <div class="container-fluid">
            	<!--<button type="button" class="btn  btn-lg btn-block">
		        			<i class="fa fa-search" aria-hidden="true"  style="font-weight: 900; margin-left:-10px;"></i>
		        			<span style="margin-left:8px;font-weight: 700;">Lancer la recherche</span>-->
		        			<input type="submit" value="Lancer la Recherche" class="btn btn-primary pull-right btn-lg" name="submit1"></input>
	        		<!--</button>-->
            </div>
           
            </form>
            <!-- ********************************************************************************* -->
            <!-- Filtre recherche d'un colis -->
            <form method="GET" action="" id="filtreColis" style="display:none" class="form-group">
            <ul class="nav">
                <label>Taille du colis</label>
            	<div class="btn-block btn-group btn-group-toggle" data-toggle="buttons">
				  <label class="btn btn-secondary active">
				  	<img src="images/icones/mail-black-envelope-symbol.svg" class="img-responsive center-block"  title="Extra Small">
				    <input type="radio" name="FormatColis2" id="option1" autocomplete="off" value="XS" >XS
				  </label>
				  <label class="btn btn-secondary">
				  	<img src="images/icones/book.svg" class="img-responsive center-block"  title="Small">
				    <input type="radio" name="FormatColis2" id="option2" autocomplete="off" value="S">S
				  </label>
				  <label class="btn btn-secondary">
				  	<img src="images/icones/parcel.svg" class="img-responsive center-block"  title="Medium">
				    <input type="radio" name="FormatColis2" id="option3" autocomplete="off" value="M" >M
				  </label>
				  <label class="btn btn-secondary">
				  	<img src="images/icones/armchair.svg" class="img-responsive center-block"  title="Large">
				    <input type="radio" name="FormatColis2" id="option4" autocomplete="off" value="L" >L
				  </label>
				  <label class="btn btn-secondary">
				  	<img src="images/icones/closet.svg" class="img-responsive center-block"  title="Extra Large">
				    <input type="radio" name="FormatColis2" id="option5" autocomplete="off" value="XL">XL
				  </label>
				</div>  
				<!--<br>
				<br>
				<hr style="border-color:rgba(120,120,120,0.3); margin-top:0px;">
				<label>Poids du colis</label>
				<div class="btn-group btn-group-toggle" data-toggle="buttons">
				  <label class="btn btn-secondary active">
				    <img src="images/icones/feather1.svg" class="img-responsive center-block" title="Très Léger">
				    <input type="radio" name="optionPoids" id="option1" autocomplete="off" checked>T.léger
				  </label>
				  <label class="btn btn-secondary" >
				  	<img src="images/icones/suitcase.svg" class="img-responsive center-block"  title="Léger">
				    <input type="radio" name="optionPoids" id="option2" autocomplete="off">Léger
				  </label>
				  <label class="btn btn-secondary">
				  	<img src="images/icones/dumbbell.svg" class="img-responsive center-block" title="Lourd">
				    <input type="radio" name="optionPoids" id="option3" autocomplete="off">Lourd
				  </label>
				  <label class="btn btn-secondary">
				  	<img src="images/icones/weight-tool.svg" class="img-responsive center-block" title="Très Lourd">
				    <input type="radio" name="optionPoids" id="option4" autocomplete="off">T.lourd
				  </label>
				</div>-->
				<br>
				<br>
				<hr style="border-color:rgba(120,120,120,0.3); margin-top:0px;">
				<label>Itinéraire</label>
				<br>
		   		<label>De:</label>
			    <div class="row monItineraire">
			    	
		    		<div class="col lieu">
		    			<input type="text" class="form-control" id="from2" placeholder="Départ" name="Dep2" onchange="calcRoute2();">
		    		</div>
		    	
		  		</div>
		  		<br>
		  		<label>A:</label>
			    <div class="row monItineraire">

		    		<div class="col lieu">
		    			<input type="text" class="form-control" id="to2" placeholder="Arrivée" name="Arv2" onchange="calcRoute2();">
		    		</div>
		    	
		  		</div>

				<div class="container-fluid">
		           <div id="googleMap2">
		           </div>
		           
		          <div id="output2">
		               
		           </div>
		       </div>
				<hr style="border-color:rgba(120,120,120,0.3); margin-top:0px;">
				<!-- Plage des dates de départ -->
				<label>Date d'envoi du colis</label>
				<!-- Date de départ 1 -->
				<div class="container-fluid">
				    <div class="row">
				        
				            <div class="form-group">
				                <div class='input-group date' id='datetimepicker'>
				                    <input type="date" class="form-control"  name="dateEnvoi" id="dateEnvoi"/>
				                   
				                </div>
				            </div>
				        
				        <script type="text/javascript">
				            $(function () {
				                $('#dateEnvoi').datetimepicker({
				                    locale: 'fr'
				                });
				            });
				        </script>
				    </div>
				</div>
				<script type="text/javascript">
					
					
					
					document.getElementById("dateEnvoi").addEventListener("change", function() {
						var today = new Date();
						var mm = today.getMonth()+1; //January is 0!
					    var yyyy = today.getFullYear();
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
	    		<br>
	    		<hr style="border-color:rgba(120,120,120,0.3); margin-top:0px;">
	    		
	    			<label>Spécificités</label>
					<div class="checkbox">
						<input type="checkbox" id="optinosCheckbox6" name="spcfct" value="Objet fragile">
						<label for="optinosCheckbox6">
							Objet fragile
						</label>
					</div>
					<div class="checkbox">
						<input type="checkbox" id="optinosCheckbox7" name="spcfct" value="Demande Spéciale">
						<label for="optinosCheckbox7">
							Demande Spéciale
						</label>
					</div>
					<div class="checkbox">
						<input type="checkbox" id="optinosCheckbox8" name="spcfct" value="Demande Urgente">
						<label for="optinosCheckbox8">
							Demande Urgente
						</label>
					</div>
					<!--<div class="checkbox">
						<input type="checkbox" id="optinosCheckbox9" value="" checked>
						<label for="optinosCheckbox9">
							Colis ordinaire
						</label>
					</div>-->
					
	
				
            
            </ul> 
            <!-- ********************************************************************************* -->
            <br>
            <div class="container-fluid">
            	<!--<button type="button" class="btn  btn-lg btn-block">
		        			<i class="fa fa-search" aria-hidden="true"  style="font-weight: 900; margin-left:-10px;"></i>
		        			<span style="margin-left:8px;font-weight: 700;">Lancer la recherche</span>-->
		        			<input type="submit" value="Lancer la recherche" class="btn btn-primary pull-right btn-lg" name="submit2" ></input>
	        	<!--</button>-->
            </div>
           </form>
           <!--  <div class= "row">
	               <div class="col-sm-1">
	               		<i class="fa fa-search"></i>
	               </div> 
	               <div class="col-sm-7">
	               		<input type="submit" value="Publier l'annonce"></input>
	               	</div>
	               
	            </div> -->
	        <!-- <span>Lancer la recherche</span> -->
            
            

    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid" style="border-bottom:1px solid #cfcfcf;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   
	                    <h3 id="titreRecherche" style="font-weight:600; color:#ffca28;margin-bottom:15px; padding-left:15px;">Cherchez un trajet pour votre colis</h3>
					    <ul class="nav nav-tabs">
					      <li class="active"><a data-toggle="tab" href="#rechercheTrajetTab" onclick="choixRecherche()" id="rechercheTrajet" style="color:rgb(33, 37, 51);background-color: #f8f9fa">Rechercher un trajet</a></li>
					      <li><a data-toggle="tab" href="#rechercheColisTab" onclick="choixRecherche2()" id="rechercheColis">Rechercher un colis</a></li>
					     
					    </ul>
					    <script>
							function choixRecherche() {
							  document.getElementById("rechercheColis").style.color = "#ffca28";
							  	
							  document.getElementById("rechercheColis").style.backgroundColor = "transparent";
							  document.getElementById("rechercheTrajet").style.color = "#212533";
							  document.getElementById("rechercheTrajet").style.backgroundColor = "#f8f9fa";
							  document.getElementById("filtreColis").style.display="none";
							  document.getElementById("filtreTrajet").style.display="block";
							  document.getElementById("titreRecherche").innerHTML="Cherchez un trajet pour votre colis";
							}
							function choixRecherche2() {
						      document.getElementById("rechercheTrajet").style.color = "#ffca28";
							  
							  document.getElementById("rechercheTrajet").style.backgroundColor = "transparent";
							  document.getElementById("rechercheColis").style.color = "#212533";
							  document.getElementById("rechercheColis").style.backgroundColor = "#f8f9fa";
							  document.getElementById("filtreColis").style.display="block";
							  document.getElementById("filtreTrajet").style.display="none";
							  document.getElementById("titreRecherche").innerHTML="Cherchez un colis sur votre trajet";
							}
						</script>

                </div> 
               
            </div>
        </nav>
        <div class="tab-content">
        	<?php
        	//echo $_SERVER["QUERY_STRING"];
                    if(isset($_GET["submit1"]))
                    {
                    	

            ?>

	        <div class="content tab-pane active" id="rechercheTrajetTab">
	        	<div class="container-fluid">
	        		<br>
	        		<p>
	        			<span><?php echo $cpt." ";?>résultats</span>
	        			<br>
	        	        correspondent à vos critères
	        	    </p>
	        		
	        		<hr style="border-color:rgba(120,120,120,0.3); margin-top:0px;">
	        	</div>
	        	<?php 
	        	$this_page_first_result=($page-1)*$results_per_page;
	        	    foreach (array_slice($results,$this_page_first_result,$results_per_page) as $annonce) 
	        //foreach (array_slice($results,1,2) as $annonce)
	        	    {
	        	    	 //echo print_r($annonce);

	        	    	$res=$connect->simpleSearch("transporteur","idTransporteur",$annonce["Transporteur_idTransporteur"]);
	        	    	/*$qr="SELECT * FROM `transporteur` WHERE (idTransporteur='".$annonce["Transporteur_idTransporteur"]."')";
	        	    	$res=$connect->runQuery($qr);*/
	        	    	$user=$connect->simpleSearch("utilisateur","idUser",$res[0]["User_idUser"]);
	        	    	/*$qr2="SELECT * FROM `utilisateur` WHERE (idUser='".$res[0]["User_idUser"]."')";
	        	    	$user=$connect->runQuery($qr2);*/
	        	    	/*$DW=$connect->simpleSearch("wilayas","id",$annonce["DepWilaya"]);
	        	    	$AW=$connect->simpleSearch("wilayas","id",$annonce["ArvWilaya"]);
	        	    	$DC=$connect->simpleSearch("communes","id",$annonce["DepCommune"]);
	        	    	$AC=$connect->simpleSearch("communes","id",$annonce["ArvCommune"]);*/
	        	?>
	            <div class="container-fluid">
	            	
	            	<div class="row">
	            		<div class="col-md-10">
	                        <div class="card annonce">

	                            <div class="header" data-toggle="modal" data-target="#modalTrajet" >
	                                <h3 class="pull-right">
	                                	<i class="fa fa-heart-o pull-right" aria-hidden="true" title="Ajouter à vos favoris" style="margin-right:18px;margin-top:10px;"></i>
	                                </h3>
	                                <h4 class="title"><?php echo $annonce["Depart"]." --> ".$annonce["Arivee"]; ?></h4>

	                                <p class="category"><i class="fa fa-clock-o"></i> <?php echo "Déposée le ".$res[0]["dateDepot"];?> </p>
	                            </div>
	                            <div class="content" >
	                             	<div class="container-fluid annonceTrajetContent" data-toggle="modal" data-target="#modalTrajet">
		                                <ul>
		                           
		                                	<li>		
		                                		<p><i class="fa fa-road" aria-hidden="true"></i> <?php echo "Itinéraire: <br> De :".$annonce["Depart"]."<br> A : ".$annonce["Arivee"] ;?></p>
		                                	</li>
		                                </ul>

		                               
									</div>

	                                <div class="footer">
	                                   
	                                   <!--  <hr style="border-color:rgba(255,202,40,0.9);"> -->
	                                   
	                                    <div class="legend pull-right">
	                                      <button type="button" class="btn btn-default btn-sm" value=<?php echo $res[0]["User_idUser"];?> id="user1" >
						        			Envoyer une demande
					        			  </button> 
	                                    </div>
	                                    
		                                <div class="legend" data-toggle="modal" data-target="#modalUser1">
		                                   
			                                    <img src=<?php if (!empty($user[0]["PhotoProfil"])) echo '"'.$user[0]["PhotoProfil"]."'";else echo '"assets/img/default-avatar.png"';?> alt="Déposeur de l'annonce" class="img-circle img-avatar" alt="Déposeur de l'annonce" class="img-circle img-avatar">
			                                    <span>Nom de l'utilisateur : <?php echo $user[0]["Nom"]." ".$user[0]["Prenom"];?></span>
		                                  
		                                </div>
	                                    
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	            		
	            	</div>
	            </div>



	            	
	            	 <?php }
					echo '<ul class="pagination flex-container container-fluid">';
					for ($p=1;$p<=$number_of_pages;$p++) {
						$rqst=$_SERVER["QUERY_STRING"];
						$rqst=str_replace("page=".$page,"", $rqst);
						$rqst=$rqst."&page=".$p;
					  echo '<li class="page-item"><a href="http://localhost/projet/recherche/recherch_final.php?'.$rqst.'">' . $p . '</a></li> ';
					}
					echo "</ul>";
	            	}?>
	            	
	              
	            </div>

	        </div> 

	       
<?php if(isset($_GET["submit2"]))
	        		{
	        	?>


			<div class="content tab-pane" id="rechercheColisTab" style="position: relative;left: 300px; width: 1100px;top: 100px">
				
	         	<div class="container-fluid">
	        		<br>
	        		<p>
	        			<span><?php echo $cpt2." ";?> résultats</span>
						
	        	        
	        			<br>
	        	        correspondent à vos critères
	        	    </p>
	        		
	        		<hr style="border-color:rgba(120,120,120,0.3); margin-top:0px;">
	        	</div>
	        	<?php
	        	/*$this_page_first_resultB=($pageB-1)*$results_per_pageB;
	        	    foreach (array_slice($results2,$this_page_first_resultB,$results_per_pageB) as $annonce2)*/
	        	    	foreach($results2 as $annonce2)
	        	    {
	        	    	$colis=$connect->simpleSearch("colis","idColis",$annonce2["Colis_idColis"]);
	        	    	$env=$connect->simpleSearch("envoyeur","idEnvoyeur",$colis[0]["Envoyeur_idEnvoyeur"]);
	        	    	$usr=$connect->simpleSearch("utilisateur","idUser",$env[0]["User_idUser"]);
	        	    	/*$DW2=$connect->simpleSearch("wilayas","id",$annonce2["DepWilaya"]);
	        	    	$AW2=$connect->simpleSearch("wilayas","id",$annonce2["ArvWilaya"]);
	        	    	$DC2=$connect->simpleSearch("communes","id",$annonce2["DepCommune"]);
	        	    	$AC2=$connect->simpleSearch("communes","id",$annonce2["ArvCommune"]);*/

	        	?>    	
	            <div class="container-fluid" style="position: relative;left:0px; width: 1100px;top: -500px">
	            	<div class="row">
	            		<div class="col-md-10">
	                        <div class="card annonce">

	                            <div class="header" data-toggle="modal" data-target="#modalColis">
	                               <!-- <h3 class="pull-right"> 
	                                	2000 DA
	                                	<br>
	                                	<i class="fa fa-heart-o pull-right" aria-hidden="true" title="Ajouter à vos favoris" style="margin-right:18px;margin-top:10px;" onclick="ajouterFavori(this)"></i>
	                                	
	                                </h3>-->
	                                <h4 class="title">Objet:<?php echo $colis[0]["Objet"];?></h4>

	                                <p class="category"><i class="fa fa-clock-o"></i> Déposée le : <?php echo $annonce2["currentDate"] ; ?> </p>
	                            </div>
	                            <div class="content container-fluid">
	                                <div class="row" id="annonceColisContent" data-toggle="modal" data-target="#modalColis">
	                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-10 " id="imgContainer">
											<img src=<?php if (!empty($colis[0]["imagePath"])) echo '"'.$colis[0]["imagePath"].'"';else echo '"assets/img/trolley.svg"';?> alt="Image du colis" class="img-responsive center">
		                             	</div>
		                             	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">
		                             	   <ul class="texteAnnonceColis">
			                                	<?php if (!empty($colis[0]["objetFragile"])) {?>
									      		<li>
			                                		<p><i class="fa fa-calendar" aria-hidden="true"></i> Objet Fragile </p>
			                                	</li>
			                                	<?php }?>
			                                	<?php if (!empty($colis[0]["demandeUrgente"])) {?>
									      		<li>
			                                		<p><i class="fa fa-calendar" aria-hidden="true"></i> Demande Urgente </p>
			                                	</li>
			                                	<?php }?>
			                                	<?php if (!empty($colis[0]["demandeSpeciale"])) {?>
									      		<li>
			                                		<p><i class="fa fa-calendar" aria-hidden="true"></i> Demande Speciale </p>
			                                	</li>
			                                	<?php }?>
			                                </ul>
		                             		
		                             	</div>
		                             	
									</div>
	                                <div class="footer">
	                                   
	                                    
	                                    <div class="legend pull-right" >
	                                      <button type="button" class="btn btn-default btn-sm" onclick="inviter(<?php echo $env[0]["User_idUser"];?>);" >
						        			Envoyer une demande
					        			  </button> 
	                                    </div>
	                                    
		                                <div class="legend" data-toggle="modal" data-target="#modalUser2">
		                                    
			                                    <img src=<?php if (!empty($usr[0]["PhotoProfil"])) echo $usr[0]["PhotoProfil"];else echo "assets/img/default-avatar.png";?> alt="Déposeur de l'annonce" class="img-circle img-avatar">
			                                    <span>Nom de l'utilisateur : <?php echo $usr[0]["Nom"]." ".$usr[0]["Prenom"];?></span>
		                               
		                                </div>
	                                    
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	            		
	            	</div>

	              
	            </div>
	        	<?php }
				/*echo '<ul class="pagination flex-container container-fluid">';
				for ($p2=1;$p2<=$number_of_pagesB;$p++) {
					$rqst2=$_SERVER["QUERY_STRING"];
					$rqst2=str_replace("page=".$pageB,"", $rqst2);
					$rqst2=$rqst2."&page=".$p2;
					//echo '<ul class="pagination flex-container container-fluid">';
				  echo '<li class="page-item"><a href="http://localhost/projet/recherch/recherch_final.php?'.$rqst2.'">' . $p2 . '</a></li> ';
				}
				echo "</ul>";*/
				}?>
	        </div> 

        	
        </div>
       
        

		  <!--<ul class="pagination flex-container container-fluid">
		    <li class="page-item">
		      <a class="page-link" href="#" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		        <span class="sr-only">Previous</span>
		      </a>
		    </li>
		    <li class="page-item"><a class="page-link" href="#">1</a></li>
		    <li class="page-item"><a class="page-link" href="#">2</a></li>
		    <li class="page-item"><a class="page-link" href="#">3</a></li>
		    <li class="page-item">
		      <a class="page-link" href="#" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		        <span class="sr-only">Next</span>
		      </a>
		    </li>
		  </ul>-->
		 
		


       
    </div>
</div>
 <footer class="footer" style="position: fixed;bottom: 0px;right: 0px;left: 0px" >
            <div class="container-fluid">
                <!-- <nav class="pull-left">
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
                </nav> -->
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="index">OYW</a>, tous droits réservés
                </p>
            </div>
        </footer>

        <!-- <div class="modal" id="myModal" role="dialog">
		    <div class="modal-dialog modal-lg">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Modal Header</h4>
		        </div>
		        <div class="modal-body">
		          <span>This is a small modal.</span>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		    </div>
		</div>
 -->
 		 <div class="modal fade" id="modalColis" role="dialog">
			    <div class="modal-dialog">
			    	<div class="modal-content">
        				<div class="modal-header">
        					<button type="button" class="close" data-dismiss="modal">&times;</button>
          				</div>
        				<div class="modal-body">

        					<div class="container-fluid">
        						<div class="row">
						    		<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						    			
						    			<span id="objetModal">Objet</span>
										<span class="pull-right" id="prixModal">2000 DA</span>
										<br>
										<span>De Boumerdes à Alger</span>

						    		</div> -->
						    		<!-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
						    			
						    		</div> -->
						    		<!--<h3 class="pull-right"> 
	                                	2000 DA
	                                	<br>
	                                	<i class="fa fa-heart-o pull-right" aria-hidden="true" title="Ajouter à vos favoris" style="margin-right:18px;margin-top:10px;"></i>
	                                </h3>-->
	                                <h4 class="title">Type d'objet : <?php echo $colis[0]["Objet"];?> </h4>

	                                <p class="category"><i class="fa fa-clock-o"></i> Déposée le: <?php echo $annonce2["currentDate"] ; ?> </p>
						    </div>
						    	<br>
						    	<div class="text-center col-lg-12" id="imgContainerModal">
						    		<img src=<?php if (!empty($colis[0]["imagePath"])) echo $colis[0]["imagePath"];else echo "assets/img/trolley.svg";?> alt="Image du colis" class="img-responsive center">
						    	</div>
						    	
						    	
						    		<table class="table">
						    		  
									  <!-- <thead>
									    <tr>
									      
									      <th scope="col">Détails de l'annonce</th>
									      
									    </tr>
									  </thead> -->
									  <tbody>
									    <tr>
									      <th scope="row">Type de l'objet</th>
									      <td><?php echo $colis[0]["Objet"];?></td>
									     
									    </tr>
									    <tr>
									      <th scope="row">Description du colis</th>
									      <td><?php echo $colis[0]["DescriptionColis"];?></td>
									      
									    </tr>
									    <tr>
									      <th scope="row">Taille du colis</th>
									      <td><?php echo $colis[0]["TailleColis"];?></td>
									     
									    </tr>
									    <tr>
									      <th scope="row">Poids du colis</th>
									      <td><?php echo $colis[0]["PoidsColis"];?></td>
									     
									    </tr>
									    <tr>
									      <th scope="row">Itinéraire</th>
									      <td></td>
									     
									    </tr>
									    <tr>
									      <th scope="row">De: </th>
									      <td><?php echo $annonce2["Depart"] ;?></td>
									     
									    </tr>
									    <tr>
									      <th scope="row">A: </th>
									      <td><?php echo $annonce2["Arivee"] ;?></td>
									     
									    </tr>
									    <tr>
									      <th scope="row">Spécificités du colis</th>
									      <td>
									      	<ul>
									      		<?php if (!empty($colis[0]["objetFragile"])) {?>
									      		<li>
			                                		<p><i class="fa fa-calendar" aria-hidden="true"></i> Objet Fragile </p>
			                                	</li>
			                                	<?php }?>
			                                	<?php if (!empty($colis[0]["demandeUrgente"])) {?>
									      		<li>
			                                		<p><i class="fa fa-calendar" aria-hidden="true"></i> Demande Urgente </p>
			                                	</li>
			                                	<?php }?>
			                                	<?php if (!empty($colis[0]["demandeSpeciale"])) {?>
									      		<li>
			                                		<p><i class="fa fa-calendar" aria-hidden="true"></i> Demande Speciale </p>
			                                	</li>
			                                	<?php }?>
			                            
									      	</ul>
									      </td>
									     
									    </tr>
									    <tr>
									      <th scope="row">A livrer avant le</th>
									      <td><?php echo $annonce2["datelimit"];?></td>
									     
									    </tr>


									  </tbody>
									</table>
									<div class="text-center">
										<button class="btn btn-default"  onclick="inviter(<?php echo $env[0]["User_idUser"];?>);" >Envoyer une demande</button>
										
									</div>
						    	
						    	
						    </div>



        				</div>
        				<!-- <div class="modal-footer">
          					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        				</div> -->
      				</div>
      
   				</div>
  		</div>
  		<!-- Modal colis -->

  		<div class="modal fade" id="modalTrajet" role="dialog">
			    <div class="modal-dialog">
			    	<div class="modal-content">
        				<div class="modal-header">
        					<button type="button" class="close" data-dismiss="modal">&times;</button>
          				</div>
        				<div class="modal-body">

        					<div class="container-fluid">
        						<div class="row">
        							<!--
						    		<h3 class="pull-right"> 	                               	                                	
	                                	<i class="fa fa-heart-o pull-right" aria-hidden="true" title="Ajouter à vos favoris" style="margin-right:18px;margin-top:10px;"></i>
	                                </h3>-->
	                                <h4 class="title"><?php echo $annonce["Depart"]." --> ".$annonce["Arivee"]; ?></h4>

	                                <p class="category"><i class="fa fa-clock-o"></i> Déposée le :<?php echo $res[0]["dateDepot"]; ?>  </p>
						    </div>
						    	<br>
						    		<!-- ICI Image itinéraire si on réussit à créer un robot --> 
						    	<!-- <div class="text-center col-lg-12" id="imgContainerModal">
						    		<img src="assets/img/trolley.svg" alt="Image du colis" class="img-responsive center">
						    	</div> -->
						    	
						    	
						    		<table class="table">
						    		  
									  <!-- <thead>
									    <tr>
									      
									      <th scope="col">Détails de l'annonce</th>
									      
									    </tr>
									  </thead> -->
									  <tbody>
									     <tr>
									      <th scope="row">Itinéraire</th>
									      <td></td>
									     
									    </tr>
									    <tr>
									      <th scope="row">Lieu de départ</th>
									      <td><?php echo $annonce["Depart"]; ?></td>
									     
									    </tr>
									    <tr>
									      <th scope="row">Lieu d'arrivée</th>
									      <td><?php echo $annonce["Arivee"]; ?></td>
									     
									    </tr>
									    <tr>
									      <th scope="row"> Arréts: </th>
									      <td><?php echo $res[0]["Arrets"]; ?></td>
										</tr>
									    <tr>
									      <th scope="row">Détour maximal envisageable</th>
									      <td><?php echo $res[0]["Deviation"]; ?></td>
									     
									    </tr>
									    <tr>
									      <th scope="row">Taille maximale du colis acheminable</th>
									      <td><?php echo $res[0]["FormatColis"]; ?></td>
									      
									    </tr>
									    <tr>
									      <th scope="row">Poids maximal du colis acheminable</th>
									      <td><?php echo $res[0]["PoidsColis"]; ?></td>
									     
									    <!--</tr>
									    <th scope="row">Accepte les</th>
									      <td>
									      	<ul>
									      		<li>Objets fragiles</li>
									      		<li>Demandes spéciales</li>
									      		<li>Demandes urgentes</li>
									      	</ul>
									      </td>
									     
									    </tr>-->
									    <tr>
									      <th scope="row">Moyen de transport</th>
									      <td><?php echo $res[0]["MoyenDeTrans"]; ?></td>
										</tr>
									    <tr>
									    <th scope="row">Plage des dates de départ</th>
									      <td>
									      	<ul>
									      		<li><?php echo $annonce["DepDateDebut"]; ?></li>
									      		<li><?php echo $annonce["DepDateFin"]; ?></li>
									      		
									      	</ul>
									      </td>
									     
									    </tr>
									    <tr>
									    <th scope="row">Plage des dates de retour</th>
									      <td>
									      	<ul>
									      		<li><?php echo $annonce["ArvDateDebut"]; ?></li>
									      		<li><?php echo $annonce["ArvDateFin"]; ?></li>
									      		
									      	</ul>
									      </td>
									     
									    </tr>
									    <tr>
									      <th scope="row">Fréquence du trajet</th>
									      <td><?php echo $res[0]["FrequenceVoyage"]; ?></td>
										</tr>


									  </tbody>
									</table>
									<div class="text-center">
										<button class="btn btn-default" onclick="inviter(<?php echo $res[0]["User_idUser"];?>);">Envoyer une demande</button>
										
									</div>
						    	
						    	
						    </div>



        				</div>
        				<!-- <div class="modal-footer">
          					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        				</div> -->
      				</div>
      
   				</div>
  		</div>

		<div class="modal fade" id="modalUser1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title" id="exampleModalLabel"><?php echo $user[0]["Nom_utilisateur"];?>  </h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<div class="text-center col-lg-12" id="imgContainerModal">
					<img src=<?php if (!empty($user[0]["PhotoProfil"])) echo '"'.$user[0]["PhotoProfil"]."'";else echo '"assets/img/default-avatar.png"';?> alt="Déposeur de l'annonce"  class="img-responsive center">
				</div>
				<table class="table">
		        <tbody>
					<tr>
						<th scope="row">Nom: </th>
						<td><?php echo $user[0]["Nom"];?></td>
									     
					</tr>
					<tr>
						<th scope="row">Prenom: </th>
						<td><?php echo $user[0]["Prenom"];?></td>
									      
					</tr>
					<tr>
						<th scope="row"> Numéro du téléphone </th>
						<td><?php echo $user[0]["Numero_Telephone"];?></td>
									      
					</tr>
					<tr>
						<th scope="row"> Description </th>
						<td><?php echo $user[0]["Description"];?></td>
									      
					</tr>					  
				</tbody>
				</table>
		      </div>
		      <div class="modal-footer">
		        <button class="btn btn-default" onclick="inviter(<?php echo $res[0]["User_idUser"];?>);">Envoyer une demande</button>
		      </div>
		    </div>
		  </div>
		</div>


<div class="modal fade" id="modalUser2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title" id="exampleModalLabel">A propos le Déposeur de l'annonce  </h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<div class="text-center col-lg-12" id="imgContainerModal">
					<img src=<?php if (!empty($usr[0]["PhotoProfil"])) echo '"'.$usr[0]["PhotoProfil"]."'";else echo '"assets/img/default-avatar.png"';?> alt="Déposeur de l'annonce"  class="img-responsive center">
				</div>
				<table class="table">
		        <tbody>
					<tr>
						<th scope="row">Nom: </th>
						<td><?php echo $usr[0]["Nom"];?></td>
									     
					</tr>
					<tr>
						<th scope="row">Prenom: </th>
						<td><?php echo $usr[0]["Prenom"];?></td>
									      
					</tr>
					<tr>
						<th scope="row"> Numéro du téléphone </th>
						<td><?php echo $usr[0]["Numero_Telephone"];?></td>
									      
					</tr>
					<tr>
						<th scope="row"> Description </th>
						<td><?php echo $usr[0]["Description"];?></td>
									      
					</tr>					  
				</tbody>
				</table>
		      </div>
		      <div class="modal-footer">
		        <button class="btn btn-default" onclick="inviter(<?php echo $env[0]["User_idUser"];?>);">Envoyer une demande</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!--<div class="modal fade" id="modalUser2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        ...
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>-->

  										<!--<div id="popup1" class="overlay" >
											<div class="popup" style="background-color: #212533;max-width: 20%;
												position: absolute;
												left: 50%;
												top: 50%;
												-webkit-transform: translate(-50%, -50%);
												transform: translate(-50%, -50%);">
												<img src="img_avatar.png" alt="Avatar" style="width:40px;border-radius: 50%;  display: block;
												margin-left: auto;
												margin-right: auto;
												width: 50%;">												
												<p style="font-weight: bold;text-align: center;color: white">Nom prénom</p>

												<p style="text-align: center;color:white"> blablablabla</p>
												<div class="row">
													<style>
														*{
															margin: 0;
															padding: 0;
														}
														.rate {
															float: left;
															height: 46px;
															padding: 0 10px;
														}
														.rate:not(:checked) > input {
															position:absolute;
															top:-9999px;
														}
														.rate:not(:checked) > label {
															float:right;
															width:1em;
															overflow:hidden;
															white-space:nowrap;
															cursor:pointer;
															font-size:30px;
															color:#ccc;
														}
														.rate:not(:checked) > label:before {
															content: '★ ';
														}
														.rate > input:checked ~ label {
															color: #ffc700;
														}
														.rate:not(:checked) > label:hover,
														.rate:not(:checked) > label:hover ~ label {
															color: #deb217;
														}
														.rate > input:checked + label:hover,
														.rate > input:checked + label:hover ~ label,
														.rate > input:checked ~ label:hover,
														.rate > input:checked ~ label:hover ~ label,
														.rate > label:hover ~ input:checked ~ label {
															color: #c59b08;
														}
													</style>
													<br>
													<div class="rate" style="position: relative;left:44px">
														<input type="radio" disabled id="star5" name="rate" value="5" />
														<label for="star5" disabled title="text">5 stars</label>
														<input type="radio" disabled id="star4" name="rate" value="4" />
														<label for="star4" disabled title="text">4 stars</label>
														<input type="radio" disabled id="star3" name="rate" value="3" />
														<label for="star3" disabled title="text">3 stars</label>
														<input type="radio" disabled id="star2" name="rate" value="2" />
														<label for="star2" disabled title="text">2 stars</label>
														<input type="radio" disabled id="star1" name="rate" value="1" />
														<label for="star1" disabled title="text">1 star</label>
													</div> <br>
													<div class="rate" style="position: relative;left:44px">
														<input type="radio" id="star5" name="rate" value="5" />
														<label for="star5" title="text">5 stars</label>
														<input type="radio" id="star4" name="rate" value="4" />
														<label for="star4" title="text">4 stars</label>
														<input type="radio" id="star3" name="rate" value="3" />
														<label for="star3" title="text">3 stars</label>
														<input type="radio" id="star2" name="rate" value="2" />
														<label for="star2" title="text">2 stars</label>
														<input type="radio" id="star1" name="rate" value="1" />
														<label for="star1" title="text">1 star</label>
													</div>
													<br><br>
													<div style="font-weight: bold;color: white;text-align: center">Expérience:<span style="color: #FFCA28">Confirmé</span></div>
													<br>
													<div style="font-weight: bold;color: white;text-align: center">Numéro de téléphone:<span style="color: #FFCA28">0000000000</span></div>
													<br>
													<div style="font-weight: bold;color: white;text-align: center">Véhicule:<span style="color: #FFCA28">PEUGEOT 404</span></div>


												</div>
												<a class="close" href="#">&times;</a>
												<div class="content">

												</div>
											</div>
										</div>   -->          	
									

  		<script type="text/javascript">
	         function ajouterFavori(element){
	                                	 	
	            element.classList.toggle("fa-heart");
	            element.classList.toggle("fa-heart-o"); 
	                              	 	
	        }
		</script>                       	 
	       


    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	
    <script src="assets/js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.1/bootstrap-slider.js"></script>


	<script type="text/javascript">
 //    	$(document).ready(function(){

 //        	demo.initChartist();

 //        	$.notify({
 //            	icon: 'pe-7s-gift',
 //            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

 //            },{
 //                type: 'info',
 //                timer: 4000
 //            });

 //    	});
	// </script>


	<script type="text/javascript">
		$(document).ready(function(){
			$("#wilaya-list1").change(function(){
				let val =$(this).val()
			 	$.ajax({
	                type: "POST",
	                url: "fct.php",
	                data:'wilaya_id='+val,
	                success: function(data){
	                    $("#commune-list1").html(data);
	                }
	            });})
     	});
/********************************/
     	$(document).ready(function(){
			$("#wilaya-list2").change(function(){
				let val =$(this).val()
			 	$.ajax({
	                type: "POST",
	                url: "fct.php",
	                data:'wilaya_id='+val,
	                success: function(data){
	                    $("#commune-list2").html(data);
	                }
	            });})
     	});
/*********************************/
$(document).ready(function(){
			$("#wilaya-list3").change(function(){
				let val =$(this).val()
			 	$.ajax({
	                type: "POST",
	                url: "fct.php",
	                data:'wilaya_id='+val,
	                success: function(data){
	                    $("#commune-list3").html(data);
	                }
	            });})
     	});
/***********************************************************/

$(document).ready(function(){
			$("#wilaya-list4").change(function(){
				let val =$(this).val()
			 	$.ajax({
	                type: "POST",
	                url: "fct.php",
	                data:'wilaya_id='+val,
	                success: function(data){
	                    $("#commune-list4").html(data);
	                }
	            });})
     	});
	 </script>

 <script type = "text/javascript">
         <!--
            function Warn() {
               alert ("This is a warning message!");
               document.write ("This is a warning message!");
            }
         //-->
      </script> 
    <!--  ajax functions -->

    <script>

    	function inviter(val){
    		$.ajax({
    			type: "POST",
    			url: "invitation.php",
    			data:'recepteur_id='+val;
    		});
    	}

    </script>  

<script type="text/javascript">
$("#user1").click(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "invitation.php/",
        data:'recepteur_id='+ $(this).val(), 
        success: function(result) {
            alert('ok');
        },
        error: function(result) {
            alert('error');
        }
    });
});   	
</script>

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKHMVCsGXT3wzJxO0hCsh_enpT8ZDQZ8c&libraries=places"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="javascript1.js" type="text/javascript"></script>
    <script src="javascript2.js" type="text/javascript"></script>
  </body>
  


</body>
	


	
</html>

	

