<?php
include 'conecta.php';

$manha = 0;
$tarde = 0;
$noite = 0;

// Corrige execução da query
$sql = "SELECT horarios FROM questionario";
$resultado = mysqli_query($conn, $sql);

// Corrige loop e nomes de variáveis
while ($row_horario = mysqli_fetch_assoc($resultado)) {
    if (strtolower($row_horario['horarios']) == "manha") {
        $manha++;
    } else if(strtolower($row_horario['horarios']) == "tarde") {
        $tarde++;
    } if ($row_horario['horarios'] == "noite"){
      $noite++;
    }
}
?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Gráfico de Horarios</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Resposta', 'Quantidade'],
          ['Manhã', <?= $manha ?>],
          ['Tarde', <?= $tarde ?>],
          ['Noite', <?= $noite ?>]
        ]);

        var options = {
          title: 'Interesse',
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
