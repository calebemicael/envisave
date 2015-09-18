<?php


include PATH_ROOT.'/model/ModelHub.php';

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
            case "profile": $this->mostrarPaginaInicialDoUsuario();break;
            case "busca": $this->buscaUsuario();break;
            case "post": $this->inserePostagem(); break;
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
    
    private function buscaUsuario(){
        $busca = $_POST['pesquisa'];
        $q = "select * from Usuario where nome like '%$busca%' or endereco like '%$busca%' or cidade like '%$busca%'";
        $res = $mysqli->query($q);
        echo "<div id='corpe'>";
        if ($res->num_rows)
            while ($linha = $res->fetch_array()){
                echo "<br><div id='post'><table><tr><td>".$linha['nome']." - ".
                     $linha['endereco']." - ".
                     $linha['cidade'].'</td>';
                echo '<td><a href=perfil.php?id='.$linha['idusuario'].'>Ver</a></td></tr>';
                echo '</table></div>';
            }
        else echo "Nenhum resultado encontrado para busca<BR><BR></div>";
    }
    
    private function inserePostagem(){
        $post = new Postagem();
        $post->setId(null);
        $post->setTexto($_POST['escrito']);
        $post->setData();
        $post->setIdusuario();
        if($post_>save())
            header("location: ?a=home");
        else{
            echo "eita";
            $this->mostrarPaginaInicial();
        } 
    }
} ?>