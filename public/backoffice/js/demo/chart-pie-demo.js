// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChartVues");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: _data_libelle_cities,
    datasets: [{
      data: _data_myPieChartVeus,
      backgroundColor: [ '#4e73df','#36b9cc','#1cc88a','#f6c23e','#e74a3b','#5a5c69'],
      hoverBackgroundColor: [ '#2e59d9','#2c9faf','#17a673','#fbbd1e','#e5301f','#333438'],
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


// Pie Chart Example
var ctx = document.getElementById("myPieChartCantact");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: _data_libelle_cities,
    datasets: [{
      data: _data_myPieChartCantact,
      backgroundColor: [ '#4e73df','#36b9cc','#1cc88a','#f6c23e','#e74a3b','#5a5c69'],
      hoverBackgroundColor: [ '#2e59d9','#2c9faf','#17a673','#fbbd1e','#e5301f','#333438'],
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
