<?php
include('context.php');
$id= $_GET['id'];
$id_autor = $_GET['id_autor'];
$del = "DELETE FROM noticias WHERE id = " . $id ;
$resultado = mysqli_query($bd, $del) or die(mysqli_error($bd));
?>
<script>
	alert("noticia removida com sucesso");
	<?php
	echo "window.location='minhas_noticias.php?id=" . $id_autor ."';"; 
	?>
</script>
