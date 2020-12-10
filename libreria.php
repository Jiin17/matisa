<?php 
function conectar()
{
   $conex=mysql_connect("localhost","root","12345678") or die ("Error de Coneccioin");
   mysql_select_db("bdmatisa");
   return $conex;
}
?>