// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Vues
var paramsVue = document.getElementById("myPieChartVues");
function chargeChartPieVues(ctx,_data_myPieChartVeus) {
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
}
function VparServices() {
  chargeChartPieVues(paramsVue,_data_myPieChartVeusService);
  document.getElementById('titel_charts_Pie_Vue').innerText = "Chart Vues Par Services";
}

function VparVilles() {
  chargeChartPieVues(paramsVue,_data_myPieChartVeusVille); 
  document.getElementById('titel_charts_Pie_Vue').innerText = "Chart Vues Par Villes";  
}
VparVilles();

// Pie Chart Contact
var paramsContact= document.getElementById("myPieChartCantact");
function chargeChartPieContact(ctx,_data_myPieChartCantact) {
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
}

function CparServices() {
  chargeChartPieContact(paramsContact,_data_myPieChartCantactService);
  document.getElementById('titel_charts_Pie_Contact').innerText = "Chart Contact Par Services";
}

function CparVilles() {
  chargeChartPieContact(paramsContact,_data_myPieChartCantactVille); 
  document.getElementById('titel_charts_Pie_Contact').innerText = "Chart Contact Par Villes";  
}
CparVilles();