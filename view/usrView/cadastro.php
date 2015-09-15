<?php require 'conexao.php';
 require 'classes/Usuario.class.php';
 
if(!empty($_POST['cadastrar']) && !empty($_POST['nome']) && !empty($_POST['mail']) && !empty($_POST['ende']) && !empty($_POST['senha'])
	 && !empty($_POST['city'])  && !empty($_POST['state'])  && !empty($_POST['pais'])){
	$usr = new Usuario (NULL, $_POST['nome'],$_POST['ende'],$_POST['mail'], $_POST['senha'], $_POST['city'], $_POST['state'], $_POST['pais'], 1);
	$usr->insere($mysqli);
}
?>
<form name='cadastro' action='cadastro.php' method='POST'>
	Nome: <input type='text' name='nome' value='<?php if(!empty($_POST['cadastrar']) && !empty($_POST['nome']))	echo $_POST['nome']; 
	elseif (!empty($_POST['cadastrar']) && empty($_POST['nome'])) echo '*Informe Nome!';?>'/><br/>
		
	Endereço: <input type='text' name='ende' value='<?php if(!empty($_POST['cadastrar']) && !empty($_POST['ende'])) echo $_POST['ende'];
	elseif (!empty($_POST['cadastrar']) && empty($_POST['ende'])) echo '*Informe Endereço!';?>'/><br/>
		
	E-mail: <input type='text' name='mail' value='<?php if(!empty($_POST['cadastrar']) && !empty($_POST['mail'])) echo $_POST['mail']; 
	elseif (!empty($_POST['cadastrar']) && empty($_POST['mail'])) echo '*Informe email!';?>'/><br/>
	
	Senha: <input type='password' name='senha' value='<?php if(!empty($_POST['cadastrar']) && !empty($_POST['senha'])) echo $_POST['senha']; 
	elseif (!empty($_POST['cadastrar']) && empty($_POST['senha']))?>'/><? echo '*Informe Senha!';?><br/>
	
	Cidade: <input type='text' name='city' value='<?php if(!empty($_POST['cadastrar']) && !empty($_POST['city'])) echo $_POST['city']; 
	elseif (!empty($_POST['cadastrar']) && empty($_POST['city'])) echo '*Informe cidade!';?>'/><br/>
	
	Estado: <input type='text' name='state' value='<?php if(!empty($_POST['cadastrar']) && !empty($_POST['state'])) echo $_POST['state']; 
	elseif (!empty($_POST['cadastrar']) && empty($_POST['state'])) echo '*Informe estado!';?>'/><br/>
	
	País: <input type='text' name='pais' value='<?php if(!empty($_POST['cadastrar']) && !empty($_POST['pais'])) echo $_POST['pais']; 
	elseif (!empty($_POST['cadastrar']) && empty($_POST['pais'])) echo '*Informe pais!';?>'/><br/>
	
	<!-- Foto: <input type='file' name='mail' value='<?php/* if(!empty($_POST['cadastrar']) && !empty($_POST['mail'])) echo $_POST['mail']; 
	elseif (!empty($_POST['cadastrar']) && empty($_POST['mail'])) echo '*Informe email!';*/?>'/><br/> !-->
	
	<input type='submit' name='cadastrar' value='Cadastrar'/>
</form>
 