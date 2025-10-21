<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>SEJUC/CONECTA JOVEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <style>
        h2 { 
            font-family: Arial Black, sans-serif; 
            margin-left: 20px;
        }   

        .two {
            background-color: #4682B4; /* azul escuro */
            color: white;
        }

        .bandeira {
            text-align: center;
            background-color: #4682B4;
        }

        .menu {
            background-color: #f1f1f1;
            color: white;
            justify-content: flex start;
        }

        .menu2 {
            /* vazio */
        }

        /* 🔹 Faixa azul-claro aumentada */
        .baixo {
            background-color: #00BFFF; /* azul-claro */
            height: 25px; /* aumentei de 50px para 100px */
            width: 100%;
        }
        body {
        background-color: #ffffff; /* fundo branco */
        }
        ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 130px;
        background-color: #f1f1f1;
        position: fixed;
        height: 100%;
        overflow: auto;
        }


        li a {
        display: block;
        color: black;
        padding: 8px 16px;
        text-decoration: none;
        }

        li a.active {
        background-color: #00BFFF;
        color: white;
        }

        li a:hover:not(.active) {
        background-color: #00BFFF;
        color: black;
        }
        h2 {
        color: black
        }
        h3{
        color: black
        }
        p{
        color:black
        }
    </style> 
</head>

<body>
    <div class="one row justify-content row-cols-1 row-cols-md-1 mb-1">
        <div class="two row justify-content">
            <img src="imagens\link_gov.png" style="margin: 20px; width: 190px; height: 50px"/>
            <img src="imagens\secretaria_juventude.jpg" style="margin-right: 20px; margin-bottom: 0px; margin-left: 300px; margin-top: 0px; width: 880px; height: 200px"/>   
            
            <div class="menu2 row justify-content row-cols-1 row-cols-md-6 mb-2">
                <?php include 'menu2.php'; ?>
            </div>  
        </div>

        <!-- 🔹 Faixa azul-claro -->
        <div class="baixo"></div>

        <div class="menu d-flex justify-content-start align-items-center p-2">
        <body>

<ul>
  <li><a class="active" href="web_sejuc.php">Home</a></li>
  <li><a href="noticias.php">Notícias</a></li>
  <li><a href="eventos.php">Eventos</a></li>
  <li><a href="esportes.php">Esportes</a></li>
  <li><a href="cursos.php">Cursos</a></li>
  <li><a href="sujestoes.php">Sujestões</a></li>
</ul>

<div style="margin-left:130px;padding:1px 16px;height:1000px;">
  <h2>Secretaria da juventude e cidadania</h2>
  <h3>O que nós somos e nossos valores?</h3>
<p>A Secretaria de Juventude, Cidadania e Migrantes tem como missão coordenar, executar e aprimorar o sistema de gestão das políticas públicas e dos serviços destinados à Juventude, à Cidadania e à População Migrante.</p>
  <p> Suas ações são fundamentadas nos princípios da participação popular, da descentralização administrativa e do controle social, promovendo uma atuação articulada e democrática.</p>
   <p> Nesse processo, destaca-se o papel estratégico do Conselho Municipal de Juventude e dos demais Conselhos de Direitos vinculados, que contribuem para a formulação, monitoramento e avaliação das políticas públicas setoriais.</P>
<p>Entre suas principais atribuições, está o planejamento, a formulação, a orientação e a execução de políticas públicas voltadas à promoção do desenvolvimento humano, à proteção integral, à inclusão social e à integração plena de diversos segmentos historicamente vulnerabilizados. Isso inclui, de forma prioritária, a juventude, os migrantes nacionais e internacionais, as comunidades indígenas, bem como a população negra e outros grupos étnico-raciais.</P>
<p>Além disso, a Secretaria atua de forma transversal na promoção da igualdade racial, na valorização da diversidade cultural e na prevenção e combate a todas as formas de discriminação, preconceito e violências, reafirmando o compromisso com os direitos humanos, a justiça social e a construção de uma sociedade mais equitativa, plural e inclusiva.</p>
  
</div>

</body>
        </div>    
    </div>
    <br>
</body>
</html>