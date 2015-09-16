<?php
include_once ("Usuario.class.php");

$usu = new Usuario;

$id-> setId('idUsuario');
$nome->setNome('nome');
$end->setEnde('endereco');
$email->setMail('email');
$pass->setSenha('senha');
$cidade->setCidade('cidade');
$estado->setEstado('estado');
$pais->setPais('pais');

function salva(){
   $query = "insert into Usuario values (null, '$id', '$nome', '$end', '$email', '$pass', '$cidade', '$pais')";
		$mysqli->query($query);
		if ($mysqli->affected_rows == 1){
			$q2="select * from Usuario where nome='$nome' and senha='$senha'";
			$res = $mysqli->query($q2); 
			if($res->num_rows){
				$l = $res->fetch_array();
				$_SESSION['login']=$l['idUsuario'];
				setcookie("tempo","existe",time()+60*60);
			}
		}else echo 'Erro!'.$mysqli->error;
	}






?>


