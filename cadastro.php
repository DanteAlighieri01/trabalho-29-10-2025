<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>SEJUC/CONECTA JOVEM</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <style>
    .verde {
        background-color:#4682B4;
        color: white
        
    }
    .bandeira {
        text-align: center
    }
    h2 { font-family: Arial Black, sans-serif; margin-left: 20px;}  
    .one {
      margin-left:80px;
      text-align: center;
    }
    </style>
    <body>
    <div class="verde row justify-content row-cols-1 row-cols-md-3 mb-3 text">
        <img src="imagens\link_gov.png" style = "margin: 20px;width: 190px; height: 50px"/>
        <img src="imagens\brasao_mga.png" style = "margin-right: 20px;margin-bottom: 10px;margin-left: 1560px;margin-top: 10px;width: 100px; height: 80px"/>   
    </div>    
    <div class=" row justify-content-center row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col">
            <div class="cinza card mb-4 rounded-3 shadow-sw">
                <div class="card-header py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#00008B" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                    </svg>&nbsp;&nbsp;<b>CADASTRO</b></svg>
                </div>
                    <div class="one mb-3 justify-content-center col-md-9">
                            <label for="quantidade" class="form-label">Nome completo</label>
                            <input type="text" id="quantidade" class="form-control" min="1">
                    </div>
                        <div class="one mb-3 justify-content-center col-md-9">
                            <label for="quantidade" class="form-label">Idade</label>
                            <input type="number" id="quantidade" class="form-control" min="1">
                        </div>
                            <div class="one mb-3 justify-content-center col-md-9">
                                <label for="quantidade" class="form-label">Gênero</label>
                                <input type="text" id="quantidade" class="form-control" min="1">
                            </div>
                                <div class="one mb-3 justify-content-center col-md-9">
                                    <label for="quantidade" class="form-label">E-mail para contato</label>
                                    <input type="text" id="quantidade" class="form-control" min="1">
                                </div>
                                    <div class="one mb-3 justify-content-center col-md-9">
                                        <label for="quantidade" class="form-label">Whatsapp(com DDD)</label>
                                        <input type="text" id="quantidade" class="form-control" min="1">
                                    </div>              
                                        <div class="one row mb-3 justify-content-center row col-md-9">
                                            <label for="quantidade" class="form-label">CEP</label>
                                            <input type="text" id="quantidade" class="form-control" min="1">
                                        </div>
                                            <div class="one mb-3 justify-content-center col-md-9">
                                                <label for="quantidade" class="form-label">CPF</label>
                                                <input type="text" id="quantidade" class="form-control" min="1">
                                            </div>
                                                <div class="one mb-3 justify-content-center col-md-9">
                                                    <label for="quantidade" class="form-label">LOGIN</label>
                                                    <input type="text" id="quantidade" class="form-control" min="1">
                                                </div>
                                                    <div class="one mb-3 justify-content-center col-md-9">
                                                        <label for="quantidade" class="form-label">SENHA</label>
                                                        <input type="text" id="quantidade" class="form-control" min="1">
                                                    </div>
                                                        <div class="one justify-content-center mb-3">
                                                        <div class="col-md-9">
                                                            <label for="cliente" class="form-label">Qual sua situação atual?</label>
                                                            <select id="cliente" name="id_cliente" class="form-select" required>
                                                            <option value="">Selecione sua ocupação atual </option>
                                                            <option value="">Estudando</option>
                                                            <option value="">trabalhando</option>
                                                            <option value=""> Estudando e trabalhando</option>
                                                            <option value="">Nem estudando, nem trabalhando</option>
                                                            <?php foreach ($clientes as $cliente): ?>
                                                                <option value="<?php echo $cliente['id']; ?>"><?php echo htmlspecialchars($cliente['nome']); ?></option>
                                                            <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        </div>
                        
                                                <div class="one justify-content-center mb-3">
                                                <div class="col-md-9">
                                                    <label for="cliente" class="form-label">Qual sua área de maior interesse?</label>
                                                    <select id="cliente" name="id_cliente" class="form-select" required>
                                                    <option value="">Selecione sua area de enteresse </option>
                                                    <option value=""> Cursos profissionalizantes</option>
                                                    <option value=""> Cursos profissionalizantes</option>
                                                    <option value=""> Cultura e arte</option>
                                                    <option value="">Ações voluntárias</option>
                                                    <option value="">Preparação para ENEM/vestibular</option>
                                                    <?php foreach ($clientes as $cliente): ?>
                                                        <option value="<?php echo $cliente['id']; ?>"><?php echo htmlspecialchars($cliente['nome']); ?></option>
                                                    <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                </div>
                    <div class="one justify-content-center mb-3">
                    <div class="col-md-9">
                        <label for="cliente" class="form-label">Como ficou sabendo da Secretaria?</label>
                        <select id="cliente" name="id_cliente" class="form-select" required>
                        <option value="">Selecione como conheceu a secretaria</option>
                        <option value="">Redes sociais</option>
                        <option value="">Amigos/familiares</option>
                        <option value="">  Escola</option>
                        <option value="">Panfleto/outdoor</option>
                        <option value="">Outros</option>
                        <?php foreach ($clientes as $cliente): ?>
                        <option value="<?php echo $cliente['id']; ?>"><?php echo htmlspecialchars($cliente['nome']); ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>
<?php
    include 'conecta.php';
    $nome = $_POST['nome'];
    $celular = $_POST['idade'];
    $cep = $_POST['cep'];
    $numero = $_POST['numero'];
    $genero = $_POST['genero'];
    $mail = $_POST['mail'];
    $cpf = $_POST['cpf'];
    $idade = $_POST['idade'];
    $query = $conn->query("SELECT * FROM cadastro WHERE nome='$nome' AND cpf='$cpf'");
    if (mysqli_num_rows($query) > 0) {
        echo "<script language='javascript' type='text/javascript'>
        alert('O jovem já existe em nossa base de dados!');
        window.location.href='clientes.php';</script>";
        exit();
    } else {
        $sql = "INSERT INTO clientes(nome,celular,cep,numero,genero,mail,cpf,idade) VALUES ('$nome','$celular','$endereco','$numero','$complemento','$cidade','$cpf')";
        if (mysqli_query($conn, $sql)) {
            echo "<script language='javascript' type='text/javascript'>
            window.location.href='questionario.php'
            </script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Não foi possível cadastrar o jovem!');
            window.location.href='web_sejuc.php';</script>";
        }
    }
    mysqli_close($conn);
?>