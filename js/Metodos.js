$(document).ready(function(){
    //Login
    $('#signIn').click(function(){
        var datos=$('#formLogin').serialize();
        $.ajax({
            type: "POST",
            url: "./src/Script/login.php",
            data: datos,
        }).done(function(response){      
            if(response == 1){
                location.href ="./src/Views/InicioGG.php";
            }else if(response == 2){
                location.href ="./src/Views/InicioGT.php";
            }else if(response == 3){
                location.href ="./src/Views/InicioGC.php";
            }else if(response == 0){
                alert("Contraseña erronea");
            }else if(response == 4){
                alert("No existe el usuario");
            }
        }).fail(function(response){
            alert("Hubo un error en el server, reintentelo de nuevo");
        });
        return false;
    });

    //AgregarProyecto
    $('#addPro').click(function(){
        var datos=$('#addProyecto').serialize();
        $.ajax({
            type: "POST",
            url: "../Script/Proyecto.php",
            data: datos,
        }).done(function(response){
            alert(response);
            location.href ="./Proyectos.php";
    }).fail(function(response){
        console.log("error"+response);
    });
        return false
    });

    //---------------Metodos Clientes-------------
    //Agregar Clientes
    $('#AddCliente').click(function(){
        var datos=$('#frmCliente').serialize();
        $.ajax({
            type: "POST",
            url: "../Script/Cliente.php",
            data: datos,
        }).done(function(response){
            if(response == 1){
                alert("Usuario agregado correctamente");
                window.location="./Clientes.php";
            }else{
                alert("Usuario no agregado correctamente");
            }
    }).fail(function(response){
        console.log("error"+response);
    });
        return false;
    });
    
    //Update Cliente
    $('#updateCliente').click(function(){
        var datos=$('#upCliente').serialize();
        $.ajax({
            type: "POST",
            url: "../Script/Cliente.php",
            data: datos,
        }).done(function(response){
            if(response == 1){
                alert("Usuario modificado correctamente");
                window.location="./Clientes.php";
            }else{
                alert(response);
            }
    }).fail(function(response){
        console.log("error"+response);
    });
        return false;
    });
    ////----Metodo Proveedor------
    //Agregar Proveedor
    $('#addPro').click(function(){
        var datos=$('#frmProv').serialize();
        $.ajax({
            type: "POST",
            url: "../Script/Proveedor.php",
            data: datos,
        }).done(function(response){
            if(response == 1){
                alert("Usuario agregado correctamente");
                window.location="./Proveedor.php";
            }else{
                alert("Usuario no agregado correctamente");
            }
    }).fail(function(response){
        console.log("error"+response);
    });
        return false;
    });
    //Update Proveedor
    $('#upPro').click(function(){
        var datos=$('#upProv').serialize();
        $.ajax({
            type: "POST",
            url: "../Script/Proveedor.php",
            data: datos,
        }).done(function(response){
            if(response == 1){
                alert("Usuario modificado correctamente");
                window.location="./Proveedor.php";
            }else{
                alert(response);
            }
    }).fail(function(response){
        console.log("error"+response);
    });
        return false;
    });
    



});
//Funciones Cliente
function EliminarC(id){
    var datos = {
            "Operacion" : 'Eliminar',
            "Name" : $(id).parents("tr").find("td")[0].innerHTML,
            "Phone" : $(id).parents("tr").find("td")[3].innerHTML
        };
        $.ajax({
            type: "POST",
            url: "../Script/Cliente.php",
            data: datos,
        }).done(function(response){      
            alert("El usuario fue eliminado correctamente");
            location.reload();
        }).fail(function(response){
            alert("Hubo un error en el server, reintentelo de nuevo");
        });
}
function ModificarC(id) {
    Name=$(id).parents("tr").find("td")[0].innerHTML;
    Phone=$(id).parents("tr").find("td")[3].innerHTML;
    location.href ="upCliente.php?Name="+Name+"&Phone="+Phone;
}
//Funciones Proveedor
function EliminarP(id){
    var datos = {
            "Operacion" : 'Eliminar',
            "Name" : $(id).parents("tr").find("td")[0].innerHTML,
            "Phone" : $(id).parents("tr").find("td")[3].innerHTML
        };
        $.ajax({
            type: "POST",
            url: "../Script/Proveedor.php",
            data: datos,
        }).done(function(response){      
            alert("El usuario fue eliminado correctamente");
            location.reload();
        }).fail(function(response){
            alert("Hubo un error en el server, reintentelo de nuevo");
        });
}
function ModificarP(id) {
    Name=$(id).parents("tr").find("td")[0].innerHTML;
    Phone=$(id).parents("tr").find("td")[3].innerHTML;
    location.href ="upProveedor.php?Name="+Name+"&Phone="+Phone;
}
//------------------Agregar proyecto-------------------------
function addProyecto(){
var datos=$('#frmProv').serialize();
alert(datos);
location.href ="./addClientes.php";
/*
        $.ajax({
            type: "POST",
            url: "../Script/Proyecto.php",
            data: datos,
        }).done(function(response){
            //alert(response);
    }).fail(function(response){
        alert("error"+response);
    });*/
}

//------------------Insertar indicadores-------------------------

function insIndGC(){
    var datos=$('#frmGC').serialize();
    $.ajax({
        type: "POST",
        url: "../Script/indicadores.php",
        data: datos,
    }).done(function(response){      
        alert("El usuario fue eliminado correctamente");
        location.reload();
    }).fail(function(response){
        alert("Hubo un error en el server, reintentelo de nuevo");
    });
}

//Redireccion
function addClienteView() {
    location.href ="./addClientes.php";
}
