<?php

function listaPlataformas($conexao) {
    $plataformas = array();
    $query = "select * from tbl_plataformas ORDER BY plataforma ASC";
    $resultado = mysqli_query($conexao, $query);
    while($plataforma = mysqli_fetch_assoc($resultado)) {
        array_push($plataformas, $plataforma);
    }
    return $plataformas;
}

?>