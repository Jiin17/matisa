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
require "conversor.php";


$consulta=mysql_query("SELECT c.nombre,c.ci,c.direccion,
                              m.descripcion,a.modelo,a.anio,a.color,a.cilindrada,a.traccion,a.procedencia,v.antisipo,v.precio_venta,v.fecha_venta
  FROM ventas v 
  INNER JOIN cliente c ON v.idcliente=c.idcliente
  INNER JOIN automovil a ON a.idautomovil=v.idautomovil
  INNER JOIN marca m ON m.idmarca=a.idmarca
  WHERE idventas='$idventas'");
while ($hu=mysql_fetch_array($consulta)) {
    $nombre=$hu[0];
    $ci=$hu[1];
    $direccion=$hu[2];

    $descripcion=$hu[3];
    $modelo=$hu[4];
    $anio=$hu[5];
    $color=$hu[6];
    $cilindrada=$hu[7];
    $traccion=$hu[8];
    $procedencia=$hu[9];
    $antisipo=$hu[10];
    $precio_venta=$hu[11];
    $fecha=$hu[12];
}

 ?>
<div class="container">
<!-- <div class="modal-content"> -->
  <br>
<!--           <div class="container">
          <img src="images/logo.png" width="140px">
          </div> -->
        <center><h2 class="modal-title">CONTRATO DE SEÑA PARA VENTA DE VEHÍCULO</h2></center>
<div ALIGN="justify">
Conste por el presente documento privado Contrato de SEÑA de Compra Venta de Vehículo, el mismo que surtirá efectos de instrumento público a solo reconocimiento de firmas ante Notario de Fe Pública, que se celebra con arreglo a los términos y condiciones establecidos:
<h5>
PRIMERA.- (PARTES INTERVINIENTES).-
</h5>
Intervienen en la suscripción del presente contrato:
<br>
<b>MATISA AUTOS S.R.L.</b> con NIT <b>Nº 312808023</b>, representada legalmente por el Señor: <b>Rudy Cesar Sanez</b> Clemente con Cedula de Identidad N° <b>4931954 LP</b> y Licencia de Funcionamiento Nº 1-119-36709 otorgado por el Gobierno Municipal de Oruro, con domicilio fiscal ubicado en la Calle Herrera N° 404, mediante instrumento de Poder Nº 139/2018, de fecha 05 de julio de 2018, ante Notaria de Fe Pública Nº 19 Abg. Edwin H. Villazon Berrios; quien se denominará en adelante y a efectos del presente contrato se denominarán en adelante y a efectos del presente contrato se denominarán como el <b>VENDEDOR</b>; por otra parte: <FONT COLOR="BLUE"><?php echo "$nombre"; ?></FONT> con C.I <FONT COLOR="BLUE"><?php echo "$ci"; ?></FONT>. mayor de edad, hábil por Ley, con de nacionalidad BOLIVIANA, quien se llamará en adelante como el/la <b>COMPRADOR(A)</b>, con Domicilio En <FONT COLOR="BLUE"><?php echo "$direccion"; ?></FONT>.
<h5>
SEGUNDA.- (OBJETO).-
</h5>
El <b>VENDEDOR</b> declara ser Importador en Bolivia, de los vehículos motorizados, repuestos y accesorios de la marca CHERY, FOTON, KING LONG, HIGUER, GOLDEN DRAGON, FAW, T-KING, de industria China, en tal sentido, por medio del presente documento se constituye una seña o anticipo como muestra de intención de compra del vehículo descrito en la cláusula tercera, a favor del/a <b>COMPRADOR(A)</b>. En caso de perfeccionarse de manera posterior la venta, las partes suscribirán un nuevo contrato de venta definitiva.  
<h5>
TERCERA.- (CARACTERÍSTICAS DEL VEHÍCULO).-
</h5>
Las características del vehículo objeto de la seña, son las siguientes:
<center>
<table>
  <tr><th>MARCA: </th>      <td><?php echo "$descripcion"; ?></td></tr>
  <tr><th>MODELO: </th>     <td><?php echo "$modelo"; ?></td></tr>
  <tr><th>AÑO: </th>        <td><?php echo "$anio"; ?></td></tr>
  <tr><th>COLOR: </th>      <td><?php echo "$color"; ?></td></tr>
  <tr><th>PROCEDENCIA: </th>   <td><?php echo "$procedencia"; ?></td></tr>
  <tr><th>MOTOR: </th>      <td><?php echo "$cilindrada"; ?></td></tr>
  <tr><th>TRACCION: </th>   <td><?php echo "$traccion"; ?></td></tr>
</table>
</center>
<h5>
CUARTA.- (DEL MONTO DE LA SEÑA, DEL PRECIO y LOS PLAZOS PARA EL PERFECCIONAMIENTO DEL CONTRATO).-
</h5>                          
La SEÑA recibida por parte de (el/la) COMPRADOR(a) asciende a la suma de Bs.- <FONT COLOR="BLUE"><?php echo "$antisipo"; $resultado = convertir($antisipo); echo"$resultado"; ?></FONT>(Bolivianos) monto que el VENDEDOR declara recibido en completa conformidad. 
El valor total del vehículo acordado por las partes en caso de perfeccionar la venta, es de: <br>
Monto en $us. – <FONT COLOR="BLUE"><?php echo "$precio_venta"; ?></FONT> (Bolivianos).<br>
Literal: <FONT COLOR="BLUE"><?php $resultado = convertir($precio_venta); echo"$resultado"; ?></FONT> 00/100 Bolivianos.
<br><b>4.1.</b> Los depósitos por concepto de SEÑA o anticipo, reserva y/o cancelación total del valor del vehículo deberán ser efectuados por el <b>COMPRADOR</b> y deben ser respaldados de acuerdo a las formas reconocidas por la ASFI. Estos anticipos, no podrán ser considerados como pago definitivo en razón de que estos montos, podrán estar sujetos a posibles contingencias establecidas en el presente documento y/o las políticas o directrices que puedan afectar la conducta del rubro automotor. El/los anticipo(s), serán conciliados por el <b>VENDEDOR</b> con el <b>COMPRADOR</b> antes de proceder a la entrega de la unidad. 
<br><b>4.2.</b> <b>DE LOS CAMBIOS IMPOSITIVOS:</b> si durante el proceso de compra sucediera algún reajuste económico sobre tributos inherentes al rubro, de parte del Estado plurinacional de Bolivia, el precio de venta acordado con el <b>COMPRADOR</b>, podrá ser modificado de manera proporcional a dichos reajustes tributarios.
<br><b>4.3.-</b> Una vez cancelado el monto total del vehículo, se procederá a la entrega del mismo en un plazo no mayor a 30 días hábiles, acompañando la documentación correspondiente. 
<br><b>4.4.-</b> El cliente se compromete por recomendación del <b>VENDEDOR</b> a realizar la suscripción de una póliza de seguro contra todo daño a favor del vehículo, previo a la recepción del mismo.
<br><b>4.5.-</b> Las partes acuerdan que la SEÑA por la cual el vehículo descrito en la cláusula tercera es separado del catálogo de venta tendrá una validez de <b>60 días, prorrogables a 90</b> siempre que el COMPRADOR demuestre que no ha podido conseguir el financiamiento debido a retrasos demostrados de la burocracia del sistema de intermediación financiera, en estos casos EL VENDEDOR vencido el plazo se reserva el derecho de cobrar un porcentaje de la SEÑA por concepto de cláusula penal y costos administrativos. El monto a cobrar está señalado en el presente contrato de forma posterior. La ampliación a un plazo mayor está sujeto a acuerdo de partes. 
<h5>
QUINTA: DEL PERFECCIONAMIENTO DE LA TRANSFERENCIA DEL DERECHO PROPIETARIO Y LA FACTURACION: 
</h5>
Se entenderá perfeccionada la venta <b>cuando el COMPRADOR(A) pague el total del precio acordado</b> y consecuentemente nacerá la obligación de emitir la factura fiscal correspondiente, por la totalidad de la compra a nombre de la persona natural o jurídica que realice el pago, a través de las formas reconocidas por la ASFI. Solo en este momento se hará entrega del vehículo. Queda claramente establecido que el derecho propietario del vehículo recaerá sobre la persona que sea beneficiada con el Crédito fiscal de la factura. 
Queda establecido que a solicitud del/la <b>COMPRADOR(A)</b>, el <b>VENDEDOR</b> podrá realizar y gestionar todos los trámites de cargas propias de toda traslación del derecho propietario del vehículo que está adquiriendo, siempre y cuando el <b>VENDEDOR</b> se encuentre en las posibilidades y alcances de realizar dicho servicio, en las oficinas respectivas. Si por otra parte, el/la <b>COMPRADOR(A)</b> por cualquier motivo, decide modificar las condiciones ya pactadas respecto al Derecho Propietario del vehículo, deberá comunicar esta decisión por escrito a MATISA AUTOS S.R.L. antes de registrar su derecho propietario, cancelando además la suma de US$ 200.- (Doscientos 00/100 dólares americanos), por concepto de gastos administrativos, costos financieros y otros, suma de dinero que podrá ser descontada de los pagos ya realizados por el <b>COMPRADOR</b> sin lugar alguno a reclamo.
<h5>
SEXTA: DESISTIMIENTO DE LA COMPRA, CLÁUSULA PENAL E INCUMPLIMIETO DE PAGOS:
</h5>
<br><b>6.1.-</b>Se establece que en caso que el/la <b>COMPRADOR(A)</b> desista de la presente compra, o se venza el plazo establecido en la cláusula cuarta, PREVIO a transferir el derecho de propietario, la empresa descontara un monto de dinero equivalente al 5% del monto total del precio del vehículo; este descuento, se realizara del monto otorgado en anticipo de reserva y/o de aquel cancelado, suma de dinero que se ejecutará como cláusula penal a favor de MATISA AUTOS S.R.L. por el desistimiento.  El saldo restante, (si hubiere), será devuelto por el <b>VENDEDOR</b> en un plazo máximo de cuarenta y cinco (45) días a partir de la fecha de notificación de desistimiento por escrito y/o cualquier medio electrónico por parte del/la <b>COMPRADOR(A)</b>.
En caso de que el/la <b>COMPRADOR(A)</b> se decidiera nuevamente por la adquisición de la misma u otra unidad, este se sujetará a nuevas condiciones y precios conforme a una nueva compra y a un nuevo contrato. 
<br><b>6.2.- </b>En todo caso se deja claramente establecido que será exclusiva decisión del VENDEDOR ejecutar o no su derecho al cobro de la multa establecida, salvando los casos fortuitos y de fuerza mayor. 
<h5>
SÉPTIMA. - (AUTORIZACION).-
</h5>
La <b>COMPRADORA o COMPRADOR</b> autoriza expresamente al <b>VENDEDOR</b> para que lleve a cabo consultas y verificaciones a través de los servicios de Buros de Información Crediticia o Centrales de Riesgos que operan en nuestro país, para conocer la situación que presenta respecto a antecedentes personales y obligaciones.
<h5>
OCTAVA. - CESION DE DERECHOS DEL/LA COMPRADOR(A).-
</h5>
El/la <b>COMPRADOR(A)</b> no podrá ceder sus derechos y obligaciones derivados de este Acuerdo, en ningún caso, a ningún tercero, solo surtirá efecto entre las partes estipuladas en el presente documento.
<h5>
NOVENA. - (ACEPTACIÓN Y CONFORMIDAD).-
</h5>
<?php 
$newDate = date("d-m-Y", strtotime($fecha));
function obtenerFechaEnLetra($fecha){
    $dia= conocerDiaSemanaFecha($fecha);
    $num = date("j", strtotime($fecha));
    $anno = date("Y", strtotime($fecha));
    $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
    return $dia.', '.$num.' de '.$mes.' del '.$anno;
}
 
function conocerDiaSemanaFecha($fecha) {
    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    $dia = $dias[date('w', strtotime($fecha))];
    return $dia;
}

 ?>
Ambas partes intervinientes, declaran su plena conformidad con el contenido de todas y cada una de las cláusulas precedentes. En tal señal suscriben el presente contrato en la ciudad de Oruro,<FONT COLOR="BLUE"> <?php echo obtenerFechaEnLetra($newDate); ?></FONT>.
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table class="table">
  <tr>
    <td><center>
      Rudy Cesar Sanez Clemente <br>
      Gerente General<br>
      MATISA AUTOS S.R.L.<br>
      VENDEDOR<br>
    </center></td>
    <td><center>
      <?php 
echo "
      $nombre<BR>
      $ci<BR>
";
       ?>
      COMPRADOR<BR>
    </center></td>
  </tr>
</table>

</div>
</div>






   
</div>
</div>
</body>