<?php require 'conexao.php';
 require 'classes/Usuario.class.php';
 
$usr = new Usuario ($_GET['id'], NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
$usr->deleta($mysqli);
?>