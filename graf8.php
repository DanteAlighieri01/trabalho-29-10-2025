<?php
include 'conecta.php';

$sim = 0;
$nao = 0;

// Corrige execução da query
$sql = "SELECT conhece FROM questionario";
$resultado = mysqli_query($conn, $sql);

// Corrige loop e nomes de variáveis
while ($row_interesse = mysqli_fetch_assoc($resultado)) {
    if (strtolower($row_interesse['conhece']) == "sim") {
        $sim++;
    } elseif (strtolower($row_interesse['conhece']) == "nao") {
        $nao++;
    }
}
?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Gráfico Para Saber se Conhecem a Sejuc</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Resposta', 'Quantidade'],
          ['Sim', <?= $sim ?>],
          ['Não', <?= $nao ?>]
        ]);

        var options = {
          title: 'Conhece',
          colors: ['#4CAF50', '#F44336'], // verde e vermelho
          pieHole: 0.4, // deixa em formato de rosca
          backgroundColor: 'transparent'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
