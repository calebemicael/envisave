<?php
include_once PATH_ROOT.'/persist/conexao.php';
class Administrador{	
	private $id;
	private $nome;
	private $mail;
	private $senha;
	private $foto;
	
	public function	__construct($_id, $_nome, $_mail, $_senha, $_foto){
		$this->id = $_id;
		$this->nome = $_nome;
		$this->mail = $_mail;
		$this->senha = $_senha;
		$this->foto = $_foto;
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
	
	function getMail(){
		return $this->mail;
	}
	function setMail($_mail){
		$this->mail = $_mail;
	}
	
	function getSenha(){
		return $this->senha;
	}
	function setSenha($_senha){
		$this->senha = $_senha;
	}
	
	function getFoto(){
		return $this->foto;
	}
	function setFoto($_foto){
		$this->foto = $_foto;
	}
	
	function login($mysqli){
		$q = "select nome from adm where nome like '$this->nome' and senha like '$this->senha'";
		$res=mysql_query($q);echo $q.'<br><BR>'.$res;
		if ($res->num_rows){
			$_SESSION["login"] = $this->nome ;
			setcookie("tempo","existe",time()+10*60);
			return TRUE;   }
		else echo "Usuario ou senha incorreto";
	}
	
	function insere($mysqli){
		$q = "insert into adm values (null, '$this->nome', '$this->mail', '$this->senha', '$this->foto')";
		$mysqli->query($q);
		if ($mysqli->affected_rows == 1)
			echo 'ui';//header ('location:index.php');
		else echo 'Erro!'.$mysqli->error;
	}
	
	function altera($mysqli){
		$q = "update pessoa set nome = '$this->nome', email = '$this->mail', senha = '$this->senha',  foto = '$this->foto' where idadm=$this->id";
		$mysqli->query($q);
		if ($mysqli->query($q)){
			header ('location:index.php');
		}else echo 'erro '.$mysqli->error;
	}
	
	function deleta($mysqli){
		$q = "delete from pessoa where idadm = $this->id";
		$mysqli->query($q);
		if($mysqli->query($q))
			header ('location:index.php');
		else	echo 'Erro: ' . $mysqli->error;
	}
	
	function valores($mysqli){
		$q = "select * from pessoa where idadm = $this->id";
		$res = $mysqli->query($q);
		$linha = $res->fetch_array();
		return $linha;
	}
		
	public function lista($mysqli){
		$q = 'select * from Pessoa';
		$res = $mysqli->query($q);
		echo '<table>';
		while ($linha = $res->fetch_array())
			echo '<tr><td>'.$linha['nome']. '</td>
				 <td><a href=deleta.php?id='.$linha['idPessoa'].'>Excluir</a></td>
				  <td><a href=altera.php?id='.$linha['idPessoa'].'>Alterar</a></td></tr>';
		echo '</table>';
	}
	
	function procuraUsu($mysqli, $busca){
		$q = "select * from Pessoa where nome like '%$busca%' or endereco like '%$busca%' or cidade like '%$busca%'";
		$res = $mysqli->query($q);
		echo '<table>';
		if ($res->num_rows){
		while ($linha = $res->fetch_array()){
			echo '<tr><td>'.$linha['nome']." - ".
			 $linha['endereco']." - ".
			 $linha['cidade'].'</td>';
			echo '<td><a href=deleta.php?id='.$linha['idPessoa'].'>Excluir</a></td>';
			echo '<td><a href=altera.php?id='.$linha['idPessoa'].'>Alterar</a></td></tr>';
		} echo '</table>';}
		else echo "Nenhum resultado encontrado para busca<BR><BR>";}

        static function load($login){
		global $mysqli;
		$q = "SELECT * FROM  `administrador` WHERE nome =  'calebe'";
		$result = mysql_query($q,$mysqli);
		if(!empty($result)){
			$linha = mysql_fetch_array($result);
			$admin = new Admin();
			$admin->setNome($linha['nome']);
			$admin->setMail($linha['mail']);
			$admin->setSenha($linha['senha']);
                        $admin->setFoto($linha['foto']);
			return $admin;
		}else{
			return null;
		}
	}  
        function save(){
		global $mysqli;
		$query = "insert into adm values ('$this->idAdm', '$this->nome', '$this->email', '$this->senha')";
		mysql_query($query,$mysqli);
		return (mysql_affected_rows($mysqli) == 1);
	}
                  
                
    }
?>