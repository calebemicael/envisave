<?php
class Projeto{
	private $id;
	private $nome;
	private $idpessoa;
	private $integrantes;
	private $descricao;
	private $problem;
	private $justif;
	private $obj;
	
	public function __construct($_id, $_nome, $_idpessoa, $_integrantes, $_descricao, $_problem, $_justif, $_obj){
		$this->id = $_id;
		$this->nome = $_nome;
		$this->idpessoa = $_idpessoa;
		$this->integrantes = $_integrantes;
		$this->descricao = $_descricao;
		$this->problem = $_problem;
		$this->justif = $_justif;
		$this->obj = $_justif;
	}
	
	function getId(){
		return $this->id;
	}
	function setId($_id){
		$this->id = $_id;
	}
	
	function getNome(){
		return $this->nome;
	}
	function setNome($_nome){
		$this->nome = $_nome;
	}
	
	function getIdpessoa(){
		return $this->idpessoa;
	}
	function setIdpessoa($_idpessoa){
		$this->idpessoa = $_idpessoa;
	}	
	
	function getIntegrantes(){
		return $this->integrantes;
	}
	function setIntegrantes($_integrantes){
		$this->integrantes = $_integrantes;
	}
	
	function getDescricao(){
		return $this->descricao;
	}
	function setDescricao($_descricao){
		$this->descricao = $_descricao;
	}
	
	function getProblem(){
		return $this->problem;
	}
	function setProblem($_problem){
		$this->problem = $_problem;
	}
	
	function getObj(){
		return $this->obj;
	}
	function setObj($_obj){
		$this->obj = $_obj;
	}
	
	function getJust(){
		return $this->justif;
	}
	function setJust($_justif){
		$this->justif = $_justif;
	}
	function insere($mysqli){
		$q = "insert into projeto values (null, 1, '$this->integrantes', '$this->nome', '$this->descricao', '$this->problem', '$this->justif', '$this->obj')";
		$mysqli->query($q);
		if ($mysqli->affected_rows == 1)
			header ('location:index.php');
		else echo 'Erro!'.$mysqli->error;
	}
	
	function altera($mysqli){
		$q = "update projeto set integrantes = '$this->integrantes', nome = '$this->nome', descricao = '$this->descricao', problema = '$this->problem', justificativa = '$this->justif', objetivo = '$this->obj' where idprojeto=$this->id";
		$mysqli->query($q);
		if ($mysqli->query($q)){
			header ('location:index.php');
		}else echo 'erro '.$mysqli->error;
	}
	
	function deleta($mysqli){
		$q = "delete from projeto where idprojeto = $this->id";
		$mysqli->query($q);
		if($mysqli->query($q))
			header ('location:index.php');
		else	echo 'Erro: ' . $mysqli->error;
	}
	
	function valores($mysqli){
		$q = "select * from projeto where idprojeto = $this->id";
		$res = $mysqli->query($q);
		$linha = $res->fetch_array();
		return $linha;
	}
	
	function procura($mysqli, $busca){
		$q = "select * from projeto where nome like '%$busca%' or descricao like '%$busca%'";
		$res = $mysqli->query($q);
		echo '<table>';
		if ($res->num_rows){
		while ($linha = $res->fetch_array()){
			echo '<tr><td>'.$linha['nome']." - ".
			 $linha['descricao'].'</td>';
			echo '<td><a href=deleta.php?id='.$linha['idprojeto'].'>Excluir</a></td>';
			echo '<td><a href=alteraProj.php?id='.$linha['idprojeto'].'>Alterar</a></td></tr>';
		} echo '</table>';}
		else echo "Nenhum resultado encontrado para busca<BR><BR>";}
}?>