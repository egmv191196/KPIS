function numeroFilas(){
    var resume_table = document.getElementById("cuerpo").getElementsByTagName('tr');
    return resume_table.length;
}
function recorrerInputs(a){
    var concepto=[];
    var lista_Conceptos=[];
    for (var i = 0; i<a; i++) {
        console.log(valor=$('#concepto_'+(i+1)).val());
        concepto=[(i+1),$('#concepto_'+(i+1)).val()];
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
        '<input type="string" class="form-control" onchange="sumaPorcentaje(numeroFilas());" id="concepto_'+(i+1)+'" ></td><tr>';
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
function verificarTabla(){
    var resume_table = document.getElementById("cuerpo");
    for (var i = 0, row; row = resume_table.rows[i]; i++) {
        if (row.cells[1].innerText=="") {//InnerText da el valor dentro de la celda
            return 0;
        }
    }
    return 1;
}