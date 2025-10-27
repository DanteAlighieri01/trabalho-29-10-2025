<?php
include 'conecta.php';

// Buscar todos os cursos do banco
$sql = "SELECT cursos FROM questionario";
$resultado = mysqli_query($conn, $sql);

// Todas as opções de cursos (iguais aos valores do formulário)
$opcoes = [
    'informática' => 0,
    'mídia e multimeios' => 0,
    'marketing' => 0,
    'arte e cultura' => 0,
    'empreendedorismo' => 0,
    'vendas' => 0,
    'administração' => 0,
    'agronomia' => 0
];

// Contar cada curso
while ($row = mysqli_fetch_assoc($resultado)) {
    $respostas = explode(',', $row['cursos']); // separar por vírgula
    foreach ($respostas as $resposta) {
        $resposta = trim(mb_strtolower($resposta)); // normaliza letras e acentos
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
<title>Gráfico de Cursos Mais Escolhidos</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Curso', 'Quantidade', { role: 'style' }],
    <?php
    $cores = ['#4CAF50','#2196F3','#FFC107','#FF5722','#9C27B0','#009688','#E91E63','#795548'];
    $i = 0;
    foreach ($opcoes as $curso => $qtd) {
        echo "['".ucwords($curso)."', $qtd, '".$cores[$i]."'],";
        $i++;
    }
    ?>
  ]);

  var options = {
    chart: {
      title: 'Cursos mais escolhidos pelos jovens',
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
