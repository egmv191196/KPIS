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
            require_once('../Script/conexionBD.php'); 
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
            <h1 class="align-center">Año 2021</h1>
            <div class="datos mt-5">
                <div class="row">
                    <div class="col-sm text-center">
                       <h4>Numero de vacantes cubiertas</h4>
                       Numero de vacantes totales
                       <input type="text"  name="vacantesTotales" class="form-control m-2 ml-5" style="width : 250px" id="Nombre" value="15" placeholder="No. de vacantes totales" required>

                       <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Mes</th>
                                <th scope="col">Vacantes ocupadas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td >10</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td >10</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td >10</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td contenteditable="true">10</td>
                                </tr>
                            </tbody>
                        </table>
                       
                    </div>
                    <div class="col-sm text-center" >
                       <h4>Descriptivos de puestos</h4>
                        Numero de puestos totales
                       <input type="text"  name="puestosTotales" class="form-control m-2 ml-5" style="width : 250px" id="puestos" value="15" placeholder="No. de puestos totales" required>

                       <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Mes</th>
                                <th scope="col">Descriptivos de puesto listos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td >7</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td >9</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td >15</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td contenteditable="true"></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="col-sm text-center">
                       <h4>Satisfaccion del cliente</h4>
                       <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Proyecto</th>
                                <th scope="col">Calificaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Tecamachalco</th>
                                    <td >7</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td >9</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td >10</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td contenteditable="true"></td>
                                </tr>
                            </tbody>
                        </table>
                        <label for="promedio">Promedio de calificaciones </label>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-sm text-center">
                       <h4>Cursos otorgados</h4>
                       <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Mes</th>
                                <th scope="col">Cursos otorgados</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td >7</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td >9</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td >15</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td contenteditable="true"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm text-center">
                       <h4>Bajas de personal</h4>
                       <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Mes</th>
                                <th scope="col">Bajas de personal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td >7</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td >9</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td >15</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td contenteditable="true"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm text-center">
                       <h4>Reporte de impuestos</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm text-center">
                       <h4>Certificacion de calidad</h4>
                    </div>
                </div>
            
            
            
            
            </div>
            <button class="btn btn-danger float-right m-3 center btn-lg" id="AddCliente">Guardar datos</button>  
                
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="../../js/Metodos.js"></script>
    </body>
</html>
