<?php
	
include ("conexion.php");

$Nombre= $_POST['Nombre'];
$ApellidoP= $_POST['ApellidoP'];
$ApellidoM= $_POST['ApellidoM'];
$Direccion= $_POST['Direccion'];
$Telefono= $_POST['Telefono'];
$Grupo= $_POST['Grupo'];
$Usuario= $_POST['Usuario'];
$Contrasena= $_POST['Contrasena'];
$Rol= $_POST['Rol'];
$sql2=mysqli_query($conexion,"SELECT * FROM usuarios WHERE Usuario='$Usuario'");
	if($f2=mysqli_fetch_assoc($sql2)){
		echo "<script>alert ('Este usuario ya existe');</script>
          <META HTTP-EQUIV='REFRESH' CONTENT=0;URL=http:adminCordiNuevo.php>";
	}else{
		$result=mysqli_query($conexion,"INSERT INTO `sca`.`usuarios` (`idUsuario`, `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `Direccion`, `Telefono`, `Grupo`, `Usuario`, `Contrasena`, `Rol`) VALUES (NULL, '$Nombre', '$ApellidoP', '$ApellidoM', '$Direccion', '$Telefono', '$Grupo', '$Usuario', '$Contrasena', '$Rol');");
		echo "<script>alert ('Usuario registrado');</script>
          <META HTTP-EQUIV='REFRESH' CONTENT=0;URL=http:adminCordi.php>";
	}

		
	