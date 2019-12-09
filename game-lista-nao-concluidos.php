<?php 
	include("cabecalho.php"); 
	include("conecta.php");
	include("banco-game.php"); 
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div class="input-group">
    <input type="text" class="form-control" placeholder="Pesquisar" name="pesquisar">
    <div class="input-group-btn">
      <button class="btn btn-primary" type="submit">
        Buscar
      </button>
    </div>
  </div>
</form>

<?php 
	$query = "select * from tbl_games where status = false";
	$resultado = mysqli_query($conexao, $query);
	$qtde = mysqli_num_rows($resultado);
	echo "<b>Jogos não concluídos: </b>".$qtde."<br>";
?>

<?php
	$games = array();
	//Receber o número da página
	$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
	$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
	//Setar a quantidade de itens por pagina
	$qnt_result_pg = 10;
		
	//calcular o inicio visualização
	$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
	
	$resultado = mysqli_query($conexao, "SELECT g.*, e.genero as genero_nome, p.plataforma as plataforma_nome
	FROM tbl_games AS g
	JOIN tbl_generos AS e ON g.genero_id = e.id
	JOIN tbl_plataformas AS p ON g.plataforma_id = p.id where status = false ORDER BY nome ASC LIMIT $inicio, $qnt_result_pg");

    while($game = mysqli_fetch_assoc($resultado)) {
        array_push($games, $game);
    }	
?>

<table class="table table-striped table-bordered">
<?php
	$pesquisar = $_POST['pesquisar'];
	$games = listaGamesNaoConcluidos($conexao);
	$busca = filtrarGameNaoConcluido($conexao, $pesquisar);

	if($pesquisar != null){
		foreach($busca as $game){ ?>

	<tr>
		<td><?= $game['nome'] ?></td>
		<td><?= utf8_encode($game['genero_nome']) ?></td>
		<td><?= substr($game['descricao'],0,40) ?></td>
		<td><?= $game['plataforma_nome'] ?></td>
		<td><a href="game-altera-formulario.php?id=<?=$game['id']?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a></td> 
		<td><a href="remove-game.php?id=<?= $game['id']?>"><span class="glyphicon glyphicon-trash text-danger" aria-hidden="true"></span></a></td>
	</tr>

<?php
}
?>
<?php }else{
	foreach($games as $game){ ?>

	<tr>
		<td><?= $game['nome'] ?></td>
		<td><?= utf8_encode($game['genero_nome']) ?></td>
		<td><?= substr($game['descricao'],0,40) ?></td>
		<td><?= $game['plataforma_nome'] ?></td>
		<td><a href="game-altera-formulario.php?id=<?=$game['id']?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a></td> 
		<td><a href="remove-game.php?id=<?= $game['id']?>"><span class="glyphicon glyphicon-trash text-danger" aria-hidden="true"></span></a></td>
	</tr>

<?php 
	}
} 

	if($pesquisar != $busca && $pesquisar != null && $game == null){ ?>
		<span class="text-info">Game não encontrado!</span>
<?php }
?> 
	
</table>

<?php
	//Paginção - Somar a quantidade de games
	$result_pg = "SELECT COUNT(*) AS num_result FROM tbl_games where status = false";
	$resultado_pg = mysqli_query($conexao, $result_pg);
	$row_pg = mysqli_fetch_assoc($resultado_pg);
	//echo $row_pg['num_result'];
	//Quantidade de pagina 
	$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
	//Limitar os link antes depois
	$max_links = 2;
	
?>

<nav aria-label="Navegação de página game-lista-nao-concluidos">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="game-lista-nao-concluidos.php?pagina=1">Primeira</a></li>
	<?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
		if($pag_ant >= 1){ ?>
    <li class="page-item"><a class="page-link" href="game-lista-nao-concluidos.php?pagina=<?=$pag_ant?>"><?php echo $pag_ant ?></a></li>
	<?php } } ?>
	<li class="page-item active"><a class="page-link" href="#"><?php echo $pagina ?><span class="sr-only"></span></a>
    </li>
	<?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
		if($pag_dep <= $quantidade_pg){ ?>
    <li class="page-item"><a class="page-link" href="game-lista-nao-concluidos.php?pagina=<?=$pag_dep?>"><?php echo $pag_dep ?></a></li>
	<?php } } ?>
    <li class="page-item"><a class="page-link" href="game-lista-nao-concluidos.php?pagina=<?=$quantidade_pg?>">Última</a></li>
  </ul>
</nav>
		

<?php include("rodape.php"); ?>