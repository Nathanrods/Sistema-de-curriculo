<?php
session_start();
include('conexao.php');
include("protect.php");

if(!isset($_SESSION)) {
	session_start();
}

$sql = "SELECT * FROM user WHERE CPF = '{$_SESSION['CPF']}'";

$result = $mysqli->query($sql);

//print_r($result);

?>
<!DOCTYPE html>
<html lang= "en" >
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuario</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/usuario.css" />
</head>
<body>
    <header>
    <div class="caixa">
      <nav>
        <img src="imagens\logo-white.png" alt="logo-white.png" style="width:120px;height:35px;"> 
        <ul class="nav-list">
        <h5><a href="painel.php">Voltar ao Painel</a></h5>
        <h5><a href="index.php">Sair</a></h5>
        </ul>
      </nav>
    </header>
      <main>
        <main class="cards">
      <section class="card contact">
        <div>
        <table class="table-bg">
          <tbody>
            <?php
               while ($user_data = mysqli_fetch_assoc($result)) 
               {
                echo "<td><img src=".$user_data['foto']."></td>";
                echo "<tr>";
                echo "<th scope='col'>Nome</th>";
                echo "<th scope='col'>CPF</th>";
                echo "<th scope='col'>Email</th>";
                echo "</tr>";
                echo "<td>".$user_data['nomecompleto']."</td>";
                echo "<td>".$user_data['CPF']."</td>";
                echo "<td>".$user_data['email']."</td>";                 
                echo "<tr>";
                echo "<th scope='col'>Data de Nascimento</th>";
                echo "<th scope='col'>Formação</th>";
                echo "<th scope='col'>linkedin</th>";
                echo "</tr>";
                echo "<td>".$user_data['datanascimento']."</td>";
                echo "<td>".$user_data['formacao']."</td>";
                echo "<td>".$user_data['linkedin']."</td>";
                echo "</tr>";
                echo "<th scope='col'>CEP</th>";
                echo "<th scope='col'>Rua</th>";
                echo "<th scope='col'>Bairro</th>";
                echo "</tr>";
                echo "<td>".$user_data['CEP']."</td>";
                echo "<td>".$user_data['rua']."</td>";
                echo "<td>".$user_data['bairro']."</td>";
                echo "</tr>";
                echo "<th scope='col'>Experiencia Profissional</th>";
                echo "<th scope='col'>Cidade</th>";
                echo "<th scope='col'>UF</th>";
                echo "</tr>";
                echo "<td>".$user_data['experienciapro']."</td>";
                echo "<td>".$user_data['cidade']."</td>";
                echo "<td>".$user_data['uf']."</td>";
                echo "</tr>";   
               }
            ?>

          </tbody>
        </table>
        </div>
      </section>
      </main>
    </body>
  <script></script>
</html>