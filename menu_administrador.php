<?php
session_start();
$nuevo=$_SESSION['idempleado'];
include("libreria.php");
$cnx=conectar();
if (session_is_registered("idempleado")) { 
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
                    <a  href="cliente.php" target="formulari1">CLIENTE/S</a>
                </li>
                <li>
                    <a href="veiculo.php" target="formulari1">VEHICULO/S</a>
                </li>
                <li>
                    <a href="rep_ventas_emple.php" target="formulari1">REP. VENTAS</a>
                </li>
                <li>
                    <a href="rep_ventas_desempenio.php" target="formulari1">REP. DESEMPEÑO</a>
                </li>
                <li>
                    <a href="frm_libro_diario.php" target="formulari1">LIB. DIARIO</a>
                </li>
                <li>
                    <a href="frm_libro_diario_bancos.php" target="formulari1">LIB. DIARIO BANCO/S</a>
                </li>
                <li>
                    <a href="rep_lirbo_diario.php" target="formulari1">REP. LIB. DIARIO</a>
                </li>
                <li>
                    <a href="rep_lirbo_diario_bancos.php" target="formulari1">REP. LIB. DIARIO BANCO/S</a>
                </li>
                <li>
                    <a href="frm_cunetas.php" target="formulari1">CUENTA/S</a>
                </li>
                <li>
                    <a href="stock.php" target="formulari1">REP. CUENTA/S</a>
                </li>
                <li>
                    <a href="stock.php" target="formulari1">STOCK</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <!-- <div id="page-content-wrapper"> -->
            <div class="container-fluid">
<table class="table">
	<tr>
		<td>
<a href="#menu-toggle" class="btn btn-outline-secondary" id="menu-toggle"><img src="images/menu.png" width="30px"></a>
		</td>
<!-- 		<td>
<h3><center>MATISA AUTOS S.R.L.</center></h3>			
		</td> -->
		<td align="right">
			
<a href='logout.php' class='btn btn-default' id='salir'><img src='images/1.png' width='30px'>
<?php
$c=mysql_query("SELECT * from empleado where empleado.idempleado='$nuevo'");
    while ($f=mysql_fetch_array($c)) 
    {echo "$f[2] $f[3]";} 
?>
</a>
		</td>
	</tr>
</table>


        <iframe name="formulari1" width="100%" height="650px" scrolling="false" class="wow fadeIn" data-wow-delay="0.5s" style="background:url(images/bga.jpg) no-repeat 0px 0px;"></iframe>
            </div>
        <!-- </div> -->
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

<?php
}
else
{
  echo "<META http-equiv='Refresh' content='0; url=index.php'>";
  echo "<script type='text/javascript'>alert('PRIMERO DEBE INICIAR SESSION');</script>";
}
?>