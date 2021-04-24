<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Proyecto</title>
    <link rel="stylesheet" href="../../css/bootstrap.css" >
    <link rel="stylesheet" href="../../css/style.css" >
</head>
<body>
    <div class="container">
        <h1>Agregar un proyecto</h1>
        <div class="row  justify-content-center pt-5 mt-5"></div>
        <form action="">
            <div class="form-group ">
                <label for="name">Nombre del proyecto</label>
                <input type="text" name="nameProject" class="form-control " id="name" placeholder="Nombre del proyecto">
                <div class="row">
                    <div class="col-6 text-center">
                        <label for="name">Fecha de inicio</label>
                        <input type="date" name="dateProject" class="form-control " id="dateInicio" placeholder="">
                    </div>
                    <div class="col-6 ">
                        <label for="name">Fecha de finalizacion</label>
                        <input type="date" name="dateProject" class="form-control " id="dateFin" placeholder="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-center">
                        <label for="name">Costo del proyecto</label>
                        <input type="number" name="costProject" class="form-control " id="Costo" placeholder="10000"> 
                    </div>
                    <div class="col-4 ">
                        <label for="name">Nombre del cliente</label>
                        <select class="form-control">
                            <option value="0">Seleccione:</option>
                            <?php
                                $link=mysqli_connect("localhost","root",""); //hace la conexion con la base de datos
                                mysqli_select_db($link,"kpis");
                                $result= mysqli_query($link, "select id_Cliente,Nombre,Telefono from cliente ");
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="'.$row['id_Cliente'].'">'.$row['Nombre'].'-'.$row['Telefono'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-2 text-center">
                    <label for="name"></label>
                        <a class="btn btn-danger btn-lg " onclick="addClienteView();">Registrar cliente nuevo</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8 text-center">
                        <label for="name">Conceptos del proyecto</label>
                        <select class="form-control" id="conceptos">
                            <option value="0">Seleccione:</option>
                            <?php
                                $link=mysqli_connect("localhost","root",""); //hace la conexion con la base de datos
                                mysqli_select_db($link,"kpis");
                                $result= mysqli_query($link, "select id_Concepto,Nombre from catalogo_conceptos");
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="'.$row['id_Concepto'].'">'.$row['id_Concepto'].'-'.$row['Nombre'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-4 text-center" hidden>
                        <button class="btn btn-danger mt-3 center btn-lg" id="addConcepto">Agregar concepto</button>
                    </div>
                </div>
                <div class="conceptos text-center" hidden>
                    <h3>Lista de Conceptos</h3>
                    <table class="table dark-table">
                        <thead>
                            <tr>
                            <th scope="col">ID del Concepto</th>
                            <th scope="col">Nombre del concpeto</th>
                            <th scope="col">Eliminar concepto</th>
                            </tr>
                        </thead>
                        <tbody id="t_Cuerpo">
                        </tbody>
                    </table>
                </div>
                
                
                <button type="submit" class="btn btn-primary mt-3 center btn-lg">Agregar proyecto</button>
                <a href="./Proyectos.php" class="btn btn-primary mt-3 center btn-lg">Cancelar</a>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../js/Metodos.js"></script>
</body>
</html>


