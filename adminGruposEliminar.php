<?php
	 include("conexion.php");

		$Grupo=$_GET['Grupo'];

		 $sentencia=mysqli_query($conexion, "DELETE FROM grupo WHERE idGrupo='".$Grupo."' ");

	
		echo "<script>alert ('Grupo eliminado exitosamente');</script>
      <META HTTP-EQUIV='REFRESH' CONTENT=0;URL=http:adminGrupos.php>";
		 
?>