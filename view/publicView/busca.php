<?php
require 'classes/usuario.class.php';
require 'conexao.php';
include 'head.html';
require 'sessao_cookie.php';
require 'nau.php';?>

<form action="busca.php" method="POST" name="busca">
    <div id='busca'><input class='p' type="text" name="pesquisa"/>
    <input type='submit' name='enviarPesq' value='Pesquisar'/></div></form>

<?php if(!empty($_POST['enviarPesq']) && !empty($_POST['pesquisa'])){
	$busca=$_POST['pesquisa'];
	$usr = new usuario(null, null, null, null, null, null, null, null, null, null);
	$usr->procura($mysqli, $busca);	
}?>