<?php
session_start();
require_once ("dbcontroller.php");
$connect=new DBController();
/************ wilayas display ***************/
$query1 ="SELECT * FROM `wilayas`";
$result1=$connect->runQuery($query1);
 /********************* Filtrage 01 ************************/
 if (isset($_POST["submit1"]))
 {
 	//echo print_r($_POST);
$rech_query="SELECT * FROM `trajettransporteur` WHERE (DepWilaya='".$_POST["DepWilaya1"]."' AND DepCommune='".$_POST["DepCommune1"]."'AND ArvWilaya='".$_POST["ArvWilaya1"]."' AND ArvCommune='".$_POST["ArvCommune1"]."')";
$results=$connect->runQuery($rech_query);
$cpt=0;$newRes=array();
if(!empty($_POST["DepDate"]))
{
    $i=0;
    foreach ($results as $row)
    {
        if(($_POST["DepDate"] >= $row["DepDateDebut"])&($_POST["DepDate"] <= $row["DepDateFin"]))
        {
            $newRes[$i]=$row;
            $i++;
        }
        else;
    }
    $results=$newRes;
    $newRes=array();
}else;
if(!empty($_POST["ArvDate"]))
{
    $i=0;
    foreach ($results as $row)
    {
        if(($_POST["ArvDate"] >= $row["ArvDateDebut"])&($_POST["ArvDate"] <= $row["ArvDateFin"]))
        {
            $newRes[$i]=$row;
            $i++;
        }
        else;
    }
    $results=$newRes;
    $newRes=array();
}else;
//echo "<script type='text/javascript'>alert('".empty($_POST["FormatColis1"])."');</script>";
if(!empty($_POST["FormatColis1"]))
{
    $i=0;
    //echo print_r($results);
    //echo "<script type='text/javascript'>alert('format colis');</script>";
    foreach ($results as $row)
    {

    	$trans=$connect->simpleSearch("transporteur","idTransporteur",$row["Transporteur_idTransporteur"]);
    	/*$qq="SELECT *FROM `transporteur` WHERE (idTransporteur='".$row["Transporteur_idTransporteur"]."')";
    	$trans=$connect->runQuery($qq);*/
        if($_POST["FormatColis1"]== $trans[0]["FormatColis"])
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
if (!empty($_POST["MoyenDeTrans1"]))
{
    $nbmoy=0;
    $i=0;
    $moys=array(4);
    $moys[0]="";
    $moys[1]="";
    $moys[2]="";
    $moys[3]="";
    foreach ($_POST["MoyenDeTrans1"] as $moy)
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
}else;
/*************************************** Forme Colis**********************************************/

if(isset($_POST["submit2"]))
{

	$rech_query2="SELECT * FROM `trajetcolis` WHERE (DepWilaya='".$_POST["DepWilaya2"]."' AND DepCommune='".$_POST["DepCommune2"]."'AND ArvWilaya='".$_POST["ArvWilaya2"]."' AND ArvCommune='".$_POST["ArvCommune2"]."')";	
	$results2=$connect->runQuery($rech_query2);
	$cpt2=0;$newRes2=array();
	if(!empty($_POST["dateEnvoi"]))
	{
	    $i=0;
	    foreach ($results2 as $row2)
	    {
	        if($_POST["dateEnvoi"] <= $row2["DateLimite"])
	        {
	            $newRes2[$i]=$row2;
	            $i++;
	        }
	        else;
	    }
	    $results2=$newRes2;
	    $newRes2=array();
	}else;

	if(!empty($_POST["FormatColis2"]))
	{
	    $i=0;
	    foreach ($results2 as $row2)
	    {
	    	$colis=$connect->simpleSearch("colis","idColis",$row2["Colis_idColis"]);
	        if($_POST["FormatColis2"]== $colis[0]["TailleColis"])
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
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
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
    <div class="sidebar" data-color="blue" >


    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">

                <a href="" class="simple-text ">
                  <img src="assets/img/logo.svg" class="img-fluid">On your way
                </a>
            </div>
            <form method="POST" id="filtreTrajet" action="" style="display:block" class="form-group">
            <ul class="nav">
                <label>Taille maximale du colis</label>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary active">
                        <img src="../images/icones/mail-black-envelope-symbol.svg" class="img-responsive center-block"  title="Extra Small">
                        <input type="radio" name="FormatColis1" id="option1" autocomplete="off" value="XS" > XS
                    </label>
                    <label class="btn btn-secondary">
                        <img src="../images/icones/book.svg" class="img-responsive center-block"  title="Small">
                        <input type="radio" name="FormatColis1" id="option2" autocomplete="off" value="S"> S
                    </label>
                    <label class="btn btn-secondary">
                        <img src="../images/icones/parcel.svg" class="img-responsive center-block"  title="Medium">
                        <input type="radio" name="FormatColis1" id="option3" autocomplete="off" value="M"> M
                    </label>
                    <label class="btn btn-secondary">
                        <img src="../images/icones/armchair.svg" class="img-responsive center-block"  title="Large">
                        <input type="radio" name="FormatColis1" id="option4" autocomplete="off" value="L"> L
                    </label>
                    <label class="btn btn-secondary">
                        <img src="../images/icones/closet.svg" class="img-responsive center-block"  title="Extra Large">
                        <input type="radio" name="FormatColis1" id="option5" autocomplete="off" value="XL"> XL
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
                <div class="row">
                    <div class="col">
                        <select class="form-control" id="wilaya-list1" placeholder="Wilaya de départ" name="DepWilaya1" required >
                            <option value="">Wilaya de départ</option>
                            <?php
                            foreach($result1 as $wil) {
                                ?>
                                <option value="<?php echo $wil["id"]; ?>"><?php echo $wil["nom"]; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col">
                        <select id="commune-list1" class="form-control" placeholder="Commune de départ" name="DepCommune1" required>
                            <option value="">Commune de départ</option>
                        </select>
                    </div>

                </div>
                <br>
                <label>A:</label>
                <div class="row">
                    <div class="col">
                        <select class="form-control" id="wilaya-list2" placeholder="Wilaya d'arrivée" name="ArvWilaya1" required >
                            <option value="">Wilaya d'arrivée</option>
                            <?php
                            foreach($result1 as $wil) {
                                ?>
                                <option value="<?php echo $wil["id"]; ?>"><?php echo $wil["nom"]; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <select id="commune-list2" class="form-control" placeholder="Commune d'arrivée" name="ArvCommune1" required>
                            <option value="">Commune d'arrivée</option>
                        </select>
                    </div>

                </div>
				<hr style="border-color:rgba(120,120,120,0.3); margin-top:0px;">
				<!-- Plage des dates de départ -->
                <label>Date de départ </label>
                <br>
                <div class="container-fluid">
                    <div class="row">

                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker2'>
                                <input type="date" class="form-control"  name="DepDate" id="dateDepart1"/>
                                <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
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


                <hr style="border-color:rgba(120,120,120,0.3); margin-top:0px;">

                <!-- dates d'arrivée -->
                <label>Date de retour</label>
                <br>
                <div class="container-fluid">
                    <div class="row">

                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker4'>
                                <input type="date" class="form-control"  name="ArvDate" id="dateArrivee1"/>
                                <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
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

					<!--<hr style="border-color:rgba(120,120,120,0.3); margin-top:0px;">
	    			<label>Détour minimal</label>-->
	    			<!-- Range slider pour le detour en km-->
	    			<!--<div class="slidecontainer">
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
					</script>-->

	    		
	    		<br>

                <label>Moyen de transport</label>

                <div class="checkbox">
                    <input type="checkbox" name="MoyenDeTrans1[]" id="optinosCheckbox1" value="Voiture">
                    <label for="optinosCheckbox1">
                        En voiture
                    </label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="MoyenDeTrans1[]" id="optinosCheckbox2" value="Camion">
                    <label for="optinosCheckbox2">
                        En camion
                    </label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="MoyenDeTrans1[]" id="optinosCheckbox3" value="Train">
                    <label for="optinosCheckbox3">
                        En train
                    </label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="MoyenDeTrans1[]"  id="optinosCheckbox4" value="Bus">
                    <label for="optinosCheckbox4">
                        En bus
                    </label>
                </div>
	


				<!-- <hr style="border-color:rgba(120,120,120,0.3); margin-top:0px;">
				 <label>Fréquence du trajet</label>
				 <div class="custom-control custom-switch">
				   <input type="checkbox" class="custom-control-input" id="regulariteTrajet" name="regulariteTrajet">
				   <label class="custom-control-label" for="regulariteTrajet">Trajet régulier</label>
				 </div>-->
            <br>
            </ul> 
             <br>
            <div class="container-fluid">
	            <div class= "row">
	               <div class="col-sm-1">
	               		<i class="fa fa-search"></i>
	               </div> 
	               <div class="col-sm-7">
	               		<input type="submit" value="Lancer la Recherche" name="submit1" ></input>
	               	</div>
	                <!-- <span>Lancer la recherche</span> -->
	            </div>
            </div>
           
            </form>
            <!-- ********************************************************************************* -->
            <!-- Filtre recherche d'un colis -->
            <form method="POST" action="" id="filtreColis" style="display:none" class="form-group">
            <ul class="nav">
                <label>Taille du colis</label>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary active">
                        <img src="../images/icones/mail-black-envelope-symbol.svg" class="img-responsive center-block"  title="Extra Small">
                        <input type="radio" name="FormatColis2" id="option1" autocomplete="off" value="XS" checked> XS
                    </label>
                    <label class="btn btn-secondary">
                        <img src="../images/icones/book.svg" class="img-responsive center-block"  title="Small">
                        <input type="radio" name="FormatColis2" id="option2" autocomplete="off" value="S"> S
                    </label>
                    <label class="btn btn-secondary">
                        <img src="../images/icones/parcel.svg" class="img-responsive center-block"  title="Medium">
                        <input type="radio" name="FormatColis2" id="option3" autocomplete="off" value="M"> M
                    </label>
                    <label class="btn btn-secondary">
                        <img src="../images/icones/armchair.svg" class="img-responsive center-block"  title="Large">
                        <input type="radio" name="FormatColis2" id="option4" autocomplete="off" value="L"> L
                    </label>
                    <label class="btn btn-secondary">
                        <img src="../images/icones/closet.svg" class="img-responsive center-block"  title="Extra Large">
                        <input type="radio" name="FormatColis2" id="option5" autocomplete="off" value="XL"> XL
                    </label>
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
                    <div class="row">
                        <div class="col">
                            <select class="form-control" id="wilaya-list3" placeholder="Wilaya de départ" name="DepWilaya2" required>
                                <option value="">Wilaya de départ</option>
                                <?php
                                foreach($result1 as $wil) {
                                    ?>
                                    <option value="<?php echo $wil["id"]; ?>"><?php echo $wil["nom"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col">
                            <select id="commune-list3" class="form-control" placeholder="Commune de départ" name="DepCommune2" required">
                            <option value="">Commune de départ</option>
                            </select>
                        </div>


                    </div>
                    <br>
                    <label>A:</label>
                    <div class="row">
                        <div class="col">
                            <select class="form-control" id="wilaya-list4" placeholder="Wilaya de départ" name="ArvWilaya2" required >
                                <option value="">Wilaya d'arrivée</option>-->
                                <?php
                                foreach($result1 as $wil) {
                                    ?>
                                    <option value="<?php echo $wil["id"]; ?>"><?php echo $wil["nom"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col">
                            <select id="commune-list4" class="form-control" placeholder="Commune d'Arrivée" name="ArvCommune2" required">
                            <option value="">Commune d'arrivée</option>
                            </select>
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
                                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
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
	    		
	    			<!--<label>Spécificités</label>
					<div class="checkbox">
						<input type="checkbox" id="optinosCheckbox6" value="">
						<label for="optinosCheckbox6">
							Objet fragile
						</label>
					</div>
					<div class="checkbox">
						<input type="checkbox" id="optinosCheckbox7" value="">
						<label for="optinosCheckbox7">
							Demande Spéciale
						</label>
					</div>
					<div class="checkbox">
						<input type="checkbox" id="optinosCheckbox8" value="">
						<label for="optinosCheckbox8">
							Demande Urgente
						</label>
					</div>
					<div class="checkbox">
						<input type="checkbox" id="optinosCheckbox9" value="" checked>
						<label for="optinosCheckbox9">
							Colis ordinaire
						</label>
					</div>-->
					
					<!--<label>Moyen de transport</label>
				<div>	
			  		<label><input type="radio" name="MoyenDeTrans2" value="Voiture">Je fais le trajet en voiture</label>
				</div>
				<div>
				  	<label><input type="radio" name="MoyenDeTrans2" value="Camion">Je fais le trajet en camion</label>
				</div>
				<div>
				  	<label><input type="radio" name="MoyenDeTrans2" value="Train">Je fais le trajet en train</label>
				</div>
				<div>
				  	<label><input type="radio" name="MoyenDeTrans2" value="Bus">Je fais le trajet en bus</label>
				</div>-->
				
            
            </ul> 
            <!-- ********************************************************************************* -->
            <br>
            <div class="container-fluid">
	            <div class= "row">
	               <div class="col-sm-1">
	               		<i class="fa fa-search"></i>
	               </div> 
	               <div class="col-sm-7">
	               		<input type="submit" value="Lancer la Recherche" name="submit2"></input>
	               	</div>
	                <!-- <span>Lancer la recherche</span> -->
	            </div>
            </div>
           </form>
            
            

    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   
	                    <h3 id="titreRecherche">Cherchez un trajet pour votre colis</h3>
					    <ul class="nav nav-tabs">
					      <li><a data-toggle="tab" href="#rechercheTrajetTab" onclick="choixRecherche()" id="rechercheTrajet">Rechercher un trajet</a></li>
					      <li><a data-toggle="tab" href="#rechercheColisTab" onclick="choixRecherche2()" id="rechercheColis">Rechercher un colis</a></li>
					     
					    </ul>
					    <script>
							function choixRecherche() {
							  document.getElementById("rechercheColis").style.color = "#ffca28";
							  document.getElementById("rechercheColis").style.fontWeight = "normal";	
							  document.getElementById("rechercheColis").style.backgroundColor = "transparent";
							  document.getElementById("rechercheTrajet").style.color = "#212533";
							  document.getElementById("rechercheTrajet").style.backgroundColor = "#efebeb";
							  document.getElementById("filtreColis").style.display="none";
							  document.getElementById("filtreTrajet").style.display="block";
							  document.getElementById("titreRecherche").innerHTML="Cherchez un trajet pour votre colis";
							}
							function choixRecherche2() {
						      document.getElementById("rechercheTrajet").style.color = "#ffca28";
							  document.getElementById("rechercheTrajet").style.fontWeight = "normal";	
							  document.getElementById("rechercheTrajet").style.backgroundColor = "transparent";
							  document.getElementById("rechercheColis").style.color = "#212533";
							  document.getElementById("rechercheColis").style.backgroundColor = "#efebeb";
							  document.getElementById("filtreColis").style.display="block";
							  document.getElementById("filtreTrajet").style.display="none";
							  document.getElementById("titreRecherche").innerHTML="Cherchez un colis sur votre trajet";
							}
						</script>
                </div>
               
            </div>
        </nav>
        <div class="tab-content">

	        <div class="content tab-pane active" id="rechercheTrajetTab">
	        	<?php
                    if(isset($_POST["submit1"]))
                    {
                ?>
	        	<div class="container-fluid">
	        		<br>
	        		<p>
	        			<span><?php echo $cpt." ";?>résultats</span>
	        	        <button type="button" class="btn btn-primary pull-right">
		        			<i class="fa fa-bookmark" aria-hidden="true"></i>
		        			Enregistrer la recherche
	        			</button>
	        			<br>
	        	        correspondent à vos critères
	        	    </p>
	        		
	        		<hr style="border-color:rgba(120,120,120,0.3); margin-top:0px;">
	        	</div>
	        	<?php 
	        	    foreach ($results as $annonce) 
	        	    {
	        	    	$res=$connect->simpleSearch("transporteur","idTransporteur",$annonce["Transporteur_idTransporteur"]);
	        	    	/*$qr="SELECT * FROM `transporteur` WHERE (idTransporteur='".$annonce["Transporteur_idTransporteur"]."')";
	        	    	$res=$connect->runQuery($qr);*/
	        	    	$user=$connect->simpleSearch("utilisateur","idUser",$res[0]["User_idUser"]);
	        	    	/*$qr2="SELECT * FROM `utilisateur` WHERE (idUser='".$res[0]["User_idUser"]."')";
	        	    	$user=$connect->runQuery($qr2);*/
	        	    	$DW=$connect->simpleSearch("wilayas","id",$annonce["DepWilaya"]);
	        	    	$AW=$connect->simpleSearch("wilayas","id",$annonce["ArvWilaya"]);
	        	    	$DC=$connect->simpleSearch("communes","id",$annonce["DepCommune"]);
	        	    	$AC=$connect->simpleSearch("communes","id",$annonce["ArvCommune"]);
	        	?>
	            <div class="container-fluid">
	            	<div class="row">
	            		<div class="col-md-10">
	                        <div class="card">

	                            <div class="header">
	                                <!--<h3 class="pull-right"> 
	                                	2000 DA
	                                	<br>
	                                	<i class="fa fa-heart-o pull-right" aria-hidden="true" title="Ajouter à vos favoris" style="margin-right:18px;margin-top:10px;"></i>
	                                </h3>-->
	                                <h4 class="title"><?php echo $DW[0]["nom"]." - ".$AW[0]["nom"]; ?></h4>

	                                <!--<p class="category"><i class="fa fa-clock-o"></i> Déposée il y a 5 jours </p>-->
	                            </div>
	                            <div class="content">
	                                <ul>
	                                	<li>
	                                		<p><i class="fa fa-calendar" aria-hidden="true"></i><?php echo "Déposée le ".$res[0]["dateDepot"];?> </p>
	                                	</li>
	                                	<li>		
	                                		<p><i class="fa fa-road" aria-hidden="true"></i><?php echo "Itinéraire: <br> De :".$DW[0]["nom"]." / ".$DC[0]["nom"]." / ".$annonce["DepRue"]."   <br> A : ".$AW[0]["nom"]." / ".$AC[0]["nom"]." / ".$annonce["ArvRue"] ;?></p>
	                                	</li>
	                      
	                                </ul>

	                                <div class="footer">
	                                   
	                                   <!--  <hr style="border-color:rgba(255,202,40,0.9);"> -->
	                                   	<hr>
	                                    <div class="legend pull-right">
	                                      <button type="button" class="btn btn-primary btn-sm" onclick="inviter(<?php echo $res[0]["User_idUser"]?>);">
						        			Envoyer une demande
					        			  </button> 
	                                    </div>
	                                    
		                                <div class="legend">
		                                    <a href="">
			                                    <img src=<?php if (!empty($user[0]["PhotoProfil"])) echo '"'.$user[0]["PhotoProfil"]."'";else echo '"assets/img/default-avatar.png"';?> alt="Déposeur de l'annonce" class="img-circle img-avatar">
			                                    <span>Nom de l'utilisateur : <?php echo $user[0]["Nom"]." ".$user[0]["Prenom"];?></span>
		                                    </a>
		                                </div>
	                                    
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	            		
	            	</div>

	              
	            </div>
	            <?php }} ?>
	        </div> 
	         <div class="content tab-pane" id="rechercheColisTab">
	         	<?php if (isset($_POST["submit2"]))
	        		{
	        		?>
	         	<div class="container-fluid">
	        		<br>
	        		<p>
	        			<span><?php echo $cpt2." ";?> résultats</span>
	        	        <button type="button" class="btn btn-primary pull-right">
		        			<i class="fa fa-bookmark" aria-hidden="true"></i>
		        			Enregistrer la recherche
	        			</button>
	        			<br>
	        	        correspondent à vos critères
	        	    </p>
	        		
	        		<hr style="border-color:rgba(120,120,120,0.3); margin-top:0px;">
	        	</div>
	        	<?php
	        	foreach ($results2 as $annonce2) 
	        	    {
	        	    	$colis=$connect->simpleSearch("colis","idColis",$annonce2["Colis_idColis"]);
	        	    	$env==$connect->simpleSearch("envoyeur","idEnvoyeur",$annonce2["Envoyeur_idEnvoyeur"]);
	        	    	$usr=$connect->simpleSearch("utilisateur","idUser",$env[0]["User_idUser"]);
	        	    	$DW2=$connect->simpleSearch("wilayas","id",$annonce2["DepWilaya"]);
	        	    	$AW2=$connect->simpleSearch("wilayas","id",$annonce2["ArvWilaya"]);
	        	    	$DC2=$connect->simpleSearch("communes","id",$annonce2["DepCommune"]);
	        	    	$AC2=$connect->simpleSearch("communes","id",$annonce2["ArvCommune"]);

	        	?>    	
	            <div class="container-fluid">
	            	<div class="row">
	            		<div class="col-md-10">
	                        <div class="card">

	                            <div class="header">
	                                <h3 class="pull-right"> 
	                                	2000 DA
	                                	<br>
	                                	<i class="fa fa-heart-o pull-right" aria-hidden="true" title="Ajouter à vos favoris" style="margin-right:18px;margin-top:10px;"></i>
	                                </h3>
	                                <h4 class="title">Objet:<?php $annonce2["Objet"]?> </h4>

	                                <p class="category"><i class="fa fa-clock-o"></i> Déposée le:<?php $annonce["currentDate"]?> </p>
	                            </div>
	                            <div class="content container-fluid">
	                                <div class="row" id="annonceColisContent">
	                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-10 " id="imgContainer">
											<img src=<?php if (!empty($colis[0]["photoObjet"])) echo '"'.$colis[0]["photoObjet"]."'";else echo '"assets/img/trolley.svg"';?> alt="Image du colis" class="img-responsive center">
		                             	</div>
		                             	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">
		                             	   <ul class="texteAnnonceColis">
			                                	<li>
			                                		<p><i class="fa fa-calendar" aria-hidden="true"></i> A déposer avant le: <?php $annonce["dateLimite"] ?></p>
			                                	</li>
			                                	<li>		
			                                		<p><i class="fa fa-road" aria-hidden="true"></i> <?php echo "Itinéraire: <br> De :".$DW2[0]["nom"]." / ".$DC2[0]["nom"]." / ".$annonce2["DepRue"]."   <br> A : ".$AW2[0]["nom"]." / ".$AC2[0]["nom"]." / ".$annonce2["ArvRue"] ;?></p>
			                                	</li>
			                                	<li>
			                                		<p><i class="fa fa-calendar" aria-hidden="true"></i> <?php if (!empty($colis[0]["objetFragile"])) echo "Objet Fragile" ?> ?></p>
			                                	</li>
			                                	<li>
			                                		<p><i class="fa fa-calendar" aria-hidden="true"></i> <?php if (!empty($colis[0]["demandeUrgente"])) echo "Demande Urgente" ?> ?></p>
			                                	</li>
			                                	<li>
			                                		<p><i class="fa fa-calendar" aria-hidden="true"></i> <?php if (!empty($colis[0]["demandeSpeciale"])) echo "Demande Speciale" ?> ?></p>
			                                	</li>
			                                </ul>
		                             		
		                             	</div>
		                             	
									</div>
	                                <div class="footer">
	                                   
	                                    <hr>
	                                    <div class="legend pull-right">
	                                      <button type="button" class="btn btn-primary btn-sm" onclick="inviter(<?php echo $env[0]["User_idUser"]?>);">
						        			Envoyer une demande
					        			  </button> 
	                                    </div>
	                                    
		                                <div class="legend">
		                                    <a href="">
			                                    <img src="assets/img/default-avatar.png" alt="Déposeur de l'annonce" class="img-circle img-avatar">
			                                    <span>Nom de l'utilisateur : <?php echo $usr[0]["Nom"]." ".$usr[0]["Prenom"];?></span>
		                                    </a>
		                                </div>
	                                    
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	            		
	            	</div>

	              
	            </div>
	        	<?php }}?>
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
		 
		


        <footer class="footer">
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
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="">OYW</a>, tous droits réservés
                </p>
            </div>
        </footer>

    </div>
</div>


</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.1/bootstrap-slider.js"></script>


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

    <!--  ajax functions -->

    <script>

    	function inviter(val){
    		$.ajax({
    			type: "POST",
    			url: "invitation.php",
    			data:'recepteur_id='+val;
    		});
    	}

        /*function getCommune1(val) {
        	alert("ddqsd")
            $.ajax({
                type: "POST",
                url: "fct.php",
                data:'wilaya_id='+val,
                success: function(data){
                    $("#commune-list1").html(data);
                }
            });
        }
        
        function getCommune2(val) {
            $.ajax({
                type: "POST",
                url: "fct.php",
                data:'wilaya_id='+val,
                success: function(data){
                    $("#commune-list2").html(data);
                }
            });
        }

        function getCommune3(val) {
            $.ajax({
                type: "POST",
                url: "fct.php",
                data:'wilaya_id='+val,
                success: function(data){
                    $("#commune-list3").html(data);
                }
            });
        }
        function getCommune4(val) {
            $.ajax({
                type: "POST",
                url: "fct.php",
                data:'wilaya_id='+val,
                success: function(data){
                    $("#commune-list4").html(data);
                }
            });
        }*/




    </script>
	
</html>
