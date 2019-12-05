<!DOCTYPE html>
<?php
require_once "conexion.php";
  session_start();
  if (@!$_SESSION['Rol']==1) {
    header("Location: admin.php");
  }elseif ($_SESSION['Rol']==2) {
  header("Location:cordi.php");
}if (@!$_SESSION['Rol']) {
  header("Location:index.html");
  }
$s=$_SESSION['Grupo'];
  $sql2=mysqli_query($conexion,"SELECT nombreG FROM grupo WHERE idGrupo='$s'");
  $f2=mysqli_fetch_assoc($sql2);
?>
<html>
<head>
	<title>Smart Catholic Agenda</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="librerias/css/estiloAdmin.css">
	</head>
	<body >	   
		<div class="contenedor">
			<header>
				<nav>
					<ul>
						<li><a href="javascript:history.go(-2)">Smart Catholic Agenda</a></li>
						<li style="margin-left: 35%"><a href=""><strong>Bienvenida <?php echo " "; echo $f2['nombreG']; echo " "; echo $_SESSION['Nombre']; ?> </strong></a></li>
						<li><a href="CerrarSesion.php">Cerrar sesión</a></li>
					</ul>
				</nav>
			</header>
			<form action="cordiModificar.php" class="form" method="POST">
			<?php
	          	include 'conexion.php';
	          	$Usuario=$_GET['Usuario'];
	          	$query=mysqli_query($conexion,"SELECT `idUsuario`, `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `Direccion`, `Telefono`, `Grupo`, `Usuario`, `Contrasena`, `Rol` FROM `usuarios` WHERE idUsuario='".$Usuario."' "); 
	          	$filas=mysqli_fetch_assoc($query)
        	?>
		        <div class="form-header">
		    	    <p class="form-title"> <span>Actualizar datos de <?php echo $filas['Usuario'] ?> </span></p>
		        </div>
			    <label for="Usuario" class="form-label">Usuario:</label>
			    <input type="text" class="form-input" name="Usuario" required=""  value="<?php echo $filas['Usuario']; ?>" />
			    <label for="Contraseña" class="form-label">Contraseña:</label>
			    <input type="text" class="form-input" name="Contrasena" required=""  value="<?php echo $filas['Contrasena']; ?>" />
			    <label for="Nombre" class="form-label">Nombre:</label>
			    <input type="text" class="form-input" name="Nombre" required=""  value="<?php echo $filas['Nombre']; ?>" />
			    <label for="ApellidoP" class="form-label">Apellido paterno:</label>
			    <input type="text" class="form-input" name="ApellidoP" required=""  value="<?php echo $filas['ApellidoPaterno']; ?>" />
			    <label for="ApellidoM" class="form-label">Apellido materno:</label>
			    <input type="text" class="form-input" name="ApellidoM" required=""  value="<?php echo $filas['ApellidoMaterno']; ?>" />
			    <label for="Telefono" class="form-label">Teléfono:</label>
			    <input type="text" class="form-input" name="Telefono" required=""  value="<?php echo $filas['Telefono']; ?>" />
			    <label for="Direccion" class="form-label">Dirección:</label>
			    <input type="text" class="form-input" name="Direccion" required=""  value="<?php echo $filas['Direccion']; ?>" />	      
			    
			    <input type="submit" class="btn-submit" value="Actualizar"><br>
			    <input type="text" class="form-input" style="visibility: hidden;"name="idUsuario" required=""  value="<?php echo $filas['idUsuario']; ?>" />
		    </form>
		</div>
	</body>
</html>