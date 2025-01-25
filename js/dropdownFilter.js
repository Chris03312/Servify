// Function to toggle dropdowns and button text for a specific group
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
