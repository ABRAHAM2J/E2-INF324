<?php
    session_start();
    include "conexion.php";
    include "date.inc.php";
    $sql="SELECT COUNT(proceso)
        FROM seguimiento 
        WHERE usuario like '".$_SESSION["nombre"]."' 
        AND fechafin is null";
    $resultado=mysqli_query($conn, $sql);
    $fila=mysqli_fetch_array($resultado);
    $nroproceso=$fila[0];
    echo $nroproceso;
    if($nroproceso==0){
        $sql="insert into tramite (ci,fecha) 
            values('".$_SESSION["ci"]."','".$Date." ".$Time."')";
        mysqli_query($conn, $sql);
        echo $sql;
        $sql="select * 
            from tramite 
            where ci='".$_SESSION["ci"]."'";
        echo $sql;
        $resultado=mysqli_query($conn, $sql);
        $fila=mysqli_fetch_array($resultado);
        print_r ($fila);
        $notramite=$fila["notramite"];
        print_r ($notramite);
        $sql="insert into seguimiento (notramite,usuario,flujo,proceso,fechainicio) 
            values(".$notramite.",'".$_SESSION["nombre"]."','F1','P1','".$Date." ".$Time."')";
        echo $sql;
        mysqli_query($conn, $sql);
    }
    header("Location: desflujo.php?flujo=F1 &proceso=P1&notramite=$notramite");
?>