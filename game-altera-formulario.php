<?php include("cabecalho.php"); 
include("conecta.php");
include("banco-plataforma.php");
include("banco-genero.php");
include("banco-game.php");
include("logica-usuario.php");

verificaUsuario();

$id = $_GET['id'];
$game = buscaGame($conexao, $id);
$generos = listaGeneros($conexao);
$plataformas = listaPlataformas($conexao);
$status = $game['status'] ? "checked='checked'" : "";
?>            
    <h1>Alterando game</h1>
    <form action="altera-game.php" method="post">
        <input type="hidden" name="id" value="<?=$game['id']?>">
        <table class="table">

        <?php include("game-formulario-base.php"); ?>
            <tr>
                <td>
                    <button class="btn btn-primary" type="submit">Alterar</button>
                </td>
            </tr>
        </table>
    </form>
<?php include("rodape.php"); ?>