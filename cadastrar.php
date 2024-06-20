<?php
session_start();
include("conexao.php");
$_SESSION['msg'] = "";
$_SESSION['msgcor'] = "";

$nomecompleto = mysqli_real_escape_string($mysqli, trim($_POST['nome']));
$CPF = mysqli_real_escape_string($mysqli, trim($_POST['CPF']));
if (isset($_POST['email']))
	$email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
else
	$email ="";
$Senha = mysqli_real_escape_string($mysqli, md5($_POST['senha']));
if (isset($_POST['datanascimento']))
	$datanascimento = mysqli_real_escape_string($mysqli, trim($_POST['datanascimento']));
else
	$datanascimento ="";

if (isset($_POST['formacao']))
	$formacao = mysqli_real_escape_string($mysqli, trim($_POST['formacao']));
else
	$formacao ="";

if (isset($_POST['experienciapro']))
	$experienciapro = mysqli_real_escape_string($mysqli, trim($_POST['experienciapro']));
else
	$experienciapro ="";
if (isset($_POST['linkedin']))
	$linkedin = mysqli_real_escape_string($mysqli, trim($_POST['linkedin']));
else
	$linkedin ="";
if (isset($_POST['CEP']))
	$CEP = mysqli_real_escape_string($mysqli, trim($_POST['CEP']));
else
	$CEP ="";
if (isset($_POST['rua']))
	$Rua = mysqli_real_escape_string($mysqli, trim($_POST['Rua']));
else 
	$Rua ="";
if (isset($_POST['bairro']))
	$bairro = mysqli_real_escape_string($mysqli, trim($_POST['bairro']));
else
	$bairro ="";
if (isset($_POST['cidade']))
	$cidade = mysqli_real_escape_string($mysqli, trim($_POST['cidade']));
else 
	$cidade ="";
if (isset($_POST['uf']))
	$uf = mysqli_real_escape_string($mysqli, trim($_POST['uf']));
else
	$uf ="";

$sql = "select count(*) as total from user where CPF = '$CPF'";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);


if (!validaCPF($CPF)){
	$_SESSION['msg'] = "CPF não válido, insira um CPF correto.";
	$_SESSION['msgcor'] = "#B31117";
	header('Location: cadastro_id.php');
	exit;

}

if($row['total'] == 1) {
	$_SESSION['msg'] = 'O usuário escolhido já existe. Informe outro e tente novamente.';
	$_SESSION['msgcor'] = "#F2BE22";
	header('Location: cadastro_id.php');
	exit;
}


$sql = "INSERT INTO user (nomecompleto, CPF, email, Senha, datanascimento, formacao, experienciapro, linkedin, CEP, bairro, cidade, uf) VALUES ('$nomecompleto', '$CPF', '$email', '$Senha', '$datanascimento', '$formacao', '$experienciapro', '$linkedin', '$CEP', '$bairro', '$cidade', '$uf')";

if($mysqli->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
	header('Location: cadastro_id.php');
}
function validaCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;

}

$mysqli->close();

header('Location: index.php');
exit;

?>