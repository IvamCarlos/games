<?php 
    include("cabecalho.php"); 
    include("conecta.php");
    include("banco-game.php");
    include("logica-usuario.php");

    verificaUsuario();

    $nome = $_POST['nome'];
    $genero_id = $_POST['genero_id'];
    $descricao = $_POST['descricao'];
    $plataforma_id = $_POST['plataforma_id'];

    if (array_key_exists('status', $_POST)) {
            $status = "true";
    } else { 
            $status = "false";
    }

    if(insereGame($conexao, $nome, $genero_id, $descricao, $plataforma_id, $status)) { ?>
        <p class="text-success">O game <?= $nome; ?> adicionado com sucesso!</p>
    <?php } else {
        $msg = mysqli_error($conexao);
    ?>
        <p class="text-danger">O game <?= $nome; ?> não foi adicionado: <?= $msg ?></p>
    <?php
        }
    ?>

<?php include("rodape.php"); ?>