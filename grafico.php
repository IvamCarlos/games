<?php
include("conecta.php");
include("cabecalho.php");
include("banco-game.php");

$plataformas = listaGames($conexao);

$cont_plataforma_playstation = 0;
$cont_plataforma_playstation2 = 0;
$cont_plataforma_playstation3 = 0;
$cont_plataforma_xbox360 = 0;
$cont_plataforma_gbc = 0;
$cont_plataforma_gba = 0;
$cont_plataforma_snes = 0;
$cont_plataforma_nes = 0;
$cont_plataforma_wii = 0;
$cont_plataforma_gamecube = 0;
$cont_plataforma_3ds = 0;
$cont_plataforma_mega_drive = 0;
$cont_plataforma_nds = 0;
$cont_plataforma_psp = 0;
$cont_nao_informado = 0;

foreach($plataformas as $plataforma){

if($plataforma['plataforma_nome'] == "Playstation"){
	$cont_plataforma_playstation++;
}else if($plataforma['plataforma_nome'] == "Playstation 2"){
	$cont_plataforma_playstation2++;
}else if($plataforma['plataforma_nome'] == "Playstation 3"){
	$cont_plataforma_playstation3++;
}else if($plataforma['plataforma_nome'] == "XBOX 360"){
	$cont_plataforma_xbox360++;
}else if($plataforma['plataforma_nome'] == "PSP"){
	$cont_plataforma_psp++;
}else if($plataforma['plataforma_nome'] == "Nintendo DS"){
	$cont_plataforma_nds++;
}else if($plataforma['plataforma_nome'] == "Nintendo 3DS"){
	$cont_plataforma_3ds++;
}else if($plataforma['plataforma_nome'] == "Nintendo Wii"){
	$cont_plataforma_wii++;
}else if($plataforma['plataforma_nome'] == "Nintendo GameCube"){
	$cont_plataforma_gamecube++;
}else if($plataforma['plataforma_nome'] == "Game Boy Advance"){
	$cont_plataforma_gba++;
}else if($plataforma['plataforma_nome'] == "NES/Famicom"){
	$cont_plataforma_nes++;
}else if($plataforma['plataforma_nome'] == "Game Boy Color"){
	$cont_plataforma_gbc++;
}else if($plataforma['plataforma_nome'] == "Mega Drive/Genesis"){
	$cont_plataforma_mega_drive++;
}else if($plataforma['plataforma_nome'] == "Super Nintendo/Super Famicom"){
	$cont_plataforma_snes++;
}else{
	$cont_nao_informado++;
}
}
	
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Plataforma', 'Quantidade'],
          ['Playstation',     <?php echo $cont_plataforma_playstation ?>],
          ['Playstation 2',   <?php echo $cont_plataforma_playstation2 ?>],
          ['Playstation 3',   <?php echo $cont_plataforma_playstation3 ?>],
          ['XBOX 360',  	  <?php echo $cont_plataforma_xbox360 ?>],
		  ['PSP',  			  <?php echo $cont_plataforma_psp ?>],
		  ['Nintendo DS',     <?php echo $cont_plataforma_nds ?>],
          ['Nintendo Wii',    <?php echo $cont_plataforma_wii ?>],
          ['Nintendo 3DS',    <?php echo $cont_plataforma_3ds ?>],
          ['Nintendo GameCube',  <?php echo $cont_plataforma_gamecube ?>],
		  ['Game Boy Color',  <?php echo $cont_plataforma_gbc ?>],
		  ['Game Boy Advance',     <?php echo $cont_plataforma_gba ?>],
          ['NES/Famicom',     <?php echo $cont_plataforma_nes ?>],
          ['Mega Drive/Genesis',  <?php echo $cont_plataforma_mega_drive ?>],
          ['Super Nintendo/Super Famicom',  <?php echo $cont_plataforma_snes ?>],
		  ['Não Informado',  <?php echo $cont_nao_informado ?>],
        ]);

        var options = {
          title: 'Gráfico de games por plataforma'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>

<?php
include("rodape.php");
?>