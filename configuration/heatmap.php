<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather-Style Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet.heat/dist/leaflet-heat.js"></script> <!-- Heatmap plugin -->
</head>
<body>
    <div id="map" style="width: 100%; height: 600px;"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize the map
            const map = L.map('map').setView([14.6578504, 120.9511261], 13);

            // Add the OpenStreetMap tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            }).addTo(map);

            // Polling place data with intensity values (e.g., number of volunteers)
            const dataPoints = [
                [14.6578504, 120.9511261, 100], // Malabon (lat, lon, intensity)
                [14.651348, 120.9724002, 150],  // Caloocan
                [14.6571862, 120.9479692, 175] // Navotas
            ];

            // Create a heatmap layer
            L.heatLayer(dataPoints, {
                radius: 30,        // Spread of heatmap points
                blur: 30,          // Smoothness of the heatmap
                maxZoom: 20,       // Maximum zoom level
                gradient: {
                    0.2: 'rgba(0, 0, 255, 0.4)',    // Blue with 40% opacity
                    0.4: 'rgba(0, 255, 0, 0.4)',    // Green with 40% opacity
                    0.6: 'rgba(255, 255, 0, 0.4)',  // Yellow with 40% opacity
                    0.8: 'rgba(255, 165, 0, 0.4)',  // Orange with 40% opacity
                    1.0: 'rgba(255, 0, 0, 0.4)'     // Red with 40% opacity
                }
            }).addTo(map);
        });
    </script>
</body>
</html>
