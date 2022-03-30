
<?include ("bloqueDeSeguridad.php");?>
<?if ($_SESSION["autenticado"] = "SI") {
				require('cabecera.php');
			}
			else echo "Aplicación insegura, vuelve a identificarte";?>
<html>
<head>
<title>Web de GAFA</title>
</head>
<body bgcolor="00F3DB">

<table bgcolor="0D21A1" width="356" align="center" cellspacing="2" cellpadding="2" border="3">
	<tr BGCOLOR="5533FE">
	<td >
		Gestor GAFA
	</td>
	</tr>
</table>
<TABLE bgcolor="0D21A1" width="356" align="center" cellspacing="2" cellpadding="2" border="3">
		<TR BGCOLOR="5533FE">
		   <td valign = top width=150px>
			   <?require('navegacion.php');?>   <!-- Barra de navegación-->
		   </td>
		   <td valign = top width=600px> <!-- Contenidos de la página-->
			<?$menu= $_GET['menu'];
		   switch ($menu)
		    {
	
		      //Gestión de cargas
		      case 'insercionCargas':
		         {require('insercionCargas.php');break;}
			case 'editarCarga':
		         {require('editarCarga.php');break;}
		      case 'borrarCargas':
			{ require('borrarCargas.php');break;}
			case 'naves':
			{ require('naves.php');break;}
			case 'destino':
			{ require('insercionDestino.php');break;}
		      
		      //catalogo
	              case 'catalogoConsulta':
		         {require('consulta.php');break;}
		      case 'catalogoRespuesta':
		         {require('respuesta.php');break;}
		      
		      
		      default:
		      {require('imagenes/principal.php');}
		    }
		    ?>
		   </td>
		</TR>
		<TR> 
			<td bgcolor="00F3DB">
			<a href="salir.php">Cerrar sesión</a>
		</td>
		   <td colspan = "7" bgcolor="5533FE">  <!-- Pié de página-->
			  <?require('pie.php');?>
		
		   </td>
		
		</TR>
		 
	</TABLE>
</body>
</html>
