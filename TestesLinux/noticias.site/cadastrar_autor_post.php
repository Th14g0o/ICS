<?php
include('context.php');

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['email'];

$add = "INSERT INTO autores (nome,email,senha) VALUES ('".$nome ."','".$email."','".$senha."')";
$resultado = mysqli_query($bd, $add) or die(mysqli_error($db));
?>

<script>
	alert("Adicionado com sucesso");
	window.location = "login.html";
</script>
