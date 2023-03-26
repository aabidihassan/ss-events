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
<<<<<<< HEAD
=======
  let i = 0;
  _data_libelle_service_vues.forEach(element => {
    libs.innerHTML = libs.innerHTML + '<span class="mr-2"><i class="fas fa-circle '+colors_libelle[i]+'"></i>'+element+'</span>';
    i++;
  });
>>>>>>> 78bd854b94d8c18d8ac214f5efce8f3dbbb4aa81
}
function VparVilles() {
  document.getElementById('titel_charts_Pie_Vue').innerText = "Chart Vues Par Villes";  
  ctxVueV.style.display = "block";
  ctxVueS.style.display = "none";
<<<<<<< HEAD
=======
  libs.innerHTML = "";
  let i = 0;
  _data_libelle_cities.forEach(element => {
    libs.innerHTML = libs.innerHTML + '<span class="mr-2"><i class="fas fa-circle '+colors_libelle[i]+'"></i>'+element+'</span>';
    i++;
  });
>>>>>>> 78bd854b94d8c18d8ac214f5efce8f3dbbb4aa81
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
<<<<<<< HEAD
var myPieChart = new Chart(ctxContactS, {
=======
var myPieChartCS = new Chart(ctxContactS, {
>>>>>>> 78bd854b94d8c18d8ac214f5efce8f3dbbb4aa81
  type: 'doughnut',
  data: {
    labels: _data_libelle_service_Contact,
    datasets: [{
<<<<<<< HEAD
      data: _data_myPieChartCantactVille,
=======
      data: _data_myPieChartCantactService,
>>>>>>> 78bd854b94d8c18d8ac214f5efce8f3dbbb4aa81
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
<<<<<<< HEAD
function CparServices() {
  document.getElementById('titel_charts_Pie_Contact').innerText = "Chart Contact Par Services"; 
  ctxContactV.style.display = "block";
  ctxContactS.style.display = "none";
=======
var libsC = document.getElementById("keys_libelle_contact");
function CparServices() {
  document.getElementById('titel_charts_Pie_Contact').innerText = "Chart Contact Par Services"; 
  ctxContactS.style.display = "block";
  ctxContactV.style.display = "none";
  libsC.innerHTML = "";
  let i = 0;
  _data_libelle_service_Contact.forEach(element => {
    libsC.innerHTML = libsC.innerHTML + '<span class="mr-2"><i class="fas fa-circle '+colors_libelle[i]+'"></i>'+element+'</span>';
    i++;
  });
>>>>>>> 78bd854b94d8c18d8ac214f5efce8f3dbbb4aa81
}
function CparVilles() {
  document.getElementById('titel_charts_Pie_Contact').innerText = "Chart Contact Par Villes";  
  ctxContactV.style.display = "block";
  ctxContactS.style.display = "none";
<<<<<<< HEAD
=======
  libsC.innerHTML = "";
  let i = 0;
  _data_libelle_cities.forEach(element => {
    libsC.innerHTML = libsC.innerHTML + '<span class="mr-2"><i class="fas fa-circle '+colors_libelle[i]+'"></i>'+element+'</span>';
    i++;
  });
>>>>>>> 78bd854b94d8c18d8ac214f5efce8f3dbbb4aa81
}