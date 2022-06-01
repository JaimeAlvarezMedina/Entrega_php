<?php
    include('cabecera.php');
    include('conexion.php');

    $usuario=$_POST["usuario"];
    $usuario_actual=$_POST["usuario_actual"];
    $encontrado=false;

    if($usuario!=""){
        $consulta=("SELECT * FROM usuarios");
        foreach ($conexion->query($consulta) as $dato) {
            if($dato['User']==$usuario){
                echo json_encode("no disponible");
                $encontrado=true;
            }
        }
    }
    if($encontrado==false){
        $consulta1= $conexion->prepare("UPDATE usuarios SET User='$usuario' where User='$usuario_actual'  ");
        $consulta1->execute();
        $consulta2= $conexion->prepare("UPDATE likes_dislikes SET User='$usuario' where User='$usuario_actual'  ");
        $consulta2->execute();
        $consulta3= $conexion->prepare("UPDATE articulos SET Creador='$usuario' where Creador='$usuario_actual'  ");
        $consulta3->execute();
        echo json_encode("Correcto");
    }
?>
