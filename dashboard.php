<?php
// Simulação de dados (não usados no JS, só pra exibir respostas)
$dados = [
    "respostas" => [
        "Achei o conteúdo interessante e fácil de entender.",
        "Gostaria de mais exemplos práticos.",
        "O design da plataforma é agradável.",
        "Tive dificuldade na parte de login."
    ]
];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard - Pesquisa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>
        .chart-container {
            width: 100%;
            height: 400px;
        }
    </style>
</head>
<body class="bg-light">
<div class="container-fluid p-4">
    <h2 class="text-center mb-4">📊 Dashboard de Resultados</h2>
    
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Gráfico 1</div>
                <div class="card-body">
                    <?php
                    include 'graf1.php';
                    ?>
                    <div id="chart_div_1" class="chart-container"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">Gráfico 2</div>
                <div class="card-body">
                    <?php
                    include 'graf2.php';
                    ?>
                    <div id="piechart_2" class="chart-container"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">Gráfico 3</div>
                <div class="card-body">
                    <?php
                    include 'graf3.php';
                    ?>
                    <div id="piechart_3" class="chart-container"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-danger text-white">Gráfico 4</div>
                <div class="card-body">
                    <?php
                    include 'graf4.php';
                    ?>
                    <div id="barchart_material_4" class="chart-container"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">Gráfico 5</div>
                <div class="card-body">
                    <?php
                    include 'graf5.php';
                    ?>
                    <div id="columnchart_values_5" class="chart-container"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">Gráfico 6</div>
                <div class="card-body">
                    <?php
                    include 'graf6.php';
                    ?>
                    <div id="linechart_material_6" class="chart-container"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">🗒 Respostas Abertas</div>
            <div class="card-body" style="max-height: 300px; overflow-y: auto;">
                <?php foreach ($dados["respostas"] as $resposta): ?>
                    <div class="border-bottom py-2">
                        <?= htmlspecialchars($resposta) ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
