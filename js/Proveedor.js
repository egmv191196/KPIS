$(document).ready(function(){
    $('#addPro').click(function(){
        var datos=$('#frmProv').serialize();
        $.ajax({
            type: "POST",
            url: "../Script/addProveedor.php",
            data: datos,
        }).done(function(response){
        if(response == 1){
            alert("Usuario agregado correctamente");
            window.location="./Proveedor.php";
        }else{
            console.log("error al agregar "+ response);
        }
    }).fail(function(response){
        console.log("error"+response);
    });
        return false
    });
});