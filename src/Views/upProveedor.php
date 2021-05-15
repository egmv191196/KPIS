<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar datos de proveedor</title>
    <link rel="stylesheet" href="../../css/bootstrap.css" >
    <link rel="stylesheet" href="../../css/style.css" >
</head>
<body>
    <?php
        $Name=$_GET['Name'];
        $Phone=$_GET['Phone'];
        require_once('../Script/conexionBD.php'); 
        $consulta="SELECT * FROM proveedor WHERE Nombre='$Name' AND Telefono='$Phone'";
        $result= mysqli_query($conexion, $consulta);
        $val=mysqli_fetch_assoc($result);
        $id_Proveedor=$val['id_Proveedor'];
        $Nombre=$val['Nombre'];
        $RFC=$val['RFC'];
        $Correo=$val['Correo'];
        $Telefono=$val['Telefono'];
    ?>
    <div class="container">
        <h2>Actualizar Proveedor</h2>
        <form id="upProv" method="POST">
            <div class="form-group">
                <label>Nombre del proveedor</label>
                <input type="text" name="Name" class="form-control " id="Name" placeholder="Nombre del proveedor" value="<?php echo $Nombre;?>">
                <label>RFC</label>
                <input type="text" name="RFC" class="form-control " id="RFC" placeholder="RFC" value="<?php echo $RFC;?>">
                <label>Correo electronico</label>
                <input type="email" name="Email" class="form-control " id="Email" placeholder="Correo electronico" value="<?php echo $Correo;?>">  
                <label>Telefono de contacto</label>
                <input type="number" name="Phone" class="form-control " id="Phone" placeholder="Telefono" value="<?php echo $Telefono;?>">
                <input type="hidden" name="id_Proveedor" id="id_Proveedor" value="<?php echo $id_Proveedor;?>"/>
                <input type="hidden" name="Operacion" id="Operacion" value="Modificar" />
                <input type="button" class="btn btn-danger float-right m-3 center btn-lg" id="upPro" onclick="upProveedor();" value="Guardar modificaciones del proveedor">        
                <a href="./Proveedor.php" class="btn btn-primary m-3 center btn-lg float-right">Cancelar</a>
            </div>
        </form>
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
    <script src="../../js/Metodos.js"></script>
</html>