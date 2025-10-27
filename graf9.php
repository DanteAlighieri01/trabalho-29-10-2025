<?php
include 'conecta.php';

// Buscar todas as opções de como informar os jovens
$sql = "SELECT informar FROM questionario";
$resultado = mysqli_query($conn, $sql);

// Todas as opções de informar (iguais às do formulário)
$opcoes = [
    'redes sociais' => 0,
    'escola' => 0,
    'email' => 0,
    'whatsapp' => 0,
    'outros' => 0
];

// Contar cada opção
while ($row = mysqli_fetch_assoc($resultado)) {
    $respostas = explode(',', $row['informar']);
    foreach ($respostas as $resposta) {
        $resposta = trim(strtolower($resposta)); // normaliza letras
        if (isset($opcoes[$resposta])) {
            $opcoes[$resposta]++;
        }
    }
}

mysqli_close($conn);
?>

<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Gráfico - Como informar os jovens</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Forma de Informação', 'Quantidade', { role: 'style' }],
          <?php
          $cores = ['#4CAF50','#2196F3','#FFC107','#FF5722','#9C27B0'];
          $i = 0;
          foreach ($opcoes as $informar => $qtd) {
              echo "['$informar', $qtd, '".$cores[$i]."'],";
              $i++;
          }
          ?>
        ]);

        var options = {
          chart: {
            title: 'Como os jovens preferem ser informados',
          },
          bars: 'horizontal',
          backgroundColor: 'transparent',
          legend: { position: 'none' }
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body style="display:flex;justify-content:center;align-items:center;height:100vh;">
    <div id="barchart_material" style="width:900px; height:500px;"></div>
  </body>
</html>
