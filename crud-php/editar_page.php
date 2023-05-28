<?php
session_start();
include("conexao.php");
include('header.php');

$id = $_GET['id'];
$sql = "SELECT * FROM `clientes` WHERE id_cliente = $id";
$result = $conexao->query($sql);

$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-white"><i class="fa fa-user-plus"></i> Cadastre um cliente</h3>
                    <?php
                    if(isset($_SESSION['status_cadastro'])):
                    ?>
                    <div class="notification is-success">
                    <button class="delete"></button>
                      <p>Cliente cadastrado!</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['status_cadastro']);
                    ?>
                    <?php
                    if(isset($_SESSION['erro'])):
                    ?>
                    <div class="notification is-danger">
                    <button class="delete"></button>
                      <p>Erro.</p>
                      <p>Dados informados inválidos.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['erro']);
                    ?>
                    <div class="box">
                        <h4 style="font-size: 20px" class="has-text-black">Informe os dados do cliente:</h4>
                        <h6 style="font-size: 12px; color:gray; padding-top:8px">(*) Campos obrigatórios</h6></br>
                        <form action="edit.php?id=<?= $id ?>" method="POST">
                            <div class="field has-text-black">
                                <div class="control">
                                    <input name="nome" type="text" oninvalid="this.setCustomValidity('Por favor, entre com um nome e sobrenome')"
                                    oninput="setCustomValidity('')" class="input is-large" required value="<?= $data['nome']?>">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="endereco" type="text" oninvalid="this.setCustomValidity('Por favor, informe um endereço válido')"
                                    oninput="setCustomValidity('')" class="input is-large" required value="<?= $data['endereco']?>">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input oninput="mascara(this)" name="cpf" type="text" minlength="14"
                                    class="input is-large" required value="<?= $data['cpf']?>">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input type="tel" maxlength="15" onkeyup="handlePhone(event)" name="telefone"
                                    class="input is-large" value="<?= $data['telefone']?>">
                                </div>
                            </div>
                            <button class="btn btn-save" type="submit" name="editCliente" id="editCliente"><i class="fas fa-save"></i> Salvar</button>
                        </form>
                        <br/><a href="/tabela.php"><button class="button is-medium"><i class="fas fa-arrow-left" style="margin-right: 10px; font-size:16px"></i> Voltar</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
