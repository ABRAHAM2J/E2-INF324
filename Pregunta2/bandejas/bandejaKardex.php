<!DOCTYPE html>
<html>
	<head>
		<title>Bandeja de Entrada</title>
        <link href="../css/estilos.css" rel="stylesheet" type="text/css" />
	</head>
	<body>	
		<?php    
		session_start();
		include "../conexion.php";
		$sql="select * 
			from seguimiento 
			where usuario='Kardex'
			and fechafin is null";
		$resultado=mysqli_query($conn, $sql);
		$fila=mysqli_fetch_array($resultado);
		?> 
		<header>
			<h1>PROCESO DE INSCRIPCION DEL CENTRO DE ESTUDIANTES DE INFORMATICA</h1>
		</header>
		<div class="contenido">
			<h1 style="font-size: 2.5rem; text-align: center; padding:50px;">KARDEX</h1>
			<div class="alineacionc">
				<div class="ins1">
					<div class ="formulario1">
						<table>
							<?php 
								echo '<tr><td>CI</td><td>: '.$_SESSION["ci"].'</td></tr>';
								echo '<tr><td>Nombre</td><td>: '.$_SESSION["nombre"].'</td></tr>';
								include "../date.inc.php";
								echo '<tr><td>Fecha</td><td>: '.$Date.'</td></tr>';
								echo '<tr><td>Hora</td><td>: '.$Time.'</td></tr>';
							?>
						</table>
					</div>
					<div style="background-color:rgb(255, 39, 39) ; color:white; width:100%;" class="formulario">
							Fecha de Inscripción: <br>
							24-11-21 HASTA EL 16-11-21
					</div>
					<div style="padding:15px 0px;">
						<a style="padding:15px; height:18px;" href="../controlcerrar.php" class="boton1">CERRAR SESION</a>
					</div>
				</div>
				<div class="ins2">
					<?php
						$flujo='F1';
						$proceso='P1';
					?>
					<div>
					<table class="tabla">
						<?php
						if(!empty($fila)){
							echo '<tr><th>Trámite</th><th>Flujo</th><th>Proceso</th><th>Fecha Inicio</th><th>Acción</th></tr>';
						}
						while($fila)
						{
							echo "<tr>";
							echo "<td>".$fila["notramite"]."</td>";
							echo "<td>".$fila["flujo"]."</td>";
							echo "<td>".$fila["proceso"]."</td>";
							echo "<td>".$fila["fechainicio"]."</td>";
							echo "<td><a ";
							echo "href='../desflujo.php?flujo=$fila[flujo]&proceso=$fila[proceso]&notramite=$fila[notramite]&inicio=$fila[fechainicio]&id=$fila[id]'";
							echo ">Mostrar<a/></td>";
							echo "</tr>";
							$fila=mysqli_fetch_array($resultado);
						}	
						?>
					</table>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>
