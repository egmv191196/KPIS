<?php
    $Name=$_POST['Name'];
    $RFC=$_POST['RFC'];
    $Email=$_POST['Email'];
    $Phone=$_POST['Phone'];
	require_once('./conexionBD.php'); 

    $consulta = "INSERT INTO proveedor (Nombre,RFC,Correo,Telefono) VALUES (
        '{$Name}','{$RFC}','{$Email}',{$Phone})";
    // 6. Imprimimos la cadena para verificar que está bién
    // 7. Se verifica que se haya realizado la consulta correctamente
    echo mysqli_query($conexion,$consulta);  
    ?> 