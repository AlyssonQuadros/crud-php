<?php
session_start();
include("conexao.php");
include('header.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php

    $mysqli = new mysqli('localhost', 'root', '', 'crudphp');

    if(isset($_GET['searchName']) || isset($_GET['searchCPF'])){

        $filterNome = $_GET['searchName'];
        $filterCPF = $_GET['searchCPF'];
        $consulta = "SELECT * FROM clientes WHERE nome LIKE '%$filterNome%' AND cpf LIKE '%$filterCPF%'";
        $con = $mysqli->query($consulta) or die($mysqli->error);

    }else{

        $consulta = "SELECT * FROM clientes";
        $con = $mysqli->query($consulta) or die($mysqli->error);

    }

?>
    <body>

    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="">
                    <h3 class="title has-text-white"><i class="fa-solid fa-table"></i> Clientes cadastrados</h3>
                    <div class="box">
                    <h4 style="font-size: 20px" class="has-text-black mb-4">Buscar por:</h4>
                    <form action="" method="GET">
                        <div class="container has-text-centered mb-4">
                            <input type="text" id="inputSearch" name="searchName" class="form-input" value="<?php if(isset($_GET['searchName'])){echo $_GET['searchName']; } ?>" placeholder="Nome">
                            <input type="text" id="inputSearch" name="searchCPF" class="form-input" value="<?php if(isset($_GET['searchCPF'])){echo $_GET['searchCPF']; } ?>" placeholder="CPF"/>
                            <button type="submit" id="btnSearch" class="btn btn-sm btn-secondary">Buscar</button>
                        </div>
                    </form>
                    <?php
                        if(isset($_SESSION['sucesso_edit'])):
                        ?>
                        <div class="container has-text-centered">
                            <div class="column is-4 is-offset-4">
                                <div class="notification is-success">
                                    <button class="delete"></button>
                                    <p>Cliente editado com sucesso!</p>
                                </div>
                            </div>
                        </div>
                        <?php
                        endif;
                        unset($_SESSION['sucesso_edit']);
                    ?>

                    <table class="table table-hover table-inverse">
                        <tr>
                            <td style="font-size:14px; text-align: center; background-color:#84c4ff"><b>ID</b></td>
                            <td style="font-size:14px; text-align: center; background-color:#84c4ff"><b>Nome</b></td>
                            <td style="font-size:14px; text-align: center; background-color:#84c4ff"><b>Endereço</b></td>
                            <td style="font-size:14px; text-align: center; background-color:#84c4ff"><b>CPF</b></td>
                            <td style="font-size:14px; text-align: center; background-color:#84c4ff"><b>Telefone</b></td>
                            <td style="font-size:14px; text-align: center; background-color:#84c4ff"><b>Data</b></td>
                            <td style="font-size:14px; text-align: center; background-color:#84c4ff"><b>Ações</b></td>
                        </tr>
                        <?php while($dado = $con->fetch_array()){ ?>
                        <tr>
                            <td style="font-size:13px; text-align: center;"><?php echo $dado["id_cliente"]; ?></td>
                            <td style="font-size:13px; text-align: center;"><?php echo $dado["nome"]; ?></td>
                            <td style="font-size:13px; text-align: center;"><?php echo $dado["endereco"]; ?></td>
                            <td style="font-size:13px; text-align: center;"><?php echo $dado["cpf"]; ?></td>
                            <td style="font-size:13px; text-align: center;"><?php echo $dado["telefone"]; ?></td>
                            <td style="font-size:13px; text-align: center;"><?php echo date("d/m/Y", strtotime($dado["data_cadastro"])); ?></td>
                            <td class="text-center" style="font-size:13px;">
                            <div class="btn-group">
                                <a style="margin-left:5px" href="<?php echo "editar_page.php?id=".$dado['id_cliente']?>"><button style="font-size:12px;" id="btnEdit" type="button"><i class="fa-solid fa-pen-to-square"></i> Editar</button></a>
                            </div>
                        </td>
                        </tr>
                        <?php } ?>
                    </table>
                        <div class="has-text-centered">
                            <br/><a href="/index.php"><button class="button is-medium"><i class="fas fa-arrow-left" style="margin-right: 10px; font-size:16px"></i> Voltar</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
</html>