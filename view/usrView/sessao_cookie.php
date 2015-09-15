<?php
session_start();
if (empty($_SESSION["login"]))
 header("location: index.php");
else
 if (empty($_COOKIE["tempo"]))  {
  session_destroy();
  header("location: home.php");  }
   
setcookie("tempo","existe",time()+10*60);
?>
