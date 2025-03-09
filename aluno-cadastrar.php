<?php //abrindo a teg phph para colocar o codigo

echo "Cadastro de Aluno"; //serve para escrever na tela e ver se esta funconando o codigo php


echo '<pre>'; //serve para deixar a saida de dados mais formal


var_dump($_POST); //função var_dump exibe informações detalhadas sobre a variável $_POST


$nomeFormulario = $_POST['nome']; //vai Acessa o valor enviado pelo formulário no campo 'nome' e armazena na variável $nomeFormulario deixando melhor

$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';//aqui é entrando no banco de dados e dizendo o nome dele 
$user = 'root'; //user
$password = '';//senha

$banco = new PDO($dsn, $user, $password); //validacao para o banco de dados

$insert='INSERT INTO tb_aluno (nome) VALUE (:nome)';//dizendo que vai inserir na tabela 

$box = $banco->prepare($insert);//box é uma variavel, e esta preparando para inserir

$box->execute([
    ':nome' => $nomeFormulario //falando para executar o parametros da variavel criada
]);

$id_aluno = $banco->lastInsertId();//vai conseguir o resultado do ultimo id registrado na tb

echo $id_aluno; //aqui vai falar o id


$telefoneFormulario = $_POST['tel'];//variavel criada e com o name que tem na escrita do formulario
$emailFormulario = $_POST['email'];//variavel criada e com o name que tem na escrita do formulario
$nascimentoFormulario = $_POST['nasc'];//variavel criada e com o name que tem na escrita do formulario
$frequenteFormulario = $_POST['frequente'];//variavel criada e com o name que tem na escrita do formulario
$imgFormulario = $_POST['img'];//variavel criada e com o name que tem na escrita do formulario

$insert='INSERT INTO tb_info_alunos (telefone, email, nascimento, frequente, id_alunos, img) VALUE (:telefone, :email, :nascimento, :frequente, :id_alunos, :img)';//esta falando oque vai ser inserido na tb

$boxe = $banco->prepare($insert);//preparando as info

$boxe->execute([//executar o parametros que foi feito
    ':telefone' => $telefoneFormulario,
    ':email' => $emailFormulario,
    ':nascimento' => $nascimentoFormulario,
    ':frequente' => $frequenteFormulario,
    ':id_alunos' => $id_aluno,
    'img' => $imgFormulario,
]);

