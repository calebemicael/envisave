<?php
class Postagem{
	private $id;
	private $data;
	private $texto;
	private $idusuario;

	function __construct($_id, $_texto, $_data, $_idusuario){
		$this->id = $_id;
		$this->data = $_data;
		$this->texto = $_texto;
		$this->idusuario = $_idusuario;
	}
	
	function getId(){
		return $this->id;
	}
	function setId($_id){
		$this->id = $_id;
	}
	
	function getData(){
		return $this->data;
	}
	function setData($_data){
		$this->data = $_data;
	}
	
	function getTexto(){
		return $this->texto;
	}
	function setTexto($_texto){
		$this->texto = $_texto;
	}
	
	function getIdusuario(){
		return $this->idusuario;
	}
	function setIdusuario($_idusuario){
		$this->idusuario = $_idusuario;
	}
	
	function insere($mysqli){
		$q = "insert into post values(null, '$this->texto', now(), $this->idusuario)";
		$mysqli->query($q);
		if ($mysqli->affected_rows == 1)
			header ('location:index.php');
		else echo 'Erro!'.$mysqli->error;
	}
	
	function altera($mysqli){ 
		$q = "update post set post = '$this->texto' where idpost=$this->id";
		$mysqli->query($q);
		if ($mysqli->query($q)){
		header ('location:index.php');
		}else echo 'erro '.$mysqli->error;
	}
	
	function deleta($mysqli){
		$q = "delete from post where idPost = $this->id";
		$mysqli->query($q);
		if($mysqli->query($q))
			header ('location:index.php');
		else	echo 'Erro: ' . $mysqli->error;
	}
	
	public function lista($mysqli){
		$q = "select * from post where idUsuario!=$this->idusuario order by data desc";
		$res = $mysqli->query($q);
		while ($linha = $res->fetch_array()){
			echo "<br><div id='post'>";
			echo '<table><tr><td>'.$linha['post']. '</td></tr>';
			echo '<tr><td>'.$linha['data']. '</td></tr>';
			echo '</table></div>';
		}
	}
			
	function valores($mysqli){
		$q = "select * from post where idpost = $this->id";
		$res = $mysqli->query($q);
		$linha = $res->fetch_array();
		return $linha;
	}
	
	public function pperfil($mysqli){
		$q = "select * from post where idUsuario=$this->idusuario order by data desc";
		$res = $mysqli->query($q);
		while ($linha = $res->fetch_array()){
			echo "<br><div id='post'>";
			echo '<table><tr><td>'.$linha['post']. '</td></tr>';
			echo '<tr><td>'.$linha['data']. '</td></tr>';
			echo "<tr><td><a class='fonte' href=deleta.php?id=".$linha['idPost'].'>Excluir</a>  ';
			echo "<a class='fonte' href=alteraPost.php?id=".$linha['idPost'].'>Alterar</a></td></tr>';
			echo '</table></div>';
		}
	}
}
?>