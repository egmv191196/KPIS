<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div class="modal fade" id="Addcliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal externo 1</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmCliente" method="POST">
          <label>Nombre del cliente</label>
          <input type="text" name="Name" class="form-control " id="Nombre" placeholder="Nombre del cliente">
          <label>RFC</label>
          <input type="text" name="RFC" class="form-control " id="RFC" placeholder="RFC">
          <label>Correo electronico</label>
          <input type="email" name="Email" class="form-control " id="Correo" placeholder="RFC">  
          <label>Telefono de contacto</label>
          <input type="number" name="Phone" class="form-control " id="Telefono" placeholder="Telefono">
          <button class="btn btn-danger float-right m-3 center btn-lg" id="AddClient">Registrar cliente</button>          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#AddClient').click(function(){
        var datos=$('#frmCliente').serialize();
        $.ajax({
            type: "POST",
            url: "../Script/insertarClientes.php",
            data: datos,
        }).done(function(response){
        if(response == 1){
            alert("Usuario agregado correctamente");
        }else{
            console.log("no es 1"+response);
        }
    }).fail(function(response){
        console.log("error"+response);
    });
        return false
    });
});
</script>

</html>


