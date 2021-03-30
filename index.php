<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Iniciar Sesion</title>
        <link rel="stylesheet" href="./css/bootstrap.css" >
        <link rel="stylesheet" href="./css/style.css" >
    </head>
    <body >
        <div class="container ">
            <div class="row justify-content-center pt-5 mt-5 ">
                <div class="col-md-4 formulario ">
                    <form action="./src/Script/login.php" method="POST">  
                        <div class="form-group text-center">
                            <img src="./src/Img/logo.png" class="img-fluid mt-3" alt="Responsive image">
                            <h1 class="text-center" >Iniciar Sesion</h1>
                            <label for="exampleInputEmail1">Ingresar tu usuario</label>
                            <input type="text" name="user" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresar Usuario">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" name="passwd" class="form-control " id="exampleInputPassword1" placeholder="Contraseña">
                            <button type="submit" class="btn btn-primary mt-3 center ">Iniciar Sesion</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>       
    </body>
</html>
