<?php session_start();
require "conexao.php";
require "classes/adm.class.php";

if(!empty($_GET['id']))
$_SESSION['id'] = $_GET['id'];

$adm1 = new Adm($_SESSION['id'], NULL, NULL, NULL, null, null, null, null, null);
$vet = $adm1->valores($mysqli);
if(!empty($_POST['alt'])){
	$usr = new Usuario($_SESSION['id'], $_POST['nome'], $_POST['integrantes'], $_POST['descricao']);
	$usr->alteraAdm($mysqli);
	session_destroy();
}

?>
<form name='alterar' action='alteraProj.php' method='POST'>
	Nome: <input type='text' name='nome' value="<?php echo $vet['nome']; ?>"/><br>
	Integrantes: <input type='text' name='integrantes' value='<?php echo $vet['integrantes']; ?>'/><br>
	Descrição: <input type='text' name='descricao' value='<?php echo $vet['descricao']; ?>'/><br>
	<input type='submit' name='alt' value='Alterar'/><br>
</form>

