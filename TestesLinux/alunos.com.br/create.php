<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Criar Alunos</title>
</head>
<body>
	<h1>
<?php

	$conexao = new mysqli("192.168.100.20", "ics", "ics", "siteics");
	if ($conexao -> connect_error){
		die("Coneção falhou: " . $conexao->connect_error);
	}

	$nome = $_POST['nome'];
	$idade = $_POST['idade'];
	$sql = "INSERT INTO alunos (nome,idade) VALUES ('$nome','$idade')";

	if($conexao->query($sql) === TRUE){
		echo "Aluno cadastrado com sucesso!";
	}
	else{ echo "Erro ao cadastrar aluno";}

	$conexao->close();
?>
	</h1>
	<br />
	<a href="index.php">Ver usuarios cadastrados</a>
	<br />
	<a href="create.html">Cadastrar outro usuario</a>
</body>
</html>
