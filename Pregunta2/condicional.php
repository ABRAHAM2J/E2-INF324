<?php

    $sql="select * 
		from flujocondicionante  
		where proceso='".$proceso."'";
	$resultado=mysqli_query($conn, $sql);
	$fila=mysqli_fetch_array($resultado);
?>
<form action="./motflujo.php" method="GET">		
		<?php 
			include './'.$fila['formulario'].'/'.$fila['formulario'].'.inc.php';
		?>
		<div class="alineacion">
		<br>
		<input type="hidden" value="<?php echo $fila["si"]?>" name="psi"/>
		<input type="hidden" value="<?php echo $fila["no"]?>" name="pno"/>
        <input type="hidden" value="<?php echo $proceso?>" name="proceso"/>
        <input type="hidden" value="<?php echo $id?>" name="id"/>
        <input type="hidden" value="<?php echo $notramite?>" name="notramite"/>
        <input type="hidden" value="<?php echo $fila["formulario"]?>" name="formulario"/>
		<div style="background: none;"class="formulario"> 		
			<div class="alineacion">
			<input style="border-radius: 10px; margin: 8px;" class="boton1" type="submit" value="Verificado" name="si"/>
			<input style="border-radius: 10px; margin: 8px;" class="boton1" type="submit" value="Rechazar" name="no"/>
			</div>
		</div>
		</div>
</form>