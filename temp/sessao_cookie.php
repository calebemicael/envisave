<?php
session_start();
if (empty($_SESSION["login"]))
 header("location: login.php");
else
 if (empty($_COOKIE["tempo"])){
  session_destroy();
  header("location: index.php");}
  
//setcookie("tempo","existe",time()+10*60);
?>
