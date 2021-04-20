<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css" >
    <link rel="stylesheet" href="../../css/style.css" >
    <title>Proyectos</title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>            
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
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
            
                <a class="navbar-brand" href="../Script/logout.php">Cerrar Sesion</a>
        </nav>
        <div class="row">
            <div class="col-8 text-center p-3">
                <h1 class="text-center">Lista de proyectos</H1>
            </div>
            <div class="col-4 text-center p-3">
                <a class="btn btn-primary float-right" href="addProyecto.php">Agregar proyecto</a>
            </div>
        </div>
        <table class="table dark-table">
        <thead>
            <tr>
            <th scope="col">Clave del proyecto</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha de Inicio</th>
            <th scope="col">Fecha de Finalizacion</th>
            <th scope="col">Monto del contrato</th>
            <th scope="col">cliente</th>
            </tr>
        </thead>
        <tbody>
        <?php
                        require_once('../Script/conexionBD.php'); 
                        $result= mysqli_query($conexion, "SELECT proyecto.*,cliente.Nombre from proyecto JOIN cliente GROUP BY clave_Proyecto");
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<tr>';
                            echo '<th scope="row">'.$row[0].'</th>';
                            echo '<td>'.$row[1].'</td>';
                            echo '<td>'.$row[2].'</td>';
                            echo '<td>'.$row[3].'</td>';
                            echo '<td>'.$row[4].'</td>';
                            echo '<td>'.$row[6].'</td>';
                            echo '</tr>';
                        }
                    ?>
        </tbody>
        </table>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
</body>
</html>