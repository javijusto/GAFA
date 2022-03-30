<HTML>
<HEAD>
<style>
h3 {color:blue;}
</style>
<TITLE>Insertar</TITLE>
</HEAD>
<BODY bgcolor="00F3DB">
<br>

<?
 function buscarNave( $conexion, $codigo )
    {
        $sql = "SELECT * FROM naves WHERE codigo=".$codigo."";
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
 function buscarcarga( $conexion, $id)
    {
        $sql = "SELECT * FROM transportar WHERE id=".$id."";
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

include "/var/www/html/GAFA/conexion/conexion.php";//INSERCION DE NAVES
	//vemos si el usuario y contraseña son válidos
	$con = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());
	// si se envia el formulario
	$idCarga= $_POST["idCarga"];
	$nave=$_POST["cargaNave"];
	$obj1=buscarNave($con, $nave);
	$obj2=buscarCarga($con, $idCarga);
	$query = "begin transaction; update transportar set codigo='$nave' where id='$idCarga'; commit transaction;";
	$resultado= pg_query($con, $query);
	if($obj1->cargamax<$obj2->peso){//comprobacion peso
		echo "El peso de la carga excede el peso máximo de la nave";}
	else{
		if($idCarga=="" || $nave=="" || $resultado=null ){//comprobación de la inserción

			echo "<font color='red'>No se ha insertado nada...\n";
			echo "<font color='black'>Revisa que no esten los campos en blanco o que el codigo de nave está disponible en la tabla de abajo.";}
		else echo "Inserción correcta";}?>
<h3> Tabla de naves disponibles </h3>
<table bgcolor="0999FA" align="center" width="120" cellspacing="2" cellpadding="2" border="1">
<tr>
<th> Código nave</th><th> Fecha de alta</th><th> Carga max</th>
<tr>
<td>238478NA</td> <td>2014-12-26</td> <td>10
</td></tr>
<tr>
<td>234543NA</td> <td>2014-11-23</td> <td>25
</td></tr>
<tr>
<td>129489NA</td> <td>2015-01-12</td> <td>25
</td></tr>
<tr>
<td>347629NA</td> <td>2015-06-17</td> <td>50
</td></tr>
<tr>
<td>974781NA</td> <td>2016-01-14</td> <td>100
</td></tr>
</table>
<br>
<a href='aplicacion.php?menu=naves'>Volver a intertar la inserción</a>
</BODY>
</HTML>
