<?php
session_start();
include("conexao.php");
$sql = "select * from user where CPF = {$_SESSION['CPF']}";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
if(isset($_FILES['arquivo'])){
      $diretorio='arquivos/';
      $errors= array();
      $file_name = $_FILES['arquivo']['name'];
      $file_size =$_FILES['arquivo']['size'];
      $file_tmp =$_FILES['arquivo']['tmp_name'];
      $file_type=$_FILES['arquivo']['type'];

      $extension = pathinfo($file_name, PATHINFO_EXTENSION);     

      
      //$file_ext=strtolower(end(explode('.',$_FILES['arquivo']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      /*if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      */

     $foto = $row['foto'];      
      if(empty($errors)==true){
      	if($file_tmp != ""){
            $foto =  $diretorio."foto_".time().".".$extension;
        	   move_uploaded_file($file_tmp,$foto);        	
      	}
      }else{
         print_r($errors);
      }
   }
$nomecompleto = $row['nomecompleto'];
if($_POST['nomecompleto'] != "")
   $nomecompleto = mysqli_real_escape_string($mysqli, trim($_POST['nomecompleto']));

$email = $row['email'];
if($_POST['email'] != "")
   $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));

$datanascimento = $row['datanascimento'];
if($_POST['datanascimento'] != "")
   $datanascimento = mysqli_real_escape_string($mysqli, trim($_POST['datanascimento']));

$endereco = $row['endereco'];
if($_POST['endereco'] != "")
   $endereco = mysqli_real_escape_string($mysqli, trim($_POST['endereco']));

$formacao = $row['formacao'];
if($_POST['formacao'] != "")
   $formacao = mysqli_real_escape_string($mysqli, trim($_POST['formacao']));

$experienciapro = $row['experienciapro'];
if($_POST['experienciapro'] != "")
   $experienciapro = mysqli_real_escape_string($mysqli, trim($_POST['experienciapro']));

$competencia = $row['competencia'];
if($_POST['competencia'] != "")
   $competencia = mysqli_real_escape_string($mysqli, trim($_POST['competencia']));

$linkedin = $row['linkedin'];
if($_POST['linkedin'] != "")
   $linkedin = mysqli_real_escape_string($mysqli, trim($_POST['linkedin']));

$CEP = $row['CEP'];
if($_POST['CEP'] != "")
   $CEP = mysqli_real_escape_string($mysqli, trim($_POST['CEP']));

$rua = $row['rua'];
if($_POST['rua'] != "")
   $rua = mysqli_real_escape_string($mysqli, trim($_POST['rua']));

$bairro = $row['bairro'];
if($_POST['bairro'] != "")
   $bairro = mysqli_real_escape_string($mysqli, trim($_POST['bairro']));

$cidade = $row['cidade'];
if($_POST['cidade'] != "")
   $cidade = mysqli_real_escape_string($mysqli, trim($_POST['cidade']));

$uf = $row['uf'];
if($_POST['uf'] != "")
   $uf = mysqli_real_escape_string($mysqli, trim($_POST['uf']));


$sql = "UPDATE user SET nomecompleto='$nomecompleto', email='$email', datanascimento='$datanascimento',  formacao='$formacao', experienciapro='$experienciapro',  linkedin='$linkedin', CEP='$CEP', rua='$rua', bairro='$bairro', cidade='$cidade', uf='$uf', foto='$foto' where CPF = {$_SESSION['CPF']}";


if ($mysqli->query($sql) === TRUE) {
    $_SESSION['status_editar'] = true;
}

$mysqli->close();
header('Location: usuario.php');
exit;
?>