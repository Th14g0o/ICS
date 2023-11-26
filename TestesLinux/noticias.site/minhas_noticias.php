<?php
include('context.php');
if(isset($_POST['senha']) && isset($_POST['email']))
{
	$senhaPOST = $_POST['senha'];	
	$emailPOST = $_POST['email'];
	$find_autor = "SELECT * FROM autores WHERE email='".$emailPOST."' and senha='".$senhaPOST . "'";
}
else if(isset($_GET['id']))
{
	$find_autor = "SELECT * FROM autores WHERE id =".$_GET['id'];
}
else
{
	die("Erro no login");
}

	$resultado_find_autor = mysqli_query($bd, $find_autor) or die(mysqli_error($bd));
	while( $registro = mysqli_fetch_assoc($resultado_find_autor))
	{
		$id = $registro['id'];
		$nome = $registro['nome'];
		$email = $registro['email'];
		$senha = $registro['senha'];
	}



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>nome do site</title>
	<meta charset="utf-8" />
</head>
<body>
<?php
$find_noticias = "SELECT * FROM noticias WHERE id_autor = " . $id;
$resultado =  mysqli_query($bd, $find_noticias) or die(mysqli_error($bd));
?>
<h1>
	Minhas noticias 
<?php 
	echo "(" . $id . " - " . $nome . ")";  
	
?>
</h1>
<?php echo "<a href='index.php'>Deslogar</a>"; ?>
<p>
<?php
	echo "<a href='criar_noticia.php?id=".$id."' >Criar nova notica</a>";
?>
</p>
<?php
while ($noticia = mysqli_fetch_assoc($resultado) )
{
	
	echo "<div><a href='ver_minha_noticia.php?id=".$noticia['id']."&id_autor=".$id."'>";
		echo "<h2>" . $noticia['titulo'] . "</h2>";
		echo "<p>Por: " . $nome . "</p>";
		
	echo "</a><br/>";
	echo "<a href='editar_noticia.php?id=".$noticia['id']."&id_autor=".$id."'>Editar</a>";
	echo " | <a href='apagar_noticia.php?id=".$noticia['id']."&id_autor=".$id."'>Delete</a>";
	echo "</div><hr/>";

	
}
?>
</body>
<html>
