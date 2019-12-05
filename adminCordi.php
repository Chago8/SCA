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
						<li><a href="javascript:history.go(-1)">Smart Catholic Agenda</a></li>
						<li style="margin-left: 35%"><a href=""><strong>Bienvenida <?php echo " "; echo $f2['nombreG']; echo " "; echo $_SESSION['Nombre']; ?> </strong></a></li>						
						<li><a href="CerrarSesion.php">Cerrar sesión</a></li>
					</ul>
				</nav>
			</header>
			<div class="cont">
				<table class="table">
				
					<tr>
						<th colspan="8" class="x">Coordinadores</th>
					</tr>
				   	<th>Nombre </th>
			        <th>Apellido paterno</th>
			        <th>Apellido materno</th>
			        <th>Teléfono</th>
			        <th>Grupo</th>
			        <th>Dirección</th>
			        <th> <a href="adminCordiNuevo.php"> <button type="button" class="btn btnA">Nuevo</button> </a> </th>
			       	<th></th>
			        <tr>
			     <?php 
				include("conexion.php");  
	            $query=mysqli_query($conexion,"SELECT `usuarios`.`idUsuario`, `usuarios`.`Nombre`, `usuarios`.`ApellidoPaterno`, `usuarios`.`ApellidoMaterno`, `usuarios`.`Direccion`, `usuarios`.`Telefono`, `usuarios`.`Grupo`,`grupo`.`NombreG`, `usuarios`.`Usuario`, `usuarios`.`Contrasena`, `usuarios`.`Rol` FROM `usuarios` inner join grupo ON usuarios.Grupo=grupo.idGrupo WHERE Rol!=1 && Grupo!=1");
	            while($filas=mysqli_fetch_assoc($query))
	            {
            	?>
			          <td><?php echo $filas['Nombre']; ?></td>
			          <td><?php echo $filas['ApellidoPaterno']; ?></td>
			          <td><?php echo $filas['ApellidoMaterno']; ?></td>
			          <td><?php echo $filas['Telefono']; ?></td>
			          <td><?php echo $filas['NombreG']; ?></td>
			          <td><?php echo $filas['Direccion']; ?></td>
			          <td><a href="adminCordiModificar.php?Usuario=<?php echo $filas['idUsuario'];?>"> <button type='button' class="btn btnM">Modificar</button> </a> </td>
			          <td> <a href="adminCordiEliminar.php?Usuario=<?php echo $filas['idUsuario'];?>"><button type='button' class="btn btnE">Eliminar</button></a> </td>
			        </tr>
			    <?php } ?>
				</table>
			</div>		
		</div>
	</body>
</html>