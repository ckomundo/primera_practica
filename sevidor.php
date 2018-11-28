<?php

$nombre = (isset($_REQUEST['nombre'])) ? $_REQUEST['nombre'] : "";
$apellido = (isset($_REQUEST['apellido'])) ? $_REQUEST['apellido'] : "";
$edad = (isset($_REQUEST['edad'])) ? $_REQUEST['edad'] : "";
$grupo = (isset($_REQUEST['grupo'])) ? $_REQUEST['grupo'] : "";
$extra = (isset($_REQUEST['extra'])) ? $_REQUEST['extra'] : "";


if ($nombre == "") {
  echo json_encode(["estatus" => "error", "respuesta" => "Escribe tu nombre"]);
  exit();
}
if ($apellido == "") {
  echo json_encode(["estatus" => "error", "respuesta" => "escribe tus apellidos"]);
  exit();
}
if ($edad ==""){
  echo json_encode(["estatus" => "error", "respuesta" => "Pon tu edad"]);
}
if($grupo == ""){
	echo json_encode(["estatus" => "error", "respuesta" => "esss grupo"]);
	exit();
}

try {

   	$usuario = "root";
   	$contrasena = "Megadev_1";

   	$mbd = new PDO('mysql:host=localhost;dbname=Escuelan', $usuario, $contrasena);

   	$sql = "INSERT INTO `alumno` (`id_alumno`, `nombre`, `a_paterno`, `a_materno`, `edad`, `id_grupo`, `id_comentario`, `estatus`, `f_creacion`)
				VALUES
			(NULL, :nombre, :a_paterno, NULL, :edad, :id_grupo, NULL, :estatus, CURRENT_TIMESTAMP);";

   	$sth = $mbd->prepare($sql)->execute([
  	 	":nombre"=>$nombre,
  	 	":a_paterno"=>$apellido,
  		":edad"=>$edad,
  		":id_grupo"=>$grupo,
  		":estatus"=>1
  	]);

  	echo json_encode(["estatus" => "success", "respuesta" => "Se almaceno"]);
  	exit();

} catch (PDOExeption $e) {
		echo json_encode(["estatus" => "error", "respuesta" => $e->getMessage()]);
		die();
		exit();
}

 ?>
