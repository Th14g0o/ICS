<?php
	if(isset($_GET['id'])){

		$id_aluno = $_GET['id'];
		$conexao = new mysqli("192.168.100.20","ics","ics","siteics");
		if($conexao->connect_error)
		{ 
			die("Conexão falhou" . $conexao->connect_error);
		}
		$sql = "SELECT nome, idade FROM alunos WHERE id = ?";
		$preparando = $conexao->prepare($sql);
		$preparando->bind_param("i", $id_aluno);
		$preparando->execute();
		$preparando->bind_result($nome, $idade);
		if($preparando->fetch()){
			$nome_aluno = $nome;
			$idade_aluno = $idade;
		}	
		else{die("Erro ao encontrar usuario");}
		$conexao->close();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Editar aluno</title>
</head>
<body>
	<h1>Editar aluno</h1>
	<form action="atualizar.php" method="post">
		<?php
			echo "<input name='nome' type='text' value='" .  $nome_aluno . "' />";
			echo "<input name='idade' type='numeric' value='" .  $idade_aluno . "' />";
			echo "<input hidden name='id' type='numeric' value='" .  $id_aluno . "' />"; 
		?>
		<input type="submit" value="EDITAR" />
	</form>
</body>
</html>


