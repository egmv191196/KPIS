<?php
    $Op=$_POST['Operacion'];
    require_once('./conexionBD.php'); 
    if($Op=='Insertar'){
      $Name=$_POST['Name'];
      $RFC=$_POST['RFC'];
      $Email=$_POST['Email'];
      $Phone=$_POST['Phone'];
      $consulta = "INSERT INTO cliente (Nombre,RFC,Correo,Telefono) VALUES ('{$Name}','{$RFC}','{$Email}',{$Phone})";
      echo mysqli_query($conexion,$consulta);
    }else if($Op=="Eliminar"){
      $Name=$_POST['Name'];
      $Phone=$_POST['Phone'];
      $consulta = "DELETE FROM cliente WHERE Nombre='$Name' AND Telefono='$Phone'";
      echo mysqli_query($conexion,$consulta);
    }else if($Op=="Modificar"){
      $id_Cliente=$_POST['id_Cliente'];
      $Name=$_POST['Name'];
      $RFC=$_POST['RFC'];
      $Email=$_POST['Email'];
      $Phone=$_POST['Phone'];
      $consulta = "UPDATE cliente SET Nombre='$Name',RFC='$RFC',Correo='$Email',Telefono='$Phone' WHERE id_Cliente='$id_Cliente'";
      echo mysqli_query($conexion,$consulta);
    }   
?> 