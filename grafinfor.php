<?php
include 'conecta.php';

// Buscar todas opções de como informar os jovens
$sql = "SELECT informar FROM questionario";
$resultado = mysqli_query($conn, $sql);

// Todas as opções de informar
$opcoes = ['redes_socias'=>0,'escola'=>0,'e-mail'=>0,'whatsapp'=>0,'outros'=>0];

// Contar cada opção
while($row = mysqli_fetch_assoc($resultado)){
    $respostas = explode(',', $row['informar']); // separar por vírgula
    foreach($respostas as $resposta){
        $resposta = trim($resposta);
        if(isset($opcoes[$resposta])){
            $opcoes[$resposta]++;
        }
    }
}
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
          ['2014', 1000, 400, 200],
          ['2015', 1170, 460, 250],
          ['2016', 660, 1120, 300],
          ['2017', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Como informar os jovens',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>
