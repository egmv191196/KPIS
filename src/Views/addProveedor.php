<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar proveedor</title>
    <link rel="stylesheet" href="../../css/bootstrap.css" >
    <link rel="stylesheet" href="../../css/style.css" >
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">  
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <div class="navbar-nav">
                    <ul class="navbar-nav mr-auto mt-1 mt-lg-0">
                    <?php
                    session_start();
                    $car=$_SESSION['cargo'];
                        if($car=="GG" || $car=="Admin" ){ 
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="InicioGG.php">Dashboard<span class="sr-only">(current)</span></a>
                        </li>
                    <?php
                        }elseif ($car=="GC" ) {?>
                            <li class="nav-item">
                                <a class="nav-link" href="InicioGC.php">Dashboard <span class="sr-only">(current)</span></a>
                            </li>
                    <?php
                        }
                    ?>   
                    <?php
                        if(!isset($_SESSION['k_user'])){	
                            header("Location:../../index.php");
                        }
                        if($car=="GG" || $car=="Admin" ){ 
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="Graficas" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Graficas</a>
                            <div class="dropdown-menu" aria-labelledby="Graficas">
                                <a class="dropdown-item" href="GGIndicador.php">Gerencia General</a>
                                <a class="dropdown-item" href="GCIndicador.php">Gerencia Comercial</a>
                                <a class="dropdown-item" href="GTIndicador.php">Gerencia Tecnica</a>
                            </div>
                        </li>
                    <?php
                        }elseif ($car!="GG" || $car!="Admin" ) {
                        }
                    ?>
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
                    <?php
                        if($car=="GG" || $car=="Admin" ){ 
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="addDatosGG.php">Datos</a>
                        </li>
                    <?php
                        }elseif ($car=="GC" ) {?>
                            <li class="nav-item">
                                <a class="nav-link" href="addDatosGC.php">Datos</a>
                            </li>
                    <?php
                        }
                    ?>       
                    </ul>
                </div>            
            </div>
            <a class="navbar-brand" href="../Script/logout.php">Cerrar Sesion</a>
            </nav>
        <h2>Agregar Proveedor</h2>
        <form id="frmProv" method="POST">
            <div class="form-group">
                <label>Nombre del proveedor</label>
                <input type="text" name="Name" class="form-control " id="Name" placeholder="Nombre del proveedor">
                <label>RFC</label>
                <input type="text" name="RFC" class="form-control " id="RFC" placeholder="RFC">
                <label>Correo electronico</label>
                <input type="email" name="Email" class="form-control " id="Email" placeholder="Correo electronico">  
                <label>Telefono de contacto</label>
                <input type="number" name="Phone" class="form-control " id="Phone" placeholder="Telefono">
                <input type="hidden" name="Operacion" id="Operacion" value="Insertar" />
                <input type="button" class="btn btn-danger float-right m-3 center btn-lg" id="addPro" onclick="addProveedor();" value="Registrar Proveedor">         
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