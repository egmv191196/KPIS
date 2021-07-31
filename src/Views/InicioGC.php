<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Dashboard Gerencia Comercial</title>
        <link rel="stylesheet" href="../../css/bootstrap.css" >
        <link rel="stylesheet" href="../../css/style.css" >
    </head>

    <body >
        <?php
            session_start();
            if(!isset($_SESSION['k_user'])){	
                header("Location:../../index.php");
            }else if($_SESSION['cargo']!="GC"){ 
                header("Location:../../index.php");
            }
        ?>
        <div class="container" >
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>            
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="InicioGC.php">Dashboard <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="Proyectos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Proyectos</a>
                        <div class="dropdown-menu" aria-labelledby="Proyectos">
                            <a class="dropdown-item" href="Proyectos.php">Listar Proyectos</a>
                            <a class="dropdown-item" href="addProyecto.php">Agregar Proyecto</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="Clientes" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Clientes</a>
                        <div class="dropdown-menu" aria-labelledby="Clientes">
                            <a class="dropdown-item" href="Clientes.php"> Listar Clientes</a>
                            <a class="dropdown-item" href="addClientes.php">Agregar Clientes</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="Proveedores" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Proveedores</a>
                        <div class="dropdown-menu" aria-labelledby="Proveedores">
                            <a class="dropdown-item" href="Proveedor.php">Listar Proveedores</a>
                            <a class="dropdown-item" href="addProveedor.php">Agregar Proveedor</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addDatosGC.php">Datos</a>
                    </li>
                    </ul>
                </div>
                  <a class="navbar-brand" href="../Script/logout.php">Cerrar Sesion</a>
            </nav>
            <div id="GC">
                <h1 class="text-center"> Año: <?php echo date("Y");?> -- Semana: <?php echo date("W");?> </h1>
                <h3 class="text-center">Gerencia Comercial</h3>
                <input type="hidden" id="Area" value="2"></input>
                <div class="row m-2">
                    <div class="col-4">
                        <div id="saldo_Bancos">   
                        </div>
                    </div>
                    <div class="col-4">
                        <div id="CXP"> 
                        </div>
                    </div>
                    <div class="col-4">
                        <div id="CXC"> 
                        </div>
                    </div>
                </div>    
                <div class="row m-2">
                    <div class="col-4">
                        <div id="consumo_Efectivale">
                        </div>
                    </div>
                    <div class="col-4">
                        <div id="cartera_Vencida">
                        </div>
                    </div>
                    <div class="col-4">
                        <div id="reporte_Facturacion">
                        </div>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-4">
                        <div id="monto_Impuestos">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div id="Estimaciones">
                        </div>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-12">
                        <div id="CostosProyecto">
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <script src='../../js/plotly-latest.min.js'></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="../../js/graficas.js"></script>
    </body>
</html>
