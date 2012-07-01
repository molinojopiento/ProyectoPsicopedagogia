

<?

$username = $HTTP_POST_VARS['hola'];


require_once('connect.php');
mysql_select_db($database_conn, $conn);

$q = "UPDATE usuarios SET intentos =(intentos)+1 , fecha = now() WHERE usuario = '".$username."'";
$rs = mysql_query($q);
if($rs == false) {
	echo '<p>Error al insertar los campos en la tabla.</p>';
}else{
	echo '<p>Los datos se han insertado correctamente.</p>';
}
?>