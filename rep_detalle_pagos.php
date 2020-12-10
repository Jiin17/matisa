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

 ?>
<div class="container">
<div class="modal-content">
  <br>
          <div class="container">
          <img src="images/logo.png" width="140px">
          </div>
        <center><h2 class="modal-title">DETALLE DE PAGOS</h2></center>

    <div class="modal-body">
<?php 
echo "
      <div class='modal-body' id='respuesta_costo'>
        <b>FECHA: $fecha</b>
        <table class='table table-bordered sm'>
<tr>
  <th>FECHA DE PAGO</th>
  <th>DETALLE</th>
  <th>MONTO (Bs.)</th>
  <th>MONTO ($)</th>
  <th>T.C.</th>
</tr>
";
$sun=mysql_query("SELECT pa.nomto,pa.detalle,pa.fecha,pa.tipo_cambio,v.saldo,v.precio_venta FROM empleado e 
INNER JOIN ventas v ON e.idempleado=v.idempleado
INNER JOIN cliente c ON c.idcliente=v.idcliente
INNER JOIN automovil a ON a.idautomovil=v.idautomovil
INNER JOIN plan_pagos p ON p.idventas=v.idventas
INNER JOIN pago pa ON pa.idplan_pagos=p.idplan_pagos
 WHERE v.idventas='$idventas'
");
while ($rj=mysql_fetch_array($sun)) {
  $precioventa=$rj[5];
  $saldo=$rj[4];
  $dolarr=number_format($rj[0]/$rj[3],2);
  echo "<tr>
<td>$rj[2]</td>
<td>$rj[1]</td>
<td>$rj[0]</td>
<td>$dolarr</td>
<td>$rj[3]</td>
  </tr>";
}
echo "
        </table>
      </div>
<table  class='table table-bordered sm'>
  <tr>
    <td><b>PRECIO DE VENTA (Bs.)</b></td>
    <td>$precioventa</td>
    <td><b>SALDO (Bs)</b></td>
    <td>$saldo</td>
  </tr>
</table>
";
 ?>

    </div>    
</div>
</div>
</body>