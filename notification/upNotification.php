<?php
//connection to the database :
session_start();
$conn = mysqli_connect("127.0.0.1","root","","projet2cpi");
//if (mysqli_connect_errno($conn))
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
else{
  if(isset($_POST['id'])){
    $query="UPDATE `notification` SET `isread`=1 WHERE idNotif ='" . $_POST["id"] . "'";
    $result=mysqli_query($conn,$query);}
    else {
      echo "not sending data";
    }
}
  ?>
