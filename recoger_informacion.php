<?php
    include('cabecera.php');
    include('conexion.php');

       

        $consulta= $conexion->prepare("SELECT DISTINCT * FROM `articulos` ORDER BY  ID_articulo Desc");
        $consulta->execute();
        echo json_encode($consulta->fetchAll());
       
?>
