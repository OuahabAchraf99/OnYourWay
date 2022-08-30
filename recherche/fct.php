<?php
session_start();
require_once("dbcontroller.php");
$connect = new DBController();

if(!empty($_POST["wilaya_id"])) {
	$query2 ="SELECT * FROM communes WHERE wilaya_id = '" . $_POST["wilaya_id"] . "'";
	$result2 = $connect->runQuery($query2);
?>
	<option value="">Commune de départ</option>
<?php
	foreach($result2 as $commune) {
?>
	<option value=<?php echo $commune["id"]; ?>><?php echo $commune["nom"]; ?></option>
<?php
	}
 }else;

 /**************************************/
?>