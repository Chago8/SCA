<?php 
// cierra la sesión
session_start();
if($_SESSION['idUsuario']){	
	session_destroy();
	header("location:index.html");
}
else{
	header("location:index.html");
}
?>