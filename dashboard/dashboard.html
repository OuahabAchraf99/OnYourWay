<?php session_save_path();
session_start();
//Include 'config.php';
   try{
        $bdd = new PDO('mysql:host=localhost;port=3306;dbname=projet2cpi','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }catch(Exception $e){
    
        die('Erreur : '.$e->getMessage());
    }

?>
<?php if(isset($_SESSION['connected'])||(isset($_COOKIE['email'])&&isset($_COOKIE['password']))){
    if ($_SESSION['connected']==false){
        header('LOCATION: connecion.php');
    }else{
        if(!empty($_COOKIE['email']) && !empty($_COOKIE['password'])){

            $req = $bdd->prepare('SELECT Email,Password,nom,prenom , UserType as premium ,idUser as ID FROM utilisateur WHERE Email = ? AND Password =?');
            $req->execute(
                array(
                    urldecode($_COOKIE['email']),
                    $_COOKIE['password'],
                )
                );
            $_SESSION = $req->fetch();
            $_SESSION['connected'] = true;
            $req->closeCursor(); 
                }
                $reqPhoto=$bdd->prepare('SELECT PhotoProfil FROM utilisateur WHERE idUser=:id');
                $reqPhoto->execute(
                    array('id'=>$_SESSION['ID'])
                );
                $_SESSION['PhotoProfil'] = $reqPhoto->fetch()[0];
                $reqPhoto->closeCursor(); 
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
						<div class="profile-info row ">
							<div class="profile-image ">
								<a href="ui-profile.html">
									<img alt="" src="https://lh3.googleusercontent.com/-uwagl9sPHag/WM7WQa00ynI/AAAAAAAADso/ZGTVC0LVk1cFReheTbZzpGa2aawWyV8QACL0B/w140-d-h148-p-rw/profile-pic.jpg" style="position: relative;left: 80px" class="img-circle img-inline class="img-responsive img-circle" >
								</a>
							</div>
							<div class="profile-details">
								<h3>
									<a href="ui-profile.html" style="font-weight: bold;position: relative;left: 70px;top: -30px"><?php echo $_SESSION['nom'].' '.$_SESSION['prenom'] ?></a>
								</h3>
								

							</div>
						</div>

						<ul class="wraplist" style="height: auto;">
							<!--          <li class="menusection">Main</li>-->
							<li><a href="../profile/examples/profile.php" style="color: whitesmoke;font-size: 20px;position: relative;right: 50px;top: -30px"><span class="sidebar-icon"><i class="fa fa-user" ></i></span> <span class="menu-title">Profile</span></a></li>
							<br>
							<li><a href="../messagerie/chatBox.php" style="color: whitesmoke;font-size: 20px;margin-left: 0px;position: relative;right: 35px;top: -30px"><span class="sidebar-icon"><i class="fa fa-envelope"></i></span> <span class="menu-title">Messages</span></a></li>
							<br>
							<li><a href="../notification/notifcation.html" style="color: whitesmoke;font-size: 20px;margin-left: 0px;position: relative;right: 35px;top: -30px "><span class="sidebar-icon"><i class="fa fa-bell"></i></span> <span class="menu-title">Notifications</span></a></li>
							<br>

							<br>
							<li><a href="./deconnexion.php" style="color: whitesmoke;font-size: 20px;margin-left: 0px;position: relative;right: 35px;top: -30px"><span class="sidebar-icon"><i class="fa fa-sign-out"></i></span> <span class="menu-title">Déconnecter</span></a></li>

						</ul>
					</div>
				</div>












	

            </ul> 

           
            </form>
        
            
            

    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed" style="    background-image: linear-gradient(to right,#212533, #3f4c80);">
            <div class="container-fluid" style="border-bottom:1px solid #cfcfcf;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   

					
                </div>
               
            </div>
        </nav>
	            <div class="container-fluid">
	            	<div class="row">
	            		<div class="col-md-12" style="position: relative;top: 20px">
	                        <div class="card annonce">

	                            <div >

	                                <h4 class="title" style="font-weight: bold;margin-left:20px;position: relative;top: 5px ">Bonjour <span><?php echo $_SESSION['nom'].' '; ?></span><span>
	                                	<?php echo $_SESSION['prenom'] ;?>
	                                </span>!</h4>


	                            </div>
	                            <div class="content" >
									<img src="image/icons8-crown-filled.svg" width="42" height="42" alt=user align="right" style="position: relative;top: -20px">

									<main class = "main options" style="position: relative;top: 25px;" disabled="disabled">



										<section class="demo">



											<div class="block">


												<div id="radios">
													<input id="option1" name="options" type="radio">
													<label for="option1" style="font-weight: bold;color: black" cheked>Débutant</label>

													<input id="option2" name="options" type="radio">
													<label for="option2" style="font-weight: bold;color: black">Habitué </label>

													<input id="option3" name="options" type="radio">
													<label for="option3" style="font-weight: bold;color: black">Confirmé</label>

													<input id="option4" name="options" type="radio"<?php if(isset($_SESSION['premium'])&& !empty($_SESSION['premium'])){
													if ($_SESSION['premium']==1) { echo 'checked';}} ?> >
													<label for="option4" style="font-weight: bold;color: black;" >Premium</label>



												</div>
											</div>




										</section>





									</main>




									</main>


	                                <div class="footer">
	                                   
	                                   <!--  <hr style="border-color:rgba(255,202,40,0.9);"> -->
	                                   
	                                    <div class="legend pull-right">
											<div class="header" data-toggle="modal" data-target="#modalTrajet">
											<a href="#popup1">	<h5 class="pull-right" style="color: #FFCA28;position: relative;top: -15px" >
													En savoir plus >
												</h5>
                                            </a>

                                                <div id="popup1" class="overlay">
                                                    <div class="popup">
                                                        <h2>Here i am</h2>
                                                        <a class="close" href="#">&times;</a>
                                                        <div class="content">
                                                            Thank to pop me out of that button, but now i'm done so you can close this window.
                                                        </div>
                                                    </div>
                                                </div>
											</div>
	                                    </div>
	                                    
		                                <div class="legend">

			                                    <span style="color: white">.</span>

		                                </div>
	                                    
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	            		
	            	</div>

	              
	            </div>
		<div class="container-fluid">
			<div class="row" >
				<div class="col-md-6" style="position: relative;top: 20px">
					<div class="card annonce" style="padding-bottom: 47px;" >

						<div class="header" data-toggle="modal" data-target="#modalTrajet">
                            <p >
							<img src="image/icons8-crown-filled.svg" width="42" height="42" alt=user align="left">

							<h4 class="title" style="font-weight: bold;margin-left: 50px">Devenir membre premium!</h4>
							</p>
							<h5 style="font-weight: bold;margin-left: 50px">N'attendez plus!</h5>


						</div>

						<div class="footer">

							<!--  <hr style="border-color:rgba(255,202,40,0.9);"> -->

							<div class="legend pull-right">
								<div class="" data-toggle="modal" data-target="#modalTrajet">
									<a href="#popup3" class="btn " style="font-weight: bold;margin-right:11px;">Remplir le formulaire</a>

								</div>



							</div>

							<div id="popup3" class="overlay" >
								<br><br>

								<div class="popup" style="width: 50%">
									 <form action="devenirPremiumBack.php" method ="POST" enctype="multipart/form-data">
									<h3 style="font-weight: bold;color: #FFCA28;text-align: center">Devenir premium</h3>
									<a class="close" href="#">&times;</a>
									<div class="content">
										<div>

											<p style="font-weight: bold">
												<img src="image/profile.PNG" width="30" height="30" alt=user>
												Ajoutez votre photo de profile:
											</p>
											<script type="text/javascript">
                                                $(document).ready(function() {
                                                    $('.file-upload').file_upload();
                                                });
											</script>
											<!--<form class="form-horizontal">-->
												<div class="form-group">
													<div class="col-sm-offset-2 col-sm-10">
														<label class="file-upload btn btn-primary">
															Browse for file ... <input type="file" />
														</label>
													</div>
												</div>
											<!--</form>-->

										</div>

											<div>
												<img src="image/icons8-contract-filled-50.png" width="30" height="30" alt="user" style="position: relative;top: -10px">
												<span style="font-weight: bold;position: relative;top:-10px">Ajoutez l'attestation sur honneur:</span>
												<script type="text/javascript">
                                                    $(document).ready(function() {
                                                        $('.file-upload').file_upload();
                                                    });
												</script>
												<!--<form class="form-horizontal">-->
													<div class="form-group">
														<div class="col-sm-offset-2 col-sm-10">
															<label class="file-upload btn btn-primary">
																Browse for file ... <input type="file" />
															</label>
														</div>
													</div>
												<!--</form>-->
											</div>
											<div>
												<div>
													<img src="image/icons8-sign-document-64.png" width="30" height="30" alt=user>
													<span style="font-weight: bold">Ajoutez le contrat:</span>
													<script type="text/javascript">
                                                        $(document).ready(function() {
                                                            $('.file-upload').file_upload();
                                                        });
													</script>
													<!--<form class="form-horizontal">-->
														<div class="form-group">
															<div class="col-sm-offset-2 col-sm-10">
																<label class="file-upload btn btn-primary">
																	Browse for file ... <input type="file" />
																</label>
															</div>
														</div>
													<!--</form>-->
												</div>
												<div>
													<div>
														<img src="image/icons8-name-tag-64.png" width="30" height="30" alt=user>
														<span style="font-weight: bold"> Ajoutez votre piece d'identité::</span>

													</div>
												
													<script type="text/javascript">
                                                        $(document).ready(function() {
                                                            $('.file-upload').file_upload();
                                                        });
													</script>
													<!--<form class="form-horizontal"> -->
														<div class="form-group">
															<div class="col-sm-offset-2 col-sm-10">
																<label class="file-upload btn btn-primary">
																	Browse for file ... <input type="file" />
																</label>
															</div>
														</div>
													<!--</form>-->


												</div>
												<div style="position: relative;left: 90px;font-weight: bold">
													<input class="btn btn-primary" type="submit" style="font-weight: bold;position: relative;right: 40px"  value="Enregistrer">
												</div>


											</div>


									</div>
								</form>
								</div>
							</div>
							<!--<div class="legend">
                                    <span style="color: #FFCA28">.</span>

                            </div>-->

						</div>
					</div>
				</div>

			</div>


		</div>

	        </div> 

	       





        	
        </div>
       
        


		 
		


       
    </div>
</div>
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

  		<!-- Modal colis -->








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

<script src="jquery.radios-to-slider.js"></script>
<script src="index.js"></script>

</html>
