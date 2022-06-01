<?php
    include("cabecera.php");
    include("conexion.php"); 

    try{
        $cuerpo=$_POST["cuerpo"];
        $user=$_POST["creador"];
        $titulo=$_POST["titulo"];
        $categoria=$_POST["categoria"];

        // $texto = implode("//-//",$cuerpo);
        $consultasubir= $conexion->prepare("UPDATE usuarios SET Total_post=Total_post+1 where User='$user'");
        $consultasubir->execute();

        $consulta = ("INSERT INTO articulos(Titulo, Cuerpo, Categoria, Creador) VALUES ('$titulo','$cuerpo','$categoria','$user')");/* Hacemos la consulta */
        $conexion->query($consulta);/* La ejecutamos */
        echo json_encode("Correcto");

    }catch(PDOException $e){
        echo "ERROR: " . $e->getMessage();
    }
?>
