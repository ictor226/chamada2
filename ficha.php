<?php //abrindo a teg phph para colocar o codigo

$id_aluno = $_GET['id_aluno'];//Para puxar informação da URL, que nesse caso é o id_aluno


$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';//user
$password = '';//senha

$banco = new PDO($dsn, $user, $password); //validacao para o banco de dados

$select = "SELECT tb_info_alunos.*, tb_aluno.nome FROM tb_info_alunos INNER JOIN tb_aluno ON tb_aluno.id = tb_info_alunos.id_alunos WHERE tb_info_alunos.id_alunos= " . $id_aluno; //selecionando ad info do banco

$dados = $banco->query($select)->fetch();

// echo '<pre>'; //Para organizar o var_dump
// var_dump($dados);


?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- seria um link para o bootstrap -->


<style> /* comando para abrir o css e estilizar */ 
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

<main class="container text-center my-5"> <!-- teg html e juto a ela uma class -->

    <img src="./img/<?= $dados['img'] ?>" alt="imagem do perfil" class="img-thumbnail"> <!-- teg html img -->

    <form action="#"> <!-- começando um formulario -->

        <label for="nome">Nome:</label class="form-control"> <!-- campo para colocar uma info -->
        <input type="text" value="<?= $dados['nome'] ?>" disabled class="form-control"> <!-- aqui vai o codigo php para dar validacao em outro arquivo -->
        <div class="row mt-2 ">

            <div class="col">
                <label for="telefone">Telefone:</label> <!-- campo para colocar uma info -->
                <input type="number" value="<?= $dados['telefone'] ?>" disabled class="form-control"> <!-- aqui vai o codigo php para dar validacao em outro arquivo -->
            </div>

            <div class="col">
                <label for="email">Email:</label> <!-- campo para colocar uma info -->
                <input type="email" value="<?= $dados['email'] ?>" disabled class="form-control"><!-- aqui vai o codigo php para dar validacao em outro arquivo -->
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <label for="data_nascimento">Data de Nascimento:</label> <!-- campo para colocar uma info -->
                <input type="date" value="<?= $dados["nascimento"] ?>" disabled class="form-control"><!-- aqui vai o codigo php para dar validacao em outro arquivo -->
            </div>

            <div class="col my-4 pt-2">
                <input type="checkbox" class="form-check-input">
                <label for="frequente">Frequente:</label> <!-- campo para colocar uma info -->
            </div>
        </div>
    </form>
</main>