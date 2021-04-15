<?php
    $Name=$_POST['Name'];
    $RFC=$_POST['RFC'];
    $Email=$_POST['Email'];
    $Phone=$_POST['Phone'];
    $Operacion=$_POST['Operacion'];
	/*require_once('./conexionBD.php'); 

    $consulta = "INSERT INTO cliente (Nombre,RFC,Correo,Telefono) VALUES (
        '{$Name}','{$RFC}','{$Email}',{$Phone})";
    echo mysqli_query($conexion,$consulta);*/
    echo "La operacion es $Operacion";
?> 