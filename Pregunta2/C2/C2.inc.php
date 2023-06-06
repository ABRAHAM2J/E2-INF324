<?php
session_start();
$sql_c="select * from centro where notramite='$notramite'";
$resultado_c=mysqli_query($conn, $sql_c);
$fila_c=mysqli_fetch_array($resultado_c);
#cho $sql_c;
?>
<div class="contenido">
			<div class="alineacionc">
            <div class ="formulario1">
                    <div class="datos">
                        <br><br>
                        <b>DATOS DEL FRENTE</b> <br><br>
                        <div style="height: 34;" class="borde">
                            <div class="alineacion">
                                <div style="width: 150;">
                                Nombre 
                                </div>
                                <?php echo ': '.$fila_c["nombre"] ?>
                            </div>
                        </div> <br>
                        <div style="height: 34;" class="borde">
                            <div class="alineacion">
                                <div style="width: 150;">
                                Sigla
                                </div>
                                <?php echo ': '.$fila_c["sigla"] ?>
                            </div>
                        </div> <br>
                    </div>
                    <hr>
                    <br> <b>CARGOS</b> <br><br>
                    <!--<div class="fondosc"> -->
                    <div class="uno">
                        <div class="dos">
                            Secretaria Ejecutiva <br><br>
                            <div style="height: 34;" class="borde">
                                <div class="alineacion">
                                    <div style="width: 150;">
                                    1er 
                                    </div>
                                    <?php echo ':   '.$fila_c["1ejecutivo"] ?>
                                </div>
                            </div> <br>
                            <div style="height: 34;" class="borde">
                                <div class="alineacion">
                                    <div style="width: 150;">
                                    2do  
                                    </div>
                                    <?php echo ':   '.$fila_c["2ejecutivo"] ?>
                                </div>
                            </div> <br>
                            <div style="height: 34;" class="borde">
                                <div class="alineacion">
                                    <div style="width: 150;">
                                    3er  
                                    </div>
                                    <?php echo ':   '.$fila_c["3ejecutivo"] ?>
                                </div>
                            </div> <br>
                        </div>
                        <div class="dos">
                            Honorable Consejo Facultativo <br><br>
                            <div style="height: 34;" class="borde">
                                <div class="alineacion">
                                    <div style="width: 150;">
                                    1° titular
                                    </div>
                                    <?php echo ':   '.$fila_c["1hcf"] ?>
                                </div>
                            </div> <br>
                            <div style="height: 34;" class="borde">
                                <div class="alineacion">
                                    <div style="width: 150;">
                                    2° titular 
                                    </div>
                                    <?php echo ':   '.$fila_c["2hcf"] ?>
                                </div>
                            </div> <br>
                        </div>
                    </div>
                    <div class="uno">
                    <div class="dos">
                            Honorable Consejo de Carrera <br><br>
                            <div style="height: 34;" class="borde">
                                <div class="alineacion">
                                    <div style="width: 150;">
                                    1° titular
                                    </div>
                                    <?php echo ':   '.$fila_c["1hcc"] ?>
                                </div>
                            </div> <br>
                            <div style="height: 34;" class="borde">
                                <div class="alineacion">
                                    <div style="width: 150;">
                                    2° titular
                                    </div>
                                    <?php echo ':   '.$fila_c["2hcc"] ?>
                                </div>
                            </div> <br>
                            <div style="height: 34;" class="borde">
                                <div class="alineacion">
                                    <div style="width: 150;">
                                    3° titular
                                    </div>
                                    <?php echo ':   '.$fila_c["3hcc"] ?>
                                </div>
                            </div> <br>
                        </div>
                        <div class="dos">
                            Consejo Académico Facultativo <br><br>
                            <div style="height: 34;" class="borde">
                                <div class="alineacion">
                                    <div style="width: 150;">
                                    1° titular
                                    </div>
                                    <?php echo ':   '.$fila_c["1caf"] ?>
                                    
                                </div>
                            </div> <br>
                            Consejo Académico de Carrera <br><br>
                            <div style="height: 34;" class="borde">
                                <div class="alineacion">
                                    <div style="width: 150;">
                                    1° titular
                                    </div>
                                    <?php echo ':   '.$fila_c["1cac"] ?>
                                </div>
                            </div> <br>
                        </div>
                    </div>
                    
				</div>


			</div>
		</div>
