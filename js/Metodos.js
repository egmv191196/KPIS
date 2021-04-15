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
    //---------------Metodos Clientes-------------
    //Agregar Clientes
    $('#AddCliente').click(function(){
        var datos=$('#frmCliente').serialize();
        $.ajax({
            type: "POST",
            url: "../Script/insertarClientes.php",
            data: datos,
        }).done(function(response){
            alert(response);
            /*if(response == 1){
                alert("Usuario agregado correctamente");
                window.location="./Clientes.php";
            }else{
                console.log("no es 1"+response);
            }*/
    }).fail(function(response){
        console.log("error"+response);
    });
        return false;
    });
    //Eliminar clientes
    $('#trash').click(function(){
        $.ajax({
            type: "POST",
            url: "../Script/insertarClientes.php",
            data: datos,
        }).done(function(response){
        if(response == 1){
            alert("Usuario agregado correctamente");
            window.location="./Clientes.php";
        }else{
            console.log("no es 1"+response);
        }
    }).fail(function(response){
        console.log("error"+response);
    });
        return false;
    });


    //Agregar Proveedor
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