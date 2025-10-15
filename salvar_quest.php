<?php
// Conexão com o banco de dados
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "teste";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
  die("Erro de conexão: " . $conn->connect_error);
}

// Recebe e decodifica os dados vindos do JS
$interesses = json_decode($_POST['interesses'], true);

// Transforma o array em string para armazenar (ex: "esporte,musica,cultura")
$interesses_str = implode(',', $interesses);

// Exemplo de insert no banco
$sql = "INSERT INTO usuarios_interesses (interesses) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $interesses_str);

if ($stmt->execute()) {
  echo "Dados salvos com sucesso!";
} else {
  echo "Erro ao salvar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
