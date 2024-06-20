<?php
if (!$_SESSION['CPF']) {
	header("Location: index.php");
	exit();
}
?>