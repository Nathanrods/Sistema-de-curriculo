<?php
session_start();
include('conexao.php');
include("protect.php");

if(!empty($_GET['search']))
{
  $data = $_GET['search'];
    $sql = "SELECT * FROM vagas WHERE upper(id_vaga) LIKE upper('%$data%') or UPPER(empresa) LIKE UPPER('%$data%') or UPPER(cargo) LIKE UPPER('%$data%') ORDER BY id_vaga DESC";  
}
else
{
  $sql = "SELECT * FROM vagas ORDER BY id_vaga DESC";
}
$result = $mysqli->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
  <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Página de vagas</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="css/vagas.css" />
  <link href="css/bulma.min.css" />
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
      <div class="box-search">
        <form name="pesquisa" action="pagina_vagas.php" method="GET">
          <input type="box-search" class="form-control w-25" placeholder="Pesquise a vaga desejada" id="pesquisar" name="search">
            <button onclick="searchData()"class="btn btn-primary">
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
            </button>
          </form>
      </div>
      <main>
        <div id="container">
        <table class="table-bg">
          <thead>
                <tr>
                  <th scope="col">Cod</th>
                  <th scope="col">Empresa</th>
                  <th scope="col">Cargo</th>
                  <th scope="col">Atividade</th>
                  <th scope="col">Local</th>
                  <th scope="col">Carga horaria</th>
                  <th scope="col">Cidade</th>
                  <th scope="col">Faixa Salarial</th>
                  <th scope="col">Nível hierárquico</th>
                </tr>
          </thead>      
          <tbody>
            <?php
               while ($user_data = mysqli_fetch_assoc($result)) 
               {
                echo "<tr>";
                echo "<td>".$user_data['id_vaga']."</td>";
                echo "<td>".$user_data['empresa']."</td>";
                echo "<td>".$user_data['cargo']."</td>";
                echo "<td>".$user_data['atividade']."</td>";
                echo "<td>".$user_data['local']."</td>";
                echo "<td>".$user_data['cargah']."</td>";
                echo "<td>".$user_data['cidade']."</td>";
                echo "<td>".$user_data['faixasalario']."</td>";
                echo "<td>".$user_data['nivel']."</td>";
                echo "</tr>";
               }
            ?>
          </tbody>
        </table>
        </div>
      </main>
    </body>
  <script>
      var search = document.getElementById('pesquisar');

      search.addEventListener("keydown", function(event) {
        if (event.key === "Enter")
        {
          searchData();
        }
      });

      function searchData()
      {
        window.location = 'pagina_vagas.php?search='+search.value;
      }
  </script>
</html>