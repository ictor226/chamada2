<?php

echo '<h1>Aluno Deletar.php</h1>';

$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$idFormulario = $_GET['id'];

$delete = 'DELETE FROM tb_aluno WHERE id = :id';
$box = $banco->prepare($delete);
$box->execute([
    ':id' => $idFormulario
]);


$delete = 'DELETE FROM tb_info_alunos WHERE id_alunos = :id_alunos'; //o primeiro id_alunos é o campo do banco, o segundo id_alunos é uma variável
$box = $banco->prepare($delete);
$box->execute([
    ':id_alunos' => $idFormulario
    //esse id_alunos é a variável da linha 20
]);

echo '<script>
    alert("Usuário apagado com sucesso!")
    window.location.replace("index.php")
</script>';

// header("location:index.php"); comando em PHP para fazer voltar em uma página em específica. 
