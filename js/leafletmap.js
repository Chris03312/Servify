document.addEventListener('DOMContentLoaded', function() {
    // Check if latitude and longitude are empty
    if (!latitude || !longitude) {
        // Use the Geolocation API to get the user's current location
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    // Extract the user's latitude and longitude
                    const userLatitude = position.coords.latitude;
                    const userLongitude = position.coords.longitude;

                    // Initialize the map with the user's location and set the marker text as "You are here"
                    initializeMap(userLatitude, userLongitude, "You are here");
                },
                function(error) {
                    console.error('Error getting user location:', error.message);
                    alert('Unable to retrieve your location. Ple    ase check your browser settings.');
                }
            );
        } else {
            alert('Geolocation is not supported by your browser.');
        }
    } else {
        // Initialize the map with the provided latitude and longitude and use the polling info as the marker text
        initializeMap(latitude, longitude, polling);
    }

    // Function to initialize the map
    function initializeMap(latitude, longitude, markerText) {
        // Initialize the map and set its view to the specified location and zoom level
        const map = L.map('map').setView([latitude, longitude], 16);

        // Add the OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add a marker to the map at the dynamic coordinates
        const marker = L.marker([latitude, longitude]).addTo(map);

        // Bind a popup to the marker with the custom marker text
        marker.bindPopup(`<strong>${markerText}</strong>`).openPopup();
    }
});
