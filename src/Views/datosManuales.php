<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos manuales</title>
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
        <h2>Registrar indicador manual</h2>
        <form id="indicadorManual" method="POST">
            <label>Selecciona el indicador a registrar</label>
            <select class="form-control" name="id_req" id="id_req" required >
                <option value="">Seleccione:</option>
                <?php
                    $link=mysqli_connect("localhost","root",""); //hace la conexion con la base de datos
                    mysqli_select_db($link,"kpis");
                    $result= mysqli_query($link, "SELECT * FROM catalogo_indicadores ORDER BY id_Dat");
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                    }
                ?>
            </select>
            <label>Valor</label>
            <input type="text" name="Valor" class="form-control " id="Valor" placeholder="Valor">
            <label>Ingresa la semana, quincena o mes al que pertenece el valor</label>
            <input type="text" name="SQM" class="form-control " id="SQM" placeholder="SQM">
            <input type="button" class="btn btn-danger float-right m-3 center btn-lg" onclick="req_Manual();" value="Registrar Indicador">         
        </form>
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../js/Metodos.js"></script>
</html>
