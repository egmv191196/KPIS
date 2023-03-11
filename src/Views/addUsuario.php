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
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="datos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Datos</a>
                        <div class="dropdown-menu" aria-labelledby="datos">
                            <a class="dropdown-item" href="addDatosGG.php">Mis datos</a>
                            <a class="dropdown-item" href="datosManuales.php">Datos manuales</a>
                        </div>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="usuarios" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuarios</a>
                        <div class="dropdown-menu" aria-labelledby="usuarios">
                            <a class="dropdown-item" href="addUsuario.php">Agregar Usuario</a>
                            <a class="dropdown-item" href="listarUsuarios.php">Listar Usuarios</a>
                        </div>
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
        <h2>Agregar Usuario</h2>
        <form id="frmCliente" method="POST">
                <label>Ingresa el usuario</label>
                <input type="text" name="User" class="form-control " id="User" placeholder="Usuario">
                <label>Nombre del empleado</label>
                <input type="text" name="Nombre" class="form-control " id="Nombre" placeholder="Nombre">
                <label>Permisos asignados</label>
                <select name="permisos" id="permisos" class="form-control">
                    <option>Selecciona una opcion</option>
                    <option value="GG">Gerencia General</option>
                    <option value="GC">Gerencia Comercial</option>
                    <option value="GT">Gerencia Tecnica</option>
                </select>
                <label>Area</label>
                <input type="text" name="area" class="form-control " id="area" placeholder="Area">
                <label>Contraseña</label>
                <input type="Password" name="Pass" class="form-control " id="Pass1" placeholder="Contraseña">
                <label>Confirmar contraseña</label>
                <input type="Password" name="Pass" class="form-control " onchange="validarPass();" id="Pass2" placeholder="Contraseña">
                <input type="button" class="btn btn-danger float-right m-3 center btn-lg" onclick="addUser();" value="Agregar Usuario">
                <a href="./Clientes.php" class="btn btn-primary m-3 center btn-lg float-right">Cancelar</a>          
        </form>
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../js/Metodos.js"></script>
</html>
