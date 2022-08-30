<?php
/*Détruit les Cookie*/ 
setCookie('email' ,null,-1,'/','localhost',false,true);
setCookie('password',null,-1,'/','localhost',false,true);
session_save_path();
session_start();
session_destroy();
header('Location: ../accueil/');
?>