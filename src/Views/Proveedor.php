<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Proveedores</title>
        <link rel="stylesheet" href="../../css/bootstrap.css" >
        <link rel="stylesheet" href="../../css/style.css" >
    </head>

    <body >
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">  
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <div class="navbar-nav">
                    <ul class="navbar-nav mr-auto mt-1 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="InicioGG.php">Dashboard<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="GGIndicador.php">Gerencia General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="GCIndicador.php">Gerencia Comercial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="GTIndicador.php">Gerencia Tecnica</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Proyectos.php">Proyectos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Clientes.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Proveedor.php">Proveedores</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="addDatosGG.php">Insertar Datos</a>
                    </li>       
                    </ul>
                </div>
            </div>
            <a class="navbar-brand" href="../Script/logout.php">Cerrar Sesion</a>  
            </nav>
            <div class="row">
                <div class="col-8 text-center p-3">
                <h1 class="text-center">Lista de proveedores</h1>
                </div>
                <div class="col-4 text-center p-3">
                <a class="btn btn-primary float-right"title="Eliminar" href="./addProveedor.php">Agregar proveedor<img class="rounded-circle ml-2" src="../Img/addClient.png" alt="Eliminar usuario" width="30" height="30"/></a>
                </div>
            </div>      
            <table class="table dark-table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">RFC</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('../Script/conexionBD.php'); 
                        $result= mysqli_query($conexion, "select * from proveedor");
                        $i=1;
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<tr>';
                            echo '<th scope="row">'.$i.'</th>';
                            echo '<td>'.$row['Nombre'].'</td>';
                            echo '<td>'.$row['RFC'].'</td>';
                            echo '<td>'.$row['Correo'].'</td>';
                            echo '<td>'.$row['Telefono'].'</td>';
                            echo '<td><button id="trash" onclick="EliminarP(this)">Eliminar</button>';
                            echo '<button id="Update" onclick="ModificarP(this)">editar</button>';
                            echo '</td>';
                            echo '</tr>';
                            $i++;
                        }
                    ?>
                </tbody>
            </table>
            
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="../../js/Metodos.js"></script>
    </body>
</html>
