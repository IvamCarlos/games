<?php
//Iniciando a sessão
session_start();
function usuarioEstaLogado(){
	return isset($_SESSION['usuario_logado']);
}

function verificaUsuario(){
if(!usuarioEstaLogado()){
	$_SESSION['danger'] = "Você não tem acesso a essa funcionalidade";
	header("Location: index.php");
	die();
	}		
}

function usuarioLogado(){
	return $_SESSION['usuario_logado'];
}

function logaUsuario($email){
	$_SESSION['usuario_logado'] = $email;
}

function logout(){
	//deslogar sessão do usuário
	//unset($_SESSION['usuario_logado']);
	//Destruir sessão do usuário todas variáveis vão embora
	session_destroy();
	//Criando uma nova sessão
	session_start();
}

?>