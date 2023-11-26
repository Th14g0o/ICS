<?php
include('context.php');
$titulo = $_POST['titulo']; 
$texto = $_POST['texto'];
$id_autor= $_POST['id_autor'];
$id = $_POST['id'];

$upd = "UPDATE noticias SET titulo='".$titulo."',texto='".$texto."' WHERE id=".$id;
$resultado = mysqli_query($bd, $upd) or die(mysqli_error($bd));
?>
<script>
	alert("noticia atualizada com sucesso");
	<?php
	echo "window.location='minhas_noticias.php?id=" . $id_autor ."';"; 
	?>
</script>
