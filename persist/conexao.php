<?php
	
	$mysqli = mysql_connect($CONFIG['db_server'], $CONFIG['db_user'], $CONFIG['db_pass']) or die('Danosse');
	mysql_select_db($CONFIG['db_name'], $mysqli) or die('Danosse muito');
	//$mysqli = new mysqli('localhost', 'root', '12345', 'envis');
    /*if ($mysqli->connect_error) {
		die('Erro na Conexão (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);}
	echo 'Conexão efetuada com sucesso... ' . $mysqli->host_info . '<br>';
    $mysqli->query("SET NAMES 'utf8'");
    $mysqli->query('SET character_set_connection=utf8');
    $mysqli->query('SET character_set_client=utf8');
    $mysqli->query('SET character_set_results=utf8');*/
?>