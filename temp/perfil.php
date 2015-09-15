<?php
require "conexao.php";
require 'classes/post.class.php';
require 'busca.php';?>
<div id='corpe'>
<?php
	$id=$_SESSION['login'];
	$post = new post(null, null, null, $id);	
	$post->pperfil($mysqli);
	
	
	
?></div>
