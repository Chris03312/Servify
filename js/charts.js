document.addEventListener('DOMContentLoaded', function () {
    const citySelect = document.getElementById('city');
    const districtSelect = document.getElementById('district');
    const barangaySelect = document.getElementById('barangay');
    const parishSelect = document.getElementById('parish');
    const schoolSelect = document.getElementById('school');

    const pieCtx = document.getElementById('volunteerPieChart').getContext('2d');
    const barCtx = document.getElementById('volunteerBarChart').getContext('2d');

    Chart.register(ChartDataLabels); // Register Chart.js Plugin

    let volunteerPieChart = new Chart(pieCtx, {
        type: 'pie',
        data: { labels: [], datasets: [{ data: [], backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'] }] },
        options: { 
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                tooltip: { callbacks: { label: (context) => `${context.label}: ${context.raw} volunteers` } },
                datalabels: {
                    color: '#fff',
                    font: { weight: 'bold', size: 14 },
                    formatter: (value, ctx) => {
                        let sum = ctx.dataset.data.reduce((a, b) => a + b, 0);
                        let percentage = ((value / sum) * 100).toFixed(1) + "%";
                        return percentage;
                    }
                }
            }
        }
    });

    let volunteerBarChart = new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [
                { 
                    label: 'Needed Volunteers', 
                    data: [], 
                    backgroundColor: '#FF0000' // Red (Bottom)
                },
                { 
                    label: 'Registered Volunteers', 
                    data: [], 
                    backgroundColor: '#36A2EB' // Blue (Top)
                }
            ]
        },
        options: { 
            responsive: true,
            scales: { 
                x: { stacked: true },
                y: { beginAtZero: true, stacked: true, suggestedMax: 30 } 
            },
            plugins: {
                legend: { position: 'top' }, 
                tooltip: { 
                    callbacks: { label: (context) => `${context.raw} volunteers` }
                },
                datalabels: {
                    anchor: 'center',
                    align: 'center',
                    color: '#fff',
                    font: { weight: 'bold', size: 12 },
                    formatter: (value, ctx) => {
                        if (ctx.dataset.label === 'Registered Volunteers') {
                            let registered = ctx.chart.data.datasets[1].data[ctx.dataIndex];
                            let needed = ctx.chart.data.datasets[0].data[ctx.dataIndex];
                            return `${registered}/${registered + needed}`;
                        }
                        return null;
                    }
                }
            }
        }
    });

    function updateCharts() {
        const selectedCity = citySelect.value;
        const selectedDistrict = districtSelect.value;
        const selectedBarangay = barangaySelect.value;
        const selectedParish = parishSelect.value;
        const selectedSchool = schoolSelect.value;

        let filteredData = allChartData.filter(item => {
            return (!selectedCity || item.city === selectedCity) &&
                   (!selectedDistrict || item.district_name === selectedDistrict) &&
                   (!selectedBarangay || item.barangay === selectedBarangay) &&
                   (!selectedParish || item.parish === selectedParish) &&
                   (!selectedSchool || item.polling_place === selectedSchool);
        });

        let labels = filteredData.map(item => item.polling_place);
        let registeredVolunteers = filteredData.map(item => item.registered_volunteers);
        let neededVolunteers = registeredVolunteers.map(volunteers => Math.max(30 - volunteers, 0));

        // Update Bar Chart
        volunteerBarChart.data.labels = labels;
        volunteerBarChart.data.datasets[0].data = neededVolunteers; // Red (Bottom)
        volunteerBarChart.data.datasets[1].data = registeredVolunteers; // Blue (Top)
        volunteerBarChart.update();

        // Update Pie Chart
        volunteerPieChart.data.labels = labels;
        volunteerPieChart.data.datasets[0].data = registeredVolunteers;
        volunteerPieChart.update();
    }

    [citySelect, districtSelect, barangaySelect, parishSelect, schoolSelect].forEach(dropdown => {
        dropdown.addEventListener('change', updateCharts);
    });

    updateCharts();
});
