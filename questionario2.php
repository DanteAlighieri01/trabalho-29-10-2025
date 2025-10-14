<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>SEJUC / CONECTA JOVEM</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .verde {
      background-color: #4682B4;
      color: white;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .verde img {
      height: 60px;
      object-fit: contain;
    }

    .card {
      max-width: 600px;        /* limita a largura */
      margin: 30px auto;       /* centraliza */
      border-radius: 12px;     /* cantos arredondados */
    }

    form {
      padding: 20px 30px;      /* menos espaçamento interno */
    }

    .form-label {
      font-weight: 600;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 8px 20px;
      border: none;
      border-radius: 25px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
    .one {
      margin-left:80px;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="verde">
    <img src="imagens/link_gov.png" alt="Logo Governo">
    <img src="imagens/brasao_mga.png" alt="Brasão">
  </div>

  <div class="card shadow">
    <div class="card-header text-center bg-light">
    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#00008B" class="bi bi-check2-square" viewBox="0 0 16 16">
        <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z"/>
        <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0"/>
    </svg>&nbsp;&nbsp;<b>Questionario</b></svg>
    </div>
        <div class="one justify-content-center mb-3">
        <div class="col-md-9">
            <label for="situacao" class="form-label">Quais áreas querem mais cursos?</label>
            <select name="cursos" id="cursos" class="form-select" required>
            <option value="">Selecione</option>
            <option value="informatica">Informatica</option>
            <option value="midia">Midia e Multimeios</option>
            <option value="marketing">Marketing</option>
            <option value="arte">Arte e Cultura</option>
            <option value="empreendedorismo">Empreendedorismo</option>
            <option value="vendas">Vendas</option>
            <option value="administracao">Administração</option>
            <option value="arte">Arte e Cultura</option>
            <option value="agronomia">Agronomia</option>
            </select>
        </div>
        </div>
        <div class="one justify-content-center mb-3">
        <div class="col-md-9">
            <label for="situacao" class="form-label">Que tipo de conteúdo você mais consome?</label>
            <select name="cursos" id="cursos" class="form-select" required>
            <option value="">Selecione</option>
            <option value="informatica">Música</option>
            <option value="midia">Filmes</option>
            <option value="series">Séries</option>
            <option value="jogos">Jogos</option>
            <option value="redes sociais">Redes Sociais</option>
            <option value="outros">Outros</option>
            </select>
        </div>
        </div>
      <div class="text-center mt-3">
        <button type="submit">ENVIAR</button>
      </div>
    </form>
  </div>
</body>
</html>
