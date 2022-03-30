<HTML>
<HEAD>
<style>
h4 {color:blue;}
h3 {color:red;}
</style>
<TITLE>Consulta</TITLE>
</HEAD>
<BODY bgcolor="00F3DB">
<br>
<?php
    function buscarCarga( $conexion, $id )
    {
        $sql = "select c.id, c.peso, t.codigo, n.cargamax from cargas c, transportar t, naves n where c.id=".$id." and t.codigo=n.codigo and c.id=t.id";
        $devolver = null;
        // Ejecutar la consulta:
         $rs = pg_query( $conexion, $sql );
        if( $rs )
        {
            // Si se encontró el registro, se obtiene un objeto en PHP con los datos de los campos:
             if( pg_num_rows($rs) > 0 )
                 $devolver = pg_fetch_object( $rs, 0 );
        }
        return $devolver;
    }

include "/var/www/html/GAFA/conexion/conexion.php";
	//vemos si el usuario y contraseña son válidos
	$con = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());
	// si se envia el formulario
	$idCarga= $_POST["idCarga"];
	$obj=buscarCarga($con, $idCarga);
	 if( $obj == null || $obj->codigo=="")
        	echo "El id de carga ".$idCarga." no existe o no lo has introducido en la nave (vuelve a elegir nave)";
    	else
         	echo "La carga con código ".$obj->id." (".$obj->peso."kg) está en la nave ".$obj->codigo." (carga maxima:[".$obj->cargamax."]kg) preparada para ser transportada.";
  	  // Cerrar la conexión a PostgreSQL
    	 pg_close( $conexion );
?>
<br><br><br>	
<a href='aplicacion.php?menu=catalogoConsulta'>Volver</a>
</BODY>
</HTML>
