<?php
include('context.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>nome do site</title>
	<meta charset="utf-8" />
</head>
<body>
<?php
$find_noticia = "SELECT * FROM noticias WHERE id = " . $_GET['id'];
$noticia = mysqli_query($bd, $find_noticia) or die(mysqli_error($bd));$find_autor = "SELECT * FROM autores WHERE id =" . $_GET['id'];
?>
<?php 
while($registro = mysqli_fetch_assoc($noticia))
{
	$find_autor = "SELECT nome, email FROM autores WHERE id = " . $registro['id_autor'];
	$autor = mysqli_query($bd, $find_autor) or die(mysqli_error($bd));
	while($nome_email = mysqli_fetch_assoc($autor))
	{ $nome = $nome_email['nome']; $email = $nome_email['email'];}
	
	echo "<h1>" . $registro['titulo'] . "</h1>";
	echo "<p>" . $registro['texto'] . "</p><hr/>";
	echo "<span>Autor: " . $nome . "</span><br/><span>Email: " . $email . "</span>";
} 
?>
<br/>
<button>
	<?php echo "<a href='minhas_noticias.php?id=". $_GET['id_autor']."'>Voltar</a>"; ?>
</button>
</body>
<html>
