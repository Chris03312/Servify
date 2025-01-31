<?php
require_once __DIR__ . '/../configuration/Database.php';
require_once __DIR__ . '/../models/coordinatorDashboard.php';

// Fetch dropdown and chart data
$dropdownData = CoordinatorDashboard::getDropdownG2();
$chartsData = CoordinatorDashboard::chartsData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Charts</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

    <!-- Filters -->
        <div class="row mt-3" id="filterDiv">
            <div class="col-sm-4 mb-2">
                <select class="form-select group1-dropdown" name="city" id="city">
                    <option value=""  selected>Select Municipality</option>
                    <?php foreach ($dropdownData['cities'] as $city): ?>
                        <option value="<?php echo $city['city'] ?? ' '; ?>"><?php echo $city['city'] ?? 'No cities available'; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-sm-4 mb-2">
                <select class="form-select group1-dropdown" name="district" id="district">
                    <option value=""  selected>Select District</option>
                    <?php foreach ($dropdownData['districts'] as $district): ?>
                        <option value="<?php echo $district['district'] ?? ' '; ?>"><?php echo $district['district'] ?? 'No districts available'; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-sm-4 mb-2">
                <select class="form-select group1-dropdown" name="barangay" id="barangay">
                    <option value=""  selected>Select Barangay</option>
                    <?php foreach ($dropdownData['barangays'] as $barangay): ?>
                        <option value="<?php echo $barangay['barangay'] ?? ' '; ?>"><?php echo $barangay['barangay'] ?? 'No barangays available'; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-sm-4 mb-2">
                <select class="form-select group1-dropdown" name="parish" id="parish">
                    <option value=""  selected>Select Parish</option>
                    <?php foreach ($dropdownData['parishes'] as $parish): ?>
                        <option value="<?php echo $parish['parish'] ?? ' '; ?>"><?php echo $parish['parish'] ?? 'No parishes available'; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-sm-4 mb-2">
                <select class="form-select group1-dropdown" name="school" id="school">
                    <option value=""  selected>Select School</option>
                    <?php foreach ($dropdownData['pollingPlaces'] as $polling_place): ?>
                        <option value="<?php echo $polling_place['polling_place'] ?? ' '; ?>"><?php echo $polling_place['polling_place'] ?? 'No cities available'; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="row mt-4">
        <div class="col-md-4 mb-3 mb-md-0">
            <canvas id="volunteerPieChart"></canvas>
        </div>
        <div class="col-md-8">
            <canvas id="volunteerBarChart"></canvas>
        </div>
    </div>

    <!-- Pass PHP data to JavaScript -->
    <script>
        const allChartData = <?php echo json_encode($chartsData); ?>;
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const citySelect = document.getElementById('city');
            const districtSelect = document.getElementById('district');
            const barangaySelect = document.getElementById('barangay');
            const parishSelect = document.getElementById('parish');
            const schoolSelect = document.getElementById('school');

            const pieCtx = document.getElementById('volunteerPieChart').getContext('2d');
            const barCtx = document.getElementById('volunteerBarChart').getContext('2d');

            let volunteerPieChart = new Chart(pieCtx, {
                type: 'pie',
                data: { labels: [], datasets: [{ data: [], backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'] }] },
                options: { responsive: true }
            });

            let volunteerBarChart = new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: [],
                    datasets: [
                        { label: 'Registered Volunteers', data: [], backgroundColor: '#36A2EB' },
                        { label: 'Needed Volunteers', data: [], backgroundColor: '#FF6384' }
                    ]
                },
                options: { responsive: true, scales: { y: { beginAtZero: true } } }
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
                let neededVolunteers = labels.map(() => 30);

                volunteerBarChart.data.labels = labels;
                volunteerBarChart.data.datasets[0].data = registeredVolunteers;
                volunteerBarChart.data.datasets[1].data = neededVolunteers;
                volunteerBarChart.update();

                volunteerPieChart.data.labels = labels;
                volunteerPieChart.data.datasets[0].data = registeredVolunteers;
                volunteerPieChart.update();
            }

            [citySelect, districtSelect, barangaySelect, parishSelect, schoolSelect].forEach(dropdown => {
                dropdown.addEventListener('change', updateCharts);
            });

            updateCharts();
        });
    </script>

</body>
</html>
