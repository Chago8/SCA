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
			<form action="cordiNuevo.php" class="form" method="POST">
		        <div class="form-header">
		    	    <p class="form-title"> <span>Registro de nuevo cordinador</span></p>
		        </div>    
		  		<label for="Usuario" class="form-label">Usuario:</label>
			    <input type="text" class="form-input" name="Usuario" required=""  placeholder="Usuario" />
			    <label for="Contraseña" class="form-label">Contraseña:</label>
			    <input type="password" class="form-input" name="Contrasena" required=""  placeholder="Contraseña" />
			    <label for="Nombre" class="form-label">Nombre:</label>
			    <input type="text" class="form-input" name="Nombre" required=""  placeholder="Nombre" />
			    <label for="ApellidoP" class="form-label">Apellido paterno:</label>
			    <input type="text" class="form-input" name="ApellidoP" required=""  placeholder="Apellido paterno" />
			    <label for="ApellidoM" class="form-label">Apellido materno:</label>
			    <input type="text" class="form-input" name="ApellidoM" required=""  placeholder="Apellido materno" />
			    <label for="Telefono" class="form-label">Teléfono:</label>
			    <input type="text" class="form-input" name="Telefono" required=""  placeholder="Teléfono" />
			    <label for="Dirección" class="form-label">Dirección:</label>
			    <input type="text" class="form-input" name="Direccion" required=""  placeholder="Dirección" />	      
			    <label for="Grupo" class="form-label">Grupo:</label>
			     <select name="Grupo" class="form-input">
			        <option name="Grupo"value="0">Selecciona:</option>
			        <?php
			          $query = mysqli_query($conexion,"SELECT `NombreG`,`idGrupo` FROM `grupo` WHERE idGrupo!=1");
			          while ($valores = mysqli_fetch_assoc($query)) {
			            echo '<option name="Grupo" value="'.$valores['idGrupo'].'">'.$valores['NombreG'].'</option>';
			          }
			        ?>
			    </select> 
			    
			    <label for="Rol" class="form-label">Rol:</label>
			    <select name="Rol" class="form-input">
			        <option name="Rol" value="0">Selecciona:</option>
			        <?php
			          $query = mysqli_query($conexion,"SELECT `idRol`,`Nombre` FROM `roles` WHERE idRol!=1");
			          while ($valores = mysqli_fetch_assoc($query)) {
			            echo '<option name="Rol" value="'.$valores['idRol'].'">'.$valores['Nombre'].'</option>';
			          }
			        ?>
			    </select> 
			    <input type="submit" class="btn-submit" value="Registrar"><br>
		    </form>
		</div>
	</body>
</html>