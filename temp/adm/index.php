<?php
/*session_start();
	require "conexao.php";
	require 'classes/adm.class.php';
	
if (!empty($_POST["usuario"]))
 $adm = ($_POST["usuario"]);
if (!empty($_POST["senha"]))
  $senhadm = ($_POST["senha"]);
if(!empty($adm) && !empty($senhadm)){
	$adm = new adm(null, null, null, null, null, null, null, null, null);

 if($adm->login($mysqli))
header("location: home.php");}
?>
<html><head><meta http-equiv="content-type" content="text/html" charset=utf-8/>
<link rel="stylesheet" href="proj.css" type="text/css" media="all"/></head>
<body>
<div id='log'><h2>Identifique-se</h2><table>
  <form name="adm" action="index.php" method="POST">
	<tr><td>Usuário:</td><td><input type="text" name="usuario"/></td></tr><tr><td></td></tr>
	<tr><td>Senha:</td><td><input type="password"name="senha"/></td></tr>
    <tr><td><input type="submit" value="Entrar"/></td></tr>
  </form>
</table><br></div></body>
</html>*/
header("location: home.php");?>