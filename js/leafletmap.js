document.addEventListener('DOMContentLoaded', function() {
    // Initialize the map and set its view to the specified location and zoom level
    const map = L.map('map').setView([latitude, longitude], 16);

    // Add the OpenStreetMap tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add a marker to the map at the dynamic coordinates
    const marker = L.marker([latitude, longitude]).addTo(map);

    // Bind a popup to the marker with the description (assigned_mission)
    marker.bindPopup(`<strong>${polling}</strong><br>Registered Volunteer:`).openPopup();
});
