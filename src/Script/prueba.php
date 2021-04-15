<?php
    $Op=$_POST['Operacion'];
    $Nombre=$_POST['Nombre'];
    $Telefono=$_POST['Telefono'];
    require_once('./conexionBD.php'); 

    //$consulta = "INSERT INTO proveedor (Nombre,RFC,Correo,Telefono) VALUES (
      //  '{$Name}','{$RFC}','{$Email}',{$Phone})";
    // 6. Imprimimos la cadena para verificar que está bién
    // 7. Se verifica que se haya realizado la consulta correctamente
    //echo mysqli_query($conexion,$consulta);  /
    echo "La operacion es $Op y el nombre es $Nombre";
?> 