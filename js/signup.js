document.addEventListener('DOMContentLoaded', function() {
    const cityDropdown = document.getElementById('city');
    const barangayDropdown = document.getElementById('barangay');
    
    // Function to filter barangays based on selected city
    cityDropdown.addEventListener('change', function() {
        const selectedCity = this.value;
        console.log(`City selected: ${selectedCity}`);

        // Clear the barangay dropdown before adding new options
        barangayDropdown.innerHTML = '<option selected disabled value="">Select Barangay</option>';

        // Filter barangays based on selected city
        const filteredBarangays = barangays.filter(barangay => barangay['MUNICIPALITY/CITY'] === selectedCity);

        console.log(`Filtered barangays:`, filteredBarangays);

        // Check if any barangays match the selected city
        if (filteredBarangays.length > 0) {
            filteredBarangays.forEach(barangay => {
                const option = document.createElement('option');
                option.value = barangay.BARANGAY_NAME;
                option.textContent = barangay.BARANGAY_NAME;
                barangayDropdown.appendChild(option);
                console.log(`Added barangay: ${barangay.BARANGAY_NAME}`);
            });
        } else {
            // If no barangays found, show 'No Barangays Available'
            const noResultsOption = document.createElement('option');
            noResultsOption.textContent = 'No Barangays Available';
            noResultsOption.disabled = true;
            barangayDropdown.appendChild(noResultsOption);
            console.log('No barangays available for this city.');
        }
    });
});


document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("signupForm").addEventListener("submit", function (e) {
        e.preventDefault(); // Prevent default form submission

        let formData = new FormData(this);

        fetch("/signup/submit", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            document.querySelectorAll(".validation").forEach(el => el.innerHTML = ""); // Clear previous errors

            if (data.success) {
                // Show success modal       
                var successModal = new bootstrap.Modal(document.getElementById("SuccessModal"));
                successModal.show();
                document.getElementById("signupForm").reset();

                // Add click event listener to the "Done" button
                document.getElementById("redirectButton").addEventListener("click", function () {
                    window.location.href = "/login"; // Redirect to login page
                });
            } else {
                // Display validation errors dynamically
                for (let field in data.errors) {
                    let inputField = document.querySelector(`[name="${field}"]`);
                    if (inputField) {
                        let errorElement = inputField.closest(".mb-3").querySelector(".validation");

                        if (errorElement) {
                            errorElement.innerHTML = data.errors[field];
                        }
                    }
                }
            }
        })
        .catch(error => console.error("Error:", error));
    });
});

