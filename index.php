<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php //abrindo a teg phph para colocar o codigo

// echo "Olá";

$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';//aqui é entrando no banco de dados e dizendo o nome dele 
$user = 'root'; //user
$password = '';//senha

$banco = new PDO($dsn, $user, $password);//validacao para o banco de dados

$select = "SELECT * FROM tb_aluno"; //selecionando a tabela do mysql

$resultado = $banco->query($select)->fetchAll();//executa a cosulta no bd

// echo '<pre>'; //pre serve para organizar 
// var_dump($resultado); //ele faz um debug das informações
?>

<main class="container my-5">
    <table class="table table-striped">
        <div class="my-3 d-flex justify-content-end">
            <a href="formulario.php" class="btn btn-success">Cadastrar Novo Aluno</a><!-- campo para colocar uma info -->
        </div>
        <tr>
            <td>id</td><!-- campo para colocar uma info -->
            <td>nome</td><!-- campo para colocar uma info -->
            <td class="text-center">ação</td><!-- campo para colocar uma info -->
        </tr>

        <?php foreach($resultado as $linha) {?><!-- codigo php para armazena a varavel -->
            <tr>
                 <td>  <?=$linha['id'] ?> </td>  <!-- codigo php para armazena a varavel -->
                <td>  <?php echo $linha['nome'] ?> </td> <!-- codigo php para armazena a varavel -->
                <td class="text-center">
                    <a class="btn btn-primary" href="./ficha.php?id_aluno=<?=$linha['id'] ?>">Abrir</a><!-- codigo php para armazena a varavel e tambem campo para colocar uma info-->
                    <a class="btn btn-warning" href="./formulario -editar.php?id_aluno_alterar=<?=$linha['id'] ?>">Editar</a><!-- codigo php para armazena a varavel e tambem campo para colocar uma info-->
                    <a class="btn btn-danger" href="./aluno-deletar.php?id=<?=$linha['id'] ?>">Excluir</a><!-- codigo php para armazena a varavel e tambem campo para colocar uma info-->
                                                <!-- caminho arquivo ? variável-->
                </td>
            </tr>
        <?php } ?>
    </table>
</main>
