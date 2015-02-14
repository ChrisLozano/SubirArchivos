<?php
session_start();
include('lib/class.php');
include('lib/conexion.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Subir Archivos al servidor</title>
</head>
<body>
<h1> Cat&aacute;logo de Productos </h1>
<a href="agregar_producto.php">Agregar Producto </a><br><br>
<table border="1" cellspacing="0">
	<tr>
		<td>Imagen</td>
		<td>Descripci&oacute;n</td>
	</tr>
	<?php
	$listar = new Producto();
	$registros = $listar->listar_productos();
    for($i = 0; $i<sizeof($registros); $i++){
	?>
	<tr>
		<td><img src="<?php echo $registros[$i]['imagen'];?>" width="100" height="100"></td>
		<td><?php echo $registros[$i]['descripcion'];?></td>
		</td>
	</tr>
<?php
}
?>
</table>

</body>

</html>

