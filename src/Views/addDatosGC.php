<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Iniciar GG</title>
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
                    <li class="nav-item">
                        <a class="nav-link" href="#">Datos</a>
                    </li>
                    </ul>
                </div>
                  <a class="navbar-brand" href="../Script/logout.php">Cerrar Sesion</a>
            </nav>
            <h2 class="text-center">Datos de  Gerencia Comercial</h2>

            <div class="datos mt-5">
                <div class="row">
                    
                    <div class="col-sm text-center" >
                       <h4>Reporte de nomina</h4>
                       <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Quincena</th>
                                <th scope="col">Numero de reportes</th>
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
                                    <td contenteditable="true">15</td>
                                </tr>
                                <tr>
                                    <th scope="row">15</th>
                                    <td contenteditable="true"></td>
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
                        <h4>Reportes entregados</h4>
                        <div class="semanal">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Semana</th>
                                    <th scope="col">Reporte CXP</th>
                                    <th scope="col">Reporte CXC</th>
                                    <th scope="col">Mes</th>
                                    <th scope="col">Reporte facturacion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">11</th>
                                        <td ><input type="checkbox" id="cbox1" value="first_checkbox" checked disabled></td>
                                        <td ><input type="checkbox" id="cbox1" value="first_checkbox" checked disabled></td>
                                        <th scope="row">1</th>
                                        <td ><input type="checkbox" id="cbox1" value="first_checkbox"checked disabled></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">12</th>
                                        <td ><input type="checkbox" id="cbox1" value="first_checkbox"checked disabled></td>
                                        <td ><input type="checkbox" id="cbox1" value="first_checkbox"checked disabled></td>
                                        <th scope="row">2</th>
                                        <td ><input type="checkbox" id="cbox1" value="first_checkbox"checked disabled></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">13</th>
                                        <td ><input type="checkbox" id="cbox1" value="first_checkbox"checked disabled></td>
                                        <td ><input type="checkbox" id="cbox1" value="first_checkbox"disabled   ></td>
                                        <th scope="row">3</th>
                                        <td ><input type="checkbox" id="cbox1" value="first_checkbox" disabled></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">14</th>
                                        <td ><input type="checkbox" id="cbox1" value="first_checkbox"></td>
                                        <td ><input type="checkbox" id="cbox1" value="first_checkbox"></td>
                                        <th scope="row">4</th>
                                        <td ><input type="checkbox" id="cbox1" value="first_checkbox"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>                     
                        
                    </div> 
                    
                </div>
                <div class="row">
                    <div class="col-sm text-center">
                       <h4>Cuentas por pagar</h4>
                       <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Semana</th>
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
                    <div class="col-sm text-center">
                       <h4>Cuentas por cobrar</h4>
                       <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Semana</th>
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
                    <div class="col-sm text-center">
                       <h4>Saldo en cuentas</h4>
                       <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Semana</th>
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
            
            
            
            
            
            </div>

                <form id="frmGC" >
                    <label for="name">Indicador</label>
                        <select class="form-control" id="conceptos" onchange="SeleccionGC();">
                        <option value="0">Selecciona el indicador que registraras:</option>
                        <?php
                            $consulta="SELECT * FROM catalogo_indicadores WHERE Permiso='F' ORDER BY Nombre ASC";
                            $result= mysqli_query($conexion,$consulta );
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<option value="'.$row['id_Dat'].'">'.$row['Nombre'].'</option>';
                            }
                        ?>
                    </select>
                    <div class="clientes" >
                        <label for="name">Lista de clientes</label>
                            <select class="form-control" id="list_Clientes" >
                            <option value="0">Selecciona el nombre del cliente:</option>
                            <?php
                                $consulta="SELECT * FROM cliente ";
                                $result= mysqli_query($conexion,$consulta );
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="'.$row['id_Cliente'].'">'.$row['Nombre'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="proveedores" >
                        <label for="name">Lista de proveedores</label>
                            <select class="form-control" id="list_Proveedores" >
                            <option value="0">Selecciona el nombre del proveedor:</option>
                            <?php
                                $consulta="SELECT * FROM proveedor";
                                $result= mysqli_query($conexion,$consulta );
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="'.$row['id_Proveedor'].'">'.$row['Nombre'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="proyectos" >
                        <label for="name">Lista de proyectos</label>
                            <select class="form-control" id="list_Proyectos" >
                            <option value="0">Selecciona el el nombre del proyecto:</option>
                            <?php
                                $consulta="SELECT * FROM proyecto";
                                $result= mysqli_query($conexion,$consulta );
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="'.$row['clave_Proyecto'].'">'.$row['clave_Proyecto'].' - '.$row['Nombre'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <label>Valor</label>
                    <input type="text" name="Name" class="form-control " id="Nombre" placeholder="Ingresa el valor del indicador">
                    <input type="hidden" name="Cargo" id="Cargo" value="GC" />
                    <button class="btn btn-danger float-right m-3 center btn-lg" onclick="insIndGC();">Registrar cliente</button>      
                </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="../../js/Metodos.js"></script>
    </body>
</html>
