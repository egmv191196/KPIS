$(document).ready(function(){
    Grafica1();
}) 
function Grafica1(){
    var datos = {
        "Indicador" : 'R4B'
    };
    $.ajax({
        type: "POST",
        url: "../Script/graficas.php",
        data: datos,
    }).done(function(response){
        alert(response);
    }).fail(function(response){
        console.log("error"+response);
    });
    var data = [
        {
          x: ['2013-10-04 22:23:00', '2013-11-04 22:23:00', '2013-12-04 22:23:00'],
          y: [1, 3, 6],
          type: 'scatter'
        }
      ];
      
      Plotly.newPlot('myDiv', data);
      Plotly.newPlot('myDiv2', data);
}
