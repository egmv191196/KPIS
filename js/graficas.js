$(document).ready(function(){
    vac_Ocupadas();
    Descriptivos();
    Bajas_Personal()
}) 
function vac_Ocupadas(){
    var datos = {
        "Indicador" : 'R4B'
    };
    $.ajax({
        type: "POST",
        url: "../Script/graficas.php",
        data: datos,
    }).done(function(response){
        var datos=JSON.parse(response);
        var x=[];
        var y=[];
        datos.forEach(function(elemento) {
            x.push(elemento[0]);
            y.push(elemento[1]);       
        });
        var data = [{
            x: x,
            y: y,
            type: 'scatter'
        }];
        var layout = {
        title: 'Numero de vacantes',
        xaxis: {
            title: 'Mes',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Vacantes ocupadas',
            showline: false
        }
        };
        Plotly.newPlot('VacantesOcupadas', data, layout);
    }).fail(function(response){
        console.log("error"+response);
    });     
}
function Descriptivos(){
    var datos = {
        "Indicador" : 'R6B'
    };
    $.ajax({
        type: "POST",
        url: "../Script/graficas.php",
        data: datos,
    }).done(function(response){
        var datos=JSON.parse(response);
        var x=[];
        var y=[];
        datos.forEach(function(elemento) {
            x.push(elemento[0]);
            y.push(elemento[1]);       
        });
        var data = [{
            x: x,
            y: y,
            type: 'scatter'
        }];
        var layout = {
        title: 'Descriptivos realizados',
        xaxis: {
            title: 'Quincena',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Descriptivos entregados',
            showline: false
        }
        };
        Plotly.newPlot('Descriptivos', data,layout);

    }).fail(function(response){
        console.log("error"+response);
    });     
}
function Bajas_Personal(){
    var datos = {
        "Indicador" : 'R10A'
    };
    $.ajax({
        type: "POST",
        url: "../Script/graficas.php",
        data: datos,
    }).done(function(response){
        var datos=JSON.parse(response);
        var x=[];
        var y=[];
        datos.forEach(function(elemento) {
            x.push(elemento[0]);
            y.push(elemento[1]);       
        });
        var data = [{
            x: x,
            y: y,
            type: 'scatter'
        }];
        var layout = {
        title: 'Bajas de personal',
        xaxis: {
            title: 'Mes',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Bajas por mes',
            showline: false
        }
        };
        Plotly.newPlot('bajas_Personal', data,layout);

    }).fail(function(response){
        console.log("error"+response);
    });     
}

