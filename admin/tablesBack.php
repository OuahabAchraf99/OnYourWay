<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 07/04/2019
 * Time: 17:32
 */
$con=mysqli_connect('127.0.0.1','root','','projet2cpi')
or die("connection failed".mysqli_connect_error());

$request=$_REQUEST;
$col =array(
    0   =>  'idUser',
    1   =>  'Nom',
    2   =>  'Prenom',
    3   =>  'Email' ,
    4   =>  'Detes' ,
    5   =>  'UserType'
);  //create column like table in database

$sql ="SELECT * FROM utilisateur";
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;
//Search
$sql ="SELECT * FROM utilisateur WHERE 1=1";
if(!empty($request['search']['value'])){
    $sql.=" AND (idUser Like '".$request['search']['value']."%' ";
    $sql.=" OR Nom Like '".$request['search']['value']."%' ";
    $sql.=" OR Prenom Like '".$request['search']['value']."%' ";
    $sql.=" OR Email Like '".$request['search']['value']."%' ";
    $sql.=" OR Detes Like '".$request['search']['value']."%' )";
}
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);


//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($con,$sql);

$data=array();

while($row=mysqli_fetch_array($query)){
    $subdata=array();
    $subdata[]=$row[0]; //id
    $subdata[]=$row[1]; //nom
    $subdata[]=$row[2]; //prenom
    $subdata[]=$row[3]; //email
    $subdata[]=$row[13]; //Detes
//    $contrat=$row[7];
//    $attestation=$row[9];
//    $idendite=$row[10];
    $subdata[]='<td>
 <style>

.button {
  font-size: 1em;
  padding: 10px;
  color: black;
  border: 2px solid #06D85F;
  border-radius: 20px/50px;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s ease-out;
}
.button:hover {
  background: #06D85F;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 60%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}
    </style>
<div class="box">
	<a class="button" href="#popup'.$row[0].'">Premium</a>
</div>

<div id="popup'.$row[0].'" class="overlay">
	<div class="popup">
		<h2>Confirmation premium</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<img src="image/icons8-contract-filled-50.png" width="30" height="30" alt="user" style="position: relative;">
		    <span style="font-weight: bold;position: relative;">L\'attestation sur honneur:</span>
		    <br><br>
     	    <!--<button type="button" class="btn btn-warning">Afficher </button>-->
     	    <a href="'.$row[9].'">Afficher</a>
		    <br><br>
		    <img src="image/icons8-sign-document-64.png" width="30" height="30" alt="user" style="position: relative;">
		    <span style="font-weight: bold;position: relative;">Le contrat:</span>
		    <br><br>
		   <!-- <button type="button" class="btn btn-warning">Afficher </button>-->
		   <a href="'.$row[7].'">Afficher</a>
		    <br>
            <br>
		    <img src="image/icons8-name-tag-64.png" width="30" height="30" alt="user" style="position: relative;">
		    <span style="font-weight: bold;position: relative;">La piece d\'identite:</span>
		    <br><br>
		    <!--<button type="button" class="btn btn-warning">Afficher </button>-->
		    <a href="'.$row[10].'">Afficher</a>
		    <br><br><br>
		    <button type="button" class="confirm-btn btn btn-secondary"style="margin-left: 80px" data-id="'.$row[0].'" >Confirmer</button>
            <button type="button" class="deleteUser btn btn-secondary" data-id="'.$row[0].'">Supprimer</button>

		</div>
	</div>
</div></td>';
    $subdata[]='<td> <button class="myButton form-control deleteUser" data-id="'.$row[0].'">Supprimer</button> </td>';
    $data[]=$subdata;
}
$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);
?>
