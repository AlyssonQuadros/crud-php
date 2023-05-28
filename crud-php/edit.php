<?php
session_start();

    include("conexao.php");

    if(isset($_GET['id']) && isset($_POST['editCliente'])){

        $id = $_GET['id'];
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];

        $sql = "UPDATE `clientes` SET
                `nome` = '$nome',
                `endereco` = '$endereco',
                `cpf` = '$cpf',
                `telefone` = '$telefone',
                `data_cadastro` = NOW()
                WHERE id_cliente = $id";

        // print_r($sql);

        if($conexao->query($sql) === TRUE){
            print_r('teste');
            $_SESSION['sucesso_edit'] = true;
            header('Location: tabela.php');
            exit;
        }else{
            $_SESSION['erro_edit'] = true;
        }
    }

?>