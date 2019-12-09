<?php 
    include("cabecalho.php");
    include("conecta.php");
    include("banco-game.php");
    include("logica-usuario.php");

    $id = $_GET['id'];
    removeGame($conexao, $id);
    $_SESSION['success'] = "Game removido com sucesso!";
    header("Location: game-lista.php");
    die();
?>

<p class="text-success">Game <?=$id;?> removido!</p>

<?php
    include("rodape.php");
?>