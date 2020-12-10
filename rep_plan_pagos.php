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
          
          </div>
        <center><h2 class="modal-title">PLAN DE PAGOS PROPUESTO</h2></center>

    <div class="modal-body">
<div class="modal-body" id="respuesta_plan">
<table class="table table-bordered sm">
<?php 
$ksk=mysql_query("SELECT c.nombre,c.ocupacion,d.fecha,d.monto,pp.interes,pp.cantidad_meses
  FROM ventas v 
  INNER JOIN cliente c ON c.idcliente=v.idcliente 
  INNER JOIN desembolso d ON v.idventas=d.idventas
  INNER JOIN plan_pagos pp ON v.idventas=pp.idventas
  WHERE v.idventas='$idventas'");
while ($hy=mysql_fetch_array($ksk)) {
  # code...
echo "
  <tr>
    <th>DEL SR.(A)</th><td>$hy[0]</td>
    <td rowspan='7'><center><img src='images/logo.png' width='200px'> <br> <br><br><br> <b>Calle Herrera Nº 404, entre <br>Av. Tacna y Pasaje Melchor Perez de Olguin
<br>Telefonos de Contacto:<br> (052) 5275904 - 70414883 -70417037 - 70417092</b>
</center></td>
  </tr><tr>
    <th>ACTIVIDDAD ECONOMICA</th><td>$hy[1]</td>
  </tr><tr>
    <th>FECHA DE DESEMBOLSO</th><td>$hy[2]</td>
  </tr><tr>
    <th>MONTO DE PRESTAMO</th><td>$hy[3]</td>
  </tr><tr>
    <th>TASA DE INTERES (ANUAL)</th><td>$hy[4]</td>
  </tr><tr>
    <th>PLAZO (MESES)</th><td>$hy[5]</td>
  </tr>
";
}
 ?>
</table>
</div>

<?php 
$cnue=mysql_query("SELECT fecha,nomto,cantidad_meses,interes,idplan_pagos FROM plan_pagos WHERE idventas='$idventas' ");
$num=mysql_fetch_array($cnue);
if (mysql_num_rows($cnue)==0) {
  # code...
}else{
$fecha=$num[0];
$monto=$num[1];
$cantmeses=$num[2];
$interes=$num[3];
$idplan_pagos=$num[4];

$intere=($interes/12)/100;

$costo=round(($intere*$monto)/(1-(pow((1/(1+$intere)),$cantmeses))),2);

}

   ?>
<div class="modal-body" id="respuesta_plan">
<table class="table table-bordered sm">
  <tr>
    <th>N° CUOTA</th><th>FECHA</th><th>SALDO CAPITAL</th><th>PAGO CAPITAL</th><th>PAGO INTERES</th><th>TOTAL CUOTA</th>
  </tr>
  <?php 
for ($i=0; $i < $cantmeses ; $i++) { 
    $numa=$i+1;
    $interes=round($monto*$intere,2);
    $pago=round($costo-$interes,2);
    echo "<tr>
        <td>$numa</td>
        <td>$fecha</td>
        <td>$monto</td>
        <td>$pago</td>
        <td>$interes</td>
        <td>$costo</td>
    </tr>";
    $fecha=date("Y-m-d",strtotime($fecha."+ 1 month")); 
    $monto=round($monto-$pago,2);
}

   ?>
</table>
</div>

    </div>    
</div>
</div>
</body>