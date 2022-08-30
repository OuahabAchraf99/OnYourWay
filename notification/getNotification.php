<?php
//connection to the database :
session_start();
$id=64;//$_SESSION['ID'];
$conn = mysqli_connect("127.0.0.1","root","","projet2cpi");
//if (mysqli_connect_errno($conn))
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
else{
$query="SELECT * FROM notification WHERE isread=0 and userId=$id";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0){
    $r = [];

    //saving our notifications in an array and then send theme to the ajax call.
    while($row=mysqli_fetch_assoc($result)){
        if($row['notifType']=="cld"){
            $imgsource="images/colisd.svg";
            $row['imgSource']=$imgsource;
        }
        elseif ($row['notifType']=="annd") {
          $imgsource="images/inspection.svg";
          $row['imgSource']=$imgsource;
        }
        elseif ($row['notifType']=="prem"){
            $imgsource="images/crown.svg";
            $row['imgSource']=$imgsource;
        }
        elseif ($row['notifType']=="invitation"){
            $imgsource="images/deal.svg";
            $row['imgSource']=$imgsource;
            //here i will add add a piece of code if it doesn't run ....
            $sendID=$row['senderId'];
            $squery="SELECT * FROM utilisateur WHERE idUser=$sendID ";
            $res=mysqli_query($conn,$squery);
            $f=mysqli_fetch_assoc($res);
            $row['name']=$f['Nom']." ".$f['Prenom'] ;
            $row['experience']=$f['Experience'];
            $row['vehicule']=$f['Vehicule'];
            
        }


        //
        $r[] = $row;
    }

    echo json_encode($r);

}
}
?>
