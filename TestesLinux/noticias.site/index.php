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
$comando = "SELECT * FROM noticias";
$resultado =  mysqli_query($bd, $comando) or die(mysqli_error($bd));
?>
<h1 style="display: inline;">Noticias</h1><a href="login.html">Login</a>
<?php
while ($registro = mysqli_fetch_assoc($resultado) )
{
	$autor_find = "SELECT nome FROM autores where id = " . $registro['id_autor']; 
	$autor_nome = mysqli_query ($bd, $autor_find) or die(mysqli_error($bd));
	while ($nome = mysqli_fetch_assoc($autor_nome)){$autor = $nome['nome'];}
	
	echo "<div><a href='ver_noticia.php?id=" . $registro['id'] . "'>";
		echo "<h2>" . $registro['titulo'] . "</h2>";
		echo "<p>Por: " . $autor . "</p>";
	echo "</div></a><hr />";
	
}
?>
</body>
<html>
