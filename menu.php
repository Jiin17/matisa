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

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#"><img src="images/logo.png" width="100px"></a>
                </li>
                <li>
                    <a href="empleado.php" target="formulari1">EMPLEADO/S</a>
                </li>
                <li>
                    <a href="#">CLIENTE/S</a>
                </li>
                <li>
                    <a href="#">VEICILO/S</a>
                </li>
                <li>
                    <a href="#">VENTA/S</a>
                </li>
                <li>
                    <a href="#">REP. EMPLEADOS</a>
                </li>
                <li>
                    <a href="#">REP. VENTAS</a>
                </li>
                <li>
                    <a href="#">REP. VEICULOS</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <a href="#menu-toggle" class="btn btn-light" id="menu-toggle"><img src="images/menu.png" width="30px"></a>
            </div>
            <br>
            <iframe name="formulari1" width="100%" height="630px" scrolling="false" class="wow fadeIn" data-wow-delay="0.5s"></iframe>
        </div>
        <!-- /#page-content-wrapper -->

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
