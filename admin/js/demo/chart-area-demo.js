// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
new Chart(document.getElementById("line-chart"), {
    type: 'line',
    data: {
          labels: ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Décembre"],
        datasets: [{
            data: [2000,500,850,900,1500,4000,1000,700,750,520,4000,5000],
            label: "Nombre de colis",
            borderColor: "#3e95cd",
            fill: false
        }, {
            data: [282,350,411,502,635,809,947,1402,3700,5267,4000,4000],
            label: "Nombre de trajets",
            borderColor: "#8e5ea2",
            fill: false
        },
        ]
    },
    options: {
        title: {
            display: true,
            text: 'distribution des colis et trajets'
        }
    }
});

