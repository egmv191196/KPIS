<?php
    $Op=$_POST['Operacion'];
    require_once('./conexionBD.php'); 
    if($Op=='Insertar'){
      $Name=$_POST['Name'];
      $RFC=$_POST['RFC'];
      $Email=$_POST['Email'];
      $Phone=$_POST['Phone'];
      $consulta = "INSERT INTO proveedor (Nombre,RFC,Correo,Telefono) VALUES ('{$Name}','{$RFC}','{$Email}',{$Phone})";
      echo mysqli_query($conexion,$consulta);
    }else if($Op=="Eliminar"){
      $Name=$_POST['Name'];
      $Phone=$_POST['Phone'];
      $consulta = "DELETE FROM proveedor WHERE Nombre='$Name' AND Telefono='$Phone'";
      echo mysqli_query($conexion,$consulta);
    }else if($Op=="Modificar"){
      $id_Proveedor=$_POST['id_Proveedor'];
      $Name=$_POST['Name'];
      $RFC=$_POST['RFC'];
      $Email=$_POST['Email'];
      $Phone=$_POST['Phone'];
      $consulta = "UPDATE proveedor SET Nombre='$Name',RFC='$RFC',Correo='$Email',Telefono='$Phone' WHERE id_Proveedor='$id_Proveedor'";
      echo mysqli_query($conexion,$consulta);
    }   
?> 