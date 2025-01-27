document.addEventListener('DOMContentLoaded', function() {
// Parse coordinates into arrays
const malabonCoordinates = [14.6578504, 120.9511261];
const caloocanCoordinates = [14.651348, 120.9724002];
const navotasCoordinates = [14.6571862, 120.9479692];

// Log the data to check if it's correctly passed from PHP to JavaScript
console.log('Caloocan Volunteers:', caloocanData);
console.log('Malabon Volunteers:', malabonData);
console.log('Navotas Volunteers:', navotasData);

// Initialize the Leaflet map inside the 'mapcities' div
const map = L.map('mapcities').setView([14.6578504, 120.9511261], 13); // Centered at Malabon

// Log map initialization
console.log('Map initialized at:', [14.6578504, 120.9511261]);

// Add the OpenStreetMap tile layer
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

// Log after adding the tile layer
console.log('OpenStreetMap tile layer added to the map.');

// Add markers for each city with popup information
const cities = [
    {
        name: 'Malabon',
        coordinates: malabonCoordinates,
        data: malabonData,
    },
    {
        name: 'Caloocan',
        coordinates: caloocanCoordinates,
        data: caloocanData,
    },
    {
        name: 'Navotas',
        coordinates: navotasCoordinates,
        data: navotasData,
    },
];

// Log cities data
console.log('Cities data:', cities);

// Add markers dynamically
cities.forEach((city) => {
    console.log(`Adding marker for ${city.name} at ${city.coordinates} with ${city.data} volunteers.`);
    const marker = L.marker(city.coordinates).addTo(map);
    marker.bindPopup(`<strong>${city.name}</strong><br>Volunteers: ${city.data}`).openPopup();
});

// Log after markers have been added
console.log('Markers for all cities added to the map.');



});






