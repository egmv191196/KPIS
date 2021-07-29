<?php
  $Req=$_POST['Req'];
  $Valor=$_POST['Valor'];
  $Usuario=$_POST['User'];
  $year=date('o');
  $date=date('Y-m-d');
  if($Req=="R4A"){
    $SQM=date('m');
  }else{
    $SQM=$_POST['SQM'];
  }
  require_once('./conexionBD.php'); 
  $consulta="SELECT * FROM registroindicadores Where año=$year AND SQM=$SQM  and id_Req='$Req'";
  $result =mysqli_query($conexion,$consulta);
  $filas=mysqli_num_rows($result);
  if($filas>0){
    $row = mysqli_fetch_array($result);
    $id_registro=$row[0];
    $consulta = "UPDATE registroindicadores SET Valor=$Valor WHERE id_registro=$id_registro";
    $result =mysqli_query($conexion,$consulta);
  }else{
    $consulta = "INSERT INTO registroindicadores (id_registro, Usuario, id_Req, Fecha, Valor, año, SQM) VALUES (NULL, '$Usuario', '$Req', '$date', $Valor, $year, $SQM)";
    mysqli_query($conexion,$consulta);
  }
  echo $consulta;
?> 