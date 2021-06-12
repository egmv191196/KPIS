$(document).ready(function(){
    var area=$("#Area").val();
    switch (area) {
        case '1':
            vac_Ocupadas();
            Descriptivos();
            Bajas_Personal();
            propuestas_Mejora();
            orden_Trabajo();
            reporte_Nomina();
        break;
        case '2':
            reporte_Facturacion();
            CXP();
            CXC();
            saldo_Bancos();
            monto_impuestos()
            consumo_Efectivale();
            cartera_Vencida();
        break;
        default:
            break;
    }
        
        
        
    
}) 
function vac_Ocupadas(){
    var datos = {
        "Indicador" : 'R4B',
        "Cantidad" : 'A'
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
        "Indicador" : 'R6B',
        "Cantidad" : 'A'
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
        "Indicador" : 'R10A',
        "Cantidad" : 'A'
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
function propuestas_Mejora(){
    var datos = {
        "Indicador" : 'R3B',
        "Cantidad" : 'A'
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
        title: 'Propuestas de mejora implementadas',
        xaxis: {
            title: 'Mes',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Propuestas implementadas por mes',
            showline: false
        }
        };
        Plotly.newPlot('propuestas_Mejora', data,layout);

    }).fail(function(response){
        console.log("error"+response);
    });     
}
function orden_Trabajo(){
    var x1=[];
    var y1=[];
    var x2=[];
    var y2=[];
    var datos = {
        "Indicador" : 'R1A',
        "Cantidad" : 'A'
    };
    $.ajax({
        type: "POST",
        async:false,
        url: "../Script/graficas.php",
        data: {
            "Indicador" : 'R1A',
            "Cantidad" : 'A'
        },
    }).done(function(response){
        var datos=JSON.parse(response);
        datos.forEach(function(elemento) {
            x1.push(elemento[0]);
            y1.push(elemento[1]);       
        });
    }).fail(function(response){
        console.log("error"+response);
    });
    $.ajax({
        type: "POST",
        async:false,
        url: "../Script/graficas.php",
        data: {
            "Indicador" : 'R1B',
            "Cantidad" : 'A'
        },
    }).done(function(response){
        var datos=JSON.parse(response);
        datos.forEach(function(elemento) {
            x2.push(elemento[0]);
            y2.push(elemento[1]);       
        });
    }).fail(function(response){
        console.log("error"+response);
    });  
    var data1 = {
        x: x1,
        y: y1,
        type: 'scatter'
    };
    var data2 = {
        x: x2,
        y: y2,
        type: 'scatter'
    };
    var data=[data1,data2];
    var layout = {
    title: 'Orden de trabajo atendidas',
    xaxis: {
        title: 'Quincena',
        showgrid: false,
        zeroline: false
    },
    yaxis: {
        title: 'Ordenes atendidas quincenalmente',
        showline: false
    }
    };
    Plotly.newPlot('orden_Trabajo', data,layout);   
}
function reporte_Nomina(){
    var datos = {
        "Indicador" : 'R5A',
        "Cantidad" : 'A'
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
        title: 'Reportes de nomina',
        xaxis: {
            title: 'Quincena',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Reportes reportados',
            showline: false
        }
        };
        Plotly.newPlot('reporte_Nomina', data,layout);

    }).fail(function(response){
        console.log("error"+response);
    });     
}

function saldo_Bancos(){
    var datos = {
        "Indicador" : 'R19A',
        "Cantidad" : 'A'
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
        title: 'Saldo en bancos',
        xaxis: {
            title: 'Semana',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Saldo',
            showline: false
        }
        };
        Plotly.newPlot('saldo_Bancos', data,layout);

    }).fail(function(response){
        console.log("error"+response);
    });     
}
function CXP(){
    var datos = {
        "Indicador" : 'R16A',
        "Cantidad" : 'A'
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
        title: 'Cuentas por pagar',
        xaxis: {
            title: 'Semana',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Saldo por pagar',
            showline: false
        }
        };
        Plotly.newPlot('CXP', data,layout);

    }).fail(function(response){
        console.log("error"+response);
    });     
}
function CXC(){
    var datos = {
        "Indicador" : 'R17A',
        "Cantidad" : 'A'
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
        title: 'Cuentas por cobrar',
        xaxis: {
            title: 'Semana',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Saldo por cobrar',
            showline: false
        }
        };
        Plotly.newPlot('CXC', data,layout);

    }).fail(function(response){
        console.log("error"+response);
    });     
}
function consumo_Efectivale(){
    var datos = {
        "Indicador" : 'R21A',
        "Cantidad" : 'A'
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
        title: 'Consumo efectivale',
        xaxis: {
            title: 'Semana',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Consumo por semana',
            showline: false
        }
        };
        Plotly.newPlot('consumo_Efectivale', data,layout);

    }).fail(function(response){
        console.log("error"+response);
    });     
}
function cartera_Vencida(){
    var datos = {
        "Indicador" : 'R22A',
        "Cantidad" : 'A'
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
        title: 'Cartera vencida',
        xaxis: {
            title: 'Semana',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Monto vencido',
            showline: false
        }
        };
        Plotly.newPlot('cartera_Vencida', data,layout);

    }).fail(function(response){
        console.log("error"+response);
    });     
}
function reporte_Facturacion(){
    var datos = {
        "Indicador" : 'R15A',
        "Cantidad" : 'A'
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
        title: 'Reportes de facturacion',
        xaxis: {
            title: 'Mes',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Monto Facturado',
            showline: false
        }
        };
        Plotly.newPlot('reporte_Facturacion', data,layout);

    }).fail(function(response){
        console.log("error"+response);
    });     
}
function monto_impuestos(){
    var datos = {
        "Indicador" : 'R20A',
        "Cantidad" : 'A'
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
        title: 'Monto de impuestos',
        xaxis: {
            title: 'Mes',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Impuesto pagado',
            showline: false
        }
        };
        Plotly.newPlot('monto_Impuestos', data,layout);

    }).fail(function(response){
        console.log("error"+response);
    });     
}