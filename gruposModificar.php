<?php
	
include ("conexion.php");
$idGrupo=$_POST['idGrupo'];
$Nombre= $_POST['Nombre'];
$Descripcion= $_POST['Descripcion'];
$sql2=mysqli_query($conexion,"SELECT * FROM grupo WHERE NombreG='$Nombre'");
	if($f2=mysqli_fetch_assoc($sql2)){
	$result=mysqli_query($conexion,"UPDATE `grupo` SET `NombreG`='$Nombre',`Descripcion`='$Descripcion' WHERE idGrupo='$idGrupo'");
		echo "<script>alert ('Grupo actualizado');</script>
          <META HTTP-EQUIV='REFRESH' CONTENT=0;URL=http:adminGrupos.php>";
	}else{
		echo "<script>alert ('Grupo no encontrado en la BD');</script>
          <META HTTP-EQUIV='REFRESH' CONTENT=0;URL=http:adminGrupos.php>";
	}
?>

		
	