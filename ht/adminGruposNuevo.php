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
	<body style="background:url(img/fondo1.jpeg) no-repeat center center fixed;background-size: cover;background-attachment: fixed;">	   
		<div class="contenedor">
			<header>
				<nav>
					<ul>
						<li><a href="javascript:history.go(-2)">Smart Catholic Agenda</a></li>
						<li style="margin-left: 35%"><a href=""><strong>Bienvenida <?php echo " "; echo $f2['nombreG']; echo " "; echo $_SESSION['Nombre']; ?> </strong></a></li>
					</ul>
				</nav>
			</header>
			<form action="GruposNuevo.php" class="form" method="POST">
		        <div class="form-header">
		    	    <p class="form-title"> <span>Registro de nuevo grupo pastoral</span></p>
		        </div> 
			    <label for="Nombre" class="form-label">Nombre:</label>
			    <input type="text" class="form-input" name="Nombre" required=""  placeholder="Nombre" />
			    <label for="Descripcion" class="form-label">Descripción:</label>
			    <input type="text" class="form-input" name="Descripcion" required=""  placeholder="Descripción" />
			    <input type="submit" class="btn-submit" value="Registrar"><br>
		    </form>
		</div>
	</body>
</html>