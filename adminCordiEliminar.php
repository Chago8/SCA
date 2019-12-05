<?php
	 include("conexion.php");

		$Usuario=$_GET['Usuario'];

		 $sentencia=mysqli_query($conexion, "DELETE FROM usuarios WHERE idUsuario='".$Usuario."' ");

	
		echo "<script>alert ('Usuario eliminado exitosamente');</script>
      <META HTTP-EQUIV='REFRESH' CONTENT=0;URL=http:adminCordi.php>";
		 
?>