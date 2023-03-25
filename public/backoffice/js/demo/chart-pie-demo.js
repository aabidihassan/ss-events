// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
var colors_libelle = ["text-primary","text-info","text-success","text-warning","text-danger",'text-dark']
// Pie Chart Vues par ville
var ctxVueV = document.getElementById("myPieChartVuesVille");
var myPieChart = new Chart(ctxVueV, {
  type: 'doughnut',
  data: {
    labels: _data_libelle_cities,
    datasets: [{
      data: _data_myPieChartVeusVille,
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
// Pie Chart Vues par service
var ctxVueS = document.getElementById("myPieChartVuesService");
var myPieChart = new Chart(ctxVueS, {
  type: 'doughnut',
  data: {
    labels: _data_libelle_service_vues,
    datasets: [{
      data: _data_myPieChartVeusService,
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
var libs = document.getElementById("keys_libelle_vues");
function VparServices() {
  document.getElementById('titel_charts_Pie_Vue').innerText = "Chart Vues Par Services";
  ctxVueV.style.display = "none";
  ctxVueS.style.display = "block";
  libs.innerHTML = "";
}
function VparVilles() {
  document.getElementById('titel_charts_Pie_Vue').innerText = "Chart Vues Par Villes";  
  ctxVueV.style.display = "block";
  ctxVueS.style.display = "none";
} 

// Pie Chart Contact par ville
var ctxContactV= document.getElementById("myPieChartCantactVille");
var myPieChart = new Chart(ctxContactV, {
  type: 'doughnut',
  data: {
    labels: _data_libelle_cities,
    datasets: [{
      data: _data_myPieChartCantactVille,
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
// Pie Chart Contact par service
var ctxContactS= document.getElementById("myPieChartCantactService");
var myPieChart = new Chart(ctxContactS, {
  type: 'doughnut',
  data: {
    labels: _data_libelle_service_Contact,
    datasets: [{
      data: _data_myPieChartCantactVille,
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
function CparServices() {
  document.getElementById('titel_charts_Pie_Contact').innerText = "Chart Contact Par Services"; 
  ctxContactV.style.display = "block";
  ctxContactS.style.display = "none";
}
function CparVilles() {
  document.getElementById('titel_charts_Pie_Contact').innerText = "Chart Contact Par Villes";  
  ctxContactV.style.display = "block";
  ctxContactS.style.display = "none";
}