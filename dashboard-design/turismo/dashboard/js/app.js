
// Funcion para ver los resultados
function ver_respuestas(id) {
    
    $.ajax({
        type: 'POST',
        url:  'php/buscar_respuestas.php',
        data: {id:id},
        success: function(result) {
            $('#infoModal').modal('show');
            $('#ModalRespuestas').html(result);
        }
    });

}


var pieChart = new Chart($('#canvas-5'), {
    type: 'pie',
    data: {
      labels: ['1', '2', '3', '4', '5'],
      datasets: [{
        data: [20, 20, 20, 20, 20],
        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#E7E9ED'],
        hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#E7E9ED']
      }]
    },
    options: {
      responsive: true
    }
});