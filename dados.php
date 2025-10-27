<?php
header('Content-Type: application/json');
include 'conexao.php'; // usa o arquivo que você já tem

// Exemplo: pega perguntas e avaliações da tabela 'respostas'
$sql = "SELECT
        SUM(cursos LIKE '%Multimeios%') AS Multimeios,
        SUM(cursos LIKE '%Design%') AS Design,
        SUM(cursos LIKE '%Informática%') AS Informatica,
        SUM(cursos LIKE '%Administração%') AS Administracao,
        SUM(cursos LIKE '%Engenharia%') AS Engenharia,
        SUM(cursos LIKE '%Medicina%') AS Medicina,
        SUM(cursos LIKE '%Arquitetura%') AS Arquitetura
    FROM questionario;";
$result = $conn->query($sql);

$dados = [];
while ($row = $result->fetch_assoc()) {
    $dados[] = $row;
}

// envia o resultado em formato JSON
echo json_encode($dados, JSON_UNESCAPED_UNICODE);
?>
