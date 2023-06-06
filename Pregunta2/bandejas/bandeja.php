<?php
	session_start();
	include "../conexion.php";
	$sql = "select * 
			from seguimiento 
			where usuario='" . $_SESSION["nombre"] . "' 
			and fechafin is null";
	$resultado = mysqli_query($conn, $sql);
	$fila = mysqli_fetch_array($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/estilos.css" rel="stylesheet" type="text/css" />
	<title>Document</title>
</head>
<body>
		<header>
			<h1>PROCESO DE INSCRIPCION DEL CENTRO DE ESTUDIANTES DE INFORMATICA</h1>
		</header> 
		<div class="contenido">
			<h1 style="font-size: 2.5rem; text-align: center; padding:50px;">UNIVERSITARIO</h1>
			<div class="alineacionc">
				<div class="ins1">
					<div class ="formulario1">
						<table>
							<?php 
								echo '<tr><td>CI</td><td>  '.$_SESSION["ci"].'</td></tr>';
								echo '<tr><td>Nombre</td><td>  '.$_SESSION["nombre"].'</td></tr>';
								include "../date.inc.php";
								echo '<tr><td>Fecha</td><td>  '.$Date.'</td></tr>';
								echo '<tr><td>Hora</td><td>  '.$Time.'</td></tr>';
							?>
						</table>
					</div>
					<div style="background-color:rgb(255, 39, 39) ; color:white; width:100%;"class="formulario">
							Fecha de Inscripción: <br>
							04-06-2023 HASTA EL 10-06-2023
					</div>
					<div style="padding:15px 0px;">
						<a style="padding:15px; height:18px;" href="../controlcerrar.php" class="boton1">CERRAR SESION</a>
					</div>
				</div>
				<div class="ins2">
					<div style="background:none ; "class="formulario">
					<?php
						if(empty($fila)){
							$sql2="select * 
									from seguimiento 
									where usuario='".$_SESSION["nombre"]."' ";
							$resultado2=mysqli_query($conn, $sql2);
							$fila2=mysqli_fetch_array($resultado2);

							if(empty($fila2)){
								echo '<a style="padding:9px;"class="boton1" href="../iniciar.inc.php"> Iniciar inscripcion</a>';
							}else{
								$sql3 = "select c.*
										from centro c, usuarios us
										where  us.ci =' ".$_SESSION["ci"]."' ";
								$res = mysqli_query($conn, $sql3);
								$fila3 = mysqli_fetch_array($res);
								echo '<h3>FRENTE POSTULANTE</h3><br>';
								echo '<table class="tabla">';
								echo '<tr><td>NOMBRE DEL FRENTE: </td><td>  '.$fila3["nombre"].'</td></tr>';
								echo '<tr><td>SIGLA: </td><td>  '.$fila3["sigla"].'</td></tr>';
								echo '</table><br>';
								echo 'Solicitud enviada, espere las observaciones o los resultados en la pagina oficial de la carrera';
							}
						}else{
							echo 'Inscripción iniciada';
						}
					?>
					</div>
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
							echo "href='../desflujo.php?flujo=$fila[flujo]&proceso=$fila[proceso]&notramite=$fila[notramite]'";
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