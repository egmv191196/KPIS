<?php
    require_once('./conexionBD.php'); 
    $indicador=$_POST['Indicador'];
    $cantidad=$_POST['Cantidad'];
    if($cantidad=="U"){
        $consulta="SELECT SQM,Valor from registroindicadores  WHERE id_Req='$indicador' AND año=2021 ORDER BY SQM ASC";
        $result= mysqli_query($conexion, $consulta);
        $indicadores=array();
        $row = mysqli_fetch_array($result);
        $valores=[$row[0],$row[1]];
        array_push($indicadores,$valores);
        echo json_encode($indicadores);
    }else{
        $consulta="SELECT SQM,Valor from registroindicadores  WHERE id_Req='$indicador' AND año=2021 ORDER BY SQM ASC";
        $result= mysqli_query($conexion, $consulta);
        $indicadores=array();
        while ($row = mysqli_fetch_array($result)) {
            $valores=[$row[0],$row[1]];
            array_push($indicadores,$valores);
        }
        echo json_encode($indicadores);
    }

    
?> 