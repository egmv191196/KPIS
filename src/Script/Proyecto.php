<?php
    require_once('./conexionBD.php'); 
        $Clave=$_POST['claveProyecto'];
        $Name=$_POST['nombreProyecto'];
        $fechaInicio=$_POST['fechaInicio'];
        $date=date("Y-m-d",strtotime($fechaInicio));
        $fechaFin=$_POST['fechaFin'];
        $costoProyecto=$_POST['costoProyecto'];
        $id_Presupuesto=$_POST['id_Presupuesto'];
        $id_Cliente=$_POST['id_Cliente'];
        $consulta = "INSERT INTO proyecto (clave_Proyecto, Nombre, fecha_IniciO, fecha_Fin, monto_Contrato, id_Presupuesto, id_Cliente) VALUES 
        ('{$Clave}','{$Name}','{$date}','{$date}',{$costoProyecto},'{$id_Presupuesto}',{$id_Cliente})";
        echo mysqli_query($conexion,$consulta);
?>