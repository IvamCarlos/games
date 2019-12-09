<?php	
	function listaGames($conexao) {
		$games = array();
		$resultado = mysqli_query($conexao, "SELECT g.*, e.genero as genero_nome, p.plataforma as plataforma_nome
		FROM tbl_games AS g
		JOIN tbl_generos AS e ON g.genero_id = e.id
		JOIN tbl_plataformas AS p ON g.plataforma_id = p.id where status = true ORDER BY nome ASC");
	
		while($game = mysqli_fetch_assoc($resultado)) {
			array_push($games, $game);
		}

    	return $games;
	}
	
	function listaGamesNaoConcluidos($conexao){
		$games = array();
		$resultado = mysqli_query($conexao, "SELECT g.*, e.genero as genero_nome, p.plataforma as plataforma_nome
		FROM tbl_games AS g
		JOIN tbl_generos AS e ON g.genero_id = e.id
		JOIN tbl_plataformas AS p ON g.plataforma_id = p.id where status = false ORDER BY nome ASC");

		while($game = mysqli_fetch_assoc($resultado)) {
			array_push($games, $game);
		}

    	return $games;
	}
	
	function alteraGame($conexao, $id, $nome, $genero_id, $descricao, $plataforma_id, $status) {
		$query = "update tbl_games set nome = '{$nome}', genero_id = {$genero_id}, descricao = '{$descricao}', 
		plataforma_id = {$plataforma_id}, status = {$status} where id = '{$id}'";
		return mysqli_query($conexao, $query);
	}
	
	function buscaGame($conexao, $id) {
		$query = "select * from tbl_games where id = {$id}";
		$resultado = mysqli_query($conexao, $query);
		return mysqli_fetch_assoc($resultado);
	}
	
	function insereGame($conexao, $nome, $genero_id, $descricao, $plataforma_id, $status) {
		$query = "insert into tbl_games (nome, genero_id, descricao, plataforma_id, status) values ('{$nome}', {$genero_id}, '{$descricao}', {$plataforma_id}, {$status})";
		$resultadoDaInsercao = mysqli_query($conexao, $query);
		return $resultadoDaInsercao;
	}
	
	function removeGame($conexao, $id) {
		$query = "delete from tbl_games where id = {$id}";
		return mysqli_query($conexao, $query);
	}

    function filtrarGameConcluido($conexao, $pesquisar) {
		
		$games = array();
		$resultado = mysqli_query($conexao, "SELECT g.*, e.genero as genero_nome, p.plataforma as plataforma_nome
		FROM tbl_games AS g
		JOIN tbl_generos AS e ON g.genero_id = e.id
		JOIN tbl_plataformas AS p ON g.plataforma_id = p.id where status = true and nome LIKE '%$pesquisar%'");

		while($game = mysqli_fetch_assoc($resultado)) {
			array_push($games, $game);
		}

		return $games;
	}
	
	function filtrarGameNaoConcluido($conexao, $pesquisar) {
		
		$games = array();
		$resultado = mysqli_query($conexao, "SELECT g.*, e.genero as genero_nome, p.plataforma as plataforma_nome
		FROM tbl_games AS g
		JOIN tbl_generos AS e ON g.genero_id = e.id
		JOIN tbl_plataformas AS p ON g.plataforma_id = p.id where status = false and nome LIKE '%$pesquisar%'");

		while($game = mysqli_fetch_assoc($resultado)) {
			array_push($games, $game);
		}

		return $games;
	}
    
?>	