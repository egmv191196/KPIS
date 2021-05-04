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
                        <a class="nav-link" href="insertarDatos.php">Datos</a>
                    </li>
                    </ul>
                </div>
                <a class="navbar-brand" href="../Script/logout.php">Cerrar Sesion</a>
            </nav>
            <h2 class="text-center">Datos de  Gerencia Tecnica</h2>
                <div class="datos mt-5">
                    <h4 class="text-center">Reportes entregados</h4>
                    <div class="row">
                        <div class="col-sm text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Semana</th>
                                        <th scope="col">Proyectos vigentes y culminados</th>
                                        <th scope="col">Retrabajos</th>
                                        <th scope="col">Plazos de entrega cumplidos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">11</th>
                                            <td ><input type="checkbox" id="cbox1" value="first_checkbox" checked disabled></td>
                                            <td ><input type="checkbox" id="cbox1" value="first_checkbox" checked disabled></td>
                                            <td ><input type="checkbox" id="cbox1" value="first_checkbox" checked disabled></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">12</th>
                                            <td ><input type="checkbox" id="cbox1" value="first_checkbox"checked disabled></td>
                                            <td ><input type="checkbox" id="cbox1" value="first_checkbox"checked disabled></td>
                                            <td ><input type="checkbox" id="cbox1" value="first_checkbox" checked disabled></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">13</th>
                                            <td ><input type="checkbox" id="cbox1" value="first_checkbox"checked disabled></td>
                                            <td ><input type="checkbox" id="cbox1" value="first_checkbox"disabled   ></td>
                                            <td ><input type="checkbox" id="cbox1" value="first_checkbox" checked disabled></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">14</th>
                                            <td ><input type="checkbox" id="cbox1" value="first_checkbox"></td>
                                            <td ><input type="checkbox" id="cbox1" value="first_checkbox"></td>
                                            <td ><input type="checkbox" id="cbox1" value="first_checkbox"></td>
                                        </tr>
                                    </tbody>
                                </table>                       
                        </div>
                        <div class="col-sm text-center">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Quincena</th>
                                    <th scope="col">KMS por concepto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">11</th>
                                        <td ><input type="checkbox" id="cbox1" value="first_checkbox" checked disabled></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">12</th>
                                        <td ><input type="checkbox" id="cbox1" value="first_checkbox"checked disabled></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">13</th>
                                        <td ><input type="checkbox" id="cbox1" value="first_checkbox"checked disabled></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">14</th>
                                        <td ><input type="checkbox" id="cbox1" value="first_checkbox"></td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm text-center" >
                            <h4>Avance por proyecto</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Proyecto</th>
                                    <th scope="col">Semana 1</th>
                                    <th scope="col">Semana 2</th>
                                    <th scope="col">Semana 3</th>
                                    <th scope="col">Semana 4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Tecamachalco</th>
                                        <td >7</td>
                                        <td >7</td>
                                        <td >7</td>
                                        <td contenteditable="true">7</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tecamachalco</th>
                                        <td >9</td>
                                        <td >7</td>
                                        <td >7</td>
                                        <td contenteditable="true">15</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tecamachalco</th>
                                        <td >9</td>
                                        <td >7</td>
                                        <td >7</td>
                                        <td contenteditable="true">15</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tecamachalco</th>
                                        <td >9</td>
                                        <td >7</td>
                                        <td >7</td>
                                        <td contenteditable="true">7</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="col-sm text-center" >
                            <h4>Plan de trabajo ejecutado</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Proyecto</th>
                                    <th scope="col">Semana 1</th>
                                    <th scope="col">Semana 2</th>
                                    <th scope="col">Semana 3</th>
                                    <th scope="col">Semana 4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Tecamachalco</th>
                                        <td >7</td>
                                        <td >7</td>
                                        <td >7</td>
                                        <td >7</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tecamachalco</th>
                                        <td >9</td>
                                        <td >7</td>
                                        <td >7</td>
                                        <td contenteditable="true">15</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tecamachalco</th>
                                        <td >9</td>
                                        <td >7</td>
                                        <td >7</td>
                                        <td contenteditable="true">15</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tecamachalco</th>
                                        <td >9</td>
                                        <td >7</td>
                                        <td >7</td>
                                        <td contenteditable="true">7</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    
                    </div>
                    <div class="row">
                    
                        <div class="col-sm text-center" >
                        <h4>Inconformidades por el cliente </h4>
                        <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Proyecto</th>
                                    <th scope="col">Semana 1</th>
                                    <th scope="col">Semana 2</th>
                                    <th scope="col">Semana 3</th>
                                    <th scope="col">Semana 4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Tecamachalco</th>
                                        <td >7</td>
                                        <td >7</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">13</th>
                                        <td >9</td>
                                        <td contenteditable="true">15</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">14</th>
                                        <td >9</td>
                                        <td contenteditable="true">15</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">15</th>
                                        <td >9</td>
                                        <td contenteditable="true">7</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    <div class="col-sm text-center">
                       <h4>Horas extras</h4>
                       <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Quincena</th>
                                <th scope="col">Horas extras</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">12</th>
                                    <td >7</td>
                                </tr>
                                <tr>
                                    <th scope="row">13</th>
                                    <td >9</td>
                                </tr>
                                <tr>
                                    <th scope="row">14</th>
                                    <td >10</td>
                                </tr>
                                <tr>
                                    <th scope="row">15</th>
                                    <td contenteditable="true"></td>
                                </tr>
                            </tbody>
                        </table>
                        <label for="promedio">Promedio de horas extras </label>
                    </div>
                    
                
                    <div class="col-sm text-center">
                       <h4>Proyectos</h4>
                       <table class="table" title="Proyectos">
                            <thead>
                                <tr>
                                    <th scope="col">Semana/proyectos</th>
                                    <th scope="col">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">S1</th>
                                    <td> $ 933,596.87 </td>
                                </tr>
                                <tr>
                                    <th scope="row">S2</th>
                                    <td >9</td>
                                </tr>
                                <tr>
                                    <th scope="row">S3</th>
                                    <td >15</td>
                                </tr>
                                <tr>
                                    <th scope="row">S4</th>
                                    <td contenteditable="true"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>                   
                </div>
                <button class="btn btn-danger float-right m-3 center btn-lg" >Guardar Datos</button> 
            </div>
        </div>
    </body>
</html>