<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>nome do site</title>
	<meta charset="utf-8" />
</head>
<body>
	<form method="post" action="criar_noticia_post.php">
		<input type="text" placeholder="titulo" name="titulo"/><br/>
		<textarea type="text" placeholder="texto" name="texto"></textarea><br/>
<?php
		echo "<input name='id_autor' hidden value='". $_GET['id'] . "'/>";
?>
		<input type="submit" value="Criar noticia"/>
	</form>
	<br/>
	<button>
		<?php echo "<a href='minhas_noticias.php?id=".$_GET['id']."'>Voltar</a>"; ?>

	</button>
</body>
<html>
