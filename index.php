<?php   

 include_once 'conexion.php';
 

 $gsent = $mbd->prepare("SELECT * FROM clientes");
 $gsent->execute();
 $result = $gsent->fetchAll();


 $articulos = 3;
 $total = $gsent->rowCount()/3;
 $casilleros = ceil($total);

?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Hello, world!</title>
  </head>
  <body>

<div class="container mt-5">

<?php
 
 if(!$_GET){
   header('Location:index.php?pagina=1');
 }

 $inicio = ($_GET['pagina']-1)*$articulos;

 $gsent = $mbd->prepare("SELECT * FROM clientes limit :inicio,:mostrar");
 $gsent->bindParam(':inicio',  $inicio, PDO::PARAM_INT);
 $gsent->bindParam(':mostrar', $articulos,PDO::PARAM_INT);
 $gsent->execute();
 $resultados = $gsent->fetchAll();



?>


  <h2>Lista de Clientes</h2>
   <a href="agregar.php" class="btn btn-success float-right mb-3">Agregar</a>
  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">nombre</th>
      <th scope="col">correo</th>
      <th scope="col">telefono</th>
      <th scope="col">accion</th>
    </tr>
  </thead>
  <tbody>


<?php foreach($resultados as $cliente) : ?>
    <tr>
      <th scope="row"><?php echo $cliente['id'] ?></th>
      <td><?php echo $cliente['nombre'].' '.$cliente['apellido'] ?></td>
      <td><?php echo $cliente['correo'] ?></td>
      <td><?php echo $cliente['telefono'] ?></td>
      <td>
      <a href="" class="btn btn-danger fa fa-trash ml-3 float-right btn-eliminar"  data-toggle="modal" data-target="#exampleModal" data-value='<?php echo $cliente['id'] ?>'></a>
      <a href="agregar.php?id=<?php echo $cliente['id'] ?>" class="btn btn-primary fa fa-edit   float-right"></a></td>
    </tr>
 
<?php endforeach ?>

</table>


<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled':'' ?>">
      <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']-1 ?>">Anterior</a>
    </li>

    <?php for($i = 0; $i < $casilleros; $i++): ?>
    <li class="page-item  <?php echo $_GET['pagina'] == $i+1 ? 'active':'' ?>">
      <a class="page-link" href="index.php?pagina=<?php echo $i+1 ?>"><?php echo $i+1 ?></a>
    </li>
    <?php endfor ?>

    <li class="page-item <?php echo $_GET['pagina'] >= $casilleros ? 'disabled':'' ?>">
      <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a>
    </li>
  </ul>
</nav>


</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      ¿Estas seguro de eliminar?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <a href="" type="button" class="btn btn-primary btn-confirmar">Eliminar</a>
      </div>
    </div>
  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="codigo.js"></script>
</body>
</html>