<?php //abrindo a teg phph para colocar o codigo

echo'<h1> Aluno Editar </h1>';//serve para escrever na tela e ver se esta funconando o codigo php

$editarId = $_POST['id'];//variavel criada e com o name que tem na escrita do formulario
$editarNome = $_POST['nome'];//variavel criada e com o name que tem na escrita do formulario
$editarTelefone = $_POST['telefone'];//variavel criada e com o name que tem na escrita do formulario
$editarEmail = $_POST['email'];//variavel criada e com o name que tem na escrita do formulario
$editarNascimento= $_POST['nascimento'];//variavel criada e com o name que tem na escrita do formulario


$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';//aqui é entrando no banco de dados e dizendo o nome dele 
$user = 'root';//user
$password = '';//senha

$banco = new PDO($dsn, $user, $password);//validacao para o banco de dados
$update='UPDATE tb_aluno SET nome = :nome WHERE id= :id';//seria um codigo mysql para editar as info
$box = $banco->prepare($update);//box é uma variavel, e esta preparando para inserir

$box->execute([
    ':id' => $editarId,//falando que vai executar o editar
    ':nome' => $editarNome//falando que vai executar o editar
]);

$update='UPDATE tb_info_alunos SET telefone = :telefone, email = :email, nascimento = :nascimento WHERE id_alunos= :id';
 //esta falando oque vai ser inserido na tb
$box = $banco->prepare($update);//preparando as info

$box->execute([
    ':id' => $editarId,//falando que vai executar o editar
    ':telefone' => $editarTelefone,//falando que vai executar o editar
    ':email' => $editarEmail,//falando que vai executar o editar
    ':nascimento' => $editarNascimento//falando que vai executar o editar
]);
?>
