<?php include("cabecalho.php"); 
include("conecta.php");
include("banco-plataforma.php");
include("banco-genero.php");
include("logica-usuario.php");

verificaUsuario();

$game = array("nome" => "", "genero_id" => "", "descricao" => "", "plataforma_id" => "");
$status = "";
$generos = listaGeneros($conexao);
$plataformas = listaPlataformas($conexao);
?> 
					
<h1>Formulário de game</h1>
<form action="adiciona-game.php" method="post">			
<table class="table">
					
<?php include("game-formulario-base.php"); ?>					

<tr>
<td>
	<button class="btn btn-primary" type="submit">Cadastrar</button>
</td>
</tr>	
</table>
</form>
					
<?php include("rodape.php"); ?>