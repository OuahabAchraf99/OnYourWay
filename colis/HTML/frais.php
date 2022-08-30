<?php
function  price($dist, $taille, $poid ,$temp)
{
//connection to data base :
  $conn = mysqli_connect("127.0.0.1","root","","projet2cpi");
  if (!$conn)
  {
      die("Connection failed: " . mysqli_connect_error());
  }
  else
      {
  //getting data from databse (unities and tempMax) :
      $sql = "SELECT * FROM unite";
      $result = mysqli_query($conn,$sql);
      if (!$result)
      {
          die("Error : " . mysqli_error($conn));
      }
      else
      {
          $row = mysqli_fetch_assoc($result) ;
          $UDist = (double)$row['uniteDist'];
          $UPoid = (double)$row['unitePoid'] ;
          $UTaille = (double)$row['uniteTaille'] ;
          $UTemp = (double)$row['uniteTemps'] ;
          $tempMax = 20.0;
          $pDistance=(double)$row['pDistance'];
          $pPoid =(double)$row['pPoid'] ;
          $pTaille =(double) $row['pTaille'] ;
          $pTemp=(double)$row['pTemps'];
          // we need to calculate $tempVar :
          if ($temp <= $tempMax)
          {
              $tempVar = $pTemp*(30.0-$temp)*$UTemp ;
          }
          else{ $tempVar  = $pTemp*10.0*$UTemp ;}
          $cost  = ($pDistance*$dist*$UDist) + ($pPoid*$poid*$UPoid) + ($pTaille*$taille*$UTaille) +$tempVar ;
          return $cost ;
      }
      }

  //======================================================================================================================================


}

function Taille($p)
{
    if     ($p === "XS"){return 1 ;}
    elseif ($p === "S"){return 10 ;}
    elseif ($p === "M"){return 500 ;}
    elseif ($p === "L"){return 1500 ;}
    elseif ($p === "XL"){return 3000 ;}
}
function Poid($t)
{
    if     ($t === "T.Léger"){return 0.5 ;}
    elseif ($t === "Léger"){return 5 ;}
    elseif ($t === "Lourd"){return 25 ;}
    elseif ($t === "T.Lourd"){return 100 ;}
}


?>
