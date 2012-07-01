<?php
// tipico codigo de pasar variables via post

$action = $HTTP_POST_VARS['action'];
$username = $HTTP_POST_VARS['username'];
$password = $HTTP_POST_VARS['password'];

require_once('connect.php');
mysql_select_db($database_conn, $conn);

if ($action == 'login'){
	$sql = mysql_query("SELECT password FROM usuarios WHERE usuario='".$username."'");
	

	if (!$sql) {
		die('Could not query:' . mysql_error());
	}
	$sql2 = mysql_fetch_row($sql);
	if (!$sql2){
		//no existe usuario
		echo 'no existe usuario<br>';
		?>&opcion=0&<?
	}else{
		if ($password !== $sql2[0]){
			//no coincide pass
			echo 'el pass no coincide<br>';
			?>&opcion=1&<?
		}else{
			//usuario y pass correctos
			print ("&flash=".$username); 
			
			?>&opcion=2&
			&tipo=<? echo $sql2[1]; ?>&<?
		}
	}
	mysql_close($conn);
}
?>