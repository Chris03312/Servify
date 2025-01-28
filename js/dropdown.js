// Function to toggle dropdowns and button text for a specific group
/*
function toggleDropdowns(button, dropdownClass) {
    // Get all dropdowns in the specified group
    const dropdowns = document.querySelectorAll(`.${dropdownClass}`);

    // Toggle disabled state for the dropdowns
    dropdowns.forEach(dropdown => {
        dropdown.disabled = !dropdown.disabled;
    });

    // Update button text
    button.textContent = button.textContent === 'Filter' ? 'Disable Filter' : 'Filter';
}

// Add event listener for Group 1 button
document.getElementById('filterButton').addEventListener('click', function () {
    toggleDropdowns(this, 'group1-dropdown');
});

// Add event listener for Group 2 button
document.getElementById('filterButtonVol').addEventListener('click', function () {
    toggleDropdowns(this, 'group2-dropdown');
});

document.getElementById('city').addEventListener('change', function(event) {
    event.preventDefault();  // Prevent any form submission or page refresh

    var city = this.value;   // Get the selected city value

    // Ensure the value is not empty
    if (!city) return;

    // Create an AJAX request to send the filter to the controller
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/controllers/coordinator_dashboard?city=' + city, true); // Adjust URL based on your app

    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log("AJAX response received:", xhr.responseText);  // Debugging the response
            // Update the table body with the new filtered data
            document.querySelector('#volunteerTable tbody').innerHTML = xhr.responseText;
        } else {
            console.error('Error: ' + xhr.status);
        }
    };

    xhr.send();  // Send the AJAX request
});

*/





