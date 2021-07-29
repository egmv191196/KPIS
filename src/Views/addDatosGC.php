<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Datos Gerencia Comercial</title>
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
            require_once('../Script/conexionBD.php'); 
        ?>
        <div class="container">
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
            <h1 class="text-center">
             Año: <?php echo date("Y");?> -- Semana: <?php echo date("W");?> 
            </h1>
            <?php 
                $semana=date("W")-1;
                $mes=date('m')-1;  
                $quincenaActual=($semana/2)-1   ;
                $year=date("Y");         
            ?> 
            <div class="datos mt-5" id="GC">
                <div class="row">     
                    <div class="col-sm text-center border border-dark rounded  m-1 p-1">
                        <h4>Saldo en cuentas</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Semana</th>
                                <th scope="col">Monto en el banco</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $consulta="SELECT SQM, Valor FROM registroindicadores Where año=$year and SQM>$semana-4 and id_Req='R19A' ORDER BY SQM DESC limit 4";
                                    $result= mysqli_query($conexion, $consulta);
                                    $filas=mysqli_num_rows($result);
                                    $primero=false;
                                    if($filas<=3){
                                        echo '<tr>';
                                        echo '<th scope="row">'.$semana.'</th>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R19A" onchange="Valor(19,this);"> </input> </td>';
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
                                                echo '<td > <input type="number" class="form-control celdas" id="R19A" onchange="Valor(19,this);" value="'.$row[1].'"> </input> </td>';
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
                    <div class="col-sm text-center border border-dark rounded  m-1 p-1">
                        <h4>Cuentas por pagar</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Semana</th>
                                <th scope="col">Monto por pagar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $consulta="SELECT SQM, Valor FROM registroindicadores Where año=$year and SQM>$semana-4 and id_Req='R16A' ORDER BY SQM DESC limit 4";
                                    $result= mysqli_query($conexion, $consulta);
                                    $filas=mysqli_num_rows($result);
                                    $primero=false;
                                    if($filas<=3){
                                        echo '<tr>';
                                        echo '<th scope="row">'.$semana.'</th>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R16A" onchange="Valor(16,this);"> </input> </td>';
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
                                                echo '<td > <input type="number" class="form-control celdas" id="R16A" onchange="Valor(16,this);" value="'.$row[1].'"> </input> </td>';
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
                    <div class="col-sm text-center border border-dark rounded  m-1 p-1">
                        <h4>Cuentas por cobrar</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Semana</th>
                                <th scope="col">Monto por cobrar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $consulta="SELECT SQM, Valor FROM registroindicadores Where año=$year and SQM>$semana-4 and id_Req='R17A' ORDER BY SQM DESC limit 4";
                                    $result= mysqli_query($conexion, $consulta);
                                    $filas=mysqli_num_rows($result);
                                    $primero=false;
                                    if($filas<=3){
                                        echo '<tr>';
                                        echo '<th scope="row">'.$semana.'</th>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R17A" onchange="Valor(17,this);"> </input> </td>';
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
                                                echo '<td > <input type="number" class="form-control celdas" id="R17A" onchange="Valor(17,this);" value="'.$row[1].'"> </input> </td>';
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
                    <div class="col-sm text-center border border-dark rounded  m-1 p-1">
                       <h4>Consumo efectivale</h4>
                       <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Semana</th>
                                <th scope="col">Monto de consumo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $consulta="SELECT SQM, Valor FROM registroindicadores Where año=$year and SQM>$semana-4 and id_Req='R21A' ORDER BY SQM DESC limit 4";
                                    $result= mysqli_query($conexion, $consulta);
                                    $filas=mysqli_num_rows($result);
                                    $primero=false;
                                    if($filas<=3){
                                        echo '<tr>';
                                        echo '<th scope="row">'.$semana.'</th>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R21A" onchange="Valor(21,this);"> </input> </td>';
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
                                                echo '<td > <input type="number" class="form-control celdas" id="R21A" onchange="Valor(21,this);" value="'.$row[1].'"> </input> </td>';
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
                    <div class="col-sm text-center border border-dark rounded  m-1 p-1">
                        <h4>Cartera vencida</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Semana</th>
                                    <th scope="col">Monto de cartera vencido</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $consulta="SELECT SQM, Valor FROM registroindicadores Where año=$year and SQM>$semana-4 and id_Req='R22A' ORDER BY SQM DESC limit 4";
                                    $result= mysqli_query($conexion, $consulta);
                                    $filas=mysqli_num_rows($result);
                                    $primero=false;
                                    if($filas<=3){
                                        echo '<tr>';
                                        echo '<th scope="row">'.$semana.'</th>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R22A" onchange="Valor(22,this);"> </input> </td>';
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
                                                echo '<td > <input type="number" class="form-control celdas" id="R22A" onchange="Valor(22,this);" value="'.$row[1].'"> </input> </td>';
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
                        <h4>Estimaciones de proyectos</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Semana</th>
                                <th scope="col">Estimaciones por entregar</th>
                                <th scope="col">Estimaciones entregadas</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $consulta1="SELECT SQM, Valor FROM registroindicadores Where año=$year AND SQM>$semana-4  and id_Req='R30A'  ORDER BY SQM DESC limit 4";
                                $consulta2="SELECT SQM, Valor FROM registroindicadores Where año=$year AND SQM>$semana-4  and id_Req='R30B'  ORDER BY SQM DESC limit 4";
                                $result1= mysqli_query($conexion, $consulta1);
                                $result2= mysqli_query($conexion, $consulta2);
                                $filas1=mysqli_num_rows($result1);
                                $filas2=mysqli_num_rows($result2);
                                $primero1=false;
                                $primero2=false;
                                if ($filas1==$filas1 && $filas1==0) {
                                    echo '<tr>';
                                    echo '<th scope="row">'.$semana.'</th>';
                                    echo '<td > <input type="number" class="form-control celdas" id="R30A" onchange="Valor(30,this);"> </input> </td>';
                                    echo '<td > <input type="number" class="form-control celdas" id="R30B" onchange="Valor(31,this);"> </input> </td>';
                                    echo '</tr>';
                                }else if($filas1==$filas2 && $filas1>0  ){
                                    while ($row = mysqli_fetch_array($result1)) {
                                        echo '<tr>';
                                        echo '<th scope="row">'.$row[0].'</th>';
                                        if($primero1==false){
                                            echo '<td > <input type="number" class="form-control celdas" id="R30A" onchange="Valor(30,this);" value="'.$row[1].'"> </input> </td>';
                                            $row = mysqli_fetch_array($result2);
                                            echo '<td > <input type="number" class="form-control celdas" id="R30B" onchange="Valor(31,this);" value="'.$row[1].'"> </input> </td>';
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
                                        echo '<th scope="row">'.$semana.'</th>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R30A" onchange="Valor(30,this);"> </input> </td>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R30B" onchange="Valor(31,this);"> </input> </td>';
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
                                        echo '<th scope="row">'.$semana.'</th>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R30A" onchange="Valor(30,this);"> </input> </td>';
                                        $row = mysqli_fetch_array($result2);
                                        echo '<td > <input type="number" class="form-control celdas" id="R30B" onchange="Valor(31,this);" value="'.$row[1].'"> </input> </td>';
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
                                        echo '<th scope="row">'.$semana.'</th>';
                                        $row = mysqli_fetch_array($result1);
                                        echo '<td > <input type="number" class="form-control celdas" id="R30A" onchange="Valor(30,this);" value="'.$row[1].'"> </input> </td>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R30B" onchange="Valor(31,this);"> </input> </td>';
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
                       <h4>Monto de facturacion</h4>
                       <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Mes</th>
                                <th scope="col">Monto facturado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $consulta="SELECT SQM, Valor FROM registroindicadores Where año=$year and SQM>$mes-4 and id_Req='R15A' ORDER BY SQM DESC limit 4";
                                    $result= mysqli_query($conexion, $consulta);
                                    $filas=mysqli_num_rows($result);
                                    $primero=false;
                                    if($filas<=3){
                                        echo '<tr>';
                                        echo '<th scope="row">'.$mes.'</th>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R15A" onchange="Valor(10,this);"> </input> </td>';
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
                                                echo '<td > <input type="number" class="form-control celdas" id="R15A" onchange="Valor(10,this);" value="'.$row[1].'"> </input> </td>';
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
                       <h4>Monto de impuestos</h4>
                       <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Mes</th>
                                <th scope="col">Monto de impuestos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $consulta="SELECT SQM, Valor FROM registroindicadores Where año=$year and SQM>$mes-4 and id_Req='R20A' ORDER BY SQM DESC limit 4";
                                    $result= mysqli_query($conexion, $consulta);
                                    $filas=mysqli_num_rows($result);
                                    $primero=false;
                                    if($filas<=3){
                                        echo '<tr>';
                                        echo '<th scope="row">'.$mes.'</th>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R20A" onchange="Valor(20,this);"> </input> </td>';
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
                                                echo '<td > <input type="number" class="form-control celdas" id="R20A" onchange="Valor(20,this);" value="'.$row[1].'"> </input> </td>';
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
                       <h4>Datos por proyecto</h4>
                       <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Codigo del proyecto</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Monto del proyecto</th>
                                <th scope="col">Monto gastado</th>
                                <th scope="col">Monto abonado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $consulta="SELECT * FROM proyecto Where Estado=1  ORDER BY fecha_Fin DESC";
                                    $result= mysqli_query($conexion, $consulta);
                                    $filas=mysqli_num_rows($result);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<tr>';
                                        echo '<th scope="row">'.$row[0].'</th>';
                                        echo '<td scope="row">'.$row[1].'</td>';
                                        echo '<td scope="row">'.$row[4].'</td>';
                                        echo '<td > <input type="number" class="form-control celdas" id="'.$row[0].'" onchange="montoGastado(this);" value="'.$row[5].'"> </input> </td>';
                                        echo '<td > <input type="number" class="form-control celdas" id="'.$row[0].'" onchange="montoAbonado(this);" value="'.$row[6].'"> </input> </td>';
                                        echo '</tr>';
                                    } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="../../js/Metodos.js"></script>
    </body>
</html>
