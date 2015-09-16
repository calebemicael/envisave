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
				case "create": $this->criarNovoUsuario(); break;
				case "profile":		$this->mostrarPaginaInicialDoUsuario();break;
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
		
		private function criarNovoUsuario(){
			$usr = new Usuario();
			$usr->setNome($_POST['nome']);
			$usr->setEnde($_POST['ende']);
			$usr->setCidade($_POST['city']);
			$usr->setEstado($_POST['state']);
			$usr->setPais($_POST['pais']);
			$usr->setMail($_POST['mail']);
			$usr->setSenha($_POST['senha']);
			if($usr->save()){
				header("location: ?a=profile");
			}else{
				echo "Deu problema, usuario duplicado..., whatever";
				$this->mostrarSignup();
			}
		}
		
		private function mostrarPaginaInicialDoUsuario(){
			include "view/usrView/home.view.php";
		}
		
		private function realizarLogin(){
			//include "view/publicView/perfil.php";
			if(!empty($_POST['enviar'])){
				$usr = Usuario::load($_POST['nome']);
				if(empty($usr)){
					echo '<h2>Usuario nao existe </h2>';
				}else{
					$senha_digitada = $_POST['senha'];
					if($usr->getSenha() == $senha_digitada){
						//TODO: salvar o objeto $usr na sessao.
						header("location: ?a=profile");
					}else{
						echo '<h2>Por favor, preencha os campos corretamente </h2>';
					}
				}
			}
		}
}


?>