<?php
// Simulação de dados vindos do backend
$dados = [
    "grafico1" => [10, 20, 30, 40],
    "grafico2" => [5, 15, 25, 35],
    "grafico3" => [12, 18, 25, 32],
    "grafico4" => [22, 10, 40, 15],
    "grafico5" => [9, 17, 29, 23],
    "grafico6" => [14, 24, 18, 28],
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
    <meta charset="UTF-8">
    <title>Dashboard - Pesquisa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

<div class="container-fluid p-4">
    <h2 class="text-center mb-4">📊 Dashboard de Resultados</h2>
    
    <div class="row g-4">
        <!-- Gráfico 1 -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Gráfico 1</div>
                <div class="card-body">
                    <canvas id="grafico1"></canvas>
                </div>
            </div>
        </div>

        <!-- Gráfico 2 -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">Gráfico 2</div>
                <div class="card-body">
                    <canvas id="grafico2"></canvas>
                </div>
            </div>
        </div>

        <!-- Gráfico 3 -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">Gráfico 3</div>
                <div class="card-body">
                    <canvas id="grafico3"></canvas>
                </div>
            </div>
        </div>

        <!-- Gráfico 4 -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-danger text-white">Gráfico 4</div>
                <div class="card-body">
                    <canvas id="grafico4"></canvas>
                </div>
            </div>
        </div>

        <!-- Gráfico 5 -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">Gráfico 5</div>
                <div class="card-body">
                    <canvas id="grafico5"></canvas>
                </div>
            </div>
        </div>

        <!-- Gráfico 6 -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">Gráfico 6</div>
                <div class="card-body">
                    <canvas id="grafico6"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Respostas Abertas -->
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

<script>
    // Dados do PHP → JS
    const dados = <?= json_encode($dados) ?>;
</script>
<script src="js/chart-config.js"></script>
</body>
</html>
