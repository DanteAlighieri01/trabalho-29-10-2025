<?php

// ------------------------------------------------------------------
// PASSO 1: Definir o CEP
// ------------------------------------------------------------------
// Aqui, deves substituir este valor estático pela variável
// que contém o CEP vindo do teu banco de dados.
// Ex: $cep = $linha_do_banco['cep'];
// 
// Vamos usar o exemplo que deste.
$cep = "87083420";

// NOTA: O ViaCEP espera o CEP sem traços ou pontos.
// Se o teu CEP do banco vier formatado (ex: 01001-000),
// deves limpá-lo primeiro.
// Podes fazer assim:
// $cep = str_replace("-", "", $cep_do_banco);
// $cep = str_replace(".", "", $cep);


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
    echo "Erro ao tentar aceder ao ViaCEP. Verifique o CEP ou a sua conexão.";
    // Aqui podes decidir o que fazer, como parar o script.
    exit;
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
    echo "Erro ao decodificar o JSON recebido.";
    exit;
}


// ------------------------------------------------------------------
// PASSO 5: Aceder e Usar os Dados
// ------------------------------------------------------------------
// O ViaCEP retorna um 'erro' = true se o CEP não for encontrado.
if (isset($dados_endereco['erro']) && $dados_endereco['erro'] === true) {
    
    echo "CEP não encontrado na base de dados do ViaCEP.";

} else {

    // Se tudo deu certo, os dados estão no array!
    echo "<h3>Dados encontrados para o CEP: {$cep}</h3>";
    
    // Agora podes usar os dados como quiseres.
    // (Por exemplo, para guardar no banco de dados ou mostrar ao utilizador)
    
    echo "Logradouro: " . $dados_endereco['logradouro'] . "<br>";
    echo "Complemento: " . $dados_endereco['complemento'] . "<br>";
    echo "Bairro: " . $dados_endereco['bairro'] . "<br>";
    echo "Localidade: " . $dados_endereco['localidade'] . "<br>"; // Cidade
    echo "UF: " . $dados_endereco['uf'] . "<br>";               // Estado
    echo "IBGE: " . $dados_endereco['ibge'] . "<br>";
    echo "SIAFI: " . $dados_endereco['siafi'] . "<br>";

    // Exemplo de como guardar numa variável:
    // $rua_do_usuario = $dados_endereco['logradouro'];
    // $cidade_do_usuario = $dados_endereco['localidade'];
}

?>