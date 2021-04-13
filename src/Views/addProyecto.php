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
                        <label for="name">&nbsp;</label>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Addcliente" id="addClienteP">Registrar cliente nuevo</button>
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
                    <div class="col-4 text-center">
                        <button class="btn btn-danger mt-3 center btn-lg" id="addConcepto">Agregar concepto</button>
                    </div>
                </div>
                <div class="conceptos text-center">
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<script type="Text/Javascript">
    $(document).ready(function(){
        var tr ='';
        //Agregar
        $('#addConcepto').click(function(){
                var concepto = document.getElementById("conceptos").value;
                $("#t_Cuerpo").html("");
                    tr += `<tr>
                    <td>`+concepto+`</td>
                    <td>Nombre del concepto</td>
                    <td></td>
                    </tr>`;
                    $("#t_Cuerpo").append(tr)
                    return false;
        });
        //
        $('#addClienteP').click(function(){
            $('#addCliente').on('shown.bs.modal', function () {
                $('#Nombre').trigger('focus')
            })
            return false;
        });
        



    });
</script>

