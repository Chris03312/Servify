// Register Chart.js Plugins
Chart.register(ChartDataLabels);

const ctx = document.getElementById('distributionOfVolunteersPerPrecinctBarChart').getContext('2d');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Maligaya School', 'Lagro School', 'Divine School'],
        datasets: [{
            label: 'Volunteers',
            data: [10, 2, 19], // Volunteer counts
            backgroundColor: 'rgba(100, 149, 237, 1)', // Cornflower Blue
            borderRadius: 20, // Rounded edges
            barPercentage: 0.6,
            categoryPercentage: 0.7
        }]
    },
    options: {
        indexAxis: 'y', // Horizontal Bar Chart
        responsive: true,
        plugins: {
            legend: {
                display: false // Hide legend since we only have one dataset
            },
            datalabels: {
                anchor: 'end',
                align: 'end',
                formatter: (value) => `${value} volunteers`,
                color: '#472b2b',
                font: {
                    weight: 'bold'
                }
            }
        },
        scales: {
            x: {
                beginAtZero: true,
                ticks: {
                    stepSize: 5
                }
            },
            y: {
                beginAtZero: true
            }
        }
    }
});
