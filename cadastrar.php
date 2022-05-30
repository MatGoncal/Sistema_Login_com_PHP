<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($link, trim($_POST['nome']));
$email = mysqli_real_escape_string($link, trim($_POST['email']));
$senha = mysqli_real_escape_string($link, trim(md5($_POST['senha'])));

$sql = "select count(*) as total from email where email = '$email'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
    $_SESSION['usuario_existe'] = true;
    header('location: indexcadastro.php');
    exit;
}

$sql = "INSERT INTO tb_login (nome, email, senha) VALUES('$nome','$email','$senha')";

if($link->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = true;
}

$link->close();

header('Location: indexcadastro.php');
exit;
?>



