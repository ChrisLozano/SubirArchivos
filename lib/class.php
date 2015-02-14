<?php

class Producto{

	private $registros;

	public function __construct(){
		$this->registros = array();
	}

	public function listar_productos(){
	$sql = "SELECT * FROM productos";
	$result = mysql_query($sql, Conexion::conectar());
	while($row = mysql_fetch_assoc($result)){
		$this->registros[] = $row;
	}
	return $this->registros;

	}

	public function agregar_producto($rutaDestino, $descripcion){
		$sql = "INSERT INTO productos(imagen, descripcion) VALUES ('$rutaDestino', '$descripcion')";
		$result = mysql_query($sql, Conexion::conectar());
		if($result){
			echo 
			'<script>
			alert("Producto agregado con exito");
			window.location.href="index.php";
			</script>';

		}else{
			echo 'Error '.mysql_errno().": ".mysql_error();

		}

	}

}

