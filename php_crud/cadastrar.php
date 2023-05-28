<?php
session_start();
include("conexao.php");

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];

$sql = "select count(*) as total from clientes where cpf = '$cpf'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['cpf_existe'] = true;
	header('Location: cadastro.php');
	exit;
}

$sql = "INSERT INTO clientes (nome, endereco, cpf, telefone, data_cadastro) VALUES ('$nome', '$endereco', '$cpf', '$telefone', NOW())";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

if(empty($_POST['nome']) || empty($_POST['endereco']) || empty($_POST['cpf'])){
	$_SESSION['erro'] = true;
}

$conexao->close();

header('Location: cadastro.php');
exit;
?>