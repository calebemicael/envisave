<?php
include_once PATH_ROOT.'/persist/conexao.php';

class Usuario{
	private $id;
	private $nome;
	private $ende;
	private $mail;
	private $senha;
	private $cidade;
	private $estado;
	private $pais;
	private $foto;
	
	public function __construct($_id="", $_nome="", $_mail="", $_ende="", $_senha="", $_cidade="", $_estado="", $_pais=""){
		$this->id = $_id;
		$this->nome = $_nome;
		$this->ende = $_ende;
		$this->mail = $_mail;
		$this->senha = $_senha;
		$this->cidade = $_cidade;
		$this->estado = $_estado;
		$this->pais = $_pais;
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
	
	function getEnde(){
		return $this->ende;
	}
	function setEnde($_ende){
		$this->ende = $_ende;
	}	
	
	function getMail(){
		return $this->mail;
	}
	function setMail($_mail){
		$this->mail = $_mail;
	}
	
	public function getSenha(){
		return $this->senha;
	}
	
	function setSenha($_senha){
		$this->senha = $_senha;
	}
	
	function getCidade(){
		return $this->cidade;
	}
	function setCidade($_cidade){
		$this->cidade = $_cidade;
	}
	
	function getEstado(){
		return $this->estado;
	}
	function setEstado($_estado){
		$this->estado = $_estado;
	}
	
	function getPais(){
		return $this->pais;
	}
	function setPais($_pais){
		$this->pais = $_pais;
	}
	
	function insere($mysqli){
		$q = "insert into Usuario values (null, '$this->nome', '$this->mail', '$this->senha', '$this->ende', '$this->cidade', '$this->estado', '$this->pais')";
		$mysqli->query($q);
		if ($mysqli->affected_rows == 1){
			$q2="select * from Usuario where nome='$this->nome' and senha='$this->senha'";
			$res = $mysqli->query($q2); 
			if($res->num_rows){
				$l = $res->fetch_array();
				$_SESSION['login']=$l['idUsuario'];
				setcookie("tempo","existe",time()+60*60);
			}
		}else echo 'Erro!'.$mysqli->error;
	}
	
	function altera($mysqli){
		$q = "update Usuario set nome = '$this->nome', endereco = '$this->ende', email = '$this->mail', senha = '$this->senha', cidade = '$this->cidade', estado = '$this->estado', pais = '$this->pais' where idUsuario=$this->id";
		$mysqli->query($q);
		if ($mysqli->query($q)){
			header ('location:index.php');
		}else echo 'erro '.$mysqli->error;
	}
	
	function deleta($mysqli){
		$q = "delete from Usuario where idUsuario = $this->id";
		$mysqli->query($q);
		if($mysqli->query($q))
			header ('location:index.php');
		else	echo 'Erro: ' . $mysqli->error;
	}
	
	function valores($mysqli){
		$q = "select * from Usuario where idUsuario = $this->id";
		$res = $mysqli->query($q);
		$linha = $res->fetch_array();
		return $linha;
	}
	
	function procura($mysqli, $busca){
		$q = "select * from Usuario where nome like '%$busca%' or endereco like '%$busca%' or cidade like '%$busca%'";
		$res = $mysqli->query($q);
		echo "<div id='corpe'>";
		if ($res->num_rows)
			while ($linha = $res->fetch_array()){
				echo "<br><div id='post'><table><tr><td>".$linha['nome']." - ".
				$linha['endereco']." - ".
				$linha['cidade'].'</td>';
				echo '<td><a href=perfil.php?id='.$linha['idusuario'].'>Ver</a></td></tr>';
				echo '</table></div>';}
		else echo "Nenhum resultado encontrado para busca<BR><BR></div>";}
						
	function login($mysqli){
		$q = "select * from Usuario where nome='$this->nome' and senha='$this->senha'";
		$res = $mysqli->query($q); 
		if($res->num_rows){
			$l = $res->fetch_array();
			$_SESSION['login']=$l['idUsuario'];
			setcookie("tempo","existe",time()+60*60);
			return true;
		} else echo "<h2>Usuario e/ou senha incorreto(s)!<BR>"; 
	}	
	
	function tipo($mysqli, $t1, $t2, $t3, $t4){
		$q="insert into tipo values (null, $t1, $t2, $t3, $t4, $t4)";
		$mysqli->query($q);
		header ('location:index.php');}
	
		
	static function load($login){
		global $mysqli;
		$q = "SELECT * FROM  `usuario` WHERE nome =  '$login'";
		$result = mysql_query($q,$mysqli);
		if(!empty($result)){
			$linha = mysql_fetch_array($result);
			$usr = new Usuario();
			$usr->setNome($linha['nome']);
			$usr->setCidade($linha['cidade']);
			$usr->setEstado($linha['estado']);
			$usr->setMail($linha['email']);
			$usr->setSenha($linha['senha']);
			return $usr;
		}else{
			return null;
		}
	}
	
	function save(){
		global $mysqli;
		$query = "insert into usuario values ('$this->id', '$this->nome', '$this->mail', '$this->senha','$this->ende', '$this->cidade', '$this->estado','$this->pais')";
		mysql_query($query,$mysqli);
		return (mysql_affected_rows($mysqli) == 1);
	}
	
	static function listar($busca){
			global $mysqli;
			$q = "select * from usuario where nome like '%$busca%' or endereco like '%$busca%' or cidade like '%$busca%'";
			$res = mysql_query($q, $mysqli);
			$lista = array();
			if (!empty($res)){
					while ($linha = mysql_fetch_array($res)){
						$usr = Usuario::load($linha['nome']);
						$lista[] = $usr;
					}
					//print_r($lista);
					return $lista;
			}
			else{
				return $lista;
			}
	}
}
	
?>
