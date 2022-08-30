<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 07/04/2019
 * Time: 17:32
 */
$con=mysqli_connect('127.0.0.1','root','sql.projet2','projet2cpi')
or die("connection failed".mysqli_connect_error());

$request=$_REQUEST;
$col =array(
    0   =>  'idUser',
    1   =>  'Nom',
    2   =>  'Prenom',
    3   =>  'Email'
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
    $sql.=" OR Email Like '".$request['search']['value']."%' )";
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
    $subdata[]='<td> <button class="myButton form-control deleteUser" id="'.$row[0].'">Supprimer</button> </td>';
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