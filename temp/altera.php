<?php session_start();
require "conexao.php";
require "classes/usuario.class.php";

if(!empty($_GET['id']))
$_SESSION['id'] = $_GET['id'];

$usr1 = new Usuario($_SESSION['id'], NULL, NULL, NULL, null, null, null, null, null);
$vet = $usr1->valores($mysqli);
if(!empty($_POST['alt'])){
	$usr = new Usuario($_SESSION['id'], $_POST['nome'], $_POST['ende'], $_POST['mail'], 'jk', 'kj', 'jk', 'll');
	$usr->altera($mysqli);
	session_destroy();
}

?>
<form name='alterar' action='altera.php' method='POST'>
	Nome: <input type='text' name='nome' value="<?php echo $vet['nome']; ?>"/><br>
	Endereço: <input type='text' name='ende' value='<?php echo $vet['endereco']; ?>'/><br>
	Senha: <input type='text' name='mail' value='<?php echo $vet['email']; ?>'/><br>
	<input type='submit' name='alt' value='Alterar'/><br>
</form>

