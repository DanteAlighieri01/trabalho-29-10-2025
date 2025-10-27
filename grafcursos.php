<?php
include 'conecta.php';

// Buscar todos os cursos do banco
$sql = "SELECT cursos FROM questionario";
$resultado = mysqli_query($conn, $sql);

// Todas as opções de cursos
$opcoes = ['Informática'=>0,'Mídia e Multimeios'=>0,'Marketing'=>0,'Arte e Cultura'=>0,'Empreendedorismo'=>0,'Vendas'=>0,'Administração'=>0,'Agronomia'=>0];

// Contar cada curso
while($row = mysqli_fetch_assoc($resultado)){
    $respostas = explode(',', $row['cursos']); // separar por vírgula
    foreach($respostas as $resposta){
        $resposta = trim($resposta);
        if(isset($opcoes[$resposta])){
            $opcoes[$resposta]++;
        }
    }
}
?>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Gráfico de Interesse por Curso</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Curso', 'Quantidade', { role: 'style' }],
        <?php
        $cores = ['#4CAF50','#2196F3','#FFC107','#FF5722','#9C27B0','#009688','#E91E63','#795548'];
        $i=0;
        foreach($opcoes as $curso=>$qtd){
            echo "['$curso', $qtd, '".$cores[$i]."'],";
            $i++;
        }
        ?>
    ]);

    var options = {
        title: 'Interesse por Curso',
        chartArea: {width:'70%'},
        hAxis: {title:'Quantidade de Respostas', minValue:0},
        vAxis: {title:'Cursos'},
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
