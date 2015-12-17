<?php
require_once("constantes.php");

$conexion = mysql_connect("localhost","root","");
if (!$conexion){
	die("Error en la conexion con BD:". mysql_error());
}
mysql_select_db(NOMBRE_DB,$conexion);
mysql_set_charset("utf8");
?>