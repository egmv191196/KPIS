<?php
    require_once('./conexionBD.php'); 
    $Operacion=$_POST['Operacion']; 
    if($Operacion=="cVSg"){
        $consulta="SELECT * from proyecto WHERE Estado=1 ORDER BY fecha_Fin ASC";
        $result= mysqli_query($conexion, $consulta);
        $indicadores=array();
        while ($row = mysqli_fetch_array($result)) {
            $valores=[$row[1],$row[4],$row[5]];
            array_push($indicadores,$valores);
        }
        echo json_encode($indicadores);
    }else if($Operacion=="tVSc"){
        $consulta="SELECT * from proyecto WHERE Estado=1 ORDER BY fecha_Fin ASC";
        $result= mysqli_query($conexion, $consulta);
        $indicadores=array();
        while ($row = mysqli_fetch_array($result)) {
            $idProyecto=$row[0];
            $Nombre=$row[1];
            $montoTotal=$row[4];
            $montoGastado=$row[5];
            $porcetajeGastado=($montoGastado*100)/$montoTotal;
            $consulta2="SELECT * FROM conceptos WHERE clave_Proyecto='$idProyecto'";
            $result2= mysqli_query($conexion,$consulta2);
            $porcentajeAvanzado=0.0;
            while($row2=mysqli_fetch_array($result2)){
                $porcentajeAvanzado=$porcentajeAvanzado+($row2[4]*($row2[3]/100));
            }
            $valores=[$Nombre,$porcentajeAvanzado,$porcetajeGastado];
            array_push($indicadores,$valores);
        }
        echo json_encode($indicadores);
    }

    
?> 