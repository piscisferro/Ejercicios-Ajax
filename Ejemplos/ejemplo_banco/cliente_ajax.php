<script>

</script>
<?php
//echo "-->". $_POST["cadena"] ."<---";
$conexion = mysql_connect("localhost","root","");
mysql_select_db("banco-ajax",$conexion);

//Si me llega el parametro accion=guardar_nuevo
if (!empty($_POST["accion"]) && ($_POST["accion"]=="guardar_nuevo")){
	$consulta = "INSERT INTO cliente(dni,nombre,direccion,telefono) 
				VALUES ('" . $_POST["dni"] ."',
				'" . $_POST["nombre"] . "',
				'" . $_POST["direccion"] . "'," .
				$_POST["telefono"] . ")";			

	mysql_query($consulta,$conexion);				
	
}

//Si me llega el parametro borrar_id borramos
if (!empty($_GET["borrar_id"])){
	$consulta = "DELETE FROM cliente 
				WHERE dni='" . 	$_GET["borrar_id"] . "'";
	mysql_query($consulta,$conexion);
	
}

if (!empty($_POST["accion"]) && ($_POST["accion"]=="modificar") ){
	$consulta = "UPDATE cliente SET 
				nombre='" . $_POST["nombre"] . "',
				direccion='" . $_POST["direccion"] . "',
				telefono=" .  $_POST["telefono"] . "
				WHERE dni='" . $_POST["dni"] . "'";
	
	mysql_query($consulta,$conexion);			 
}

$consulta = "SELECT dni,nombre,direccion,telefono 
			FROM cliente 
			WHERE 1 ";
			
if (!empty($_POST["cadena"])){
	$consulta .= " AND " . $_POST["campo"] . 
			" LIKE '%" . $_POST["cadena"] . "%'";
}

$consulta .= " ORDER BY nombre";

$resultado = mysql_query($consulta,$conexion);

//echo $consulta;	
if (mysql_num_rows($resultado)>0){

	
	?>
<table border="0">
<tr>
<th>DNI</th>
<th>Nombre</th>
<th>Direccion</th>
<th>Teléfono</th>
<th>Acciones</th>
</tr>
<?php
//RECORRIDO DE CLIENTES
while ($fila=mysql_fetch_array($resultado)){
	
if(!empty($_GET["editar_id"]) && ($_GET["editar_id"]==$fila["dni"])){
//Muestra un campo editable
?>
<tr>
<td><?=$fila["dni"]?></td>
<td><input type="text" id="nombre" value="<?=$fila["nombre"]?>" /></td>
<td><input type="text" id="direccion" value="<?=$fila["direccion"]?>" /></td>
<td><input type="text" id="telefono" value="<?=$fila["telefono"]?>" /></td>
<td><img width="20" id="boton_guardar" name="<?=$fila["dni"]?>" src="images/floppy.png"  /></td>
</tr>	

<?php }else{
//Mostrar los datos en la tabla
?>
<tr id="detallecliente_<?=$fila["dni"]?>">
<td><?=$fila["dni"]?></td>
<td><?=$fila["nombre"]?></td>
<td><?=$fila["direccion"]?></td>
<td><?=$fila["telefono"]?></td>
<td>
<span class="boton_editar">
<img id="<?=$fila["dni"]?>"  width="20" border="0" src="images/lapiz.png" />
</span>
<span class="boton_borrar">
<img id="<?=$fila["dni"]?>" width="20" border="0" src="images/borrar.png" />
</span>
</td>
</tr>
<?php
	}//else
}//while
?>
</table>
<?php
}//if
?>
