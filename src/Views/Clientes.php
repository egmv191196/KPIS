<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Iniciar GG</title>
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
                    </ul>
                </div>
            </div>
            <a class="navbar-brand" href="../Script/logout.php">Cerrar Sesion</a>    
            </nav>
            <h1 class="text-center">Lista de clientes</h1>
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
                $link=mysqli_connect("localhost","root",""); //hace la conexion con la base de datos
                mysqli_select_db($link,"kpis");
                $result= mysqli_query($link, "select * from cliente");
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>';
                    echo '<th scope="row">'.$row['id_Cliente'].'</th>';
                    echo '<td>'.$row['Nombre'].'</td>';
                    echo '<td>'.$row['RFC'].'</td>';
                    echo '<td>'.$row['Correo'].'</td>';
                    echo '<td>'.$row['Telefono'].'</td>';
                    echo '<td><a title="Eliminar" href=""><img class="rounded-circle mr-2" src="../Img/edit.png" alt="Eliminar usuario" width="30" height="30"/></a>';
                    echo '<a title="Eliminar" href=""><img class="rounded-circle ml-2" src="../Img/eliminar.png" alt="Eliminar usuario" width="30" height="30"/></a>';
                    echo '</td>';
                    echo '</tr>';
                    //echo '<option value="'.$row[id_Concepto].'">'.$row[Nombre].'-'.$row[Telefono].'</option>';
                }
            ?>
        </tbody>
        </table>
        <a class="btn btn-primary float-right"title="Eliminar" href="./addClientes.php">Agregar usuario<img class="rounded-circle ml-2" src="../Img/addClient.png" alt="Eliminar usuario" width="30" height="30"/></a>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
