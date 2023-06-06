	<?php
	include "conexion.php";
	session_start();
	//obtencion de parametros
	$flujo=$_GET["flujo"];
	$proceso_a=$_GET["proceso"];
	$formulario=$_GET["formulario"];
	$notramite=$_GET["notramite"];
	$si=$_GET["si"];
	$no=$_GET["no"];

	echo $notramite;
	echo $proceso_a;
	echo $formulario;
	// Verificar si se ha definido el parámetro "flujo"
	if(!isset($flujo)){
		// Verificar si se ha seleccionado la opción "si"
		if(isset($si)){
			$proceso=$_GET["psi"];
		}
		// Verificar si se ha seleccionado la opción "no"
		if(isset($no)){
			$proceso=$_GET["pno"];
		}
		echo $proceso;
		$id=$_GET["id"];
		$sql="select * from flujoproceso where proceso like '".$proceso."' ";	
		echo '<br>';
		echo $sql;
		$resultado=mysqli_query($conn, $sql);
		$fila=mysqli_fetch_array($resultado);
		$flujo_p=$fila["flujo"];
		$rol_p=$fila["rol"];
		echo '<br>';
		echo $flujo_p;
		$sql="UPDATE seguimiento SET usuario='".$rol_p."' ,flujo ='".$flujo_p."', proceso = '".$proceso."' WHERE proceso like '".$proceso_a."' and id like '".$id."'" ;
		mysqli_query($conn, $sql);
		echo '<br>';
		echo $sql;

		// Redireccionar según el tipo de usuario
		if($_SESSION["nombre"]=='CEI'){
			header("Location: ./bandejas/bandejaCEI.php");
		}else{
			if($_SESSION["nombre"]=='Kardex'){
				header("Location: ./bandejas/bandejaKardex.php");
			}else{
				header("Location: ./bandejas/bandeja.php");
			}
		}
	}
	// Incluir el archivo del formulario correspondiente
	include './f1/'.$formulario.'/'.$formulario.'.mot.inc.php';
	include "./date.inc.php";

	if (isset($_GET["Siguiente"]))
	{
		
		$sql="UPDATE seguimiento SET fechafin = '".$Date." ".$Time."' WHERE proceso like '".$proceso_a."' and usuario like '".$_SESSION["nombre"]."'" ;
		echo '<br>';
		echo $sql;
		mysqli_query($conn, $sql);
		$sql="select s.*, f.procesosiguiente from seguimiento s, flujoproceso f where s.usuario like '".$_SESSION["nombre"]."' ";
		$sql.="and s.proceso like '".$proceso_a."' and s.proceso like f.proceso and s.flujo='".$flujo."' and notramite like '$notramite'";
		echo '<br>';
		echo $sql;
		$resultado=mysqli_query($conn, $sql);
		$fila=mysqli_fetch_array($resultado);
		$procesosiguiente=$fila["procesosiguiente"];
		$fechainicio=$fila["fechafin"];
		$notramite=$fila["notramite"];
		echo '<br>';
		echo $procesosiguiente;
		echo '<br>';
		echo $fechainicio;
		echo '<br>';
		echo $notramite;

		if($procesosiguiente=='con'){
			$sql="SELECT * FROM flujocondicionante WHERE proceso like '".$proceso_a."'";
			echo '<br>';
			echo $sql;
			$resultado=mysqli_query($conn, $sql);
			$fila_r=mysqli_fetch_array($resultado);
			$rol=$fila_r["rol"];
			echo '<br>';
			echo $rol;
			if($rol=='Usuario'){
				$usuario=$_SESSION["nombre"];
			}else{
				echo 'no we';
				$usuario=$rol;
				echo $usuario;
			}
			echo $notramite;
			$sql="insert into seguimiento (notramite,proceso,usuario,fechainicio) values(".$notramite.",'".$proceso_a."','".$usuario."','".$fechainicio."')";
			echo '<br>';
			echo $sql;
			mysqli_query($conn, $sql);

		}else{
			if($procesosiguiente=='fin'){
				echo 'llego al fin'.'<br>';
			}else{
			$sql="select * from flujoproceso where proceso='".$procesosiguiente."'";
			$resultado=mysqli_query($conn, $sql);
			$fila_f=mysqli_fetch_array($resultado);
			$flujo=$fila_f["flujo"];
			$rol=$fila_f["rol"];
			echo '<br>';
			echo $sql;
			echo '<br>';
			echo $flujo;
			echo '<br>';
			echo $rol;
			echo $rol;
			$usuario='';
			if($rol=='Usuario'){
				$sql="select * from seguimiento where proceso='P1' and notramite like '$notramite'";
				$resultado=mysqli_query($conn, $sql);
				$fila_f=mysqli_fetch_array($resultado);
				$usuario=$fila_f["usuario"];
				echo $usuario;
			}else{
				echo 'no we';
				$usuario=$rol;
				echo $usuario;
			}
			$sql="insert into seguimiento (notramite,usuario,flujo,proceso,fechainicio) values('".$notramite."','".$usuario."','".$flujo."','".$procesosiguiente."','".$fechainicio."')";
			echo '<br>';
			echo $sql;
			mysqli_query($conn, $sql);
		
		}
		}
		if($_SESSION["nombre"]=='CEI'){
			header("Location: ./bandejas/bandejaCEI.php");
		}else{
			if($_SESSION["nombre"]=='Kardex'){
				header("Location: ./bandejas/bandejaKardex.php");
			}else{
				header("Location: ./bandejas/bandeja.php");
			}
		}
	}

	?>
