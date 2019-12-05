<?php
	
include ("conexion.php");

$Nombre= $_POST['Nombre'];
$Descripcion= $_POST['Descripcion'];
$sql2=mysqli_query($conexion,"SELECT * FROM grupo WHERE NombreG='$Nombre'");
	if($f2=mysqli_fetch_assoc($sql2)){
		echo "<script>alert ('Este grupo ya existe');</script>
          <META HTTP-EQUIV='REFRESH' CONTENT=0;URL=http:adminGruposNuevo.php>";
	}else{
		$result=mysqli_query($conexion,"INSERT INTO `sca`.`grupo`(`idGrupo`, `NombreG`, `Descripcion`) VALUES (NULL, '$Nombre', '$Descripcion');");
		echo "<script>alert ('Grupo registrado');</script>
          <META HTTP-EQUIV='REFRESH' CONTENT=0;URL=http:adminGrupos.php>";
	}

		
	