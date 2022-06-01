<?php

include("cabecera.php");
include("conexion.php"); 
$filename        = $_FILES['subir_archivo']['name'];
$sourceFoto      = $_FILES['subir_archivo']['tmp_name'];

date_default_timezone_set("Europe/Madrid");
setlocale(LC_ALL,"es_ES");
$fecha_imagen   = date("d/m/Y h:i A");

$logitudPass    = 15;
$newNameFoto    = substr( md5(microtime()), 1, $logitudPass);

$explode        = explode('.', $filename);
$extension_foto = array_pop($explode);
$nuevoNameFoto  = 'img-'.$_POST["usuario"].$newNameFoto.'.'.$extension_foto;
//Verificando si existe el directorio
$dirLocal = "/home/imagenes";
if (!file_exists($dirLocal)) {
    mkdir($dirLocal, 0777, true);
}

$miDir         = opendir($dirLocal); //abro el directorio
$imagenCliente = $dirLocal.'/'.$nuevoNameFoto;
if(move_uploaded_file($sourceFoto, $imagenCliente)){

if($extension_foto=='gif'){
	echo json_encode('No disponible');
}
else{
        echo json_encode($nuevoNameFoto);
}

}
?>
