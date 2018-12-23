<?php

include("conecta.php");
include("banco-game.php");
require_once __DIR__ . '/vendor/autoload.php';

$games = listaGames($conexao);

$pagina = "<h1>Relatório de games concluídos</h1><br>";

foreach($games as $game){
	$pagina .= "Nome: ".$game['nome']."<br>";
	$pagina .= "Gênero: ".utf8_encode($game['genero_nome'])."<br>";
	$pagina .= "Descrição: ".$game['descricao']."<br>";
	$pagina .= "Plataforma: ".$game['plataforma_nome']."<br>";
	$pagina .= "<hr size=50>";
} 

$arquivo = "relatorio_games_concluidos.pdf";

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($pagina);

$mpdf->Output($arquivo, "I");

exit();

?>