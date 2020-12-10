<?php 
include("libreria.php");
$cnx=conectar();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MATISA</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>
<center>
    <br>
    <img src="images/logo.png" width="400px">
</center>


<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">INICIO DE SECION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <form action="acceso.php" method="POST" >
          <div class="form-group">
            <label for="exampleFormControlInput1">USUARIO</label>
            <input type="text" class="form-control" name="usuario" placeholder="Ingresar Usuario">
          </div>
         <div class="form-group">
            <label for="exampleFormControlInput1">CONTRASEÑA</label>
            <input type="text" class="form-control" name="contrasenia" placeholder="Ingresar Contraseña">
          </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <input type="submit" class="btn btn-primary" value="INGRESO">
     </form>
<form action="acceso.php">
            <input type="text" class="form-control" name="usuario" placeholder="Ingresar Usuario">
            <input type="test" class="form-control" name="contrasenia" placeholder="Ingresar Contraseña">

  <input type="submit" name="" value="hola">
</form>

      </div>
    </div>
  </div>
</div>


    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
