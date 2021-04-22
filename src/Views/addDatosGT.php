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
                        <a class="nav-link" href="insertarDatos.php">Actualizar datos</a>
                    </li>
                    </ul>
                </div>
                <a class="navbar-brand" href="../Script/logout.php">Cerrar Sesion</a>
            </nav>
            <h2 class="text-center">Registrar datos Gerencia Tecnica</h2>
                <form id="frmDatos" method="POST">
                    <label for="name">Indicador</label>
                        <select class="form-control" id="conceptos">
                        <option value="0">Selecciona el indicador que registraras:</option>
                        <?php
                            $consulta="SELECT * FROM catalogo_indicadores WHERE Permiso='T' ORDER BY Nombre DESC";
                            $result= mysqli_query($conexion,$consulta );
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<option value="'.$row['id_Dat'].'">'.$row['Nombre'].'</option>';
                            }
                        ?>
                    </select>
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
                    <input type="hidden" name="Operacion" id="Operacion" value="Insertar" />
                    <button class="btn btn-danger float-right m-3 center btn-lg" id="AddCliente">Registrar cliente</button>      
                </form>
        </div>
    </body>
</html>