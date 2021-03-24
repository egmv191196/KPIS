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
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">             
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-1 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Dashboard<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gerencia General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gerencia Comercial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gerencia Tecnica</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Proveedores</a>
                    </li>
                    </ul>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <a class="navbar-brand" href="../../index.html">Cerrar Sesion</a>
            </nav>
            <h1 class="text-center">Semana 1</h1>
            <div class="row">
                <div class="col-6 text-center">
                    <h1>Otras areas</h1>
                    <?php
                        echo "<h3> El día de hoy es el ". date('d / M / Y H:i:s')."</h3> <hr/>";
                        echo "<h2 >Bienvenido a mi sitio PHP 5 </h2>";
                    ?>
                </div>
                <div class="col-6 ">
                    <h1>Gerencia Comercial</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <h1>Gerencia General</h1>
                </div>
                <div class="col-6 ">
                    <h1>Gerencia Tecnica</h1>
                    <?php
                        echo "<h3> El día de hoy es el ". date('d / M / Y H:i:s')."</h3> <hr/>";
                        echo "<h2 >Bienvenido a mi sitio PHP 5 </h2>";
                    ?>
                </div>
            </div>

        </div>
    </body>
</html>
