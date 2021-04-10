var url="./../controlador.Cliente.php";
function Consultar(){
    $.ajax({
        url:url,
        type: 'POST',
        dataType: 'json'
    }).done(function(response){
        var html ="";
        $.each(response,function(index,data){
            html +="<tr>";
            html +="<td>"+data.id_Cliente+"</td>";
            html +="<td>"+data.Nombre+"</td>";
            html +="<td>"+data.RFC+"</td>";
            html +="<td>"+data.Correo+"</td>";
            html +="<td>"+data.Telefono+"</td>";
            html +="<td>";
            html +="<button class='btn btn-primary' onclick=consultar_Id("+data.id_Cliente+")>Editar</button>";
            html +="<button class='btn btn-primary' onclick=Eliminar("+data.id_Cliente+")>Eliminar</button>";
            html +="</td>";
            html +="</tr>";
        })
    }).fail(function(response){
        console.log(response);
    });
    document.getElementById("datos").innerHTML = html;

}
function consultar_Id(){
    
}
function Insertar(){
    $.ajax({
        url:url,
        data: retornarDatos("Insertar"),
        type: 'POST',
        dataType: 'json'
    }).done(function(response){
        if(response == "OK"){
            alert("Datos guardados con exito");
        }else{
            alert(response);
        }
    }).fail(function(response){
        console.log(response);
    });
}
function Modificar(){
    
}
function Eliminar(){
    
}
function Validar(){
    Nombre=document.getElementById('Nombre').value;
    RFC=document.getElementById('RFC').value;
    Correo=document.getElementById('Correo').value;
    Telefono=document.getElementById('Telefono').value;
    if(Nombre == ""|| RFC == "" || Correo == "" || Telefono == ""){
        return false;
    }else 
     return true;
}
function retornarDatos(accion){
    return{
        "Nombre": document.getElementById('Nombre').value,
        "RFC": document.getElementById('RFC').value,
        "Correo": document.getElementById('Correo').value,
        "Telefono": document.getElementById('Telefono').value
    };

}