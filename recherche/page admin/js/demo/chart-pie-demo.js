// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [ "utilisateur premium", "utilisateur normal", "utilisateur non actif"],
    datasets: [{
      data: [50, 30, 20],
      backgroundColor: [ '#3e95cd', '#8e5ea2', '#f442bf'],
    }],
  },
});
