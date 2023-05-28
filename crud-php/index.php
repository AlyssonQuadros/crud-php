<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php include('header.php'); ?>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body has-text-centered">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h1 class="title has-text-white">Sistema de Cadastro de Cliente</h3>
                    <div class="box has-text-centered" style="box-shadow: 15px 15px; color:#2a98ff">
                        <a href="/cadastro.php"><button class="btn btn-primary"><i class="fa fa-user-plus"></i> Cadastrar Cliente</button></a>
                        <div>
                        <a href="/tabela.php"><button class="btn btn-primary"><i class="fa-solid fa-table"></i> Clientes cadastrados</button></a> <br/><br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>


</html>