<?php
include 'conecta.php';

// Consulta todos os CEPs do banco
$sql = "SELECT cep FROM cadastro";
$resultado = mysqli_query($conn, $sql);

if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conn));
}

// ------------------------------------------------------------------
// NOVO: Criamos um array para contar quantas pessoas há em cada bairro
// ------------------------------------------------------------------
$contagem_bairros = [];

// Loop para cada CEP encontrado no banco
while ($linha = mysqli_fetch_assoc($resultado)) {

    // ------------------------------------------------------------------
    // PASSO 1: Definir o CEP
    // ------------------------------------------------------------------
    // Aqui, deves substituir este valor estático pela variável
    // que contém o CEP vindo do teu banco de dados.
    $cep = str_replace(["-", "."], "", $linha['cep']);

    // NOTA: O ViaCEP espera o CEP sem traços ou pontos.
    // Se o teu CEP do banco vier formatado (ex: 01001-000),
    // deves limpá-lo primeiro.


    // ------------------------------------------------------------------
    // PASSO 2: Construir o URL da API
    // ------------------------------------------------------------------
    // Concatenamos o URL base do ViaCEP com o CEP que queremos consultar.
    $url = "https://viacep.com.br/ws/{$cep}/json/";


    // ------------------------------------------------------------------
    // PASSO 3: Fazer a Requisição HTTP
    // ------------------------------------------------------------------
    // file_get_contents() acede ao URL e retorna o conteúdo (o JSON)
    // como uma string.
    // Usamos @ para suprimir erros caso o URL falhe, pois
    // vamos tratar o erro manualmente logo abaixo.
    $json_data = @file_get_contents($url);

    // Verificação de erro: Se $json_data for 'false', a requisição falhou
    // (ex: API offline ou CEP com formato inválido que a API não reconheceu)
    if ($json_data === false) {
        echo "Erro ao tentar aceder ao ViaCEP. Verifique o CEP ou a sua conexão.<br>";
        continue;
    }


    // ------------------------------------------------------------------
    // PASSO 4: Interpretar (Decodificar) o JSON
    // ------------------------------------------------------------------
    // json_decode() transforma a string JSON numa estrutura PHP.
    // O parâmetro 'true' faz com que ele crie um "array associativo"
    // (ex: $dados['logradouro']), o que é mais fácil de usar.
    // Se não usasses 'true', ele criaria um objeto (ex: $dados->logradouro).
    $dados_endereco = json_decode($json_data, true);

    // Verificação de erro: Se o JSON for inválido, $dados_endereco será NULL.
    if ($dados_endereco === null) {
        echo "Erro ao decodificar o JSON recebido.<br>";
        continue;
    }


    // ------------------------------------------------------------------
    // PASSO 5: Aceder e Usar os Dados
    // ------------------------------------------------------------------
    // O ViaCEP retorna um 'erro' = true se o CEP não for encontrado.
    if (isset($dados_endereco['erro']) && $dados_endereco['erro'] === true) {

        echo "CEP não encontrado na base de dados do ViaCEP.<br>";

    } else {

        // Se tudo deu certo, os dados estão no array!
        "<h3>Dados encontrados para o CEP: {$cep}</h3>";
        
        // Agora podes usar os dados como quiseres.
        // (Por exemplo, para guardar no banco de dados ou mostrar ao utilizador)
        
        "Logradouro: " . $dados_endereco['logradouro'] . "<br>";
        "Complemento: " . $dados_endereco['complemento'] . "<br>";
        "Bairro: " . $dados_endereco['bairro'] . "<br>";
        "Localidade: " . $dados_endereco['localidade'] . "<br>"; // Cidade
        "UF: " . $dados_endereco['uf'] . "<br>";               // Estado
        "IBGE: " . $dados_endereco['ibge'] . "<br>";
        "SIAFI: " . $dados_endereco['siafi'] . "<br><hr>";

        // ------------------------------------------------------------------
        // NOVO: Contar quantas pessoas há em cada bairro
        // ------------------------------------------------------------------
        // Se o ViaCEP retornar o bairro, usamos ele como chave no array.
        $bairro = $dados_endereco['bairro'] ?: 'Não identificado';

        if (!isset($contagem_bairros[$bairro])) {
            $contagem_bairros[$bairro] = 0;
        }

        // Cada CEP representa uma pessoa
        $contagem_bairros[$bairro]++;
    }
}
?>

<!-- ------------------------------------------------------------------
     ETAPA FINAL: GERAR O GRÁFICO COM GOOGLE CHARTS
     ------------------------------------------------------------------ -->
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      // ------------------------------------------------------------------
      // Carrega o pacote de gráficos da Google (corechart)
      // ------------------------------------------------------------------
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        // ------------------------------------------------------------------
        // Cria a tabela de dados para o gráfico, com duas colunas:
        // 1️⃣ Nome do bairro
        // 2️⃣ Quantidade de pessoas
        // ------------------------------------------------------------------
        var data = google.visualization.arrayToDataTable([
          ['Bairro', 'Quantidade de Pessoas'],
          <?php
          // Gera as linhas de dados em JavaScript com base no PHP
          foreach ($contagem_bairros as $bairro => $quantidade) {
              echo "['" . addslashes($bairro) . "', " . $quantidade . "],";
          }
          ?>
        ]);

        // ------------------------------------------------------------------
        // Configurações visuais do gráfico
        // ------------------------------------------------------------------
        var options = {
          title: 'Distribuição de Pessoas por Bairro (ViaCEP)',
          pieHole: 0.4, // Gera o formato "rosca"
          legend: { position: 'right' },
          chartArea: { width: '80%', height: '80%' },
          backgroundColor: '#f8f9fa'
        };

        // ------------------------------------------------------------------
        // Desenha o gráfico dentro da div "donutchart"
        // ------------------------------------------------------------------
        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body style="font-family: Arial;">
    <h2 style="text-align:center;">📊 Pessoas por Bairro (dados obtidos via CEP)</h2>
    <p style="text-align:center;">O gráfico abaixo mostra a contagem de pessoas agrupadas por bairro obtido pela API ViaCEP.</p>
    <div id="donutchart" style="width: 900px; height: 500px; margin: 0 auto;"></div>
  </body>
</html>
