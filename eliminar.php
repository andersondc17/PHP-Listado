<?php

include_once 'conexion.php';

$id = $_GET['id'];

$sentencia = $mbd->prepare("DELETE FROM clientes where id = ? ");
$sentencia->bindParam(1, $id);

$sentencia->execute();

header('Location:index.php');

?>
