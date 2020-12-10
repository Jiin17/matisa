<?php 
function conectar()
{
   $conex=mysql_connect("localhost","root","12345678") or die ("Error de Coneccioin");
   mysql_select_db("bdmatisa");
   return $conex;
}
$conex=conectar();


$consulta=mysql_query("SELECT u.idempleado,u.tipo_empleado
  FROM usuario u INNER JOIN empleado e on e.idempleado=u.idempleado
  where usuario='$usuario' and contrasenia='$contrasenia' and e.estado='ACTIVO'");

while ($ht=mysql_fetch_array($consulta)) {
  $idempleado=$ht[0];
  $tipo_empleado=$ht[1];
}


if (mysql_num_rows($consulta)>0) {
session_start();
$_SESSION['idempleado']=$idempleado;
$nuevo=$_SESSION['idempleado'];

if ($tipo_empleado=="EJECUTIVO DE VENTAS") {
      echo "<div class='alert alert-success' role='alert'><center><h1>BIEN VENIDO AL SISTEMA...</h1></center></div>";
      echo "<META HTTP-EQUIV='refresh' CONTENT='2; URL=menu_ventas.php'>";
}
if ($tipo_empleado=="CONTADOR") {
      echo "<div class='alert alert-success' role='alert'><center><h1>BIEN VENIDO AL SISTEMA...</h1></center></div>";
      echo "<META HTTP-EQUIV='refresh' CONTENT='2; URL=menu_contador.php'>";
}
if ($tipo_empleado=="ABOGADO") {
      echo "<div class='alert alert-success' role='alert'><center><h1>BIEN VENIDO AL SISTEMA...</h1></center></div>";
      echo "<META HTTP-EQUIV='refresh' CONTENT='2; URL=menu_abogado.php'>";
}
if ($tipo_empleado=="ADMINISTRATIVO") {
      echo "<div class='alert alert-success' role='alert'><center><h1>BIEN VENIDO AL SISTEMA...</h1></center></div>";
      echo "<META HTTP-EQUIV='refresh' CONTENT='2; URL=menu_administrativo.php'>";
}
if ($tipo_empleado=="ADMINISTRADOR") {
      echo "<div class='alert alert-success' role='alert'><center><h1>BIEN VENIDO AL SISTEMA...</h1></center></div>";
      echo "<META HTTP-EQUIV='refresh' CONTENT='2; URL=menu_administrador.php'>";
}

}
else{
      echo "<div class='alert alert-danger' role='alert'>ERROR...!</div>";
      echo "<META HTTP-EQUIV='refresh' CONTENT='1; URL=index.php'>";
 }
 ?>