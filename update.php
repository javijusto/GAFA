<HTML>
<HEAD>
<style>
h4 {color:blue;}
h3 {color:red;}
</style>
<TITLE>Update</TITLE>
</HEAD>
<BODY bgcolor="00F3DB">
<br>

<?
include "/var/www/html/GAFA/conexion/conexion.php";
	//vemos si el usuario y contraseña son válidos
	$con = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());
	// si se envia el formulario
	$idCarga= $_POST["idCarga"];
	$peso=$_POST["peso"];
	$query = "update cargas set peso='$peso' where id='$idCarga'";
	$resultado= pg_query($con, $query);

if($_POST['idCarga']==""|| $_POST['peso']=="")
	echo "<font color='red'>Actualizacion erronea. Vuelve a intentarlo";
else echo "Actualización correcta";?><br><br>
<a href='aplicacion.php?menu=editarCarga'>Volver</a>
</BODY>
</HTML>
