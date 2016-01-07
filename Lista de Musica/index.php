<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Musica</title>
<script type="text/javascript" src="jquery.js"></script>
<script>
    
    // Cuando la web este cargada
    $(document).ready(function() {
        // Le damos a las imagenes de lupa la propiedad hover para que aparezca los albunes.
        $(".lupa").hover(mostrarAlbunes);

    });//ready	

    // Funcion para mostrar albunes cuando se hace hover en los iconos
    function mostrarAlbunes() {
        
        // Guardamos en una variable el id (de la base de datos) del artista, que en este ejercicio
        // ha sido guardado en el atributo name de un tr en artista_lista.php.
        var idartista = $(this).closest("tr").attr("name");
        
        // Con get basicamente decimos "ve a la url albumes_lista.php, mandale como dato input name idartista el id del artista
        // que tenemos en la variable"
        $.get("albumes_lista.php", {"idartista" : idartista}, function(data) {
            
            // La funcion hace que, los datos obtenidos de albumes_lista los muestra en #albumes_capa, es decir, te devuelve
            // el html de albumes_lista.php
            $("#albumes_capa").html(data);    
            
        });  
    }
    
</script>

<style type="text/css">
    #contenedor {
        position: absolute;
        width: 750px;
    }
    
    #artistas_capa {
    background-color: LightSlateGrey ;	
        width: 200px;
        float: left;	
    }
    
    #albumes_capa {
        background-color: LightSteelBlue;
        width: 450px;
        float: left;
    }	
    
    #tabla_artista {
        width: 200px;
    }
    
    #tabla_albumes {
        width: 450px;
    }
    
</style>

	   
</head>


<body>

<div id="contenedor">
<div id="artistas_capa"><?php include "artista_lista.php" ?></div>
<div id="albumes_capa"></div>
</div>
 


</body>
</html>