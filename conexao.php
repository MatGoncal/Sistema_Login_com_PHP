<?php
$host = "localhost";
$user = "root";
$pass = "";
$base = "db_login";
//responsavel pela conexao com banco de dados
$link = mysqli_connect($host,$user,$pass,$base) or die ('Não foi possivel conectar');
/*teste de conexao
if(mysqli_errno($link)){
    echo"Erro de conexao";
}else{
    echo "Conexao OK!";
}*/
?>