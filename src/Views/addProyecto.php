<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Proyecto</title>
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
        <h1>Agregar un proyecto</h1>
        <form id="addProyecto" method="POST">
            <div class="form-group">
                <div class="row">
                    <div class="col-6 text-center" >
                    <label for="name">Clave del proyecto</label>
                        <input type="text" name="claveProyecto"  required class="form-control " id="claveProyecto" placeholder="Clave del proyecto">
                    </div>
                    <div class="col-6 text-center">
                        <label for="name">Nombre del proyecto</label>
                        <input type="text" name="nombreProyecto"  required class="form-control " id="nombreProyecto" placeholder="Nombre del proyecto">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-center">
                        <label for="name">Fecha de inicio</label>
                        <input type="date" name="fechaInicio"  required class="form-control " id="dateInicio" placeholder="">
                    </div>
                    <div class="col-6 ">
                        <label for="dateFin">Fecha de finalizacion</label>
                        <input type="date" name="fechaFin" required class="form-control " id="dateFin" placeholder="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-center">
                        <label for="name">Costo del proyecto</label>
                        <input type="number" name="costoProyecto"  required class="form-control " id="Costo" placeholder="10000"> 
                    </div>
                    <div class="col-4 text-center">
                        <label for="name">Codigo del presupuesto</label>
                        <input type="text" name="id_Presupuesto"  required class="form-control " id="id_Presupuesto" placeholder="Codigo del presupuesto">
                    </div>
                    <div class="col-4 ">
                        <label for="name">Nombre del cliente</label>
                        <select class="form-control" name="id_Cliente" id="id_Cliente" required >
                            <option value="">Seleccione:</option>
                            <?php
                                $link=mysqli_connect("localhost","root",""); //hace la conexion con la base de datos
                                mysqli_select_db($link,"kpis");
                                $result= mysqli_query($link, "select id_Cliente,Nombre,Telefono from cliente ");
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="'.$row['id_Cliente'].'">'.$row['Nombre'].'-'.$row['Telefono'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 text-center">
                        <label for="name">Numero de conceptos en el proyecto</label>
                        <select class="form-control" id="conceptos" onchange="tabla();" required >
                            <option value="">Elige el numero de conceptos</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 m-2">
                        <table class="table dark-table" id="t_Conceptos">
                            <thead>
                                <tr>
                                <th scope="col">Concepto</th>
                                <th scope="col">Valor en el proyecto en porcentaje</th>
                                <th scope="col">Nombre del concepto</th>
                                </tr>
                            </thead>
                            <tbody id="cuerpo">
                            </tbody>
                            <tbody id="footer">
                            </tbody>
                        </table>
                    </div>
                </div>
                <input type="button" class="btn btn-primary mt-3 center btn-lg" onclick="addProyecto();" value="Agregar Proyecto">
                <a href="./Proyectos.php" class="btn btn-primary mt-3 center btn-lg">Cancelar</a>
                <a href="./addClientes.php" class="btn btn-danger mt-3 center btn-lg float-right" >Registrar cliente nuevo</a>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
    <script src="../../js/Metodos.js"></script>
</body>
</html>


