<form action="./motflujo.php" method="GET">		
		<?php 
			include './f1/'.$fila['formulario'].'/'.$fila['formulario'].'.inc.php';
		
		?>
	
		<div class="alineacion">
		<br>
		<input type="hidden" value="<?php echo $fila['formulario'];?>" name="formulario"/>
		<input type="hidden" value="<?php echo $flujo?>" name="flujo"/>
		<input type="hidden" value="<?php echo $proceso?>" name="proceso"/>
		<input type="hidden" value="<?php echo $notramite?>" name="notramite"/>
		
		<div style="background: none;"class="formulario"> 		
			<div class="alineacion">
				<?php 
					if($_SESSION["nombre"]=='Kardex'){?>
						<a style="padding:18 ; height:18" href="./bandejas/bandejaKardex.php"class="boton1">Salir</a>
				<?php
					}else if($_SESSION["nombre"]=='CEI'){?>
						<a style="padding:18 ; height:18" href="./bandejas/bandejaCEI.php"class="boton1">Salir</a>
				<?php
					}else{?>
						<a style="padding:18 ; height:18" href="./bandejas/bandeja.php"class="boton1">Salir</a>
				<?php
					}
				?>
				
				<input style="border-radius: 10px; margin: 8px;" class="boton1" type="submit" value="Siguiente" name="Siguiente"/>
			</div>
		</div>
		</div>
</form>