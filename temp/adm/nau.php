<?php
 if (!isset($_SESSION["login"])|| !isset($_SESSION["nome"]))
  header("location: index.php");
?>
