
<?php

include_once 'conexion.php';


    $id = $_GET['id'];
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];
    $correo = $_GET['correo'];
    $telefono = $_GET['telefono'];

    $sentencia = $mbd->prepare("UPDATE clientes SET nombre = ?, apellido = ? , correo = ?, telefono = ? where id = ? ");
    $sentencia->bindParam(1, $nombre);
    $sentencia->bindParam(2, $apellido);
    $sentencia->bindParam(3, $correo);
    $sentencia->bindParam(4, $telefono);
    $sentencia->bindParam(5, $id);

    $sentencia->execute();

    header('Location:index.php');


?>


