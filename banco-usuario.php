<?php

	function buscaUsuario($conexao, $email, $senha){
		//MD5 para criptografar a senha no banco de dados e para se proteger de SQL Injection
		$senhaMD5 = md5($senha);
		//Portanto é importantíssimo validarmos a entrada de dados e limparmos ela de quaisquer caracteres que possam quebrá-la. Desejamos evitar que o usuário final possa inserir código sql dentro de nossa query, que ele não possa injetar SQL, que ele não possa fazer SQL Injection.
		//mysql_real_escape_string para tratar o SQL Injection
		$email = mysqli_real_escape_string($conexao, $email);
		$query = "select * from usuarios where email = '{$email}' and senha = '{$senhaMD5}'";
		$resultado = mysqli_query($conexao, $query);
		$usuario = mysqli_fetch_assoc($resultado);
		return $usuario;
	}

?>