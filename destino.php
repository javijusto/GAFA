<HTML>
<HEAD>
<style>
h3 {color:blue;}
</style>
<TITLE>Insertar</TITLE>
</HEAD>
<BODY bgcolor="00F3DB">
<?
function buscarNave( $conexion, $id )
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

include "/var/www/html/GAFA/conexion/conexion.php";
	//vemos si el usuario y contraseña son válidos
	$con = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());
	// si se envia el formulario
	$idCarga= $_POST["idCarga"];
	$obj=buscarNave($con, $idCarga);
	$planeta=$_POST["planeta"];
	$nave=$obj->codigo;
	$query= "INSERT INTO historico (codigo, planetadestino) values('$nave','$planeta')";
	$resultado= pg_query($con, $query);

if($_POST['idCarga']=="" || $nave=="" || $resultado=null){//comprobación de la inserción
	echo "<font color='red'>No se ha insertado nada...\n";
	echo "<font color='black'>Revisa que no esten los campos en blanco y que el planeta de destino existe";}
else echo "Inserción correcta. Se te asignará un tripulante y se pedirá permiso a la coalición correspondiente para efectuar el envío.";?>
<h3> Tabla de planetas disponibles </h3>
<table bgcolor="0999FA" align="center" width="120" cellspacing="2" cellpadding="2" border="1">
<tr>
<th> Código planeta</th><th>Distancia (10⁶km)</th>
<tr>
<td>123456PL</td> <td>23498</td>
</td></tr>
<tr>
<td>653468PL</td> <td>2848</td> 
</td></tr>
<tr>
<td>384729PL</td> <td>124989</td>
</td></tr>
<tr>
<td>124870PL</td> <td>123980</td>
</td></tr>
<tr>
<td>986372PL</td> <td>655536</td>
</td></tr>
<a href='aplicacion.php?menu=destino'>Volver</a>
</BODY>
</HTML>
