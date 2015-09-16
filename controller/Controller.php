<?php


include 'model/ModelHub.php';

class Controller {

    //public $model;

    public function __construct() {
        // inicializar aqui o que for necessario
    }
		
		public function invoke($acao="home") {
      switch($acao){
        case "home": $this->mostrarPaginaInicial(); break;
				case "login": $this->realizarLogin(); break;
				case "signup": $this->mostrarSignup(); break;
        default: $this->mostrarPaginaInicial();
      }
    }
		
		private function mostrarPaginaInicial(){
			include "view/publicView/home.view.php";
			include "view/publicView/login.view.php";
		}
		
		private function mostrarSignup(){
			include "view/publicView/signup.view.php";
		}
		
		private function realizarLogin(){
			//include "view/publicView/perfil.php";
			if(!empty($_POST['enviar'])){
				$usr = Usuario::load($_POST['nome']);
				if($usr != null){
					$senha_digitada = $_POST['senha'];
					if(trim($usr->getSenha()) == trim($senha_digitada)){
						//TODO: salvar o objeto $usr na sessao.
						include "view/usrView/home.view.php";
					}else{
						echo '<h2>Por favor, preencha os campos corretamente </h2>';
					}
				}else{
					echo '<h2>Usuario nao existe </h2>';
				}
			}
		}
		
		
}


?>