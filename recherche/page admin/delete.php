<?php
$connect = mysqli_connect("127.0.0.1", "root", "sql.projet2", "projet2cpi");
if(isset($_POST["id"])) {
 $query = "SELECT * FROM envoyeur WHERE User_idUser = '" . $_POST["id"] . "'";
 if (mysqli_query($connect, $query)) {
  $row=mysqli_fetch_array(mysqli_query($connect, $query));
  $id0=$row[0];
  $query="SELECT * FROM colis WHERE Envoyeur_idEnvoyeur = '" . $id0 . "'";
  if (mysqli_query($connect,$query)){
   while ($row=mysqli_fetch_row(mysqli_query($connect,$query)))
   {
    $id1=$row[0];
    $query="DELETE FROM trajetcolis WHERE Colis_idColis = '" . $id1 . "'";
    mysqli_query($connect,$query);
    $query="DELETE FROM colis WHERE Envoyeur_idEnvoyeur = '" . $id0 . "'";
    mysqli_query($connect,$query);
   }
   $query="DELETE FROM envoyeur WHERE User_idUser = '" . $_POST["id"] . "'";
   mysqli_query($connect,$query);
  }
 }
 $query = "DELETE FROM invitations WHERE User_idUser = '" . $_POST["id"] . "'";
 mysqli_query($connect,$query);
 $query = "DELETE FROM notifications WHERE User_idUser = '" . $_POST["id"] . "'";
 mysqli_query($connect,$query);
 $query = "SELECT * FROM transporteur WHERE User_idUser = '" . $_POST["id"] . "'";
 if (mysqli_query($connect, $query)){
  while ($row=mysqli_fetch_array(mysqli_query($connect, $query)))
  {
   $id2=$row[0];
   $query="DELETE FROM trajettransporteur WHERE Transporteur_idTransporteur = '" . $id2 . "'";
   mysqli_query($connect, $query);
  }
  $query="DELETE FROM transporteur WHERE User_idUser = '" . $_POST["id"] . "'";
  mysqli_query($connect, $query);
 }
 $query = "DELETE FROM utilisateur WHERE idUser = '" . $_POST["id"] . "'";
 mysqli_query($connect, $query);
}
?>
