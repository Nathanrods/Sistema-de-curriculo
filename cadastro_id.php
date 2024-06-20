<?php
session_start();
$msg= isset($_SESSION['msg']) ? $_SESSION['msg'] : "";
$msgcor= isset($_SESSION['msgcor']) ? $_SESSION['msgcor'] : "";
unset($_SESSION['msg']);
unset($_SESSION['msgcor']);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Cadastro</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Sistema de Cadastro</h3>
                    <?php
                    if(isset($_SESSION['status_cadastro'])):
                    ?>
                    <?php
                    endif;
                    unset($_SESSION['status_cadastro']);
                    ?>
                    <?php
                    if($msg != ""):
                    ?>
                    <div class="notification is-info" style="background-color: <?php echo $msgcor; ?> !important;">
                        <p><?php echo $msg; ?></p>
                    </div>
                    <?php         
                    endif;           
                    ?>
                    <div class="box">
                        <form action="cadastrar.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="nome" type="text" class="input is-large" placeholder="Nome completo" required autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="CPF" type="text" class="input is-large" placeholder="CPF" maxlength="11">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="senha" class="input is-large" type="password" placeholder="Senha" required>
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar</button>
                            <br>
                                <h3><a href="index.php">Voltar</a></h3>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>