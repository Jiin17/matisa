<?php 
include("libreria.php");
$cnx=conectar();
 ?>
 <!DOCTYPE html>
<html>
<head>
  <title></title>
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

</head>
<body onload="imprimir();">
 <div class="col-md-12 col-sm-12 col-xs-12">
  <?php 
echo "
<img src='imagesdocumentos/$documento'>
";
   ?>
</div>
</body>
 