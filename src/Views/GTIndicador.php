<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Gerencia Tecnica</title>
        <link rel="stylesheet" href="../../css/bootstrap.css" >
        <link rel="stylesheet" href="../../css/style.css" >
    </head>

    <body>
        <?php
            require_once('../Script/conexionBD.php');
            $semana=date("W");
                    $mes=date('m');  
                    $quincenaActual=($semana/2);
                    $year=date("Y"); 
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
                    </ul>
                </div>            
            </div>
            <a class="navbar-brand" href="../Script/logout.php">Cerrar Sesion</a>
            </nav>
            <div id="GT">
            <h3 class="text-center">Gerencia Tecnica</h3>
            <h5 class="text-center">Año: <?php echo date("Y");?></h5>
            <h5 class="text-center"> Semana: <?php echo date("W");?> </h5>
                <input type="hidden" id="Area" value="3"></input>
                <div class="row m-2">
                    <div class="col-sm grafica m-2">
                        <div id="Retrabajos">
                        </div>
                    </div>
                    <div class="col-sm grafica m-2">
                        <div id="Inconformidades">
                        </div>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-sm grafica m-2">
                        <div id="plazosCumplidos">   
                        </div>
                    </div>
                    <div class="col-sm grafica m-2">
                        <div id="avanceProyectos">   
                        </div>
                    </div>
                </div>     
            </div>
            <div class="row"> 
                <div class="col-12 text-center m-2">
                    <h3>Cuantificacion de servicios<br> Suma anual</h3>
                    <div class="row">
                    <?php
                        echo '<div class="col-12 text-center border border-dark rounded p-1">';
                        echo'   <table class="table dark-table" id="cuanti">';
                        echo'       <tr>';
                        echo'            <th>Concepto</th>';
                        echo'            <th>Valor acumulado </th>';           
                        echo'       </tr>';      
                        $consulta="SELECT DISTINCT registroindicadores.id_Req, catalogo_indicadores.Nombre, SUM(Valor) AS total 
                        FROM registroindicadores JOIN catalogo_indicadores
                        WHERE registroindicadores.id_Req LIKE 'K%'AND registroindicadores.año=$year AND registroindicadores.id_Req=catalogo_indicadores.id_Dat 
                        GROUP BY registroindicadores.id_Req ORDER BY registroindicadores.id_Req ASC"; 
                        $result= mysqli_query($conexion,$consulta);
                        while($row=mysqli_fetch_array($result)){
                            echo'       <tr>';
                            echo'            <th>'.$row[1].'</th>';
                            echo'            <td>'.$row[2].'</td>'; 
                            echo '</tr>';
                        }                                       
                        echo'   </table>';
                        echo'</div>';
                    ?> 
                    </div>                      
                </div> 
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src='../../js/plotly-latest.min.js'></script>
        <script src="../../js/graficas.js"></script>
    </body>
</html>
