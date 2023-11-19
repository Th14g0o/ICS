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
	$id =  $_POST['id'];

	$sql = "UPDATE  alunos SET  nome = ?, idade = ?  WHERE id = ?";
	$preparando =  $conexao->prepare($sql);
	$preparando -> bind_param("sii", $nome, $idade, $id);

	if($preparando->execute()){
		echo "Aluno atualizado com sucesso";
	}
	else{ 
		echo "Aluno não atualizado com sucesso";
	}
	$conexao->close();
?>
	</h1>
	<a href="index.php">Ver usuarios cadastrados</a>
</body>
</html>
