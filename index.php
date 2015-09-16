<?php
//session_start();
//require "conexao.php";
//require 'classes/usuario.class.php'; 
include_once './controller/globals.php';
include_once './controller/Controller.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<html>
    <head>
        <meta charset="UTF-8">
        <title>EnviSave</title>
				<link rel="stylesheet" href="css/es.css" type="text/css" media="all"/>
				<script src="js/jquery-1.11.3.js" type="text/javascript"></script>
				<script src="js/functions.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
					$controller = new Controller();
					if(isset($_GET['a'])){
						$controller->invoke($_GET['a']);	
					}else{
						$controller->invoke();
					}
					 
        
                                        // comentário bobo
                                        
        ?>
        
    </body>
</html>
