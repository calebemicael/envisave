<html><meta charset='utf-8'></html>
<?php
	require 'conexao.php';
	require 'classes/adm.class.php';
	
	//$adm = new adm(null, 'sdrfspijg', 'juxxxxlio 8239', 'akjdsh@dkslk', 'abcd', 'ch', 'rs', 'brbr', 1);
	//$adm->insere($mysqli);
//	$adm = new adm(2, 'chananan', 'iroii !', 00244);
//	$adm->altera($mysqli);

if(!empty($_POST['enviar']) && !empty($_POST['pesquisa'])){
	$busca=$_POST['pesquisa'];
	$adm = new adm(null, null, null, null, null, null, null, null, null);
	$adm->procuraUsu($mysqli, $busca);	
	}?>
 
Pesquisar Usuarios<form action="index.php" method="POST" name="busca">
    <input class='p' type="text" name="pesquisa"/>
    <input type='submit' name='enviar' value='Pesquisar'/></form>
	
<?php
	$adm = new adm(null, null, null, null, null, null, null, null, null);	
	$adm->lista($mysqli);
?>
<BR><a href=cadastro.php>Cadastrar Administrador</a>
<BR><a href=alteradm.php>Alterar perfil</a>