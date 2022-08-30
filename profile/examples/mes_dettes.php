<?php
session_save_path();
session_start();



    if ($_SESSION['connected']==false){
        header('LOCATION: ../../connexion/connexion.php');}
        else{
$id = $_SESSION['ID'];
$host="127.0.0.1";
$user="root";
$password="";
$database="projet2cpi";
$connect=mysqli_connect($host,$user,$password,$database);
if(mysqli_connect_errno())
{
    die("error in connection to the database :".mysqli_connect_error());
}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Mes dettes</title>

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


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>     
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet"  href="modifierTarif.css">
</head>
<body>


	<?php
	$rech_query="SELECT * FROM `utilisateur` WHERE(`idUser`='$id')";
	$rech_result= mysqli_query($connect,$rech_query);
	$row = mysqli_fetch_array($rech_result);
	$dettes = $row[13];

	 ?>
    <div class="main-panel">



        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <!-- <h4 class="title">Light Bootstrap Table Heading</h4>
                                <p class="category">Created using Roboto Font Family</p> -->
                            </div>
                            <div class="content">



	                           <h4 class="text-center" style="color:#212533;font-weight:900; font-size:1.8em;"><img src="images/money.svg" style="width:50px; height:auto;"> Dettes</h4>

                               <hr class="text-center" style="border-color:rgba(120,120,120,0.3); margin-top:0px; width:250px; ">
                               <p class="text-center">Vos dettes s'élèvent à: </p>
                               <p class="text-center"><span style="color:#ffca28;font-weight:900; font-size:1.5em;"><?php echo $dettes." DA"; ?></span></p>


                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <!--footer-->


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

<?php } ?>
