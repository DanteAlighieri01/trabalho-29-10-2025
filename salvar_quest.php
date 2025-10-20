<?php
include 'conecta.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura dos dados do formulário
    $nome     = $_POST['nome'] ?? '';
    $idade    = $_POST['idade'] ?? '';
    $genero   = $_POST['genero'] ?? '';
    $mail    = $_POST['mail'] ?? '';
    $celular = $_POST['celular'] ?? '';
    $cep      = $_POST['cep'] ?? '';
    $cpf      = $_POST['cpf'] ?? '';
    $login    = $_POST['login'] ?? '';
    $senha    = $_POST['senha'] ?? '';
    $situacao = $_POST['situacao'] ?? '';
    $interesse = $_POST['interesse'] ?? '';
    $conheceu_sejuc = $_POST['conheceu_sejuc'] ?? '';

    // Verifica se o nome e o CPF foram preenchidos
    if (empty($nome) || empty($cpf)) {
        echo "<script>alert('Preencha todos os campos obrigatórios!'); history.back();</script>";
        exit();
    }

    // Verifica se já existe registro
    $check = $conn->prepare("SELECT * FROM cadastro WHERE nome = ? AND cpf = ?");
    $check->bind_param("ss", $nome, $cpf);
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
        (nome, idade, genero, mail, celular, cep, cpf, login, senha, ocupacao, interesse, conheceu_sejuc)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $sql->bind_param("sissssssssss", 
        $nome, $idade, $genero, $mail, $celular, $cep, $cpf, $login, $senha, $situacao, $interesse, $conheceu_sejuc
    );

    if ($sql->execute()) {
        echo "<script>
            alert('Cadastro realizado com sucesso!');
            window.location.href='questionario.php';
        </script>";
    } else {
        echo "<script>
            alert('Não foi possível cadastrar o jovem!');
            window.location.href='web_sejuc.php';
        </script>";
    }

    $conn->close();
} else {
    // Se o arquivo for acessado diretamente sem POST
    echo "<script>alert('Acesso inválido. Por favor, use o formulário.'); window.location.href='web_sejuc.php';</script>";
}
?>
