<?php
include 'conecta.php'; // Inclui a conexão com o banco ($conn)

// Buscar todas as respostas de "esportes" no banco
$sql = "SELECT esportes FROM questionario";
$resultado = mysqli_query($conn, $sql);

if (!$resultado) {
    die("Erro ao consultar banco: " . mysqli_error($conn));
}

// Todas as opções possíveis de esportes (inicialmente zero)
$opcoes = [
    'futebol' => 0,
    'volei' => 0,
    'skate' => 0,
    'dança' => 0,
    'musculacao' => 0,
    'arte/cultura' => 0,
    'bmx' => 0,
    'outro' => 0
];

// Contar cada resposta
while ($row = mysqli_fetch_assoc($resultado)) {
    // Caso haja múltiplas respostas separadas por vírgula
    $respostas = explode(',', $row['esportes']);
    foreach ($respostas as $resposta) {
        $resposta = trim(strtolower($resposta));
        if (isset($opcoes[$resposta])) {
            $opcoes[$resposta]++;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Gráfico de Esportes</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Esporte', 'Quantidade', { role: 'style' }],
        <?php
        $cores = ['#4CAF50','#2196F3','#FFC107','#FF5722','#9C27B0','#009688','#E91E63','#795548'];
        $i = 0;
        foreach ($opcoes as $esporte => $qtd) {
            $label = ucfirst(str_replace(['/','_'], [' ',''], $esporte));
            echo "['$label', $qtd, '".$cores[$i]."'],";
            $i++;
        }
        ?>
    ]);

    var options = {
        title: 'Esportes preferidos pelos jovens',
        chartArea: {width:'70%'},
        hAxis: {title:'Quantidade de respostas', minValue:0},
        vAxis: {title:'Esporte'},
        legend: { position: 'none' },
        backgroundColor: 'transparent'
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('barchart'));
    chart.draw(data, options);
}
</script>
</head>
<body style="display:flex;justify-content:center;align-items:center;height:100vh;">
<div id="barchart" style="width:900px; height:500px;"></div>
</body>
</html>
