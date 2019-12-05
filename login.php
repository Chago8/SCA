<?php
	session_start();
	require_once "conexion.php";
	$nombre=$_POST['usuario'];
	$pass=$_POST['contra'];
	$sql2=mysqli_query($conexion,"SELECT * FROM usuarios WHERE Usuario='$nombre'");
	if($f2=mysqli_fetch_assoc($sql2)){
		$_SESSION['idUsuario']=$f2['idUsuario'];
		$_SESSION['Nombre']=$f2['Nombre'];
		$_SESSION['ApellidoPaterno']=$f2['ApellidoPaterno'];
		$_SESSION['ApellidoMaterno']=$f2['ApellidoMaterno'];
		$_SESSION['Direccion']=$f2['Direccion'];
		$_SESSION['Telefono']=$f2['Telefono'];
		$_SESSION['Grupo']=$f2['Grupo'];
		$_SESSION['Usuario']=$f2['Usuario'];
		$_SESSION['Contrasena']=$f2['Contrasena'];
		$_SESSION['Rol']=$f2['Rol'];
		if($pass==$f2['Contrasena']){
			if ($_SESSION['Rol']!='1') {
				echo "
                <META HTTP-EQUIV='REFRESH' CONTENT=0;URL=http:cordi.php>";
			}else{
				echo "
                <META HTTP-EQUIV='REFRESH' CONTENT=0;URL=http:admin.php>";
			}
		}else{
			echo "<script>alert ('La contraseña es incorrecta');</script>
      		<META HTTP-EQUIV='REFRESH' CONTENT=0;URL=http:index.html>";
		}
	}else{
			echo "<script>alert ('Usuario o contraseña incorrectas');</script>
      <META HTTP-EQUIV='REFRESH' CONTENT=0;URL=http:index.html>";
	}
?>