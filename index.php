<?php
session_start();
include('conexao.php');	
$msg ="";
$msgcor ="";
unset($_SESSION['CPF']);
if (isset($_POST['CPF']) || isset($_POST['Senha'])) {

	if(empty($_POST['CPF'])) {
		$msg = "Preencha com seu CPF";		
		$msgcor = "#B31117";
	} else if(empty($_POST['Senha'])) {
		$msg = "preencha sua Senha";		
		$msgcor = "#B31117";
	} else {



		$_SESSION['CPF'] = $mysqli->escape_string($_POST['CPF']);
		$_SESSION['Senha'] = $mysqli->escape_string(md5($_POST['Senha']));

		$sql_code = "SELECT Senha from user where CPF = '$_SESSION[CPF]' and Senha = '$_SESSION[Senha]'";
		$sql_query = mysqli_query($mysqli, $sql_code);
		$quantidade = $sql_query->num_rows;

		if($quantidade == 1){
			header("Location: painel.php");
			exit();
		} else {
			$msg = "Não foi possivel fazer login, informe CPF ou senha corretamente";
			$msgcor = "#B31117";
			unset($_SESSION['CPF']);

		}
	}
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de curriculos - Login</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/principal.js"></script>
</head>

<body>
	<section class="hero is-success is-fullheight">
	        <div class="hero-body">
	            <div class="container has-text-centered">
	                <div class="column is-4 is-offset-4">
	                    <h3 class="title has-text-grey">Acesso ao sistema</h3>
	                         <form action="" method="POST">
	                         	<?php
			                    if($msg != ""):
			                    ?>
			                    <div class="notification is-info" style="background-color: <?php echo $msgcor; ?> !important;">
			                        <p><?php echo $msg; ?></p>
			                    </div>
			                    <?php         
			                    endif;           
			                    ?>
	                        	<h2 style="color: #B31117" id="erro"></h2>	
	                            <div class="field">
	                                <div class="control">
	                                    <input id="CPF" type="text" name="CPF" class="input is-large" placeholder="CPF"required maxlength="11">
	                                </div>
	                            <div class="field">
	                           	</div>	
	                                <div class="control">
	                                    <input name="Senha" type="password" class="input is-large" placeholder="Senha" required>
	                                </div>
	                            </div>
	                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Acessar</button>
	                            <br>
	                            <a href="cadastro_id.php" style="color: #2975D9">Cadastre-se aqui</a>
						</form>
</body>
</html>