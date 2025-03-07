<?php
 
echo'<h1> Aluno Editar </h1>';
 
$editarId = $_POST['id'];
$editarNome = $_POST['nome'];
$editarTelefone = $_POST['telefone'];
$editarEmail = $_POST['email'];
$editarNascimento= $_POST['nascimento'];
 
 
$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';
 
$banco = new PDO($dsn, $user, $password);
 
$update='UPDATE tb_aluno SET nome = :nome WHERE id= :id';
 
$box = $banco->prepare($update);
 
$box->execute([
    ':id' => $editarId,
    ':nome' => $editarNome
]);
 
 
$update='UPDATE tb_info_alunos SET telefone = :telefone, email = :email, nascimento = :nascimento WHERE id_alunos= :id';
 
$box = $banco->prepare($update);
 
$box->execute([
    ':id' => $editarId,
    ':telefone' => $editarTelefone,
    ':email' => $editarEmail,
    ':nascimento' => $editarNascimento
]);
 
 
 
 
 
 
 
 
?>
