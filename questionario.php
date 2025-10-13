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
        <img src="imagens\brasao_mga.png" style = "margin-right: 20px;margin-bottom: 10px;margin-left: 1560px;margin-top: 10px;width: 100px; height: 70px"/>   
    </div>    
    <div class=" row justify-content-center row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col">
            <div class="cinza card mb-4 rounded-3 shadow-sw">
                <div class="card-header py-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#00008B" class="bi bi-check2-square" viewBox="0 0 16 16">
                    <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z"/>
                    <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0"/>
                    </svg>&nbsp;&nbsp;<b>Questionario</b></svg>
                </div>
                            <div class="one mb-3 justify-content-center col-md-9">
                                <label for="quantidade" class="form-label">Quais cursos deseja a disponibilidade?</label>
                                <input type="text" id="quantidade" class="form-control" min="1">
                            </div>
                                <div class="one mb-3 justify-content-center col-md-9">
                                    <label for="quantidade" class="form-label">Quais esportes deseja a disponibilidade?</label>
                                    <input type="text" id="quantidade" class="form-control" min="1">
                                </div>
                                    <div class="one mb-3 justify-content-center col-md-9">
                                        <label for="quantidade" class="form-label">Quais eventos deseja?</label>
                                        <input type="text" id="quantidade" class="form-control" min="1">
                                    </div>              
                                        <div class="one row mb-3 justify-content-center row col-md-9">
                                            <label for="quantidade" class="form-label">deseja projetos relacionados a saúde mental?
                                                                               se sim quais? 
                                            </label>
                                            <input type="text" id="quantidade" class="form-control" min="1">
                                        </div>
                                        <div class="one mb-3 justify-content-center col-md-9">
                            <label for="quantidade" class="form-label">Algum projeto em específico que gotaria de sugerir? </label>
                            <input type="text" id="quantidade" class="form-control" min="1">
                    </div>
                                            <div class="one justify-content-center mb-3">
                                            <div class="col-md-9">
                                                <label for="cliente" class="form-label">Qual sua faixa de renda?</label>
                                                <select id="cliente" name="id_cliente" class="form-select" required>
                                                <option value="">Selecione sua faixa de renda</option>
                                                <option value="">1 salário mínimo </option>
                                                <option value="">2 salários mínimos</option>
                                                <option value="">3 salários mínimos</option>
                                                <option value="">4 salários mínimos ou mais</option>
                                                <?php foreach ($clientes as $cliente): ?>
                                                    <option value="<?php echo $cliente['id']; ?>"><?php echo htmlspecialchars($cliente['nome']); ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                            </div>
                        
                                                <div class="one justify-content-center mb-3">
                                                <div class="col-md-9">
                                                    <label for="cliente" class="form-label">Qual sua etnia ?</label>
                                                    <select id="cliente" name="id_cliente" class="form-select" required>
                                                    <option value="">Selecione sua etnia</option>
                                                    <option value="">Branco </option>
                                                    <option value="">Pardo </option>
                                                    <option value=""> Negro</option>
                                                    <option value=""> Amarelo</option>
                                                    <option value="">Outra </option>
                                                    <option value="">Prefiro não responder</option>
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