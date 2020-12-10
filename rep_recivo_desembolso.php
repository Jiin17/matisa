    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
          <script language="JavaScript">
function imprimir()
{ if ((navigator.appName == "Netscape")) { window.print() ; 
} 
else
{ var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); WebBrowser1.ExecWB(6, -1); WebBrowser1.outerHTML = "";
}
}
</script>
<body onload="imprimir();">

<?php 
include("libreria.php");
$cnx=conectar();

$consulta=mysql_query("SELECT v.fecha_venta,v.precio_venta,v.idempleado,v.idautomovil,v.idcliente,v.antisipo,d.num_recivo,d.monto,v.saldo,v.garantia,v.entidad_financiera
  FROM ventas v INNER JOIN desembolso d ON v.idventas=d.idventas
  WHERE v.idventas='$idventas'");
while ($hu=mysql_fetch_array($consulta)) {
    $fecha=$hu[0];
    $precio=$hu[1];
    $idempleado=$hu[2];
    $idautomovil=$hu[3];
    $idcliente=$hu[4];
    $antisipo=$hu[5];
    $numrecivo=$hu[6];
    $momto=$hu[7];
    $saldo=$hu[8];
    $garantia=$hu[9];
    $banco=$hu[10];
}

 ?>
<div class="container">
<div class="modal-content">
  <br>
          <div class="container">
          <img src="images/logo.png" width="140px">
          </div>
        <center><h2 class="modal-title">RECIBO DE DESEMBOLSO</h2></center>

    <div class="modal-body">
        <table class="table table-bordered sm">
            <tr>
                <th colspan='2'>FECHA</th><td colspan='2'><?php 
                  $feche_ac=date("Y-m-d");
                  echo "$feche_ac";
                 ?></td>
                <th colspan='2'>SUCURSAL</th><td colspan='2'>ORURO</td>
            </tr>
            <tr>
              <th colspan='2'>NOMBRE DEL CLIENTE</th>
              <td colspan='6'>
<?php 
$consu=mysql_query("SELECT nombre FROM cliente WHERE idcliente='$idcliente'");
while ($trs=mysql_fetch_array($consu)) {
  # code...
  echo "$trs[0]";
}
 ?>
              </td>
            </tr>
            <tr>
                <th colspan='2'>PRECIO DE VENTA</th>
                <td colspan='6'>
                    <?php 
require "conversor.php";
$resultado = convertir($precio);
echo "$precio Bs. / $resultado";
                     ?>
                </td>
            </tr>
            <tr>
                <th colspan='2'>ANTISIPO</th>
                <td colspan='2'>
                  <?php 
                  $resultado = convertir($antisipo);
                  echo "$antisipo Bs. /$resultado"; ?>
                </td>
                <th colspan='2'>FECHA</th>
                <td colspan='2'>
                  <?php echo "$fecha"; ?>
                </td>
            </tr>
            <tr>
                <th colspan='2'>N° DE RECIBO</th>
                <td colspan='2'>
                  
                </td>
                <th colspan='2'>E.I.F./OFI</th><td colspan='2'><?php echo "$banco"; ?></td>
            </tr>
            <tr>
                <th colspan='2'>MONTO DE DESEMBOLSO</th>
                <td colspan='6'>
                  <?php 
                  $resultado = convertir($momto);
                  echo "$momto Bs. /$resultado"; ?>
                </td>
            </tr>

            <tr>
                <th colspan='2'>MONTO DE DEUDA</th>
                <td colspan='6'>
                  <?php 
                  $nub=$antisipo-$momto;
                  $resultado = convertir($nub);
                  echo "$momto Bs. /$resultado"; ?>
                </td>
            </tr>


            <tr>
                <th colspan='2'>E.I.F./OFI</th>
                <td colspan='2'>
                    <?php 
$gu=mysql_query("SELECT * FROM empleado WHERE idempleado='$idempleado'");
while ($we=mysql_fetch_array($gu)) {
    echo "LIC. $we[2] $we[3]";
}
                     ?>
                </td>
                <th colspan='2'>N° DE RECIVO</th><td colspan='2'><?php echo "$numrecivo"; ?></td>
            </tr>
            <tr>
                <th colspan='2'>SALDO (A)</th>
                <td colspan='2'>
                  <?php
                  $resultado = convertir($saldo);
                  echo "$saldo Bs. /$resultado"; ?>
                </td>
                <!-- <th colspan='2'>FECHA DE PAGO</th><td colspan='2'></td> -->
                <th colspan='2'>SALDO (B)</th><td colspan='2'>

              </td>
            </tr>
            <tr>
                <th colspan='2'>GARANTIA</th>
                <td colspan='2'>
                  <?php echo "$garantia"; ?>
                </td>
                <th colspan='2'>INTERES</th><td colspan='2'></td>
            </tr>
            <?php 
$consul=mysql_query("SELECT *
          FROM automovil a INNER JOIN tipo_veiculo tv ON tv.idtipo_veiculo=a.idtipo_veiculo  
          INNER JOIN marca m ON m.idmarca=a.idmarca 
          WHERE idautomovil='$idautomovil'");
while ($th=mysql_fetch_array($consul)) {
  echo "
     <hr>
     <tr><th colspan='2'>N° CHASIS</th> <td colspan='2'>$th[1]</td>
     <th colspan='2'>N° MOTOR</th>      <td colspan='2'>$th[2]</td>
     </tr>
     <tr>
         <th>MODELO</th><td>$th[4]</td>
         <th>COLOR</th><td>$th[3]</td> 
         <th>CILINDRADA</th><td>$th[8]</td>
         <th>AÑO</th><td>$th[9]</td>   
     </tr>
     <tr>  
         <th>TRACCION</th>   <td>$th[10]</td>
         <th>MARCA</th>   <td>$th[17]</td> 
         <th colspan='2'>TIPO VEHICULO</th>  <td colspan='2'>$th[15]</td>  
     </tr>
  ";
 } 
             ?>
        </table>
<h3><CENTER>OTROS GASTOS</CENTER></h3>

      <div class="modal-body" id="respuesta_costo">
        <table class="table table-bordered sm">
          <tr>
            <th>DESCRIPCION</th>
            <th>COSTO (Bs.)</th>
          </tr>
<?php 
$cona=mysql_query("SELECT * FROM otrosgastos WHERE idventas='$idventas'");
while ($qw=mysql_fetch_array($cona)) {
  
    echo "
    <tr>
        <td>$qw[1]</td>
        <td>$qw[2]</td>
    </tr>
    ";
}
 ?>
        </table>
      </div>

      <div class="modal-body" id="respuesta_costo">
        <table class="table table-borderless">
          <tr>
            <td><center>_______________________________</center></td>
            <td><center>_______________________________</center></td>
            <td><center>_______________________________</center></td>
          </tr>
          <tr>
            <th><center> FIRMA CLIENTE</center></th>
            <th><center> EJECUTIVO DE VENTA</center></th>
            <th><center> V° BUENO</center></th>
          </tr>
        </table>
      </div>

    </div>    
</div>
</div>
</body>