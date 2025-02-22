document.addEventListener('DOMContentLoaded', function () {
    const map = L.map('map').setView([14.6578504, 120.9511261], 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);

    const dataPoints = [
    { "name": "ANDRES BONIFACIO ELEMENTARY SCHOOL", "longitude": 120.9732945, "latitude": 14.6563394, "needed_volunteers": 50, "volunteers_count": 50 },
    { "name": "A. BONIFACIO ELEMENTARY SCHOOL", "longitude": 120.9732945, "latitude": 14.6563394, "needed_volunteers": 45, "volunteers_count": 25 },
    { "name": "LIBIS TALISAY ELEMENTARY SCHOOL", "longitude": 120.9708882, "latitude": 14.6556528, "needed_volunteers": 40, "volunteers_count": 20 },
    { "name": "LIBIS TALISAY ELEMENTARY SCHOOL", "longitude": 120.9698574, "latitude": 14.6548698, "needed_volunteers": 30, "volunteers_count": 15 },
    { "name": "KAUNLARAN ELEMENTARY SCHOOL", "longitude": 120.9696686, "latitude": 14.647104, "needed_volunteers": 60, "volunteers_count": 40 },
    { "name": "CALOOCAN CENTRAL ELEMENTARY SCHOOL", "longitude": 120.9740851, "latitude": 14.6502466, "needed_volunteers": 55, "volunteers_count": 30 },
    { "name": "MACARIO ASISTIO HIGH SCHOOL", "longitude": 120.9633904, "latitude": 14.6494173, "needed_volunteers": 70, "volunteers_count": 50 },
    { "name": "SAMPALUKAN ELEMENTARY SCHOOL", "longitude": 120.9731702, "latitude": 14.6440618, "needed_volunteers": 45, "volunteers_count": 25 },
    { "name": "LERMA ELEM. SCHOOL", "longitude": 120.9724542, "latitude": 14.6400341, "needed_volunteers": 35, "volunteers_count": 20 },
    { "name": "KASARINLAN ELEM. SCHOOL", "longitude": 120.9691804, "latitude": 14.641985, "needed_volunteers": 40, "volunteers_count": 30 },
    { "name": "MAYPAJO ELEM. SCHOOL", "longitude": 120.97316, "latitude": 14.63785, "needed_volunteers": 50, "volunteers_count": 25 },
    { "name": "MAYPAJO HIGH SCHOOL", "longitude": 120.97316, "latitude": 14.63785, "needed_volunteers": 45, "volunteers_count": 20 },
    { "name": "BARANGAY HALL (BRGY. 39)", "longitude": 120.982581, "latitude": 14.638994, "needed_volunteers": 30, "volunteers_count": 10 },
    { "name": "BARANGAY HALL (BRGY. 40)", "longitude": 120.982511, "latitude": 14.638944, "needed_volunteers": 25, "volunteers_count": 15 },
    { "name": "BARANGAY HALL (BRGY. 41)", "longitude": 120.982339, "latitude": 14.640426, "needed_volunteers": 20, "volunteers_count": 10 },
    { "name": "BARANGAY HALL (BRGY. 42)", "longitude": 120.980518, "latitude": 14.639675, "needed_volunteers": 25, "volunteers_count": 15 },
    { "name": "BARANGAY HALL (BRGY. 44)", "longitude": 120.980088, "latitude": 14.641872, "needed_volunteers": 20, "volunteers_count": 10 },
    { "name": "BARANGAY HALL (BRGY. 45)", "longitude": 120.979078, "latitude": 14.640616, "needed_volunteers": 25, "volunteers_count": 10 },
    { "name": "GRACE PARK ELEM. SCHOOL (MAIN)", "longitude": 120.9768867, "latitude": 14.6455499, "needed_volunteers": 60, "volunteers_count": 40 },
    { "name": "CALOOCAN HIGH SCHOOL", "longitude": 120.981693, "latitude": 14.651281, "needed_volunteers": 70, "volunteers_count": 50 },
    { "name": "GREGORIA DE JESUS ELEM. SCHOOL", "longitude": 120.9805885, "latitude": 14.6506256, "needed_volunteers": 50, "volunteers_count": 35 },
    { "name": "GOMBURZA ELEM. SCHOOL", "longitude": 120.977703, "latitude": 14.657402, "needed_volunteers": 45, "volunteers_count": 20 },
    { "name": "SAINT GABRIEL ACADEMY", "longitude": 120.981094, "latitude": 14.658747, "needed_volunteers": 30, "volunteers_count": 15 },
    { "name": "BUENA PARK UNIVERSITY HILLS", "longitude": 120.976829, "latitude": 14.661351, "needed_volunteers": 50, "volunteers_count": 50 },
    { "name": "MORNING BREEZE ELEMENTARY SCHOOL", "longitude": 120.988647, "latitude": 14.661636, "needed_volunteers": 45, "volunteers_count": 30 },
    { "name": "MARIA CLARA HIGH SCHOOL", "longitude": 120.9855359, "latitude": 14.6484619, "needed_volunteers": 50, "volunteers_count": 40 },
    { "name": "WORLD CITI COLLEGES", "longitude": 120.991572, "latitude": 14.656146, "needed_volunteers": 30, "volunteer        s_count": 15 },
    { "name": "CECILIO APOSTOL ELEM. SCHOOL", "longitude": 120.9855153, "latitude": 14.6478494, "needed_volunteers": 50, "volunteers_count": 35 },
    { "name": "EULOGIO RODRIGUEZ ELEM. SCHOOL", "longitude": 120.9951727, "latitude": 14.6528844, "needed_volunteers": 60, "volunteers_count": 40 },
    { "name": "PHILIPPINE CULTURAL COLLEGE", "longitude": 120.9927, "latitude": 14.648466, "needed_volunteers": 70, "volunteers_count": 50 },
    { "name": "TANDANG SORA INTEGRATED SCHOOL", "longitude": 120.9924336, "latitude": 14.6475339, "needed_volunteers": 30, "volunteers_count": 20 },
    { "name": "BAGONG SILANG ELEM. SCHOOL", "longitude": 120.985103, "latitude": 14.6425545, "needed_volunteers": 40, "volunteers_count": 25 },
    { "name": "C. ARELLANO ELEM. SCHOOL", "longitude": 120.991364, "latitude": 14.644397, "needed_volunteers": 50, "volunteers_count": 30 },
    { "name": "SAN JOSE ELEM. SCHOOL", "longitude": 120.9891225, "latitude": 14.6391947, "needed_volunteers": 30, "volunteers_count": 15 },
    { "name": "BAGONG BARRIO NATIONAL HIGH SCHOOL", "longitude": 120.9947976, "latitude": 14.6654198, "needed_volunteers": 80, "volunteers_count": 50 },
    { "name": "BAGONG BARRIO ELEMENTARY SCHOOL", "longitude": 120.9926708, "latitude": 14.6645327, "needed_volunteers": 70, "volunteers_count": 40 },
    { "name": "BARANGAY HALL (BRGY. 154)", "longitude": 120.99996, "latitude": 14.665358, "needed_volunteers": 20, "volunteers_count": 10 },
    { "name": "BARANGAY HALL (BRGY. 155)", "longitude": 0, "latitude": 0, "needed_volunteers": 0, "volunteers_count": 0 },
    { "name": "EAST BAGONG BARRIO ELEMENTARY SCHOOL", "longitude": 121.0018457, "latitude": 14.6680257, "needed_volunteers": 40, "volunteers_count": 20 },
    { "name": "BAESA ELEMENTARY SCHOOL", "longitude": 121.0016796, "latitude": 14.6737152, "needed_volunteers": 30, "volunteers_count": 15 },
    { "name": "STA. QUITERIA ELEMENTARY SCHOOL", "longitude": 121.010025, "latitude": 14.680413, "needed_volunteers": 50, "volunteers_count": 25 },
    { "name": "TALIPAPA HIGH SCHOOL", "longitude": 121.0166702, "latitude": 14.6900733, "needed_volunteers": 60, "volunteers_count": 40 },
    { "name": "BAGBAGUIN ELEMENTARY SCHOOL", "longitude": 121.0045289, "latitude": 14.7160609, "needed_volunteers": 50, "volunteers_count": 30 },
    { "name": "CAYBIGA ELEMENTARY SCHOOL", "longitude": 121.0068842, "latitude": 14.7187423, "needed_volunteers": 40, "volunteers_count": 20 },
    { "name": "LLANO ELEMENTARY SCHOOL", "longitude": 121.0141422, "latitude": 14.7318171, "needed_volunteers": 45, "volunteers_count": 30 },
    { "name": "DEPARO ELEMENTARY SCHOOL", "longitude": 121.0219922, "latitude": 14.7415018, "needed_volunteers": 50, "volunteers_count": 40 },
    { "name": "HOLY INFANT MONTESSORI CENTER", "longitude": 121.022064, "latitude": 14.734806, "needed_volunteers": 20, "volunteers_count": 10 },
    { "name": "BARANGAY HALL COMPOUND", "longitude": 121.033225, "latitude": 14.738878, "needed_volunteers": 25, "volunteers_count": 15 },
    { "name": "BAGUMBONG ELEMENTARY SCHOOL", "longitude": 121.0226837, "latitude": 14.7482532, "needed_volunteers": 40, "volunteers_count": 25 },
    { "name": "URDUJA ELEMENTARY SCHOOL", "longitude": 121.0359062, "latitude": 14.743721, "needed_volunteers": 50, "volunteers_count": 30 },
    { "name": "CONGRESS ELEMENTARY SCHOOL", "longitude": 121.032693, "latitude": 14.753766, "needed_volunteers": 45, "volunteers_count": 20 },
    { "name": "CAMARIN HIGH SCHOOL", "longitude": 121.0491662, "latitude": 14.762051, "needed_volunteers": 60, "volunteers_count": 40 },
    { "name": "CAMARIN ELEMENTARY SCHOOL", "longitude": 121.043413, "latitude": 14.7618073, "needed_volunteers": 50, "volunteers_count": 25 },
    { "name": "BAGONG SILANG ELEMENTARY SCHOOL", "longitude": 121.04566, "latitude": 14.776553, "needed_volunteers": 70, "volunteers_count": 40 },
    { "name": "KALAYAAN ELEMENTARY SCHOOL", "longitude": 121.04566, "latitude": 14.776553, "needed_volunteers": 60, "volunteers_count": 30 },
    { "name": "SILANGANAN ELEMENTARY SCHOOL (MAIN)", "longitude": 121.04566, "latitude": 14.776553, "needed_volunteers": 55, "volunteers_count": 20 },
    { "name": "BAGONG SILANG PUBLIC HIGH SCHOOL", "longitude": 121.04566, "latitude": 14.776553, "needed_volunteers": 75, "volunteers_count": 50 }
];

    const heatPoints = dataPoints.map(point => {
        let intensity = point.needed_volunteers;

        if (point.volunteers_count >= point.needed_volunteers) {
            intensity = point.needed_volunteers * 2;
        } else {
            intensity = point.volunteers_count / 2;
        }

        return [point.latitude, point.longitude, intensity];
    });

    let heatmap = L.heatLayer(heatPoints, {
        radius: 25,
        blur: 15,
        maxZoom: 20,
        gradient: {
            0.2: 'rgba(255, 0, 0, 0.4)',
            0.4: 'rgba(255, 165, 0, 0.4)',
            0.6: 'rgba(255, 255, 0, 0.4)',
            0.8: 'rgba(173, 255, 47, 0.4)',
            1.0: 'rgba(0, 255, 0, 0.4)'
        }
    }).addTo(map);

});