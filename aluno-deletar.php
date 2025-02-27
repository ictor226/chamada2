<?php

echo'<h1>aluno-deletar.php</h1>';

$dsn = 'mysql:dbname=bd_chamadinhaa;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

//apagando tb_alunos
$idFormulario = $_GET['id'];

$delete = 'DELETE FROM tb_alunos WHERE id = :id';

$box = $banco->prepare($delete);


$box->execute([

    ':id' => $idFormulario

]);


//apagando outro
$idFormulario = $_GET['id'];

$delete = 'DELETE FROM tb_info_alunos WHERE id_alunos  = :id_alunos';
$box = $banco->prepare($delete);
$box->execute([

    ':id_alunos' => $idFormulario
]);

echo '<script> alert("Usuario apagado com Sucesso!!! ") 

window.location.replace("index.php")

</script>';

//header('loction:index.php');

