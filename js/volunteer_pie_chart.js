const pieCtx = document.getElementById('volunteerPieChart').getContext('2d');

    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: ['Maligaya', 'Lagro', 'Divine School'],
            datasets: [{
                data: [50, 70, 40],  // Pie chart data
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)',  // Color for Maligaya
                    'rgba(255, 99, 132, 0.6)',  // Color for Lagro
                    'rgba(255, 206, 86, 0.6)',  // Color for Divine School
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    display: false,  // Hide the legend
                },
                datalabels: {
                    formatter: (value, context) => {
                        const total = context.chart.data.datasets[0].data.reduce((acc, val) => acc + val, 0);
                        const percentage = ((value / total) * 100).toFixed(1);  // Calculate percentage
                        return percentage + '%';  // Display percentage inside the pie
                    },
                    color: '#000',  // Label color (white for contrast)
                    font: {
                        weight: 'bold',
                        size: 16
                    },
                    align: 'center',  // Center the label inside the slice
                    anchor: 'center', // Anchor the label to the center of the slice
                },
            },
        },
        plugins: [ChartDataLabels],  // Enable the data labels plugin
    });