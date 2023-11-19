<?php
	if(isset($_GET['id'])){

		$id_aluno = $_GET['id'];
		$conexao = new mysqli("192.168.100.20","ics","ics","siteics");
		if($conexao->connect_error){ die("Conexão falhou" . $conexao->connect_error);}

		
		$sql_select = "SELECT id, nome, idade FROM alunos WHERE id = ?"; 
		$preparando_select = $conexao->prepare($sql_select); 
		if(!$preparando_select){die("Erro na declaração");} 
		$preparando_select->bind_param("i", $id_aluno); 
		$preparando_select->execute();
		$preparando_select->bind_result($id, $nome, $idade);
		//associa essas variaveis aos valores recibidos na ordem das colunas
		if($preparando_select->fetch()){
			$nome_aluno =  $nome;
			$idade_aluno = $idade;
		}
		
		else{
			die("Erro na busca pelo usuario");
		}
		$preparando_select->close();

		$sql = "DELETE FROM alunos WHERE id = ?";
		$preparando = $conexao->prepare($sql);
		$preparando->bind_param("i",$id_aluno);
		//i sognifica inteiro,  esse comando coloca o id_aluno no lugar da "?" no sql
		$preparando->execute();

		$conexao->close();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Aluno Deletado</title>
</head>
<body>
	<h1>
<?php
	if(isset($_GET['id'])){
		echo "O Aluno " . $nome_aluno . " de " . $idade_aluno ." Foi deletado";
	}
	else{
	echo "Id não fornecido";
	}
?>	
	</h1>
	<a href="index.php">Voltar a lista</a>

</body>
</html>


