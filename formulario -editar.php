<!DOCTYPE html><!-- tipo de documento -->
<html lang="pt-br"> <!-- tipo de idioma -->
<head> <!-- a cabeça do site -->
    <meta charset="UTF-8"> <!-- para aceitar sidilha e dentre outras coisas  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Formulário</title><!-- titulo da pagina -->
</head>
<body><!-- o corpo do site -->

     <style> /*  para fazer a estilizacao da pagina*/  
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    
        form {
            width: 600px;
        }
    
        img {
            width: 200px;
            object-fit: cover;
        }
    </style>

    <?php //iniciando o php

    $id_aluno_alterar = $_GET['id_aluno_alterar'];//vai Acessa o valor enviado pelo formulário no campo 'id' e armazena na variável id deixando melhor

    var_dump($id_aluno_alterar);//função var_dump exibe informações detalhadas sobre a variável $_POST
    
    
    $dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';//aqui é entrando no banco de dados e dizendo o nome dele
    $user = 'root'; //user
$password = '';//senha

    $banco = new PDO($dsn, $user, $password);//validacao para o banco de dados

    $select = "SELECT tb_info_alunos.*, tb_aluno.nome FROM tb_info_alunos INNER JOIN tb_aluno ON tb_aluno.id = tb_info_alunos.id_alunos WHERE tb_info_alunos.id_alunos= " . $id_aluno_alterar;
//dizendo que vai inserir na tabela ou alterar
    $dados = $banco->query($select)->fetch();//dados é uma variavel, e esta preparando para inserir

    ?>

<main class="container text-center my-5">   

    <h2>editar aluno</h2>
    <br> <!-- pula linha -->
    

    <!--
        METODO DE ENVIO
            GET, através da URL. POST, através do corpo do arquivo  ACTION
            Fala para onde deve enviar os dados
    -->


    <form action="./aluno-editar.php" method="POST"><!-- começando um formulario -->

    <img src="./img/<?= $dados['img']?>" alt=""><!-- teg html img -->

    <input type="hidden" placeholder="id" name="id" value="<?= $dados['id'] ?>">

        <div class="col">
            <label for="img">imagem</label><!-- campo para colocar uma info -->
            <input type="file" accept="image/*" class="form-control" name="img">
        </div>

        <label for="nome">Nome:</label class="form-control">
        <input type="text"   class="form-control" name="nome" value="<?= $dados['nome'] ?>">
        <div class="row mt-2 ">

            <div class="col">
                <label for="telefone">Telefone:</label><!-- campo para colocar uma info -->
                <input type="number"   class="form-control" name="telefone" value="<?= $dados['telefone'] ?>"
            </div>

            <div class="col">
                <label for="email">Email:</label><!-- campo para colocar uma info -->
                <input type="email"   class="form-control" name="email" value="<?= $dados['email'] ?>">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <label for="data_nascimento">Data de Nascimento:</label><!-- campo para colocar uma info -->
                <input type="date"   class="form-control" name="nascimento"  value="<?= $dados['nascimento'] ?>">
            </div>

            <div class="col my-4 pt-2">
                <input type="checkbox" class="form-check-input" name="frequente">
                <label for="frequente">Frequente:</label><!-- campo para colocar uma info -->
            </div>
        </div>

        <input type="submit">
        
    </form>

    
</body>
</html>