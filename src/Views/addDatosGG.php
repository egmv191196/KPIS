<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Datos Gerencia General</title>
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
                            <a class="dropdown-item" href="addProveedor.php">Agregar Proyecto</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="datos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Datos</a>
                        <div class="dropdown-menu" aria-labelledby="datos">
                            <a class="dropdown-item" href="addDatosGG.php">Mis datos</a>
                            <a class="dropdown-item" href="datosManuales.php">Datos manuales</a>
                        </div>
                    </li>       
                    </ul>
                </div>            
            </div>
            <a class="navbar-brand" href="../Script/logout.php">Cerrar Sesion</a>
            </nav>
            <?php
                require_once('../Script/conexionBD.php'); 
            ?>
            <h1 class="text-center">Gerencia General</h1>
            <h5 class="text-center">Año: <?php echo date("o");?></h5>
            <h5 class="text-center"> Semana: <?php echo date("W");?> </h5>
            <?php 
                $semana=date("W")-1;
                $mes=date('m')-1;  
                $quincenaActual=round($semana/2, 0, PHP_ROUND_HALF_UP)-1;
                $year=date("Y");         
            ?> 

            
            
            <div class="datos mt-5" id="GG">
                <div class="row">
                    <div class="col-sm text-center border border-dark rounded m-1 p-1">
                       <h4>Numero de vacantes cubiertas</h4>
                       <label>Numero de vacantes totales</label> 
                       <input type="text" name="vacantesTotales" class="form-control valores" id="vacantesTotales" 
                       <?php
                            $consulta="SELECT SQM,Valor FROM registroIndicadores WHERE id_Req='R4A' AND año=$year ORDER by SQM DESC"; 
                            $result= mysqli_query($conexion,$consulta);
                            if($row=mysqli_fetch_array($result)){
                                echo 'value="'.$row['Valor'].'"';
                            }
                        ?>                       
                       placeholder="No. de vacantes totales" onchange="vacantesTotales(this);">  
                       <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Mes</th>
                                <th scope="col">Vacantes ocupadas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $consulta="SELECT SQM, Valor FROM registroindicadores Where año=$year AND SQM>$mes-4  and id_Req='R4B' ORDER BY SQM DESC limit 4";
                                    $result= mysqli_query($conexion, $consulta);
                                    $filas=mysqli_num_rows($result);
                                    $indicador='R4B';
                                    $primero=false;
                                    if($filas<=3){
                                        echo '<tr>';
                                        echo '<th scope="row">'.$mes.'</th>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R4B" onchange="Valor(1,this);"> </input> </td>';
                                        echo '</tr>';
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<tr>';
                                            echo '<th scope="row">'.$row[0].'</th>';
                                            echo '<td>'.$row[1].'</td>';
                                            echo '</tr>';
                                        }
                                    }else{
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<tr>';
                                            echo '<th scope="row">'.$row[0].'</th>';
                                            if($primero==false){
                                                echo '<td > <input type="number" class="form-control celdas" id="R4B" onchange="Valor(1,this);" value="'.$row[1].'"> </input> </td>';
                                                $primero=true;
                                            }  
                                            else{
                                                echo '<td>'.$row[1].'</td>';
                                                echo '</tr>';
                                            }
                                            
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                       
                    </div>
                    <div class="col-sm text-center border border-dark rounded m-1 p-1">
                    <h4>Bajas de personal</h4>
                       <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Mes</th>
                                <th scope="col">Bajas de personal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $consulta="SELECT SQM, Valor FROM registroindicadores Where año=$year AND SQM>$mes-4  and id_Req='R10A' ORDER BY SQM DESC limit 4";
                                    $result= mysqli_query($conexion, $consulta);
                                    $filas=mysqli_num_rows($result);
                                    $primero=false;
                                    if($filas<=3){
                                        echo '<tr>';
                                        echo '<th scope="row">'.$mes.'</th>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R10A" onchange="Valor(3,this);"> </input> </td>';
                                        echo '</tr>';
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<tr>';
                                            echo '<th scope="row">'.$row[0].'</th>';
                                            echo '<td>'.$row[1].'</td>';
                                            echo '</tr>';
                                        }
                                    }else{
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<tr>';
                                            echo '<th scope="row">'.$row[0].'</th>';
                                            if($primero==false){
                                                echo '<td > <input type="number" class="form-control celdas" id="R10A" onchange="Valor(3,this);" value="'.$row[1].'"> </input> </td>';
                                                $primero=true;
                                            }  
                                            else{
                                                echo '<td>'.$row[1].'</td>';
                                                echo '</tr>';
                                            }
                                            
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-sm text-center border border-dark rounded m-1 p-1">
                        <h4>Ordenes de trabajo</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Quincena</th>
                                <th scope="col">Orden de trabajo recibida</th>
                                <th scope="col">Orden de trabajo atendido</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $consulta1="SELECT SQM, Valor FROM registroindicadores Where año=$year AND SQM>$quincenaActual-4  and id_Req='R1A'  ORDER BY SQM DESC limit 4";
                                $consulta2="SELECT SQM, Valor FROM registroindicadores Where año=$year AND SQM>$quincenaActual-4  and id_Req='R1B'  ORDER BY SQM DESC limit 4";
                                $result1= mysqli_query($conexion, $consulta1);
                                $result2= mysqli_query($conexion, $consulta2);
                                $filas1=mysqli_num_rows($result1);
                                $filas2=mysqli_num_rows($result2);
                                $primero1=false;
                                $primero2=false;
                                if($filas1==$filas2 && $filas1==0){
                                    echo '<tr>';
                                    echo '<th scope="row">'.$quincenaActual.'</th>';
                                    echo '<td > <input type="number" class="form-control celdas" id="R1A" onchange="Valor(6,this);"> </input> </td>';
                                    echo '<td > <input type="number" class="form-control celdas" id="R1B" onchange="Valor(7,this);"> </input> </td>';
                                    echo '</tr>';
                                }else if($filas1==$filas2 && $filas1==4){
                                    while ($row = mysqli_fetch_array($result1)) {
                                        echo '<tr>';
                                        echo '<th scope="row">'.$row[0].'</th>';
                                        if($primero1==false){
                                            echo '<td > <input type="number" class="form-control celdas" id="R1A" onchange="Valor(6,this);" value="'.$row[1].'"> </input> </td>';
                                            $row = mysqli_fetch_array($result2);
                                            echo '<td > <input type="number" class="form-control celdas" id="R1B" onchange="Valor(7,this);" value="'.$row[1].'"> </input> </td>';
                                            $primero1=true;
                                        }  
                                        else{
                                            echo '<td>'.$row[1].'</td>';
                                            $row = mysqli_fetch_array($result2);
                                            echo '<td>'.$row[1].'</td>';
                                            echo '</tr>';
                                        }
                                        
                                    }
                                }else{
                                    if($filas1==3 && $filas2==3){
                                        echo '<tr>';
                                        echo '<th scope="row">'.$quincenaActual.'</th>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R1A" onchange="Valor(6,this);"> </input> </td>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R1B" onchange="Valor(7,this);"> </input> </td>';
                                        echo '</tr>';
                                        while ($row = mysqli_fetch_array($result1)) {
                                            echo '<tr>';
                                            echo '<th scope="row">'.$row[0].'</th>';
                                            echo '<td>'.$row[1].'</td>';
                                            $row = mysqli_fetch_array($result2);
                                            echo '<td>'.$row[1].'</td>';
                                            echo '</tr>';
                                        }
                                    }else if($filas1==3){
                                        echo '<tr>';
                                        echo '<th scope="row">'.$quincenaActual.'</th>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R1A" onchange="Valor(6,this);"> </input> </td>';
                                        $row = mysqli_fetch_array($result2);
                                        echo '<td > <input type="number" class="form-control celdas" id="R1B" onchange="Valor(7,this);" value="'.$row[1].'"> </input> </td>';
                                        echo '</tr>';
                                        while ($row = mysqli_fetch_array($result1)) {
                                            echo '<tr>';
                                            echo '<th scope="row">'.$row[0].'</th>';
                                            echo '<td>'.$row[1].'</td>';
                                            $row = mysqli_fetch_array($result2);
                                            echo '<td>'.$row[1].'</td>';
                                            echo '</tr>';
                                        }
                                    }else{
                                        echo '<tr>';
                                        echo '<th scope="row">'.$quincenaActual.'</th>';
                                        $row = mysqli_fetch_array($result1);
                                        echo '<td > <input type="number" class="form-control celdas" id="R1A" onchange="Valor(6,this);" value="'.$row[1].'"> </input> </td>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R1B" onchange="Valor(7,this);"> </input> </td>';
                                        echo '</tr>';
                                        while ($row = mysqli_fetch_array($result1)) {
                                            echo '<tr>';
                                            echo '<th scope="row">'.$row[0].'</th>';
                                            echo '<td>'.$row[1].'</td>';
                                            $row = mysqli_fetch_array($result2);
                                            echo '<td>'.$row[1].'</td>';
                                            echo '</tr>';
                                        }
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm text-center border border-dark rounded m-1 p-1">
                       <h4>Horas Extras</h4>
                       <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Quincena</th>
                                <th scope="col">Horas extras registradas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $consulta="SELECT SQM, Valor FROM registroindicadores Where año=$year and SQM>$quincenaActual-4 and id_Req='R11A' ORDER BY SQM DESC limit 4";
                                    $result= mysqli_query($conexion, $consulta);
                                    $filas=mysqli_num_rows($result);
                                    $primero=false;
                                    if($filas<=3){
                                        echo '<tr>';
                                        echo '<th scope="row">'.$quincenaActual.'</th>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R11A" onchange="Valor(11,this);"> </input> </td>';
                                        echo '</tr>';
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<tr>';
                                            echo '<th scope="row">'.$row[0].'</th>';
                                            echo '<td>'.$row[1].'</td>';
                                            echo '</tr>';
                                        }
                                    }else{
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<tr>';
                                            echo '<th scope="row">'.$row[0].'</th>';
                                            if($primero==false){
                                                echo '<td > <input type="number" class="form-control celdas" id="R11A" onchange="Valor(11,this);" value="'.$row[1].'"> </input> </td>';
                                                $primero=true;
                                            }
                                            
                                            else{
                                                echo '<td>'.$row[1].'</td>';
                                                echo '</tr>';
                                            }
                                            
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="../../js/Metodos.js"></script>
    </body>
</html>
