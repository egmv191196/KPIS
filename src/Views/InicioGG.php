<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Dashboard</title>
        <link rel="stylesheet" href="../../css/bootstrap.css" >
        <link rel="stylesheet" href="../../css/style.css" >
    </head>

    <body >
        <?php
            session_start();
            $car=$_SESSION['cargo'];
            if(!isset($_SESSION['k_user'])){	
                header("Location:../../index.php");
            }
            if($car=="GG" || $car=="Admin" ){ 
            }elseif ($car!="GG" || $car!="Admin" ) {
                header("Location:../../index.php");
            }
        ?>
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="Graficas" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Graficas</a>
                        <div class="dropdown-menu" aria-labelledby="Graficas">
                            <a class="dropdown-item" href="GGIndicador.php">Gerencia General</a>
                            <a class="dropdown-item" href="GCIndicador.php">Gerencia Comercial</a>
                            <a class="dropdown-item" href="GTIndicador.php">Gerencia Tecnica</a>
                        </div>
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="datos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Datos</a>
                        <div class="dropdown-menu" aria-labelledby="datos">
                            <a class="dropdown-item" href="addDatosGG.php">Mis datos</a>
                            <a class="dropdown-item" href="datosManuales    .php">Datos manuales</a>
                        </div>
                    </li>       
                    </ul>
                </div>            
            </div>
            <a class="navbar-brand" href="../Script/logout.php">Cerrar Sesion</a>
            </nav>
            <div>
                <?php 
                    $semana=date("W");
                    $mes=date('m');  
                    $quincenaActual=($semana/2);
                    $year=date("Y");               
                ?>
                <input type="hidden" id="Area" value="4"></input>
                <h5 class="text-center">Año: <?php echo $year;?> Semana: <?php echo $mes;?></h5>
                <div class=" mt-2 borderGC">
                    <h3 class="text-center">Gerencia Comercial</h3>
                    <div class="row m-2">
                        <div class="col-sm m-2 grafica">
                            <div id="CostosProyecto">
                            </div>
                        </div>
                        <div class="col-sm m-2 grafica">
                            <div id="cxcVScxp">
                            </div>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm m-2 grafica">
                            <div id="reporte_Facturacion">
                            </div>
                        </div>
                        <div class="col-sm m-2 grafica">
                            <div id="saldo_Bancos">   
                            </div>
                        </div>
                        <div class="col-sm m-2 grafica">
                            <div id="monto_Impuestos">
                            </div>
                        </div>
                        
                    </div>    
                    <div class="row m-2">
                        <div class="col-sm m-2 grafica">
                            <div id="consumo_Efectivale">
                            </div>
                        </div>
                        <div class="col-sm m-2 grafica">
                            <div id="reporte_Nomina"> </div>
                        </div>                   
                    </div>
                    
                    <div class="row m-2">
                        <div class="col-sm m-2 grafica">
                            <div id="Estimaciones">
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="borderGT mt-2">
                    <h3 class="text-center">Gerencia Tecnica</h3>
                    <div class="row m-2" >
                        <div class="col-sm m-2 grafica">
                            <div id="avanceProyectos"> </div>
                        </div>
                        <div class="col-sm m-2 grafica">
                            <div id="tVSc">
                            </div>
                        </div>
                    </div>
                    <div class="row m-2" >
                        <div class="col-sm m-2 grafica">
                            <div id="plazosCumplidos"> </div>
                        </div>
                    </div>
                </div>
                <div class="borderGG mt-2">
                    <h3 class="text-center">Gerencia General</h3>
                    <div class="row m-2" >
                        <div class="col-sm m-2 grafica">
                            <div id="horas_Extras" > </div>
                        </div>
                        <div class="col-sm m-2 grafica">
                            <div id="orden_Trabajo"> </div>
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
