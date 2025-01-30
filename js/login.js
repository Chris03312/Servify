document.getElementById('loginForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // Create a new AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/login/submit', true); // Replace with the correct path to your PHP login method

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            // Check if there's an error message
            if (response.error) {
                document.querySelector('.validation').textContent = response.error;
            }

            // Check if there's a redirect
            if (response.redirect) {
                window.location.href = response.redirect;
            }
        }
    };

    xhr.send(formData);
});