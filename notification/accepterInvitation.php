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
  if (isset($_POST['id'])) {
    $query="SELECT * FROM notification WHERE idNotif='" . $_POST["id"] . "'";
    $result=mysqli_query($conn,$query);
    if (!$result) {
    	# code...
    	die("Error : ".mysqli_error($conn));
    }
    else{
	    $row=mysqli_fetch_assoc($result);
	    $userid=$row['userId'];
	    $senderid=$row['senderId'];
	    $query2="INSERT INTO `relationenv_trans` (`id_realtion`,`idEnv`,`idTrans`) VALUES (NULL,'" . $userid. "','" . $senderid. "')";
	    $result2=mysqli_query($conn,$query2);
	    if (!$result2) {
    	die("Error2 : ".mysqli_error($conn));
    }

    }

  }
  else echo "blabla";
}
?>
