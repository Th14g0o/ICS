<?php
include('context.php');
$find_noticia = "SELECT  titulo, texto FROM noticias WHERE id=" . $_GET['id'];
$resultado = mysqli_query($bd, $find_noticia) or die(mysqli_error($bd));
while ($registro = mysqli_fetch_assoc($resultado))
{
	$texto = $registro['texto'];
	$titulo = $registro['titulo'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>nome do site</title>
	<meta charset="utf-8" />
</head>
<body>
	<form method="post" action="editar_noticia_post.php">
<?php
		echo "<input name='titulo' type='text' value='". $titulo . "'/><br/>";
		echo "<textarea name='texto'>".$texto."</textarea><br/>";
		echo "<input name='id' hidden value='". $_GET['id'] . "'/>";
		echo "<input name='id_autor' hidden value='". $_GET['id_autor'] . "'/>";
?>
		<input type="submit" value="Criar noticia"/>
	</form>
	<br/>
	<button>
		<?php echo "<a href='minhas_noticias.php?id=".$_GET['id_autor']."'>Voltar</a>"; ?>

	</button>
</body>
<html>
