<?php
session_start();
include_once 'headLo.html';
require "conexao.php";
require 'classes/usuario.class.php'; ?><div id='corpoLo'>

<div id='quad'><br><h2>Destaques</h2>
 <div id='p1'><div id='pi'><img class='proj' src='images/pet.jpg'/></div>IPet</div>
 <div id='p2'><div id='pi'><img class='proj' src='images/wc.jpg'/></div>WaterCare</div>
 <div id='p3'><div id='pi'><BR><img class='projE' src='images/eco.jpg'/></div>Ecotecno</div>
 <img class='seta' src='images/seta.png'/>
 </div><br><BR><BR>
<div id='quad'><BR><h2>Novos</h2>
 <div id='p1'><div id='pi'><img class='projE' src='images/logo.jpg'/></div>catarse</div>
 <div id='p2'><div id='pi'><img class='proj' src='images/pet.jpg'/></div>IPet</div>
 <div id='p3'><div id='pi'><BR><img class='projE' src='images/eco.jpg'/></div>Ecotecno</div>
 <img class='seta' src='images/seta.png'/>
</div><br><BR><BR>

<div id='quad'><p id='login'>
  <form name="log" action="login.php#login" method="POST"><div id='log'>
	<BR><h2>Identifique-se:</h2></p><table>
	<tr><td>Usuário:</td><td><input type="text" name="nome"/></td></tr>
	<tr><td>Senha:</td><td><input type="password" name="senha"/></td></tr>
    <tr><td><input type="submit" name='enviar' value="Entrar"/></td></tr>
  </div></form>
</table><br><?php
if(!empty($_POST['enviar'])){
	if (!empty($_POST['nome']) && !empty($_POST['senha'])){
		$usr = new Usuario(null, $_POST['nome'], null,null,$_POST['senha'],null,null,null,null, null);
		if($usr->login($mysqli))
			header('location:index.php');
	} else echo '<h2>Por favor, preencha os campos corretamente';
} ?></div></div></body></html>
