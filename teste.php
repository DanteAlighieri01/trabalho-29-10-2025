<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Formulário de múltipla escolha</title>
</head>
<body>
  <h2>Quais áreas mais te interessam?</h2>

  <form id="formInteresses">
    <label><input type="checkbox" name="interesses[]" value="esporte"> Esporte</label><br>
    <label><input type="checkbox" name="interesses[]" value="musica"> Música</label><br>
    <label><input type="checkbox" name="interesses[]" value="cultura"> Cultura</label><br>
    <label><input type="checkbox" name="interesses[]" value="lazer"> Lazer</label><br>
    <label><input type="checkbox" name="interesses[]" value="tecnologia"> Tecnologia</label><br>

    <button type="button" onclick="enviarDados()">Enviar</button>
  </form>

  <p id="mensagem"></p>

  <script>
    function enviarDados() {
      const checkboxes = document.querySelectorAll('input[name="interesses[]"]:checked');
      const interessesSelecionados = Array.from(checkboxes).map(cb => cb.value);

      if (interessesSelecionados.length === 0) {
        document.getElementById('mensagem').textContent = "Selecione pelo menos uma opção!";
        return;
      }

      // Monta objeto a ser enviado
      const dados = new FormData();
      dados.append('interesses', JSON.stringify(interessesSelecionados));

      // Envia para o PHP
      fetch('salvar.php', {
        method: 'POST',
        body: dados
      })
      .then(response => response.text())
      .then(retorno => {
        document.getElementById('mensagem').textContent = retorno;
      })
      .catch(error => {
        document.getElementById('mensagem').textContent = "Erro ao enviar dados.";
        console.error(error);
      });
    }
  </script>
</body>
</html>
