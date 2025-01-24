const availableData = [30, 70, 40, 3]; // Available Volunteers
    const neededData = [60, 80, 50, 50];    // Needed Volunteers

    const ctx = document.getElementById('volunteerBarChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Maligaya School', 'Lagro School', 'Divine School', 'Golden Link School'],
            datasets: [
                {
                    label: 'Available Volunteers',
                    data: availableData,
                    backgroundColor: 'rgba(135, 206, 235, 1)',
                    borderColor: 'rgba(135, 206, 235, 1)',
                    borderWidth: 1,
                },
                {
                    label: 'Needed Volunteers',
                    data: neededData,
                    backgroundColor: 'rgba(0, 0, 255, 1)',
                    borderColor: 'rgba(0, 0, 255, 1)',
                    borderWidth: 1,
                    borderRadius: 50,
                },
            ],
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                datalabels: {
                    anchor: 'end',
                    align: 'end',
                    formatter: (value, context) => {
                        const index = context.dataIndex;
                        const total = availableData[index] + '/' + neededData[index];
                        return context.datasetIndex === 1 ? total : '';
                    },
                    color: '#000',
                    font: {
                        weight: 'bold',
                    },
                },
            },
            scales: {
                x: {
                    stacked: true,
                    beginAtZero: true,
                },
                y: {
                    stacked: true,
                },
            },
        },
        plugins: [ChartDataLabels],
    });