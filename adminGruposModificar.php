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
			<?php
	          	include 'conexion.php';
	          	$Grupo=$_GET['Grupo'];
	          	$query=mysqli_query($conexion,"SELECT `idGrupo`, `NombreG`, `Descripcion` FROM `grupo` WHERE idGrupo='".$Grupo."' "); 
	          	$filas=mysqli_fetch_assoc($query)
        	?>
			<form action="gruposModificar.php" class="form" method="POST">
		        <div class="form-header">
		    	    <p class="form-title"> <span>Actualizar grupo <?php echo $filas['NombreG']; ?> </span></p>
		        </div> 
			    <label for="Nombre" class="form-label">Nombre:</label>
			    <input type="text" class="form-input" name="Nombre" required=""  value="<?php echo $filas['NombreG']; ?>" />
			    <label for="Descripcion" class="form-label">Descripción:</label>
			    <input type="text" class="form-input" name="Descripcion" required=""  value="<?php echo $filas['Descripcion']; ?>"/>
			    <input type="submit" class="btn-submit" value="Actualizar">
			    <input type="text" class="form-input" style="visibility: hidden;"name="idGrupo" required=""  value="<?php echo $filas['idGrupo']; ?>" />
		    </form>
		</div>
	</body>
</html>