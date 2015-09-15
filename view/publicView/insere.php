<?php session_start();
require 'conexao.php';
 require 'classes/Usuario.class.php';
 include 'headLo.html';
$usr = new Usuario (NULL,null, null,null,null,null,null,null,null);
?><BR><BR><div id='corpoLo'><h2>Cadastre-se</h2></p>
<?php	
if(!empty($_POST['cadastrar']) && !empty($_POST['nome']) && !empty($_POST['mail']) && !empty($_POST['senha']) && !empty($_POST['ende'])
	 && !empty($_POST['city'])  && !empty($_POST['state'])  && !empty($_POST['pais'])){
	$usr = new Usuario (NULL, $_POST['nome'],$_POST['mail'],$_POST['ende'], $_POST['senha'], $_POST['city'], $_POST['state'], $_POST['pais']);
	$usr->insere($mysqli);
}
?>
<form name='cadastro' action='insere.php' method='POST'><table>
	<tr><td>Nome: </td><td><input type='text' name='nome' value='<?php if(!empty($_POST['cadastrar']) && !empty($_POST['nome']))	echo $_POST['nome']; 
	elseif (!empty($_POST['cadastrar']) && empty($_POST['nome'])) echo '*Informe Nome!';?>'/></td></tr>
		
	<tr><td>Endereço: </td><td><input type='text' name='ende' value='<?php if(!empty($_POST['cadastrar']) && !empty($_POST['ende'])) echo $_POST['ende'];
	elseif (!empty($_POST['cadastrar']) && empty($_POST['ende'])) echo '*Informe Endereço!';?>'/></td></tr>
	
	<tr><td>Cidade: </td><td><input type='text' name='city' value='<?php if(!empty($_POST['cadastrar']) && !empty($_POST['city'])) echo $_POST['city']; 
	elseif (!empty($_POST['cadastrar']) && empty($_POST['city'])) echo '*Informe cidade!';?>'/></td></tr>
	
	<tr><td>Estado: </td><td><input type='text' name='state' value='<?php if(!empty($_POST['cadastrar']) && !empty($_POST['state'])) echo $_POST['state']; 
	elseif (!empty($_POST['cadastrar']) && empty($_POST['state'])) echo '*Informe estado!';?>'/></td></tr>
	
	<tr><td>País: </td><td><input type='text' name='pais' value='<?php if(!empty($_POST['cadastrar']) && !empty($_POST['pais'])) echo $_POST['pais']; 
	elseif (!empty($_POST['cadastrar']) && empty($_POST['pais'])) echo '*Informe pais!';?>'/></td></tr>
	
	<tr><td>E-mail: </td><td><input type='text' name='mail' value='<?php if(!empty($_POST['cadastrar']) && !empty($_POST['mail'])) echo $_POST['mail']; 
	elseif (!empty($_POST['cadastrar']) && empty($_POST['mail'])) echo '*Informe email!';?>'/></td></tr>
	
	<tr><td>Senha: </td><td><input type='password' name='senha' value="<?php if(!empty($_POST['cadastrar']) && !empty($_POST['senha'])) echo $_POST['senha']; 
	elseif (!empty($_POST['cadastrar']) && empty($_POST['senha']))?>" /><?php echo '*Informe Senha!';?></td></tr>
	
	<tr><td>Você será o tipo de usuario...</td>
	<td> <input type='checkbox' name='t1'>Idealista</option>
	<?php if(!empty($_POST['cadastrar'])){
		if(isset($_POST['t1']))
		$t1=1;
	else $t1=0;} ?>
	<input type='checkbox' name='t2'>Financeiro</option>
	<?php if(!empty($_POST['cadastrar'])){
		if(isset($_POST['t2']))
		$t2=1;
	else $t2=0;	}?>
	<input type='checkbox' name='t3'>Burocracia</option>
	<?php if(!empty($_POST['cadastrar'])){
		if(isset($_POST['t3'])){
		$t3=1;echo $t3;}
	else $t3=0;	}?>
	<input type='checkbox' name='t4'>Desenvolvedor</option>
	<?php if(!empty($_POST['cadastrar'])){
		if(isset($_POST['t4']))
		$t4=1;
	else $t4=0;
	$usr->tipo($mysqli, $t1,$t2,$t3,$t4); }?></td></tr>
	<tr><td><input type='submit' name='cadastrar' value='Cadastrar'/></td></tr></table>
</form><BR><BR>
 