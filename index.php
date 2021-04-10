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
    <?php include("./src/Views/modal.php");?>
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
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
    </body>
</html>
