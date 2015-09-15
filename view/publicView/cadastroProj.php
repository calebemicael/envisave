<?php require 'conexao.php';
 require 'classes/projeto.class.php';

if(!empty($_POST['cadastrar']) && !empty($_POST['nome']) && !empty($_POST['integr']) && !empty($_POST['desc']) && !empty($_POST['problem'])
	 && !empty($_POST['just'])  && !empty($_POST['obj'])){
	$proj = new projeto (NULL, null, $_POST['integr'], $_POST['nome'], $_POST['desc'], $_POST['problem'], $_POST['just'], $_POST['obj']);
	$proj->insere($mysqli);
}
?>
<form name='cadastro' action='cadastroProj.php' method='POST'>
	Nome: <input type='text' name='nome' value='<?php if(!empty($_POST['cadastrar']) && !empty($_POST['nome']))	echo $_POST['nome']; ?>'/><?php if (!empty($_POST['cadastrar']) && empty($_POST['nome'])) echo '*Informe Nome!';?><br/><br>
		
	Descrição: <br><textarea rows="6" cols="70" name="desc"><?php if(!empty($_POST['cadastrar']) && !empty($_POST['desc'])) echo $_POST['desc'];
	?></textarea><?php if(!empty($_POST['cadastrar']) && empty($_POST['desc'])) echo '*Informe descrição!';?><br><br>
		
	Integrantes: <br><textarea rows="6" cols="70" name="integr"><?php if(!empty($_POST['cadastrar']) && !empty($_POST['integr'])) echo $_POST['integr']; 
	?></textarea><?php if(!empty($_POST['cadastrar']) && empty($_POST['integr'])) echo '*Informe integrantes!';?><br><br>
	
	Problema: <br><textarea rows="6" cols="70" name="problem"><?php if(!empty($_POST['cadastrar']) && !empty($_POST['problem'])) echo $_POST['problem']; 
	?></textarea><?php if(!empty($_POST['cadastrar']) && empty($_POST['problem'])) echo '*Informe problema!';?><br><br>
	
	Justificativa: <br><textarea rows="6" cols="70" name="just"><?php if(!empty($_POST['cadastrar']) && !empty($_POST['just'])) echo $_POST['just']; 
	?></textarea><?php if(!empty($_POST['cadastrar']) && empty($_POST['just'])) echo '*Informe justificativa!';?><br><br>
	
	Objetivo: <br><textarea rows="6" cols="70" name="obj"><?php if(!empty($_POST['cadastrar']) && !empty($_POST['obj'])) echo $_POST['obj']; 
	?></textarea><?php if(!empty($_POST['cadastrar']) && empty($_POST['obj'])) echo '*Informe objetivo!';?><br><br>
	
	<input type='submit' name='cadastrar' value='Cadastrar'/>
</form>
 