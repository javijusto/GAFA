<HTML>
<HEAD>
<style>
h4 {color:blue;}
h3 {color:red;}
</style>
<TITLE>Eliminar</TITLE>
</HEAD>
<BODY bgcolor="00F3DB">
<br>

<?

include "/var/www/html/GAFA/conexion/conexion.php";
	//vemos si el usuario y contraseña son válidos
	$con = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());
	// si se envia el formulario
	$idCarga= $_POST["idCarga"];
	$query = "begin transaction; delete from cargas where id='$idCarga';delete from transportar where id='$idCarga'; commit transaction";
	$resultado= pg_query($con, $query);

if($_POST['idCarga']==""|| $_POST['peso'])
	echo "<font color='red'>No se ha borrado nada";
else echo "Borrado correcto";?><br><br>
<a href='aplicacion.php?menu=borrarCargas'>Volver</a>
</BODY>
</HTML>
