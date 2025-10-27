<?php
// Conecta ao banco
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Salvar cursos como string separada por vírgula
    if(isset($_POST['cursos'])) {
        $cursos = implode(',', $_POST['cursos']);
    } else {
        $cursos = '';
    }

    // Outros campos
    $interesse = $_POST['interesse'] ?? '';
    $horarios = $_POST['horarios'] ?? '';
    $espaco_esportivo = $_POST['espaco_esportivo'] ?? '';
    $conteudo = $_POST['conteudo'] ?? '';
    $conhece = $_POST['conhece'] ?? '';
    $informar = $_POST['informar'] ?? '';

    // Exemplo para salvar esportes e música (opcional)
    $esportes = isset($_POST['esportes']) ? implode(',', $_POST['esportes']) : '';
    $musica = isset($_POST['musica']) ? implode(',', $_POST['musica']) : '';

    // Salvar no banco
    $sql = "INSERT INTO questionario 
        (cursos, interesse, horarios, espaco_esportivo, conteudo, conhece, informar, esportes, musica)
        VALUES
        ('$cursos', '$interesse', '$horarios', '$espaco_esportivo', '$conteudo', '$conhece', '$informar', '$esportes', '$musica')";
    mysqli_query($conn, $sql);

    echo "<p style='text-align:center;color:green;'>Resposta enviada com sucesso!</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>SEJUC / CONECTA JOVEM</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  .verde { background-color: #4682B4; color: white; padding: 10px 20px; display:flex; justify-content:space-between; align-items:center; }
  .card { max-width: 600px; margin: 30px auto; border-radius:12px; }
  form { padding: 20px 30px; }
  .form-check { margin:5px 0; margin-left:30px; }
  button { background-color:#4CAF50;color:white;padding:8px 20px;border:none;border-radius:25px;font-size:16px;cursor:pointer; }
  button:hover { background-color:#45a049; }
</style>
</head>
<body>
<div class="verde">
  <img src="imagens/link_gov.png" alt="Logo Governo" height="60">
  <img src="imagens/brasao_mga.png" alt="Brasão" height="60">
</div>

<div class="card shadow">
  <form method="POST" action="salvar_quest.php">
    <h6 class="text-center mt-3">Quais áreas você quer mais cursos?</h6>
    <?php
    $todos_cursos = ['Informática','Mídia e Multimeios','Marketing','Arte e Cultura','Empreendedorismo','Vendas','Administração','Agronomia'];
    foreach($todos_cursos as $curso){
        echo '<div class="form-check">
                <input class="form-check-input" type="checkbox" name="cursos[]" value="'.$curso.'">
                <label class="form-check-label">'.$curso.'</label>
              </div>';
    }
    ?>
    <div class="mt-4 text-center">
      <label>Você tem interesse em participar de cursos de capacitação profissional?</label>
      <select name="interesse" class="form-select">
        <option value="">Selecione</option>
        <option value="sim">Sim</option>
        <option value="nao">Não</option>
      </select>
    </div>
    <div class="mt-4 text-center">
      <label>Qual horário você prefere para cursos?</label>
      <select name="horarios" class="form-select">
        <option value="">Selecione</option>
        <option value="manha">Manhã</option>
        <option value="tarde">Tarde</option>
        <option value="noite">Noite</option>
      </select>
    </div>
    <div class="mt-4 text-center">
      <label>Que tipo de espaço esportivo você sente falta na sua região?</label>
      <input type="text" class="form-control" name="espaco_esportivo" required>
    </div>
    <div class="mt-4 text-center">
      <label>Que tipo de conteúdo você mais consome?</label>
      <select name="conteudo" class="form-select">
        <option value="">Selecione</option>
        <option value="filmes">Filmes</option>
        <option value="series">Séries</option>
        <option value="jogos">Jogos</option>
        <option value="redes sociais">Redes Sociais</option>
        <option value="outros">Outros</option>
      </select>
    </div>
    <div class="mt-4 text-center">
      <label>Você conhece algum projeto ou programa para jovens oferecido na cidade?</label>
      <select name="conhece" class="form-select" required>
        <option value="">Selecione</option>
        <option value="sim">Sim</option>
        <option value="nao">Não</option>
      </select>
    </div>
    <div class="mt-4 text-center">
      <label>Como você gostaria de ser informado(a) sobre projetos e oportunidades para jovens?</label>
      <select name="informar" class="form-select" required>
        <option value="">Selecione</option>
        <option value="redes sociais">Redes sociais</option>
        <option value="escola">Escola</option>
        <option value="email">E-mail</option>
        <option value="whatsapp">WhatsApp/Telegram</option>
        <option value="outros">Outros</option>
      </select>
    </div>
    <div class="mt-4 text-center">
      <button type="submit">ENVIAR</button>
    </div>
  </form>
</div>
</body>
</html>
