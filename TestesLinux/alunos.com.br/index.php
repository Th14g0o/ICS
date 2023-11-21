<?php
	//ip da VM com banco de dado, usuario_ bd, senha usuario bd, 
	//nome da base de  dado(esquema)
	$conexao = new mysqli("192.168.100.20","ics","ics","siteics");
	if($conexao -> connect_error){
		die("Conexção falhou: " . $conexao -> connect_error);	
	}

	$sql = "SELECT id, nome, idade FROM alunos"; 
	
	$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Lista de alunos</title>
</head>
<body>
<?php
	if($resultado->num_rows > 0){
?>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>NOME</th>
			<th>IDADE</th>
		</tr>
	<?php
		while($linha = $resultado->fetch_assoc()){
	?>
		<tr>
			<?php
 			echo "<td>" . $linha['id'] . "</td>";
			echo "<td>" . $linha['nome'] . "</td>";
			echo "<td>" . $linha['idade'] . "</td>";
		 	echo "<td><a href='excluir.php?id=" . $linha['id'] . "' >Excluir</a></td>";
			echo "<td><a href='editar.php?id=" . $linha['id'] . "' >Editar</a></td>";
			
			?>
			
		</tr>
	<?php
		}
	?>
	<table>
<?php }
	else{
	echo "<span>Nenhum usuario registrado</span>";
	}
?>
	<a href="create.html">Criar novo</a>
</body>
</html>
<?php
	$conexao->close();
?>
