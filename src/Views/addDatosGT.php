<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Datos Gerencia Tecnica</title>
        <link rel="stylesheet" href="../../css/bootstrap.css" >
        <link rel="stylesheet" href="../../css/style.css" >
    </head>

    <body >
        <?php
            session_start();
            if(!isset($_SESSION['k_user'])){	
                header("Location:../../index.php");
            }else if($_SESSION['cargo']!="GT"){ 
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
                        <a class="nav-link" href="InicioGT.php">Dashboard <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addDatosGT.php">Datos</a>
                    </li>
                    </ul>
                </div>
                <a class="navbar-brand" href="../Script/logout.php">Cerrar Sesion</a>
            </nav>
            <?php
                require_once('../Script/conexionBD.php'); 
            ?>
            <h1 class="text-center">Gerencia Tecnica</h1>
            <h5 class="text-center">Año: <?php echo date("o");?> Semana: <?php echo date("W");?></h5>
            <?php 
                $semana=date("W")-1;
                $mes=date('m')-1;  
                $quincenaActual=round($semana/2, 0, PHP_ROUND_HALF_UP)-1;
                $year=date("Y");     
            ?>
            <div class="row">
                <div class="col-sm text-center border border-dark rounded m-1 p-1">
                    <h4>Retrabajos</h4>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Semana</th>
                            <th scope="col">Cantidad de retrabajos acumulados</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $consulta="SELECT SQM, Valor FROM registroindicadores Where año=$year AND SQM>$semana-4  and id_Req='R27A' ORDER BY SQM DESC limit 4";
                                $result= mysqli_query($conexion, $consulta);
                                $filas=mysqli_num_rows($result);
                                $primero=false;
                                if($filas<=3){
                                    echo '<tr>';
                                    echo '<th scope="row">'.$semana.'</th>';
                                    echo '<td > <input type="number" class="form-control celdas" id="R27A" onchange="Valor(27,this);"> </input> </td>';
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
                                            echo '<td > <input type="number" class="form-control celdas" id="R27A" onchange="Valor(27,this);" value="'.$row[1].'"> </input> </td>';
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
                    <h4>Inconformidades de los clientes</h4>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Semana</th>
                            <th scope="col">Cantidad de Inconformidades</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $consulta="SELECT SQM, Valor FROM registroindicadores Where año=2021 AND SQM>$semana-4  and id_Req='R28A' ORDER BY SQM DESC limit 4";
                                $result= mysqli_query($conexion, $consulta);
                                $filas=mysqli_num_rows($result);
                                $primero=false;
                                if($filas<=3){
                                    echo '<tr>';
                                    echo '<th scope="row">'.$semana.'</th>';
                                    echo '<td > <input type="number" class="form-control celdas" id="R28A" onchange="Valor(28,this);"> </input> </td>';
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
                                            echo '<td > <input type="number" class="form-control celdas" id="R28A" onchange="Valor(28,this);" value="'.$row[1].'"> </input> </td>';
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
                        <h4>Plazos de entrega</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Semana</th>
                                <th scope="col">Entregas programas</th>
                                <th scope="col">Entregas completadas</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $consulta1="SELECT SQM, Valor FROM registroindicadores Where año=$year AND SQM>$semana-4  and id_Req='R29A'  ORDER BY SQM DESC limit 4";
                                $consulta2="SELECT SQM, Valor FROM registroindicadores Where año=$year AND SQM>$semana-4  and id_Req='R29B'  ORDER BY SQM DESC limit 4";
                                $result1= mysqli_query($conexion, $consulta1);
                                $result2= mysqli_query($conexion, $consulta2);
                                $filas1=mysqli_num_rows($result1);
                                $filas2=mysqli_num_rows($result2);
                                $primero1=false;
                                $primero2=false;
                                if($filas1==$filas2 && $filas1==0){
                                    echo '<tr>';
                                    echo '<th scope="row">'.$semana.'</th>';
                                    echo '<td > <input type="number" class="form-control celdas" id="R29A" onchange="Valor(29,this);"> </input> </td>';
                                    echo '<td > <input type="number" class="form-control celdas" id="R29B" onchange="Valor(32,this);"> </input> </td>';
                                    echo '</tr>';
                                }else if($filas1==$filas2 && $filas1==4){
                                    while ($row = mysqli_fetch_array($result1)) {
                                        echo '<tr>';
                                        echo '<th scope="row">'.$row[0].'</th>';
                                        if($primero1==false){
                                            echo '<td > <input type="number" class="form-control celdas" id="R1A" onchange="Valor(29,this);" value="'.$row[1].'"> </input> </td>';
                                            $row = mysqli_fetch_array($result2);
                                            echo '<td > <input type="number" class="form-control celdas" id="R1B" onchange="Valor(32,this);" value="'.$row[1].'"> </input> </td>';
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
                                        echo '<td > <input type="number" class="form-control celdas" id="R29A" onchange="Valor(29,this);"> </input> </td>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R29B" onchange="Valor(32,this);"> </input> </td>';
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
                                        echo '<td > <input type="number" class="form-control celdas" id="R29A" onchange="Valor(29,this);"> </input> </td>';
                                        $row = mysqli_fetch_array($result2);
                                        echo '<td > <input type="number" class="form-control celdas" id="R29B" onchange="Valor(32,this);" value="'.$row[1].'"> </input> </td>';
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
                                        echo '<td > <input type="number" class="form-control celdas" id="R29A" onchange="Valor(29,this);" value="'.$row[1].'"> </input> </td>';
                                        echo '<td > <input type="number" class="form-control celdas" id="R29B" onchange="Valor(32,this);"> </input> </td>';
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
            </div>
            <h4 class="text-center">Proyectos</h4>
            <div class="row">
                <?php
                    $consulta="SELECT * FROM proyecto WHERE Estado=1 ORDER by fecha_Fin ASC"; 
                    $result= mysqli_query($conexion,$consulta);
                    while($row=mysqli_fetch_array($result)){
                        $idProyecto=$row[0];
                        echo'<div class="col-sm p-1 m-1 text-center border border-dark border-bottom ">';
                        echo'<h4 class="text-center">'.$row[1].'</h4>';
                        echo'   <table class="table dark-table m-1 border ">';
                        $consulta2="SELECT * FROM conceptos WHERE clave_Proyecto='$idProyecto'";
                        $result2= mysqli_query($conexion,$consulta2);
                        echo'       <tr>';
                        echo'            <th>Concepto</th>';
                        echo'            <th>Nombre</th>';
                        echo'            <th>Valor en el proyecto</th>';
                        echo'            <th>Avance</th>';             
                        echo'       </tr>';
                        $total=0.0;
                        while($row2=mysqli_fetch_array($result2)){
                            echo'       <tr data-uid="'.$idProyecto.'">';
                            echo'           <td>'.$row2[1].'</td>';
                            echo'           <td>'.$row2[2].'</td>';
                            echo'           <td>'.$row2[3].'</td>';
                            echo'           <td ><input type="number" class="form-control celdas" id="R6B" onchange="valorProyecto(this);" value='.$row2[4].'> </input></td>';
                            $total=$total+($row2[4]*($row2[3]/100));
                            echo'       </tr>';
                        } 
                        echo'   </table>';
                        echo'   <div class="row">';
                        echo'       <div class="col-sm">';
                        echo'           <h4>Avance del proyecto</h4>';
                        echo'       </div>';
                        echo'       <div class="col-sm">';
                        echo'           <h4>'.$total.'%</h4>';
                        echo'       </div>';
                        echo'   </div>';
                        echo'</div>';
                    }
                ?> 
            </div>
            <div class="row"> 
                <div class="col-12 text-center">
                    <h3>Cuantificacion de servicios</h3>
                    <div class="row">
                    <?php
                        echo '<div class="col-12 text-center border border-dark rounded p-1">';
                        echo'   <table class="table dark-table" id="cuanti">';
                        echo'       <tr>';
                        echo'            <th>Concepto</th>';
                        echo'            <th id="semana">'.($semana).'</th>';
                        echo'            <th>'.($semana-1).'</th>';
                        echo'            <th>'.($semana-2).'</th>';
                        echo'            <th>'.($semana-3).'</th>';            
                        echo'       </tr>';      
                        $consulta="SELECT * FROM catalogo_indicadores WHERE id_Dat LIKE 'K%' ORDER by id_Dat"; 
                        $result= mysqli_query($conexion,$consulta);
                        while($row=mysqli_fetch_array($result)){
                            $Cod=$row[0];
                            echo'       <tr>';
                            echo'            <th>'.$row[1].'</th>';                                        
                            $consulta1="SELECT SQM, Valor FROM registroindicadores Where año=$year AND SQM>$semana-4  and id_Req='$Cod' ORDER BY SQM DESC limit 4";
                            $result1= mysqli_query($conexion, $consulta1);
                            $filas=mysqli_num_rows($result1);
                            $primero=false;
                            if($filas<=3){
                                if ($filas==0) {
                                    echo '<td> <input type="number" class="form-control celdas" id="'.$Cod.'" onchange="Cuantificacion('.$Cod.',this);"> </input> </td>';
                                    echo '</tr>';
                                }else if ($filas==1) {
                                    $row = mysqli_fetch_array($result1);
                                    echo '<td> <input type="number" class="form-control celdas" id="R27A" onchange="Cuantificacion('.$Cod.',this);" value="'.$row[1].'"> </input> </td>';
                                    echo '</tr>';
                                } else if ($filas>1) {
                                    while ($row = mysqli_fetch_array($result1)) {
                                        if($primero==false){
                                            echo '<td > <input type="number" class="form-control celdas" id="R27A" onchange="Cuantificacion('.$Cod.',this);" value="'.$row[1].'"> </input> </td>';
                                            $primero=true;
                                        }  
                                        else{
                                            echo '<td>'.$row[1].'</td>';
                                            echo '</tr>';
                                        }
                                    }
                                }
                            }
                            
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
        <script src="../../js/Metodos.js"></script>
    </body>
</html>