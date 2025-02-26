/**
(() => {
    'use strict';

    // Get the button with the id 'nextBtn' (for home-tab-pane)
    const nextBtn = document.getElementById('nextBtn');
    
    // Handle the 'nextBtn' click event (already handled for home-tab-pane)
    if (nextBtn) {
        nextBtn.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent form submission or any default action
            
            // Select only the form fields within the #home-tab-pane
            const homeTabPane = document.getElementById('home-tab-pane');
            const inputs = homeTabPane.querySelectorAll('input, select, textarea'); // Include all form elements you want to validate
  
            let isValid = true;
  
            // Loop over the inputs inside #home-tab-pane to check if they are valid
            Array.from(inputs).forEach(input => {
                if (!input.checkValidity()) {
                    isValid = false;
                    input.classList.add('is-invalid');  // Add invalid class for Bootstrap styling
                    const feedback = input.nextElementSibling; // Assuming feedback is the immediate sibling
                    if (feedback && feedback.classList.contains('invalid-feedback')) {
                        feedback.style.display = 'block'; // Show feedback
                    }
                } else {
                    input.classList.remove('is-invalid');  // Remove invalid class if valid
                    const feedback = input.nextElementSibling;
                    if (feedback && feedback.classList.contains('invalid-feedback')) {
                        feedback.style.display = 'none'; // Hide feedback when valid
                    }
                }
            });
  
            if (!isValid) {
                // If any field is invalid, prevent the tab switch
                event.stopPropagation();
            } else {
                // If valid, switch to the #profile-tab-pane
                const profileTabPane = document.getElementById('profile-tab-pane');
                const homeTab = document.getElementById('home-tab');
                const profileTab = document.getElementById('profile-tab');
                
                // Remove 'active' class from #home-tab and #home-tab-pane
                homeTab.classList.remove('active');
                homeTabPane.classList.remove('show', 'active');
                
                // Add 'active' class to #profile-tab and #profile-tab-pane
                profileTab.classList.add('active');
                profileTabPane.classList.add('show', 'active');
            }

            // Add 'was-validated' class to show validation feedback (optional)
            homeTabPane.classList.add('was-validated');
        }, false);
    }

    // Automatically hide invalid-feedback when user types or changes the field
    const homeTabPane = document.getElementById('home-tab-pane');
    const homeInputs = homeTabPane.querySelectorAll('input, select, textarea, file'); // Include all form elements you want to validate

    // Add event listeners to each input field for 'input' and 'change' events in home-tab-pane
    Array.from(homeInputs).forEach(input => {
        input.addEventListener('input', () => {
            if (input.checkValidity()) {
                // Hide invalid feedback when field is valid
                input.classList.remove('is-invalid');
                const feedback = input.nextElementSibling;
                if (feedback && feedback.classList.contains('invalid-feedback')) {
                    feedback.style.display = 'none';
                }
            } else {
                // Show invalid feedback when field is invalid
                input.classList.add('is-invalid');
                const feedback = input.nextElementSibling;
                if (feedback && feedback.classList.contains('invalid-feedback')) {
                    feedback.style.display = 'block';
                }
            }
        });
    });

    // Handle the Submit button inside the #profile-tab-pane
    const submitBtn = document.querySelector('#profile-tab-pane .btn[type="submit"]');

    if (submitBtn) {
        submitBtn.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent the form from submitting immediately

            // Select all form fields within the #profile-tab-pane
            const profileTabPane = document.getElementById('profile-tab-pane');
            const inputs = profileTabPane.querySelectorAll('input, select, textarea'); // Include all form elements

            let isValid = true;

            // Loop over the inputs inside #profile-tab-pane to check if they are valid
            Array.from(inputs).forEach(input => {
                if (!input.checkValidity()) {
                    isValid = false;
                    input.classList.add('is-invalid');  // Add invalid class for Bootstrap styling
                    const feedback = input.nextElementSibling;
                    if (feedback && feedback.classList.contains('invalid-feedback')) {
                        feedback.style.display = 'block'; // Show feedback
                    }
                } else {
                    input.classList.remove('is-invalid');  // Remove invalid class if valid
                    const feedback = input.nextElementSibling;
                    if (feedback && feedback.classList.contains('invalid-feedback')) {
                        feedback.style.display = 'none'; // Hide feedback when valid
                    }
                }
            });

            // If any field is invalid, stop form submission
            if (!isValid) {
                event.stopPropagation();
            } else {
                // If valid, trigger the success modal
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();

                // Optionally, you can also disable the submit button after successful submission
                //submitBtn.disabled = true;
                //submitBtn.textContent = 'Submitted';  // Change text of the button
            }

            // Add 'was-validated' class to show validation feedback (optional)
            profileTabPane.classList.add('was-validated');
        }, false);
    }

    // Automatically hide invalid-feedback when user types or changes the field in profile-tab-pane
    const profileTabPane = document.getElementById('profile-tab-pane');
    const profileInputs = profileTabPane.querySelectorAll('input, select, textarea'); // Include all form elements you want to validate

    // Add event listeners to each input field for 'input' and 'change' events in profile-tab-pane
    Array.from(profileInputs).forEach(input => {
        input.addEventListener('input', () => {
            if (input.checkValidity()) {
                // Hide invalid feedback when field is valid
                input.classList.remove('is-invalid');
                const feedback = input.nextElementSibling;
                if (feedback && feedback.classList.contains('invalid-feedback')) {
                    feedback.style.display = 'none';
                }
            } else {
                // Show invalid feedback when field is invalid
                input.classList.add('is-invalid');
                const feedback = input.nextElementSibling;
                if (feedback && feedback.classList.contains('invalid-feedback')) {
                    feedback.style.display = 'block';
                }
            }
        });
    });
})();
 */
document.addEventListener("DOMContentLoaded", function () {
    function displayValidationErrors(errors) {
        document.querySelectorAll('.invalid-feedback').forEach(el => el.style.display = 'none');
        document.querySelectorAll('.form-control, .form-select, .form-check-input').forEach(el => el.classList.remove('is-invalid'));

        Object.entries(errors).forEach(([field, message]) => {
            console.log(`Field: ${field}, Message: ${message}`); // Debugging

            var errorElement = document.getElementById('error-' + field);
            var inputElement = document.querySelector(`[name="${field}"]`);

            if (errorElement && inputElement) {
                errorElement.textContent = message;
                errorElement.style.display = 'block';
                inputElement.classList.add('is-invalid');

                // Remove validation message when user inputs new data
                inputElement.addEventListener("input", function () {
                    errorElement.style.display = 'none';
                    inputElement.classList.remove('is-invalid');
                }, { once: true }); // Ensures event listener is not added multiple times
            } else {
                console.warn('Missing input or error element for:', field);
            }
        });
    }

    // Handle "Next" button - Only moves to the next tab, no validation
    document.getElementById("nextBtn").addEventListener("click", function (event) {
        event.preventDefault();

        var nextTab = new bootstrap.Tab(document.querySelector('#profile-tab'));
        nextTab.show();
    });


    document.getElementById("submitBtn").addEventListener("click", function (event) {
        event.preventDefault();
    
        var formData = new FormData(document.getElementById('volunteerForm'));
    
        fetch('/volunteer_new_application/submit', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log('Submit response:', data);
    
            if (data.status === 'success') {
                    window.location.href = '/volunteer_registration_status';                 
            } else if (data.status === 'error') {
                displayValidationErrors(data.errors);
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
    
    
    





//UPLOADING PHOTO
document.addEventListener("DOMContentLoaded", () => {
    const dropArea = document.getElementById("drop-area");
    const fileInput = document.getElementById("file-input");
    const fileNameDisplay = document.getElementById("file-name"); // To display the file name
    const preview = document.getElementById("preview");
    const invalidFeedback = document.querySelector(".invalid-feedback"); // The error message element
    const uploadProgress = document.getElementById("upload-progress");
    const progressBar = document.getElementById("progress-bar");
    const uploadStatus = document.getElementById("upload-status");
    const uploadImage = document.querySelector("#drop-area img"); // Select the image inside the drop area

    // Highlight drop area when dragging files
    dropArea.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropArea.classList.add("dragover");
    });

    dropArea.addEventListener("dragleave", () => {
        dropArea.classList.remove("dragover");
    });

    // Handle file drop
    dropArea.addEventListener("drop", (e) => {
        e.preventDefault();
        dropArea.classList.remove("dragover");
        const files = e.dataTransfer.files;
        handleFile(files[0]); // Process only the first file

        // Manually set the file to the input field (for file input value reflection)
        fileInput.files = files;
    });

    // Handle file input change
    fileInput.addEventListener("change", (e) => {
        const file = e.target.files[0]; // Get the first selected file
        handleFile(file);
    });

    // Simulate the file upload process
    function handleFile(file) {
        // Hide the image and any existing invalid feedback
        invalidFeedback.style.display = "none";
        if (uploadImage) {
            uploadImage.style.display = "none"; // Hide the image
        }

        if (file && file.type.startsWith("image/")) {
            // Show uploading progress bar
            uploadProgress.style.display = "block";

            // Clear any existing preview
            preview.innerHTML = "";

            // Display the file name inside the input area
            fileNameDisplay.textContent = file.name;

            // Simulate file upload with progress (for demo purposes)
            let progress = 0;
            const uploadInterval = setInterval(() => {
                progress += 10; // Increase the progress by 10% every interval
                progressBar.style.width = `${progress}%`;
                uploadStatus.textContent = `Uploading... ${progress}%`;

                if (progress >= 100) {
                    clearInterval(uploadInterval);
                    uploadStatus.textContent = "Upload Complete!";
                    setTimeout(() => {
                        uploadProgress.style.display = "none"; // Hide the progress bar after completion
                    }, 1000); // Hide the progress bar after 1 second

                    // Show image preview after upload complete
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const img = document.createElement("img");
                        img.src = e.target.result;
                        preview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            }, 500); // Update progress every 500ms
        } else {
            // Show the error message if the file is invalid
            invalidFeedback.style.display = "block";
            fileNameDisplay.textContent = ""; // Clear the file name display

            // Optionally, reset the file input field if the file is invalid
            fileInput.value = "";
        }
    }

    // Prevent form submission if invalid file is selected
    document.querySelector("form").addEventListener("submit", (e) => {
        const file = fileInput.files[0];
        if (!file || !file.type.startsWith("image/")) {
            e.preventDefault(); // Prevent form submission
            invalidFeedback.style.display = "block"; // Show error feedback
        }
    });
});





