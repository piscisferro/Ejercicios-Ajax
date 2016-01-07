<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="ui-lightness/jquery-ui-1.10.3.custom.css"/>
<script src="jquery.js"></script>
<script src="jquery-ui-1.10.3.custom.js"></script>

<script>
$(document).ready(function() {
	var idcliente;
	
	
	//VENTANA DIALOGO DE BORRAR
	$( "#dialogo" ).dialog({
		autoOpen: false,
		resizable: false,
		modal: true,
		buttons: {
		"Borrar": function() {			
			$.get("cliente_ajax.php?borrar_id=" + idcliente,function(data,status){			
				$("#detallecliente_" + idcliente).fadeOut(1000);
			})//get			
							
			$( this ).dialog( "close" );			
		},
		"Cancelar": function() {
						$( this ).dialog( "close" );
		}
		}//buttons
	});
	
	
	//Enlace LISTAR (muestra todo el listado)
   $("#listar").click(function(){
	   $.get("cliente_ajax.php",function(data,status){
		  $("#mostrarlistado").html(data);
		   
	   });//get	   
   });//listar

  
   //Al escribir en el campo de texto para buscar
   $("#buscar").on('keypress keyup',function(){
   	   $.post("cliente_ajax.php" , 
	   {
		   cadena: $("#buscar").val() , 
	   	   campo: $("#buscaropt").val()
	   },
	   function(data,status){
			//vuelve a pintar el listado
		   $("#mostrarlistado").html(data);
	   });//post

   });//buscar
   
   //NUEVO CLIENTE
   $("#anadir").click(function(){
		$.get("cliente_nuevo_ajax.php",
		function(data,status){
			$("#mostrarnuevo").html(data);
		});
	});//anadir
   
   
     //------- BOTON BORRAR ---------------
  $(document).on("click",".boton_borrar img",function(){	   	
		  idcliente=$(this).attr("id");
		  $( "#dialogo" ).dialog("open");

   });//click
   
   //------- BOTON EDITAR ---------------
   $(document).on("click",".boton_editar img",function(){	   	
   		var id=$(this).attr("id");
		$.get("cliente_ajax.php?editar_id=" + id,function(data,status){
			$("#mostrarlistado").html(data);
		})//get
   });//click
   
   //-------- BOTON GUARDAR ---------------
   $(document).on("click","#boton_guardar",function(){
	   $.post("cliente_ajax.php",
	   {
		   dni: $(this).attr("name"),
		   nombre: $("#nombre").val(),
		   direccion: $("#direccion").val(),
		   telefono: $("#telefono").val(),
		   accion: "modificar"
	   },function(data,status){
		  $("#mostrarlistado").html(data); 
	   });
   });
   
   
});//ready
</script>
<style type="text/css">
nav{cursor:pointer;}
</style>
</head>

<body>
<div id="contedor">
<nav>
	<span id="listar">Listado</span>
    <span id="anadir">Añadir</span>
    <input id="buscar" type="text" name="buscar" />
    <select id="buscaropt" name="opcion">
    	<option value="dni">DNI</option>
        <option value="nombre">Nombre</option>
        <option value="direccion">Dirección</option>
        <option value="telefono">Teléfono</option>
    </select>
</nav>
<div id="mostrarlistado"></div>
<div id="mostrarnuevo"></div>

</div> 


<div id="dialogo" title="Eliminar Cliente">
  <p>¿Esta seguro que desea eliminar el cliente?</p>
</div>

</body>
</html>