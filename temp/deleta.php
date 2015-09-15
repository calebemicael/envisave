<?php require 'conexao.php';
 require 'classes/Usuario.class.php';
 require 'classes/post.class.php';

$post = new post ($_GET['id'], null, null, null);
$post->deleta($mysqli);

$proj = new projeto ($_GET['id'], NULL, NULL, NULL, NULL, NULL, NULL, NULL);
$proj->deleta($mysqli);
?>