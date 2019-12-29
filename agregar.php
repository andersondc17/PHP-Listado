
<?php

    include_once 'conexion.php';
 

    if($_POST){
       $nombre = $_POST['nombre'];
       $apellido = $_POST['apellido'];
       $correo = $_POST['correo'];
       $telefono = $_POST['telefono'];

       $sentencia = $mbd->prepare("INSERT INTO clientes (nombre, apellido, correo, telefono) VALUES (?, ?, ?, ?)");
       $sentencia->bindParam(1, $nombre);
       $sentencia->bindParam(2, $apellido);
       $sentencia->bindParam(3, $correo);
       $sentencia->bindParam(4, $telefono);

       $sentencia->execute();

       header('Location:index.php');

    }


   if($_GET){
       
 $id = $_GET['id'];


 $sentencia = $mbd->prepare("SELECT * FROM clientes where id = ?");
 $sentencia->bindParam(1, $id);
 $sentencia->execute();
 $result = $sentencia->fetch();

   }
    
  
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

   <div class="container mt-5">

<?php if(!$_GET): ?>

    <h1>Agregar</h1>


    <form method="POST">
  <div class="form-row">

    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre</label>
      <input type="text" class="form-control" id="inputEmail4" name="nombre">
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">Apellido</label>
      <input type="text" class="form-control" id="inputPassword4" name="apellido">
    </div>

    <div class="form-group col-md-6">
    <label for="inputAddress">Correo</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="example@hotmail.com" name="correo">
  </div>


  <div class="form-group col-md-6">
    <label for="inputAddress2">Telefono</label>
    <input type="text" class="form-control" id="inputAddress2" name="telefono">
  </div>


  </div>


  <button type="submit" class="btn btn-primary">Registrar</button>
  <a href="index.php" class="btn btn-success">Regresar</a>

<?php endif ?>

<?php if($_GET): ?>

<h1>Actualizar</h1>



<form method="GET" action="actualizar.php">

<div class="form-row">
<input type="hidden" value="<?php echo $result['id'] ?>" name="id">

<div class="form-group col-md-6">
  <label for="inputEmail4">Nombre</label>
  <input type="text" class="form-control" id="inputEmail4" name="nombre" value="<?php echo $result['nombre'] ?>">
</div>

<div class="form-group col-md-6">
  <label for="inputPassword4">Apellido</label>
  <input type="text" class="form-control" id="inputPassword4" name="apellido" value="<?php echo $result['apellido'] ?>">
</div>

<div class="form-group col-md-6">
<label for="inputAddress">Correo</label>
<input type="text" class="form-control" id="inputAddress" placeholder="example@hotmail.com" name="correo" value="<?php echo $result['correo'] ?>">
</div>


<div class="form-group col-md-6">
<label for="inputAddress2">Telefono</label>
<input type="text" class="form-control" id="inputAddress2" name="telefono" value="<?php echo $result['telefono'] ?>">
</div>

</div>


<button type="submit" class="btn btn-primary">Actualizar</button>
<a href="index.php" class="btn btn-success">Regresar</a>
</form>


<?php endif ?>

</form>









    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>