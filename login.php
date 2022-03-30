<html> 
<head>
<style> 
h1 {color:blue;}
table { 
  border-collapse: separate; 
  border: blue 10px solid;
}
</style> 
<title>Login GAFA</title> 
</head> 
<body bgcolor="00F3DB"> 
<h1 >Login </h1> 
<form action="autentificacion.php" method="POST"> 
<table align="center" width="225" cellspacing="2" cellpadding="2" border="10"> 
<tr> 
<td colspan="2" align="center" 
<?if ($_GET["errorusuario"]=="si"){?> 
bgcolor=red><span style="color:ffffff"><b>Datos incorrectos</b></span> 
<?}else{?> 
bgcolor=#388AEE>Introduce tu clave de acceso 
<?}?></td> 
</tr> 
<tr> 
<td align="right">USER:</td> 
<td><input type="Text" name="usuario" size="8" maxlength="50"></td> 
</tr> 
<tr> 
<td align="right">PASS:</td> 
<td><input type="password" name="contrasena" size="8" maxlength="50"></td> 
</tr>
</table>
<table align="center" width="225" cellspacing="2" cellpadding="2" border="0"> 
<tr> 
<td colspan="2" align="center"><input type="Submit" value="ENTRAR">
<p> Usuario: user1, 1234 </p></td> 
</tr> 
</table> 
</form> 
</body> 
</html>
