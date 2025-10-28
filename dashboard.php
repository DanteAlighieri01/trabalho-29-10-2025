<?php
// ----------------------------------------------------------------------
// Simulação de dados (aqui não é usada no JS — apenas exemplo de variável)
// ----------------------------------------------------------------------
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
    <meta charset="utf-8">
    <title>SEJUC / CONECTA JOVEM</title>

    <!-- Bootstrap CSS e JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* ----------------------------------------
           Estilo geral do corpo e do cabeçalho
           ---------------------------------------- */
        body {
            background-color: #ffffff;
            color: black;
        }

        .contanier-head {
            background-color: #4682B4;  /* azul institucional */
            color: white;
        }

        /* ----------------------------------------
           Área dos gráficos (centralização e estilo)
           ---------------------------------------- */
        .grafs {
            max-width: 600px;        /* limita a largura máxima */
            margin: 30px auto;       /* centraliza o gráfico */
            border-radius: 12px;     /* deixa os cantos arredondados */
            background: #f8f9fa;     /* fundo leve */
            padding: 15px;
        }

        /* Melhor espaçamento entre os cards */
        .card {
            margin: 30px auto;
            width: 90%;
            border: none;
            border-radius: 10px;
            padding: 20px;
        }

        /* Cabeçalho do card com ícone */
        .card svg {
            vertical-align: middle;
            margin-right: 5px;
        }

        .card b {
            color: #00008B;
        }
    </style>
</head>

<body>
    <!-- ----------------------------------------------------------------
         CABEÇALHO COM LOGOTIPOS
         ---------------------------------------------------------------- -->
    <div class="contanier-head d-flex align-items-center justify-content-center position-relative py-3">
        <!-- Logo Governo (à esquerda) -->
        <img src="imagens/link_gov.png" alt="Logo Governo"
             style="position: absolute; left: 30px; top: 30px; width:190px; height:50px;">

        <!-- Imagem centralizada (Secretaria Juventude) -->
        <img src="imagens/secretaria_juventude.jpg" alt="Secretaria Juventude"
             style="width:880px; height:200px;">
    </div>

    <!-- ----------------------------------------------------------------
         TÍTULO DO DASHBOARD
         ---------------------------------------------------------------- -->
    <div class="container-fluid p-4">
        <h2 class="text-center mb-4">📊 Dashboard de Resultados</h2>
    </div>

    <!-- ----------------------------------------------------------------
         CARD 1 – GRÁFICO 1
         ---------------------------------------------------------------- -->
    <div class="card shadow">
        <div class="card-header bg-white border-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#00008B" class="bi bi-bar-chart-line" viewBox="0 0 16 16">
                <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1zm1 12h2V2h-2zm-3 0V7H7v7zm-5 0v-3H2v3z"/>
            </svg>
            <b> Gráfico 1 </b>
        </div>

        <div class="container">
            <div class="grafs">
                <?php
                // Inclui o primeiro gráfico (pode ser qualquer gráfico Google Charts, Chart.js etc.)
                include 'graf1.php';
                ?>
            </div>
        </div>
    </div>
    <!-- ----------------------------------------------------------------
         CARD 2 – GRÁFICO 2
         ---------------------------------------------------------------- -->
    <div class="card shadow">
        <div class="card-header bg-white border-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#00008B" class="bi bi-bar-chart-line" viewBox="0 0 16 16">
                <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1zm1 12h2V2h-2zm-3 0V7H7v7zm-5 0v-3H2v3z"/>
            </svg>
            <b> Gráfico 2 </b>
        </div>

        <div class="container">
            <div class="grafs">
                <?php
                // Inclui o segundo gráfico
                include 'graf2.php';
                ?>
            </div>
        </div>
    </div>
</body>
</html>
