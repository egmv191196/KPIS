<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar clientes</title>
    <link rel="stylesheet" href="../../css/bootstrap.css" >
    <link rel="stylesheet" href="../../css/style.css" >
</head>
<body>
    <div class="container">
        <h2>Agregar cliente</h2>
        <form action="../Script/addClientes.php" method="POST">
            <div class="form-group">
                <label>Nombre del cliente</label>
                <input type="text" name="Name" class="form-control " id="Name" placeholder="Nombre del cliente">
                <label>RFC</label>
                <input type="text" name="RFC" class="form-control " id="RFC" placeholder="RFC">
                <label>Correo electronico</label>
                <input type="email" name="Email" class="form-control " id="Email" placeholder="RFC">  
                <label>Telefono de contacto</label>
                <input type="number" name="Phone" class="form-control " id="Phone" placeholder="Telefono">
                <button type="submit" class="btn btn-danger float-right m-3 center btn-lg">Registrar cliente</button>          
                <a href="./Clientes.php" class="btn btn-primary m-3 center btn-lg float-right">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>