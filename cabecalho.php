<?php
error_reporting(E_ALL ^ E_NOTICE);
include("mostra-alerta.php"); ?>
<html>
<head>
    <title>Remember games finished</title>
	<meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" /> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/validator.min.js"></script>
</head>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Remember games finished</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="game-formulario.php">Adiciona game</a></li>
        <li><a href="game-lista.php">Games concluídos</a></li>
        <li><a href="game-lista-nao-concluidos.php">Games não concluídos</a></li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Relatório<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="relatorio_games_concluidos.php">Relatório de games concluídos</a></li>
            <li><a href="relatorio_games_nao_concluidos.php">Relatório de games não concluídos</a></li>
          </ul>
        </li>
		<li><a href="grafico.php">Gráfico</a></li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container">

        <div class="principal" align="center">