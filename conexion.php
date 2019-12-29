<?php

$usuario = 'root';
$contraseña = '';

try {
    $mbd = new PDO('mysql:host=localhost;dbname=sistema', $usuario, $contraseña);    
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>