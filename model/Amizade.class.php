<?php
 include_once PATH_ROOT.'/persist/conexao.php';

class Amizade{
	private $idAmizade;
        private $idUsu1;
        private $idUsu2;
	
	
	public function __construct($_idAmizade="", $_idUsu1="", $_idUsu2=""){
		$this->idAmizade = $_idAmizade;
		$this->idUsu1 = $_idUsu1;
		$this->idUsu2 = $_idUsu2;
        }
        function getIdAmizade(){
		return $this->idAmizade;
	}
        
	function setId($_idAmizade){
		$this->id = $_idAmizade;
	}
         function getIdU1(){
		return $this->idUsu1;
	}
        function setId($_idU1){
		$this->idUsu1 = $_idU1;
	}
         function getIdU2(){
		return $this->idUsu2;
	}
        function setIdU3($_idU2){
		$this->idUsu2 = $_idU2;
	}
        
        // funcao load
        
        
        function save(){
		global $mysqli;
		$query = "insert into amizade values ('$this->idAmizade', '$this->idusuario1', '$this->idUsuario2')";
		mysql_query($query,$mysqli);
		return (mysql_affected_rows($mysqli) == 1);
	}
        
}