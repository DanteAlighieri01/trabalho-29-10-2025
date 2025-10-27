<?php
include 'conecta.php'; // Certifique-se que conecta.php cria $conn corretamente

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os campos
    $cursos = isset($_POST['cursos']) ? implode(',', $_POST['cursos']) : '';
    $interesse = $_POST['interesse'] ?? '';
    $horarios = $_POST['horarios'] ?? '';
    $espaco_esportivo = $_POST['espaco_esportivo'] ?? '';
    $conteudo = $_POST['conteudo'] ?? '';
    $conhece = $_POST['conhece'] ?? '';
    $informar = $_POST['informar'] ?? '';
    $esportes = isset($_POST['esportes']) ? implode(',', $_POST['esportes']) : '';
    $musica = isset($_POST['musica']) ? implode(',', $_POST['musica']) : '';

    // Validação mínima
    if (empty($espaco_esportivo) || empty($informar)) {
        echo "<p style='color:red;text-align:center;'>Por favor, preencha todos os campos obrigatórios.</p>";
        exit;
    }

    // Prepared statement (seguro contra SQL Injection)
    $stmt = $conn->prepare("
        INSERT INTO questionario 
        (cursos, interesse, horarios, espaco_esportivo, conteudo, conhece, informar, esportes, musica)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    if (!$stmt) {
        die("Erro ao preparar SQL: " . $conn->error);
    }

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

    if ($stmt->execute()) {
        echo "<script>
        alert('Questionario realizado com sucesso!');
        window.location.href='index.php';
    </script>";
    } else {
        echo "<p style='color:red;text-align:center;'>Erro ao salvar: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>
