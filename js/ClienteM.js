$(document).ready(function(){
    $('#AddCliente').click(function(){
        var datos=$('frmCliente').serialize();
        $.ajax({
            type: "POST",
            url: "../Script/insertarClientes.php",
            data: datos
        }).done(function(response){
            if(response == 1){
                console.log("es 1"+response);
            }else{
                console.log("no es 1"+response);
            }
        }).fail(function(response){
            console.log("error"+response);
        });
        return false;
    });
});