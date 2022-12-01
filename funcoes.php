<?php
session_start();
// conectando ao banco

$GLOBALS['db_host'] = "localhost";
$GLOBALS['bd_usuario'] = "root";
$GLOBALS['bd_senha'] = "luquetes10";
$GLOBALS['bd'] = "sys";
// $GLOBALS['bd_senha'] = "luquetes10";
// $GLOBALS['bd'] = "sys";

function conexao_bd($tipo_bd){

	if($tipo_bd == 'mysql'){
		$mysqli = new mysqli($GLOBALS['db_host'], $GLOBALS['bd_usuario'], $GLOBALS['bd_senha']);
		// $mysqli = new mysqli('www.wodbrasil.com', $GLOBALS['bd_usuario'], $GLOBALS['bd_senha']);
	
		     if($mysqli->select_db($GLOBALS['bd'])){
       			// echo 'O banco dedaos '.$GLOBALS['bd'].' existe!<br>';
           }else{        
		        echo 'erro ao conectar no bd...';
           }


		// Caso algo tenha dado errado, exibe uma mensagem de erro
		if (mysqli_connect_errno()){
				trigger_error(mysqli_connect_error());
	   	}
	   	
		# Aqui está o segredo
		$mysqli->query("SET NAMES 'utf8'");
		$mysqli->query('SET character_set_connection=utf8');
		$mysqli->query('SET character_set_client=utf8');
		$mysqli->query('SET character_set_results=utf8');
		
		return $mysqli;
	}elseif ('postgres') {
			$con = pg_connect("host=".$GLOBALS['host']." port=".$GLOBALS['porta']." dbname=".$GLOBALS['bd']." user=".$GLOBALS['bd_usuario']." password=".$GLOBALS['bd_senha']);
		
			return $con;
	}
}

function s($var){
	echo '<pre>';
	if(is_array($var)){
		print_r($var);
	}else{
	  echo $var;
	}
	echo '</pre>';
}

function getUsuario($session_id){
    $_SESSION['session_id'];
    #consulta que traz o usuario
    #return $usuario
}

function getname($usuario){
    $_SESSION['usuario'] = $usuario;
}
?>