<?php
session_start();
include('lib/class.php');
include('lib/conexion.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Subir archivos</title>
</head>
<body>

	<h1>Agregar Producto </h1>
	<form action="" method="post" enctype="multipart/form-data">
		<label> Imagen del Producto </label>
		<input type="file" name="imagen" required>
		<br>
		<label> Descripcion </label>
		<textarea cols="30" rows="5" name="descripcion" required></textarea>
		<br>
		<input type="submit" value="Agregar Producto">

	</form>

	<?php
	if($_POST){

		//print_r($_FILES['imagen']);

		if($_FILES['imagen']['type'] == 'image/jpeg' OR $_FILES['imagen']['type'] == 'image/png' ){
			$rutaServidor = 'uploads';  
			$rutaTemporal = $_FILES['imagen']['tmp_name'];
			$nombreImagen = $_FILES['imagen']['name']; 
			$rutaDestino = $rutaServidor.'/'.$nombreImagen;
			move_uploaded_file($rutaTemporal, $rutaDestino);
			$descripcion = $_POST['descripcion'];
			$product = new Producto();
			$product->agregar_producto($rutaDestino, $descripcion);		
		}else{

			echo '<p style="color:red">Solo se admiten imagenes con extensi&oacute;n .jpg o .png, vuelva a intentarlo.<p>';
		}
	}
	?>
</body>

</html>
