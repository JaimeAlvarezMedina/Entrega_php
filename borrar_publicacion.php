<?php
    include('cabecera.php');
    include('conexion.php');
    	try{

   	 	$id_publicacion=$_POST["id"];


    		$consulta= $conexion->prepare("DELETE FROM articulos WHERE ID_articulo='$id_publicacion'");
    		$consulta->execute();
		echo json_encode('Correcto');
	}catch(PDOException $e){
        	echo "ERROR: " . $e->getMessage();
    	}
?>
