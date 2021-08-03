<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Iniciar GT</title>
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
                    $semana=date("W");
                    $mes=date('m');  
                    $quincenaActual=($semana/2);
                    $year=date("Y");               
                ?>
            <div id="GT">
            <h5 class="text-center">Año: <?php echo $year;?> Semana: <?php echo $mes;?> </h5>
                <h3 class="text-center">Gerencia Tecnica</h3>
                <input type="hidden" id="Area" value="3"></input>   
                <div class="row m-2">
                    <div class="col-6">
                        <div id="Retrabajos">
                        </div>
                    </div>
                    <div class="col-6">
                        <div id="Inconformidades">
                        </div>
                    </div>
                </div>
                <div class="row m-2">
                <div class="col-12">
                        <div id="plazosCumplidos">   
                        </div>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-12">
                        <div id="avanceProyectos">   
                        </div>
                    </div>
                </div> 
                <div class="row"> 
                    <div class="col-12 text-center">
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
                <div class="row"> 
                    <div class="col-12 text-center">
                        <h3>Avance por proyecto</h3>
                        <?php
                            $consulta="SELECT * FROM proyecto WHERE Estado=1"; 
                            $result= mysqli_query($conexion,$consulta);
                            $i=0;
                            while($row=mysqli_fetch_array($result)){
                                if($i==0){
                                    echo'    <div class="row"">'; 
                                }
                                echo'       <div class="col-sm m-2 grafica">';
                                echo'           <div id="'.$row[0].'">';
                                echo'       </div>';
                                $i++;
                                if($i==4){
                                    echo'    </div>';
                                    $i=0; 
                                }
                                
                                }                                       
                        ?> 
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
