<?php

function listaGeneros($conexao) {
    $generos = array();
    $query = "select * from tbl_generos ORDER BY genero ASC";
    $resultado = mysqli_query($conexao, $query);
    while($genero = mysqli_fetch_assoc($resultado)) {
        array_push($generos, $genero);
    }
    return $generos;
}

?>