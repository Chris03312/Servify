document.addEventListener('DOMContentLoaded', function() {
    const cityDropdown = document.getElementById('city');
    const barangayDropdown = document.getElementById('barangay');

    // Function to filter barangays based on selected city
    cityDropdown.addEventListener('change', function() {
        const selectedCity = this.value;

        // Clear the barangay dropdown before adding new options
        barangayDropdown.innerHTML = '<option selected disabled value="">Select Barangay</option>';

        // Filter barangays based on selected city
        const filteredBarangays = barangays.filter(barangay => barangay.MUNICIPALITY === selectedCity);

        // Check if any barangays match the selected city
        if (filteredBarangays.length > 0) {
            filteredBarangays.forEach(barangay => {
                const option = document.createElement('option');
                option.value = barangay.BARANGAY_NAME;
                option.textContent = barangay.BARANGAY_NAME;
                barangayDropdown.appendChild(option);
            });
        } else {
            // If no barangays found, show 'No Barangays Available'
            const noResultsOption = document.createElement('option');
            noResultsOption.textContent = 'No Barangays Available';
            noResultsOption.disabled = true;
            barangayDropdown.appendChild(noResultsOption);
        }
    });
});