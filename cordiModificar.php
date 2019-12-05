<?php
	
include ("conexion.php");
$idUsuario=$_POST['idUsuario'];
$Nombre= $_POST['Nombre'];
$ApellidoP= $_POST['ApellidoP'];
$ApellidoM= $_POST['ApellidoM'];
$Direccion= $_POST['Direccion'];
$Telefono= $_POST['Telefono'];
$Usuario= $_POST['Usuario'];
$Contrasena= $_POST['Contrasena'];

$sql2=mysqli_query($conexion,"SELECT * FROM usuarios WHERE idUsuario='$idUsuario'");
	if($f2=mysqli_fetch_assoc($sql2)){
		$result=mysqli_query($conexion,"UPDATE `usuarios` SET `Nombre`='$Nombre',`ApellidoPaterno`='$ApellidoP',`ApellidoMaterno`='$ApellidoM',`Direccion`='$Direccion',`Telefono`='$Telefono',`Usuario`='$Usuario',`Contrasena`='$Contrasena' WHERE idUsuario='$idUsuario'");
		echo "<script>alert ('Usuario actualizado');</script>
          <META HTTP-EQUIV='REFRESH' CONTENT=0;URL=http:adminCordi.php>";
	}else{
		echo "<script>alert ('Usuario no encontrado en la BD');</script>
          <META HTTP-EQUIV='REFRESH' CONTENT=0;URL=http:adminCordi.php>";
	}
?>
	