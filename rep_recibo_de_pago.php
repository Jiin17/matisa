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
$sun=mysql_query("SELECT c.nombre,c.ci,a.chasis,a.color,a.modelo,pa.fecha,pa.nomto,pa.detalle,pa.tipo_cambio,v.saldo,v.precio_venta FROM empleado e 
INNER JOIN ventas v ON e.idempleado=v.idempleado
INNER JOIN cliente c ON c.idcliente=v.idcliente
INNER JOIN automovil a ON a.idautomovil=v.idautomovil
INNER JOIN plan_pagos p ON p.idventas=v.idventas
INNER JOIN pago pa ON pa.idplan_pagos=p.idplan_pagos
 WHERE pa.idplan_pagos='$idplan_pago'
group by v.idventas
 ");
while ($su=mysql_fetch_array($sun)) {
  $nombre=$su[0];
  $ci=$su[1];
  $chasis=$su[2];
  $color=$su[3];
  $modelo=$su[4];
  $fecha=$su[5];
  $monto=$su[6];
  $detalle=$su[7];
  $tipo_cambio=$su[8];
  $saldo=$su[9];
  $precio_venta=$su[10];

}
$dolar=number_format($monto/$tipo_cambio,2);
 ?>
<div class="container">
<div class="modal-content">
  <br>
          <div class="container">
          <img src="images/logo.png" width="140px">
          </div>
        <center><h2 class="modal-title">RECIBO DE PAGO</h2></center>

    <div class="modal-body">
<?php 
echo "

      <div class='modal-body' id='respuesta_costo'>
        <b>FECHA: $fecha</b>
        <table class='table table-bordered sm'>
          <tr>
            <td colspan='3'>
              <h4>DATOS DEL CLIENTE</h4>
            </td>
          </tr>
          <tr>
            <td><b>C.I.</b></td>
            <td colspan='2'><b>NOMBRE</b></td>
          </tr>
            <td>$ci</td>
            <td colspan='2'>$nombre</td>
          <tr>
            <td colspan='3'>
              <h4>DATOS DEL VEHICULO</h4>
            </td>
          </tr>
          <tr>
            <td><b>PRECIO DE VENTA (Bs.)</b></td>
            <td colspan='2'><b>SALDO (Bs.)</b></td>
          </tr>
          <tr>
            <td>$precio_venta</td>
            <td colspan='2'>$saldo</td>
          </tr>
          <tr>
            <td><b>CHASIS</b></td>
            <td><b>COLOR</b></td>
            <td><b>MODELO</b></td>
          </tr>
          <tr>
            <td>$chasis</td>
            <td>$color</td>
            <td>$modelo</td>
          </tr>
          <tr>
            <td colspan='3'>
              <h4>DETALLE DE PAGO</h4>
            </td>
          </tr>
          <tr>
            <td><b>MOSTO (Bs.)</b></td>
            <td><b>MOSTO ($)</b></td>
            <td><b>T.C.</b></td>
          </tr>
          <tr>
            <td>$monto</td>
            <td>$dolar</td>
            <td>$tipo_cambio</td>
          </tr>
          <tr>
            <td colspan='3'><b>DETALLE</b></td>
          </tr>
          <tr><td colspan='3'>$detalle</td></tr>
        </table>
      </div>
";
 ?>
    </div>    
</div>
</div>
</body>
<td ></td>