<?php
include('conexao.php');
session_start();

if(empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}
//essa função protege para ataque de sql inject
$email = mysqli_real_escape_string($link, $_POST['email']);
$senha = mysqli_real_escape_string($link, $_POST['senha']);

$query = "select * from tb_login where email = '{$email}' and senha = md5('{$senha}')";
//
$result = mysqli_query($link, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['email'] = $email;
	$_SESSION['senha'] = $senha;
	header('location: painel.php');
	exit();
} else {
	header('Location: index.php');
	exit();
}