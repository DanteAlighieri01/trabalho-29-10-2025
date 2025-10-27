<?php
include 'conecta.php'; // Inclui a conexão com o banco ($conn)

// Buscar todas as respostas de "musica" no banco
$sql = "SELECT musica FROM questionario";
$resultado = mysqli_query($conn, $sql);

if (!$resultado) {
    die("Erro ao consultar banco: " . mysqli_error($conn));
}

// Todas as opções possíveis de música (inicialmente zero)
$opcoes = [
    'pop' => 0,
    'sertanejo' => 0,
    'funk' => 0,
    'hiphop' => 0,
    'rock' => 0,
    'eletronica' => 0,
    'gospel' => 0,
    'internacional' => 0,
    'outro' => 0
];

// Contar cada resposta
while ($row = mysqli_fetch_assoc($resultado)) {
    // Caso haja múltiplas respostas separadas por vírgula
    $respostas = explode(',', $row['musica']);
    foreach ($respostas as $resposta) {
        $resposta = trim(strtolower(str_replace([' ', '/'], ['',''], $resposta)));
        // Garantir correspondência com a chave do array
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
<title>Gráfico de Estilos Musicais</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Estilo Musical', 'Quantidade', { role: 'style' }],
        <?php
        $cores = ['#4CAF50','#2196F3','#FFC107','#FF5722','#9C27B0','#009688','#E91E63','#795548','#607D8B'];
        $i = 0;
        foreach ($opcoes as $musica => $qtd) {
            $label = ucfirst(str_replace('_',' ', $musica));
            echo "['$label', $qtd, '".$cores[$i]."'],";
            $i++;
        }
        ?>
    ]);

    var options = {
        title: 'Estilos musicais preferidos pelos jovens',
        chartArea: {width:'70%'},
        hAxis: {title:'Quantidade de respostas', minValue:0},
        vAxis: {title:'Estilo Musical'},
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
