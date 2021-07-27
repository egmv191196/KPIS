<?php
    require_once('./conexionBD.php'); 
        $Operacion=$_POST['Operacion'];
        if ($Operacion=='Insertar') {
            $Clave=$_POST['Clave'];
            $Name=$_POST['Name'];
            $fechaInicio=$_POST['fechaInicio'];
            $date1=date("Y-m-d",strtotime($fechaInicio));
            $fechaFin=$_POST['fechaFin'];
            $date2=date("Y-m-d",strtotime($fechaFin));
            $costoProyecto=$_POST['costoProyecto'];
            $id_Presupuesto=$_POST['id_Presupuesto'];
            $id_Cliente=$_POST['id_Cliente'];
            $conceptos=$_POST['list_Conceptos'];
            $consulta = "INSERT INTO proyecto (clave_Proyecto, Nombre, fecha_IniciO, fecha_Fin, monto_Contrato, monto_Gastado, id_Presupuesto, Estado,  id_Cliente) VALUES 
            ('{$Clave}','{$Name}','{$date}','{$date}',{$costoProyecto}, 0, '{$id_Presupuesto}', 1 ,{$id_Cliente})";
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
        }else if($Operacion=="Avances"){
            $Valores=array();
            $consulta="SELECT * FROM proyecto WHERE Estado=1 ORDER by fecha_Fin ASC"; 
            $result= mysqli_query($conexion,$consulta);
            while($row=mysqli_fetch_array($result)){
                $idProyecto=$row[0];
                $nombreProyecto=$row[1];
                $consulta2="SELECT * FROM conceptos WHERE clave_Proyecto='$idProyecto'";
                $result2= mysqli_query($conexion,$consulta2);
                $total=0.0;
                while($row2=mysqli_fetch_array($result2)){
                    $total=$total+($row2[4]*($row2[3]/100));
                }        
                $Proyecto=[$nombreProyecto,$total];
                array_push($Valores,$Proyecto);
            }
            echo json_encode($Valores);
        }else if ($Operacion=="actualizacionGasto") {
            $id_Proyecto=$_POST['Codigo'];
            $Monto=$_POST['Monto'];
            $consulta="UPDATE proyecto SET monto_Gastado={$Monto} WHERE clave_Proyecto='{$id_Proyecto}'";
            echo mysqli_query($conexion,$consulta);

        }

?>