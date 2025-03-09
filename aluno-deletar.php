<?php //abrindo a teg phph para colocar o codigo

echo '<h1>Aluno Deletar.php</h1>'; //serve para escrever na tela e ver se esta funconando o codigo php


$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';//aqui é entrando no banco de dados e dizendo o nome dele
$user = 'root'; //user
$password = '';//senha

$banco = new PDO($dsn, $user, $password);//validacao para o banco de dados

$idFormulario = $_GET['id'];//recupera o valor do parâmetro 'id' da URL e armazena na variável $idFormulario faz tipo uma troca

$delete = 'DELETE FROM tb_aluno WHERE id = :id';//codigo mysql falando que vai deletar uma info
$box = $banco->prepare($delete);
$box->execute([
    ':id' => $idFormulario
]);


$delete = 'DELETE FROM tb_info_alunos WHERE id_alunos = :id_alunos'; //o primeiro id_alunos é o campo do banco, o segundo id_alunos é uma variável
$box = $banco->prepare($delete);//vai prepara a exclusão de uma info 
$box->execute([
    ':id_alunos' => $idFormulario//esse id_alunos é a variável 
]);

echo '<script>
    alert("Usuário apagado com sucesso!")
    window.location.replace("index.php")
</script>';
//codigo javascript para falar que foi


// header("location:index.php"); comando em PHP para fazer voltar em uma página em específica
