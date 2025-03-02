<?php
// Include the Composer autoload file
require_once '../package/vendor/autoload.php'; // Adjust the path if needed

// Encryption & Decryption functions
function decrypt($data, $key) {
    $decoded = base64_decode($data);
    if (!$decoded || strpos($decoded, "::") === false) {
        return false;
    }

    list($encrypted_data, $iv) = explode('::', $decoded, 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
}

// Check if 'data' is set in the URL parameters
if (isset($_GET['data']) && !empty($_GET['data'])) {
    $encrypted_data = $_GET['data'];
    $key = 'parishvolunteer'; // Keep this key safe
    $decrypted_text = decrypt($encrypted_data, $key);

    // Construct the full URL after decryption
    if ($decrypted_text) {
        $full_url = "https://www.Servify.infinityfreeapp.com/" . $decrypted_text;
        
        // Redirect to the decrypted URL
        header("Location: " . $full_url);
        exit(); // Don't forget to stop the script after the redirect
    } else {
        echo "You are not Authorize";
    }
} else {
    // If no 'data' is found (QR code not scanned yet), show the QR code scanner
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            /* Custom Styles */
            body {
                display: flex;
                justify-content: center;
                margin: 0;
                padding: 0;
                height: 100vh;
                box-sizing: border-box;
                text-align: center;
                background: rgb(128 0 0 / 66%);
            }

            .container {
                width: 100%;
                max-width: 500px;
                margin: 5px;
            }

            .container h1 {
                color: #ffffff;
            }

            .section {
                background-color: #ffffff;
                padding: 50px 30px;
                border: 1.5px solid #b2b2b2;
                border-radius: 0.25em;
                box-shadow: 0 20px 25px rgba(0, 0, 0, 0.25);
            }

            #my-qr-reader {
                padding: 20px !important;
                border: 1.5px solid #b2b2b2 !important;
                border-radius: 8px;
            }

            video {
                width: 100% !important;
                border: 1px solid #b2b2b2 !important;
                border-radius: 0.25em;
            }
        </style>
        <title>QR Code Scanner / Reader</title>
    </head>
    <body>
        <div class="container">
            <h1>Scan QR Codes</h1>
            <div class="section">
                <div id="my-qr-reader"></div>
            </div>
        </div>

        <!-- Load HTML5 QR Code Library -->
        <script src="https://unpkg.com/html5-qrcode"></script>

        <script>
            // Wait for the DOM to be ready
            function domReady(fn) {
                if (
                    document.readyState === "complete" ||
                    document.readyState === "interactive"
                ) {
                    setTimeout(fn, 1000);
                } else {
                    document.addEventListener("DOMContentLoaded", fn);
                }
            }

            domReady(function () {
                // When QR code is successfully scanned
                function onScanSuccess(decodeText, decodeResult) {
                    console.log("Scanned Data:", decodeText); // Debugging output

                    // Redirect to the PHP decryption script with the scanned data
                    window.location.href = "qrcodedecrypt.php?data=" + encodeURIComponent(decodeText);
                }

                let htmlscanner = new Html5QrcodeScanner(
                    "my-qr-reader",
                    { fps: 15, qrbox: { width: 300, height: 300 } }
                );
                htmlscanner.render(onScanSuccess);
            });
        </script>

    </body>
    </html>
    <?php
}
?>
