<?php
    $Op=$_POST['Operacion'];
    require_once('./conexionBD.php'); 
    if($Op=='Insertar'){
      $User=$_POST['User'];
      $Nombre=$_POST['Nombre'];
      $permisos=$_POST['permisos'];
      $area=$_POST['area'];
      $Pass1=$_POST['Pass1'];
      $consulta = "INSERT INTO usuario(Usuario, Nombre, `Password`, Cargo, Area) VALUES 
      ('{$User}','{$Nombre}','{$permisos}','{$area}','{$Pass1}')";
      echo mysqli_query($conexion,$consulta);
    }else if($Op=="Actualizar"){
        $User=$_POST['User'];
        $Nombre=$_POST['Nombre'];
        $permisos=$_POST['permisos'];
        $area=$_POST['area'];
        $Pass1=$_POST['Pass1'];
        $consulta = "UPDATE usuario SET Nombre='$Nombre',`Password`='$Pass1',Cargo=' $permisos', Area='$area' WHERE Usuario='$User'";
      echo mysqli_query($conexion,$consulta);
    }   
?> 