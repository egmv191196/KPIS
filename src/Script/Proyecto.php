<?php
    require_once('./conexionBD.php'); 
        $Operacion=$_POST['Operacion'];
        if ($Operacion=='Insertar') {
            $Clave=$_POST['Clave'];
            $Name=$_POST['Name'];
            $fechaInicio=$_POST['fechaInicio'];
            $date=date("Y-m-d",strtotime($fechaInicio));
            $fechaFin=$_POST['fechaFin'];
            $costoProyecto=$_POST['costoProyecto'];
            $id_Presupuesto=$_POST['id_Presupuesto'];
            $id_Cliente=$_POST['id_Cliente'];
            $conceptos=$_POST['list_Conceptos'];
            $consulta = "INSERT INTO proyecto (clave_Proyecto, Nombre, fecha_IniciO, fecha_Fin, monto_Contrato, id_Presupuesto, Estado,  id_Cliente) VALUES 
            ('{$Clave}','{$Name}','{$date}','{$date}',{$costoProyecto},'{$id_Presupuesto}', 1 ,{$id_Cliente})";
            $res= mysqli_query($conexion,$consulta);
            if ($res==1) {
                $consulta="INSERT INTO conceptos (id_Concepto, num_Concepto, Nombre, Valor, Avance, clave_Proyecto) VALUES "; 
                for ($i=0; $i <count($conceptos); $i++) { 
                    $numConcepto=$conceptos[$i][0];
                    $valor=$conceptos[$i][1];
                    $Nombre=$conceptos[$i][2];
                    if($i==0){
                        $consulta =$consulta."(NULL, {$numConcepto}, '{$Nombre}', {$valor}, 0, '{$Clave}')";
                    }else{
                        $consulta =$consulta.",(NULL, {$numConcepto}, '{$Nombre}', {$valor}, 0, '{$Clave}')";
                    }
                }
                $res=mysqli_query($conexion,$consulta);
                //echo $consulta;
                //echo $res;
                if($res==1){
                    echo 1;
                }else{
                    echo 0;
                }
            }else {
                echo 0;
            }
        }else if ($Operacion=='Actualizar') {
            $id_Proyecto=$_POST['id_Proyecto'];
            $Concepto=$_POST['Concepto'];
            $Valor=$_POST['Valor'];
            $consulta="UPDATE conceptos SET Avance={$Valor} WHERE num_Concepto={$Concepto} AND clave_Proyecto='{$id_Proyecto}'";
            echo mysqli_query($conexion,$consulta);
        }
        
        

        
?>