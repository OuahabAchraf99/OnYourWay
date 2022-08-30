<?php
$d= date("Y-m-d") ;
$d2 ="2019-04-16" ;
$t=ceil((strtotime($d2)-strtotime($d))/86400);
echo $t ;

?>