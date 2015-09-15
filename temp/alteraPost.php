<?php session_start();
require "conexao.php";
require "classes/post.class.php";

if(!empty($_GET['id']))
$_SESSION['id'] = $_GET['id'];

$post = new Post($_SESSION['id'], NULL, NULL, NULL);
$vet = $post->valores($mysqli);
if(!empty($_POST['alt'])){
	$post = new Post($_SESSION['id'], $_POST['p'], null, null);
	$post->altera($mysqli);
}
?>
<form name='alterar' action='alteraPost.php' method='POST'>
	Post:<br><textarea rows="5" cols="25" maxlength="500" name="p"><?php echo $vet['post']; ?></textarea><br>
	<input type='submit' name='alt' value='Alterar'/><br>
</form>

HUMANAS
EXATAS
BIOLOGICAS
E		ENGENHARIAS