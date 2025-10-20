<?php
session_start();
include 'conecta.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura dos dados do formulário
    $cursos = $_POST['cursos'] ?? '';
    $interesse = $_POST['interesse'] ?? '';
    $horarios = $_POST['horarios'] ?? '';
    $esportes = $_POST['esportes'] ?? '';
    $espaco = $_POST['espaco_esportivo'] ?? '';
    $conteudo = $_POST['conteudo'] ?? '';
    $musica = $_POST['musica'] ?? '';
    $conhece = $_POST['conhece'] ?? '';
    $informar = $_POST['informar'] ?? '';
    // Verifica se o nome e o CPF foram preenchidos
    if (empty($cursos) || empty($informar) || empty($interesse) || empty($horarios) || empty($esportes) || empty($conteudo) || empty($musica) || empty($conhece)) {
        echo "<script>alert('Preencha todos os campos obrigatórios!'); history.back();</script>";
        exit();
    }

    // Verifica se já existe registro
    $check = $conn->prepare("SELECT * FROM questionario_cadastro WHERE id_cadastro = ? AND id_questionario = ?");
    $check->bind_param("ss", $id_cadastro, $id_questionario);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<script>
            alert('O jovem já existe em nossa base de dados!');
            window.location.href='web_sejuc.php';
        </script>";
        exit();
    }

    // Insere novo registro
    $sql = $conn->prepare("INSERT INTO cadastro 
        (cursos,interesse,horarios,esportes,espaco_esportivo,conteudo,musica,conhece,informar)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)");
       
    $sql->bind_param("sssssssss", 
    $cursos,$interesse,$horarios,$esportes,$espaco_esportivo,$conteudo,$musica,$conhece,$informar
    );

    if ($sql->execute()) {
        echo "<script>
            alert('Questionario realizado com sucesso!');
            window.location.href='web_sejuc.php';
        </script>";
    } else {
        echo "<script>
            alert('Não foi possível realizar o questionario!');
            window.location.href='web_sejuc.php';
        </script>";
    }

    $conn->close();
} else {
    // Se o arquivo for acessado diretamente sem POST
    echo "<script>alert('Acesso inválido.'); window.location.href='web_sejuc.php';</script>";
}
?>
