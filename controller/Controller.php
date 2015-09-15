<?php

include_once("../model/ModelHub.php");

class Controller {

    //public $model;

    public function __construct() {
        // inicializar aqui o que for necessario
    }
		
		public function invoke($acao="home") {
      switch($acao){
        case "home": $this->mostrarPaginaInicial(); break;
				case "login": $this->realizarLogin(); break;
        default: $this->mostrarPaginaInicial();
      }
    }
		
		private function mostrarPaginaInicial(){
			include "view/publicView/home.view.php";
			include "view/publicView/login.view.php";
		}
		
		private function realizarLogin(){
			//include "view/publicView/perfil.php";
			if(!empty($_POST['enviar'])){
				//if (!empty($_POST['nome']) && !empty($_POST['senha'])){
					//$usr = new Usuario(null, $_POST['nome'], null,null,$_POST['senha'],null,null,null,null, null);
					//if($usr->login($mysqli))
				//if(!empty($_POST['nome']) && !empty($_POST['senha']))
				$usr = Usuario::load($_POST['nome']);
				if($usr != null){
					$senha_digitada = $_POST['senha'];
					if($usr.getSenha()==$senha_digitada){
						//salva o objeto $usr na sessao.
						include "view/usrView/home.view.php";
					}else{
						echo '<h2>Por favor, preencha os campos corretamente';
					}
				}else{
					echo '<h2>Usuario nao existe';
				}
			}
		}
		
		
}


?>