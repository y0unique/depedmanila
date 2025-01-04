$(document).ready(function() {
    // Fetch data from the server using AJAX
    $.ajax({
        url: 'includes/fetchdata/piechartfetch.php',
        method: 'GET',
        success: function(response) {
            var data = JSON.parse(response);

            // Extract data from the response
            var labels = data.labels;
            var chartData = data.chartData;
            var backgroundColors =  ['#4e73df', '#1cc88a', '#36b9cc','#ff5733', '#33ff57', '#5733ff', '#33ffff', '#ff33f7'];
            var hoverBackgroundColors = ['#2e59d9', '#17a673', '#2c9faf','#9d2ed9', '#3e17a6', '#7c2c9f', '#3f2ca6', '#6c33f7'];

            updatePieChart(labels, chartData, backgroundColors, hoverBackgroundColors);
    
            // Update the legend with the fetched labels and specific colors
            var legendColors = ['#4e73df', '#1cc88a', '#36b9cc','#ff5733', '#33ff57', '#5733ff', '#33ffff', '#ff33f7'];
            updateLegend(labels, legendColors, chartData);
        }
    });
  });
  
function updatePieChart(labels, chartData, backgroundColors, hoverBackgroundColors) {
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: labels,
        datasets: [{
          data: chartData,
          backgroundColor: backgroundColors,
          hoverBackgroundColor: hoverBackgroundColors,
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });
}

function updateLegend(labels, colors, chartData) {
    // Get the legend container
    var legendContainer = document.getElementById("pie-chart-legend");

    // Clear existing content
    legendContainer.innerHTML = '';

    // Iterate over labels and create legend items
    labels.forEach(function(label, index) {
        var legendItem = document.createElement('span');
        legendItem.className = 'mr-2';
        legendItem.innerHTML = '<div class="row"><span class="col-3 d-flex justify-content-end mr-2"><i class="fas fa-circle" style="color: ' + colors[index] + ';"></i></span><p class="col-6 d-flex justify-content-start">' + label + ' = ' + chartData[index] + '</p></div>';
        legendContainer.appendChild(legendItem);
    });
}
