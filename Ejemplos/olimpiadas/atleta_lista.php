<?php include_once "conexion.php";


$consulta = "SELECT atleta.idatleta, atleta.iddeporte,
		atleta.nombre, deporte.nombre as deporte
			 FROM atleta, deporte
			 WHERE atleta.iddeporte=deporte.iddeporte ";
			 
if (empty($_POST["ordenapor"]))
	$consulta .= "ORDER BY atleta.nombre";
else{
	sleep(1);//simula retraso de 1 seg en servidor
	$ordena="";
	if ($_POST["ordenapor"]=="atleta") $ordena = "atleta.nombre";
	else $ordena = "deporte.nombre";
	$consulta .= "ORDER BY " . $ordena;
}

$resultado = mysql_query($consulta,$conexion);

//echo $consulta;	
if (mysql_num_rows($resultado)>0){
?>

<table>
<tr>
<th class="ordena" name="atleta">Atleta</th>
<th class="ordena" name="deporte">Deporte</th>
<th>Acciones</th>
</tr>
<?php
//RECORRIDO DE ATLETAS
while ($fila=mysql_fetch_array($resultado)){?>
<tr id="atleta_<?php echo $fila["idatleta"]?>" name="<?php echo $fila["idatleta"]?>">
	<td class="nombreatleta"><?php echo $fila["nombre"]?></td>

    <td class="nombredeporte" name="<?php echo $fila["iddeporte"]?>"><?php echo $fila["deporte"]?></td>
	<td> <img class="borrar" src="images/borrar.png" width="20" height="20" alt="Borrar">
    &nbsp;<img class="modificar" src="images/lapiz.png" width="20" height="20" alt="Modificar">
   	</td>
</tr>
<?php 
}//while

}//if

?>
</table>	











