$(document).ready(function(){
    var area=$("#Area").val();
    switch (area) {
        case '1':
            vac_Ocupadas();
            Bajas_Personal();
            orden_Trabajo();
            horas_Extras()
        break;
        case '2':
            reporte_Facturacion();
            CXP();
            CXC();
            saldo_Bancos();
            monto_impuestos()
            consumo_Efectivale();
            cartera_Vencida();
            cVSg();
            estimacionesProyecto();
            reporte_Nomina();
        break;
        case '3':
            Retrabajos();
            Inconformidades();
            plazosCumplidos();
            AvanceProyectos();
            conceptosProyectos();
        break;
        case '4':
            estimacionesProyecto();
            horas_Extras();
            cVSg();
            orden_Trabajo();
            reporte_Nomina();
            horas_Extras();
            //reporte_Facturacion();
            saldo_Bancos();
            //monto_impuestos()
            consumo_Efectivale();
            AvanceProyectos();
            tVSc();
            cxcVScxp();
            plazosCumplidos();
            facturacionVSimpuestos()
        break;
        default:
        break;
    }  
}) 
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
        type: 'scatter',
        name: 'Recibidas'
    };
    var data2 = {
        x: x2,
        y: y2,
        type: 'scatter',
        name:'Atendidas'
    };
    var data=[data1,data2];
    var layout = {
    title: '<b>Orden de trabajo <br>(Materiales) ',
    xaxis: {
        title: 'Quincena',
        showgrid: false,
        zeroline: false
    },
    yaxis: {
        title: 'Ordenes ',
        showline: false
    },
    margin: {
        l: 50,
        r: 10,
        t: 70,
        b: 35
      },
    widht:350,
    height: 300
    };
    var config={
        responsive: true,
        displayModeBar: false
    };
    Plotly.newPlot('orden_Trabajo', data,layout, config);   
}
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
        title: '<b>Numero de vacantes',
        xaxis: {
            title: 'Mes',
            showgrid: false,
            zeroline: false

        },
        yaxis: {
            title: 'Vacantes ocupadas',
            showline: false
        },
        margin: {
            l: 50,
            r: 10,
            t: 70,
            b: 35
          },
        widht:350,
        height: 300
        };
        var config={
            responsive: true,
            displayModeBar: false
        };
        Plotly.newPlot('VacantesOcupadas', data, layout, config);
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
        title: '<b>Bajas de personal',
        xaxis: {
            title: 'Mes',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Bajas por mes',
            showline: false
        },
        margin: {
            l: 50,
            r: 10,
            t: 70,
            b: 35
          },
        widht:350,
        height: 300
        };
        var config={
            responsive: true,
            displayModeBar: false
        };
        Plotly.newPlot('bajas_Personal', data,layout, config);

    }).fail(function(response){
        console.log("error"+response);
    });     
}
function horas_Extras(){
    var datos = {
        "Indicador" : 'R11A',
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
        title: '<b>Horas extras',
        xaxis: {
            title: 'Quincena',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Horas extras por quincena',
            showline: false
        },
        margin: {
            l: 50,
            r: 10,
            t: 70,
            b: 35
          },
        widht:350,
        height: 300
        };
        var config={
            responsive: true,
            displayModeBar: false
        };
        Plotly.newPlot('horas_Extras', data,layout, config);

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
        title: '<b>Descriptivos realizados',
        xaxis: {
            title: 'Quincena',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Descriptivos entregados',
            showline: false
        },
        widht:350,
        height: 400
        };
        var config={
            responsive: true,
            displayModeBar: false
        };
        Plotly.newPlot('Descriptivos', data,layout, config);

    }).fail(function(response){
        console.log("error"+response);
    });     
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
        var xx=[];
        var numDatos=0,totalSuma=0.0, Media=0;
        datos.forEach(function(elemento) {
            totalSuma=parseFloat(totalSuma)+parseFloat(elemento[1]);
            numDatos=numDatos+1;
            x.push(elemento[0]);
            y.push(elemento[1]);       
        });
        Media=totalSuma/numDatos;
        for (var i = 0; i < numDatos; i++) {
            xx.push(Media);   
        }
        var gra1 = {
            x: x,
            y: y,
            name: 'Monto de nomina',
            type: 'scatter'
        };
        var gra2 = {
            x: x,
            y: xx,
            name: 'Media',
            type: 'scatter'
        };
        var data=[gra1, gra2];
        var layout = {
        title: '<b>Montos de nomina',
        xaxis: {
            title: 'Quincena',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Reportes reportados',
            showline: false
        },
        margin: {
            l: 50,
            r: 25,
            t: 70,
            b: 50
          },
        widht:350,
        height: 300
        };
        var config={
            responsive: true,
            displayModeBar: false
        };
        Plotly.newPlot('reporte_Nomina', data,layout, config);

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
            mode: 'lines+markers'
        }];
        var layout = {
        title: '<b>Saldo en bancos',
        xaxis: {
            title: 'Semana',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Saldo',
            showline: false
        },
        margin: {
            l: 50,
            r: 25,
            t: 70,
            b: 50
          },
        widht:350,
        height: 300
        };
        var config={
            responsive: true,
            displayModeBar: false
        };
        Plotly.newPlot('saldo_Bancos', data,layout, config);

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
        title: '<b>Cuentas por pagar',
        xaxis: {
            title: 'Semana',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Saldo por pagar',
            showline: false
        },
        margin: {
            l: 50,
            r: 10,
            t: 70,
            b: 35
          },
        widht:350,
        height: 300
        };
        var config={
            responsive: true,
            displayModeBar: false
        };
        Plotly.newPlot('CXP', data,layout, config);

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
        title: '<b>Cuentas por cobrar',
        xaxis: {
            title: 'Semana',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Saldo por cobrar',
            showline: false
        },
        margin: {
            l: 50,
            r: 10,
            t: 70,
            b: 35
          },
        widht:350,
        height: 300
        };
        var config={
            responsive: true,
            displayModeBar: false
        };
        Plotly.newPlot('CXC', data,layout, config);

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
        var xx=[];
        var numDatos=0,totalSuma=0.0, Media=0;
        datos.forEach(function(elemento) {
            totalSuma=parseFloat(totalSuma)+parseFloat(elemento[1]);
            numDatos=numDatos+1; 
            x.push(elemento[0]);
            y.push(elemento[1]);       
        });
        Media=totalSuma/numDatos;
        for (var i = 0; i < numDatos; i++) {
            xx.push(Media);   
        }
        var gra1 = {
            x: x,
            y: y,
            name: 'Consumo efectivale',
            type: 'scatter'
        };
        var gra2 = {
            x: x,
            y: xx,
            name: 'Media',
            type: 'scatter'
        };
        var data=[gra1, gra2];

        var layout = {
        title: '<b>Consumo efectivale',
        xaxis: {
            title: 'Semana',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Consumo por semana',
            showline: false
        },
        margin: {
            l: 50,
            r: 25,
            t: 70,
            b: 50
          },
        widht:350,
        height: 300
        };
        var config={
            responsive: true,
            displayModeBar: false
        };
        Plotly.newPlot('consumo_Efectivale', data,layout, config);
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
        title: '<b>Cartera vencida',
        xaxis: {
            title: 'Semana',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Monto vencido',
            showline: false
        },
        margin: {
            l: 50,
            r: 10,
            t: 70,
            b: 35
          },
        widht:350,
        height: 300
        };
        var config={
            responsive: true,
            displayModeBar: false
        };
        Plotly.newPlot('cartera_Vencida', data,layout, config);

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
            type: 'Scatter'
        }];
        var layout = {
        title: '<b>Monto de facturacion',
        xaxis: {
            title: 'Mes',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Monto Facturado',
            showline: false
        },
        margin: {
            l: 50,
            r: 25,
            t: 70,
            b: 50
          },
        widht:350,
        height: 300
        };
        var config={
            responsive: true,
            displayModeBar: false
        };
        Plotly.newPlot('reporte_Facturacion', data,layout, config);

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
        title: '<b>Monto de impuestos',
        xaxis: {
            title: 'Mes',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Impuesto pagado',
            showline: false
        },
        margin: {
            l: 50,
            r: 25,
            t: 70,
            b: 50
          },
        widht:350,
        height: 300
        };
        var config={
            responsive: true,
            displayModeBar: false
        };
        Plotly.newPlot('monto_Impuestos', data,layout, config);
    
    }).fail(function(response){
        console.log("error"+response);
    });      
}
function AvanceProyectos(){
    var datos = {
        Operacion : "Avances"
    };
    $.ajax({
        type: "POST",
        url: "../Script/Proyecto.php",
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
            x: y,
            y: x,
            type: 'bar',
            orientation:'h'
        }];
        var layout = {
        title: '<b>Avance por proyecto',
        xaxis: {
            title: 'Porcentaje avanzado',
            range: [0, 100],
            showgrid: true,
            zeroline: false
        },
        yaxis: {
            showline: false
        },
        margin: {
            l: 280,
            r: 20,
            t: 50,
            b: 30
          },
        widht:350,
        height: 300
        };
        var config={
            responsive: true,
            displayModeBar: false
        };
        Plotly.newPlot('avanceProyectos', data,layout, config);

    }).fail(function(response){
        console.log("error"+response);
    });     
}
function Retrabajos(){
    var datos = {
        "Indicador" : 'R27A',
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
        title: '<b>Retrabajos por semana',
        xaxis: {
            title: 'Semana',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Retrabajos por semana',
            showline: false
        },
        margin: {
            l: 50,
            r: 25,
            t: 70,
            b: 50
          },
        widht:350,
        height: 300
        };
        var config={
            responsive: true,
            displayModeBar: false
        };
        Plotly.newPlot('Retrabajos', data,layout, config);

    }).fail(function(response){
        console.log("error"+response);
    });     
}
function Inconformidades(){
    var datos = {
        "Indicador" : 'R28A',
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
        title: '<b>Inconformidades por semana',
        xaxis: {
            title: 'Semana',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Inconformidades',
            showline: false
        },
        margin: {
            l: 50,
            r: 25,
            t: 70,
            b: 50
          },
        widht:350,
        height: 300
        };
        var config={
            responsive: true,
            displayModeBar: false
        };
        Plotly.newPlot('Inconformidades', data,layout, config);

    }).fail(function(response){
        console.log("error"+response);
    });     
}
function estimacionesProyecto(){
    var x1=[];
    var y1=[];
    var x2=[];
    var y2=[];
    $.ajax({
        type: "POST",
        async:false,
        url: "../Script/graficas.php",
        data: {
            "Indicador" : 'R30A',
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
            "Indicador" : 'R30B',
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
        type: 'scatter',
        name: 'Estimaciones programadas'
    };
    var data2 = {
        x: x2,
        y: y2,
        type: 'scatter',
        name:'Cumplidas'
    };
    var data=[data1,data2];
    var layout = {
    title: '<b>Estimaciones entregadas',
    xaxis: {
        title: 'Semana',
        showgrid: false,
        zeroline: false
    },
    yaxis: {
        title: 'Entregas',
        showline: false
    },
    margin: {
        l: 50,
        r: 25,
        t: 70,
        b: 50
      },
    widht:350,
    height: 300
    };
    var config={
        responsive: true,
        displayModeBar: false
    };
    Plotly.newPlot('Estimaciones', data,layout, config);
}
function plazosCumplidos(){
    var x1=[];
    var y1=[];
    var x2=[];
    var y2=[];
    $.ajax({
        type: "POST",
        async:false,
        url: "../Script/graficas.php",
        data: {
            "Indicador" : 'R29A',
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
            "Indicador" : 'R29B',
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
        type: 'scatter',
        name: 'Programadas'
    };
    var data2 = {
        x: x2,
        y: y2,
        type: 'scatter',
        name:'Cumplidas'
    };
    var data=[data1,data2];
    var layout = {
    title: '<b>Plazos cumplidos',
    xaxis: {
        title: 'Semana',
        showgrid: false,
        zeroline: false
    },
    yaxis: {
        title: 'Entregas',
        showline: false
    },
    margin: {
        l: 50,
        r: 10,
        t: 70,
        b: 35
      },
    widht:350,
    height: 300
    };
    var config={
        responsive: true,
        displayModeBar: false
    };
    Plotly.newPlot('plazosCumplidos', data,layout, config);
}
//GT VS GC
function cVSg(){
    var datos = {
        "Operacion" : 'cVSg',
    };
    $.ajax({
        type: "POST",
        url: "../Script/graficas2.php",
        data: datos,
    }).done(function(response){
        var datos=JSON.parse(response);
        var nombre=[];
        var contrato=[];
        var gastado=[];
        var contrato1=[];
        var gastado1=[];
        datos.forEach(function(elemento) {
            nombre.push(elemento[0]);
            contrato.push(elemento[1]);
            gastado.push(elemento[2]); 
            contrato1.push('$'+elemento[1]);
            gastado1.push('$'+elemento[2]);       
        });
        var gra1 = {
            x: nombre,
            y: contrato,
            name: 'Presupuesto',
            type: 'bar',
            text: contrato1,
            textposition: 'auto',
            hoverinfo: 'none',
            opacity: 1
        };
        var gra2 = {
            x: nombre,
            y: gastado,
            name: 'Gastado',
            type: 'bar',
            text: gastado1,
            textposition: 'auto',
            hoverinfo: 'none',
            opacity: 1
        };
        var data=[gra1, gra2];
        var layout = {
            title: '<b>Costos por proyecto',
            barmode: 'group',
            margin: {
                l: 50,
                r: 10,
                t: 70,
                b: 35
              },
            widht:350,
            height: 300
        };
        var config={
            responsive: true,
            displayModeBar: false
        };
        Plotly.newPlot('CostosProyecto', data,layout, config);

    }).fail(function(response){
        console.log("error"+response);
    }); 
}
function tVSc(){
    var datos = {
        "Operacion" : 'tVSc',
    };
    $.ajax({
        type: "POST",
        url: "../Script/graficas2.php",
        data: datos,
    }).done(function(response){
        var datos=JSON.parse(response);
        var nombre=[];
        var Avanzado=[];
        var Avanzado1=[];
        var gastado=[];
        var gastado1=[];
        datos.forEach(function(elemento) {
            nombre.push(elemento[0]);
            Avanzado.push(elemento[1]);
            gastado.push(elemento[2]);
            Avanzado1.push(elemento[1]+'%');
            gastado1.push(elemento[2]+'%');        
        });
        var gra1 = {
            x: nombre,
            y: Avanzado,
            name: 'Porcentaje Avanzado',
            type: 'bar',
            text: Avanzado1,
            textposition: 'auto',
            hoverinfo: 'none',
            opacity: 1            
        };
        var gra2 = {
            x: nombre,
            y: gastado,
            name: 'Porcentaje Gastado',
            type: 'bar',
            text: gastado1,
            textposition: 'auto',
            hoverinfo: 'none',
            opacity: 1 
        };
        var data=[gra1, gra2];
        var layout = {
            title: 'Proyectos <br><b>Avance Fisico vs Avance Financiero',
            barmode: 'group',
            margin: {
                l: 50,
                r: 25,
                t: 70,
                b: 50
              },
            widht:350,
            height: 300
        };
        var config={
            responsive: true,
            displayModeBar: false
        };
        Plotly.newPlot('tVSc', data,layout, config);

    }).fail(function(response){
        console.log("error"+response);
    }); 
}
function cxcVScxp(){
    var x1=[];
    var y1=[];
    var x2=[];
    var y2=[];
    $.ajax({
        type: "POST",
        async:false,
        url: "../Script/graficas.php",
        data: {
            "Indicador" : 'R16A',
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
            "Indicador" : 'R17A',
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
        mode: 'lines+markers',
        name: 'CXP'
    };
    var data2 = {
        x: x2,
        y: y2,
        mode: 'lines+markers',
        name:'CXC'
    };
    var data=[data1,data2];
    var layout = {
        title: '<b>CXP VS CXC',
        xaxis: {
            title: 'Semana',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Ordenes ',
            showline: false
        },
        margin: {
            l: 50,
            r: 25,
            t: 70,
            b: 50
          },
        widht:350,
        height: 300
    };
    var config={
        responsive: true,
        displayModeBar: false
    };
    Plotly.newPlot('cxcVScxp', data,layout, config); 
}
function conceptosProyectos(){
    var datos = {
        Operacion : "graficaInicioGT"
    };
    $.ajax({
        type: "POST",
        url: "../Script/Proyecto.php",
        data: datos,
    }).done(function(response){
        //alert(Response);
        var datos=JSON.parse(response);
        var i=0;

        var x=[];
        var y=[];
        while(i<datos.length){
            x=[];
            y=[];
            console.log(datos[i]+ " : ");
            var idDiv=datos[i][0];
            var Nombre=datos[i][1];
            var numConceptos=datos[i][2];
            i++;
            for (let x1 = 0; x1 < numConceptos; x1++) {
                x.push(datos[i][2]);
                y.push(datos[i][1]);
                i++;
            }
            var data = [{
                x: x,
                y: y,
                type: 'bar',
                orientation:'h',
                text: x,
                textposition: 'auto',
                hoverinfo: 'none',
                opacity: 1
            }];
            var layout = {
            title: '<b>'+Nombre,
            xaxis: {
                title: 'Porcentaje avanzado',
                range: [0, 100],
                showgrid: true,
                zeroline: false
            },
            yaxis: {
                showline: false
            },
            margin: {
                l: 150,
                r: 20,
                t: 50,
                b: 30
              },
            widht:350,
            height: 300
            };
            var config={
                responsive: true,
                displayModeBar: false
            };
            Plotly.newPlot(idDiv, data,layout, config);
            


        }
        

    }).fail(function(response){
        console.log("error"+response);
    });     

}
function facturacionVSimpuestos(){
    var x1=[];
    var y1=[];
    var x2=[];
    var y2=[];
    $.ajax({
        type: "POST",
        async:false,
        url: "../Script/graficas.php",
        data: {
            "Indicador" : 'R15A',
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
            "Indicador" : 'R20A',
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
        mode: 'lines+markers',
        name: 'Monto de facturacion'
    };
    var data2 = {
        x: x2,
        y: y2,
        mode: 'lines+markers',
        name:'Monto de impuestos'
    };
    var data=[data1,data2];
    var layout = {
        title: '<b>Monto Facturacion Vs Monto impuestos',
        xaxis: {
            title: 'Mes',
            showgrid: false,
            zeroline: false
        },
        yaxis: {
            title: 'Montos',
            showline: false
        },
        margin: {
            l: 50,
            r: 25,
            t: 70,
            b: 50
          },
        widht:350,
        height: 300
    };
    var config={
        responsive: true,
        displayModeBar: false
    };
    Plotly.newPlot('facturacionVSimpuestos', data,layout, config); 
}
