<script>
$("#boton_guardar_nuevo").click(function(){	   	
	$.post("cliente_ajax.php",{
		dni: $("#dni_nuevo").val(),
		nombre: $("#nombre_nuevo").val(),
		direccion: $("#direccion_nuevo").val(),
		telefono: $("#telefono_nuevo").val(),
		accion: "guardar_nuevo"
	},function(data,status){		
		$("#mostrarnuevo").html("");
		$("#mostrarlistado").html(data);
	});
});
</script>

<form id="formularionuevo">
<input type="text" id="dni_nuevo" placeholder="DNI" required="required" />
<input type="text" id="nombre_nuevo" placeholder="Nombre" />
<input type="text" id="direccion_nuevo" placeholder="Dirección" />
<input type<input type="text" id="telefono_nuevo" placeholder="Teléfono" />
<img width="20" id="boton_guardar_nuevo" src="images/floppy.png"  />
</form>