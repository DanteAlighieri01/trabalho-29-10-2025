<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>SEJUC / CONECTA JOVEM</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  /* Cabeçalho azul com logos */
  .verde { background-color: #4682B4; color: white; padding: 10px 20px; display:flex; justify-content:space-between; align-items:center; }
  .card { max-width: 600px; margin: 30px auto; border-radius:12px; }
  form { padding: 20px 30px; }
  .form-check { margin:5px 0; margin-left:30px; }
  button { background-color:#4CAF50;color:white;padding:8px 20px;border:none;border-radius:25px;font-size:16px;cursor:pointer; }
  button:hover { background-color:#45a049; }
</style>
</head>
<body>

<!-- Cabeçalho com logos -->
<div class="verde">
  <img src="imagens/link_gov.png" alt="Logo Governo" height="60">
  <img src="imagens/brasao_mga.png" alt="Brasão" height="60">
</div>

<!-- Card do formulário -->
<div class="card shadow">
  <form method="POST" action="salvar_quest.php">
    <!-- Seção cursos -->
    <h6 class="text-center mt-3">Quais áreas você quer mais cursos?</h6>
    <?php
    // Lista de cursos disponíveis
    $todos_cursos = ['Informática','Mídia e Multimeios','Marketing','Arte e Cultura','Empreendedorismo','Vendas','Administração','Agronomia'];
    foreach($todos_cursos as $curso){
        echo '<div class="form-check">
                <input class="form-check-input" type="checkbox" name="cursos[]" value="'.$curso.'">
                <label class="form-check-label">'.$curso.'</label>
              </div>';
    }
    ?>

    <!-- Interesse em cursos -->
    <div class="mt-4 text-center">
      <label>Você tem interesse em participar de cursos de capacitação profissional?</label>
      <select name="interesse" class="form-select">
        <option value="">Selecione</option>
        <option value="sim">Sim</option>
        <option value="nao">Não</option>
      </select>
    </div>

    <!-- Horário preferido -->
    <div class="mt-4 text-center">
      <label>Qual horário você prefere para cursos?</label>
      <select name="horarios" class="form-select">
        <option value="">Selecione</option>
        <option value="manha">Manhã</option>
        <option value="tarde">Tarde</option>
        <option value="noite">Noite</option>
      </select>
    </div>

    <!-- Esportes favoritos -->
    <div class="checks">
        <h6 class="text-center mt-3">Quais esportes você mais gosta de praticar?</h6>
        <?php
        $esportes = ['futebol','volei','skate','dança','musculacao','arte/cultura','bmx','outro'];
        foreach($esportes as $esp){
            echo '<div class="form-check">
                    <input class="form-check-input" type="checkbox" name="esportes[]" value="'.$esp.'">
                    <label class="form-check-label">'.ucfirst($esp).'</label>
                  </div>';
        }
        ?>
    </div>

    <!-- Espaço esportivo -->
    <div class="mt-4 text-center">
      <label>Que tipo de espaço esportivo você sente falta na sua região?</label>
      <input type="text" class="form-control" name="espaco_esportivo" required>
    </div>

    <!-- Conteúdo consumido -->
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

    <!-- Estilos musicais -->
    <div class="checks">
        <h6 class="text-center mt-3">Que estilos musicais você mais gosta de ouvir?</h6>
        <?php
        $musicas = ['pop','sertanejo','funk','hiphop','rock','eletronica','gospel','internacional','outro'];
        foreach($musicas as $musica){
            echo '<div class="form-check">
                    <input class="form-check-input" type="checkbox" name="musica[]" value="'.$musica.'">
                    <label class="form-check-label">'.ucfirst($musica).'</label>
                  </div>';
        }
        ?>
    </div>

    <!-- Conhece projetos -->
    <div class="mt-4 text-center">
      <label>Você conhece algum projeto ou programa para jovens oferecido na cidade?</label>
      <select name="conhece" class="form-select" required>
        <option value="">Selecione</option>
        <option value="sim">Sim</option>
        <option value="nao">Não</option>
      </select>
    </div>

    <!-- Como quer ser informado -->
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

    <!-- Botão enviar -->
    <div class="mt-4 text-center">
      <button type="submit">ENVIAR</button>
    </div>

  </form>
</div>
</body>
</html>
