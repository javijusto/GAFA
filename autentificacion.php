<?
	include "/var/www/html/GAFA/conexion/conexion.php";
	//vemos si el usuario y contraseña son válidos
	$con = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());
	echo "Conexion exitosa <hr>";
	$resultado= pg_query($con, "Select * from usuario");
	if(!$resultado){
		echo "<b> Error de búsqueda</b>";
		exit;
	}
	$filas=pg_numrows($resultado); 
	if($filas>0){
		echo "<table border='1' align='center'>
		<tr bgcolor='skyblue'>
		<th>Usuario</th>
		<th>Contrasena</th></tr>";
		while ($fila=pg_fetch_array($resultado)) {
			$nombre=$fila['nombre'];
			$pass=$fila['pass'];
			echo "<tr><td>".$fila['nombre']."</td>";
			echo "<td>".$fila['pass']."</td></tr>";
		}
				echo "</table>";
	}else{
				echo "No hay Registros";
	}//se cierra la conexion
		pg_close($conexion);

	if ($_POST["usuario"]==$nombre && $_POST["contrasena"]==$pass){
		//usuario y contraseña válidos
		//se define una sesion y se guarda el dato session_start();
		$_SESSION["autenticado"]= "SI";
		header ("Location: inicio.php");
	}else {
		//si no existe se va a login.php
		header("Location: login.php?errorusuario=si");
	}
?>
