<HTML>
<HEAD>
<TITLE>Insertar</TITLE>
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
	$query = "begin transaction; INSERT INTO cargas values('$idCarga','$peso'); insert into transportar (id) values('$idCarga'); commit transaction;";
	$resultado= pg_query($con, $query);

if($_POST['idCarga']=="" || $_POST['peso']=="" || $resultado=null){//comprobación de la inserción
	echo "<font color='red'>No se ha insertado nada...\n";
	echo "<font color='black'>Revisa que no esten los campos en blanco o que el id de carga ya exista en la base de datos.";}
else echo "Inserción correcta";?><br><br>
<a href='aplicacion.php?menu=insercionCargas'>Volver</a>
</BODY>
</HTML>
