// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'bar',
    data: {
        labels: ["Janvier", "Février", "Mars", "Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Décembre"],
        datasets: [
            {
                label: "Utilisateur prémium",
                backgroundColor: "#3e95cd",
                data: [133,221,783,2478,133,221,783,2478,2478,133,221,783]
            }, {
                label: "Utilisateur normal",
                backgroundColor: "#8e5ea2",
                data: [408,547,675,734,133,221,783,2478,,734,133,221,783]
            },
            {
                label: "Utilisateur non actif",
                backgroundColor: "#f442bf",
                data: [408,547,675,734,133,221,783,2478,,734,133,221,783]
            }

        ]
    },
    options: {
        title: {
            display: true,
            text: 'Développement des utilisateurs par mois'
        }
    }
});
