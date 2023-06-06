<?php
session_start();
$sql_c="select * from centro where notramite='$notramite'";
$resultado_c=mysqli_query($conn, $sql_c);
$fila_c=mysqli_fetch_array($resultado_c);
?>