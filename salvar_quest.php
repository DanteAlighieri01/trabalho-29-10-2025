<?php
include 'conecta.php'; // Conexão com o banco. $conn deve ser o mysqli

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Captura os campos do formulário
    $cursos = isset($_POST['cursos']) ? implode(',', $_POST['cursos']) : '';
    $interesse = $_POST['interesse'] ?? '';
    $horarios = $_POST['horarios'] ?? '';
    $espaco_esportivo = $_POST['espaco_esportivo'] ?? '';
    $conteudo = $_POST['conteudo'] ?? '';
    $conhece = $_POST['conhece'] ?? '';
    $informar = $_POST['informar'] ?? '';
    $esportes = isset($_POST['esportes']) ? implode(',', $_POST['esportes']) : '';
    $musica = isset($_POST['musica']) ? implode(',', $_POST['musica']) : '';

    // Validação mínima: campos obrigatórios
    if (empty($espaco_esportivo) || empty($conhece) || empty($informar)) {
        echo "<p style='color:red;text-align:center;'>Por favor, preencha todos os campos obrigatórios.</p>";
        exit;
    }

    // Prepared statement: seguro contra SQL Injection
    $stmt = $conn->prepare("
        INSERT INTO questionario 
        (cursos, interesse, horarios, espaco_esportivo, conteudo, conhece, informar, esportes, musica)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    if (!$stmt) {
        die("Erro ao preparar SQL: " . $conn->error);
    }

    // Vincula os parâmetros ao statement
    $stmt->bind_param(
        "sssssssss",
        $cursos,
        $interesse,
        $horarios,
        $espaco_esportivo,
        $conteudo,
        $conhece,
        $informar,
        $esportes,
        $musica
    );

    // Executa o statement
    if ($stmt->execute()) {
        // Sucesso: redireciona com alerta
        echo "<script>
        alert('Questionário realizado com sucesso!');
        window.location.href='index.php';
        </script>";
    } else {
        echo "<p style='color:red;text-align:center;'>Erro ao salvar: " . $stmt->error . "</p>";
    }

    // Fecha statement e conexão
    $stmt->close();
    $conn->close();
}
?>
