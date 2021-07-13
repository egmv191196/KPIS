//--------Login---------
function login(){
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
}
//------Clientes----------
//Agregar Cliente
    function addClientes(){ 
        var datos=$('#frmCliente').serialize();
        $.ajax({
            type: "POST",
            url: "../Script/Cliente.php",
            data: datos,
        }).done(function(response){
            if(response == 1){
                alert("Cliente agregado correctamente");
                window.location="./Clientes.php";
            }else{
                alert("Usuario no agregado correctamente");
            }
        }).fail(function(response){
            console.log("error"+response);
        });
        return false;
    }
//Update Cliente
function updateCliente(){
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
}
//Eliminar cliente
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
//----ModificarCliente
function ModificarC(id) {
    Name=$(id).parents("tr").find("td")[0].innerHTML;
    Phone=$(id).parents("tr").find("td")[3].innerHTML;
    location.href ="upCliente.php?Name="+Name+"&Phone="+Phone;
}
//--------Proveedor--------------
//---Agregar Proveedores
function addProveedor(){
        var datos=$('#frmProv').serialize();
        $.ajax({
            type: "POST",
            url: "../Script/Proveedor.php",
            data: datos,
        }).done(function(response){
            if(response == 1){
                alert("Proveedor agregado correctamente");
                window.location="./Proveedor.php";
            }else{
                alert("Usuario no agregado correctamente");
            }
    }).fail(function(response){
        console.log("error"+response);
    });
        return false;

}
//------------Update Proveedor
function upProveedor(){
    var datos=$('#upProv').serialize();
        $.ajax({
            type: "POST",
            url: "../Script/Proveedor.php",
            data: datos,
        }).done(function(response){
            if(response == 1){
                alert("Proveedor modificado correctamente");
                window.location="./Proveedor.php";
            }else{
                alert(response);
            }
    }).fail(function(response){
        console.log("error"+response);
    });
        return false;
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
//------------------------------Proyecto------------------------------
function numeroFilas(){
    var resume_table = document.getElementById("cuerpo").getElementsByTagName('tr');
    return resume_table.length;
}
function obtenerConceptos(a){
    var concepto=[];
    var lista_Conceptos=[];
    for (var i = 0; i<a; i++) {
        console.log(valor=$('#concepto_'+(i+1)).val());
        concepto=[(i+1), $('#concepto_'+(i+1)).val(), $('#Nombreconcepto_'+(i+1)).val()];
        lista_Conceptos.push(concepto);
    }
    return lista_Conceptos;
}
function verificarInputs(a){
    for (var i = 0; i<a; i++) {
        if ($('#concepto_'+(i+1)).val()=="") {
            return 0;
        }
    }
    return 1;
}

function tabla(){
    $("#cuerpo tr").remove();
    $("#footer tr").remove();
    valor=$('#conceptos').val();
    for ( i = 0; i < valor; i++) {
        document.getElementById("cuerpo").insertRow(i).innerHTML = '<tr><td>'+(i+1)+'</td> <td>'+
        '<input type="string" class="form-control" onchange="sumaPorcentaje(numeroFilas());" id="concepto_'+(i+1)+'" ></td>'+
        '<td><input type="string" class="form-control" id="Nombreconcepto_'+(i+1)+'" ></td><tr>';
    }
    document.getElementById("footer").insertRow(0).innerHTML = '<tr><td>Total</td> <td id="porcentaje_Total"> </td><tr>'; 
}

function sumaPorcentaje(a){
    var suma=0;
    for (var i = 0; i<a; i++) {
        if ($('#concepto_'+(i+1)).val()!="") {
            valor=parseInt($('#concepto_'+(i+1)).val());
            suma=suma+valor;
        }
    }
    document.getElementById("porcentaje_Total").innerHTML = suma;
}
function verificarPorcentaje(){
    por=parseInt( document.getElementById("porcentaje_Total").innerText);
    console.log(por);
    if(por==100)
        return 1;
    else
        return 0;
}
//-------Agregar Proyecto------
function addProyecto(){
    if (verificarInputs(numeroFilas())==1) {
        if (verificarPorcentaje()==1) {
            conceptos = obtenerConceptos(numeroFilas());
            datos={
                Clave : $('#claveProyecto').val(),
                Name : $('#nombreProyecto').val(),
                fechaInicio : $('#dateInicio').val(),
                fechaFin : $('#dateFin').val(),
                costoProyecto : $('#Costo').val(),
                id_Presupuesto : $('#id_Presupuesto').val(),
                id_Cliente : $('#id_Cliente').val(),
                list_Conceptos : conceptos
            };
            $.ajax({
                type: "POST",
                url: "../Script/Proyecto.php",
                data: datos,
            }).done(function(response){
                alert(response);
                if (response==1) {
                    alert("Se registro correctamente el proyecto");
                    location.href ="./Proyectos.php";
                } else {
                    alert("Error al registrar el proyecto");
                }
            }).fail(function(response){
                console.log("error"+response);
            });            
        }else{
            alert("La suma de cada concepto no es igual a 100, por favor verificarlos valores");
        }
    }else{
        alert("Verificar que todos los conceptos tenga su valor correspondiente");
    }
}
//------------------Agregar proyecto-------------------------
/*function addProyecto(){
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
    });
}*/

//------------------------------Indicadores----------------------

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
function Valor(caso,id){
    var valor;
    switch (caso) {
        case 1:
            valor=$('#R4B').val();
            req="R4B";
            user="JosaGG";
            //alert ("El nuevo valor de R4B es "+ valor); 
        break;
        case 2:
            valor=$('#R6B').val();
            req="R6B";
            user="JosaGG";
            //alert ("El nuevo valor de R6B es "+ valor); 
        break;
        case 3:
            valor=$('#R10A').val();
            req="R10A";
            user="JosaGG";
            //alert ("El nuevo valor de R10A es "+ valor); 
        break;
        case 4:
            valor=$('#R3A').val();
            req="R3A";
            user="JosaGG";
            //alert ("El nuevo valor de R3A es "+ valor); 
        break;
        case 5:
            valor=$('#R3B').val();
            req="R3B";
            user="JosaGG";
            //alert ("El nuevo valor de R3B es "+ valor); 
        break;
        case 6:
            valor=$('#R1A').val();
            req="R1A";
            user="JosaGG";
            //alert ("El nuevo valor de R1B es "+ valor); 
        break;
        case 7:
            valor=$('#R1B').val();
            req="R1B";
            user="JosaGG";
            //alert ("El nuevo valor de R1B es "+ valor); 
        break;
        case 8:
            valor=$('#R5A').val();
            req="R5A";
            user="JosaGG";
            //alert ("El nuevo valor de R5A es "+ valor); 
        break;
        case 9:
            valor=$('#R5A').val();
            req="R5A";
            user="JosaGG";
            //alert ("El nuevo valor de R5A es "+ valor); 
        break;
        case 10:
            valor=$('#R15A').val();
            req="R15A";
            user="LeoGC";
            //alert ("El nuevo valor de R5A es "+ valor); 
        break;
        case 16:
            valor=$('#R16A').val();
            req="R16A";
            user="LeoGC";
            //alert ("El nuevo valor de R5A es "+ valor); 
        break;
        case 19:
            valor=$('#R19A').val();
            req="R19A";
            user="LeoGC";
            //alert ("El nuevo valor de R5A es "+ valor); 
        break;
        case 20:
            valor=$('#R20A').val();
            req="R20A";
            user="LeoGC";
            //alert ("El nuevo valor de R5A es "+ valor); 
        break;
        case 21:
            valor=$('#R21A').val();
            req="R21A";
            user="LeoGC";
            //alert ("El nuevo valor de R5A es "+ valor); 
        break;
        default:
        break;  
    }
    //Traer el valor
    SQM=$(id).parents("tr").find("th")[0].innerHTML;
    //alert("El valor es "+ valor+" El requerimiento es el "+ req+" Renglon "+SQM);
    datos={
        'Req': req,
        'Valor': valor,
        'SQM' : SQM,
        'User': user
    };
    $.ajax({
        type: "POST",
        url: "../Script/indicadores.php",
        data: datos,
    }).done(function(response){
        location.reload();
        /*if(response == 1){
            alert("Cliente agregado correctamente");
            window.location="./Clientes.php";
        }else{
            alert("Usuario no agregado correctamente");
        }*/
    }).fail(function(response){
        console.log("error"+response);
    });
}

//Redireccion
function addClienteView() {
    location.href ="./addClientes.php";
}