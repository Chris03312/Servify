<?php
// Include the Composer autoload file
require_once '../package/vendor/autoload.php'; // Adjust the path if needed

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

// Encryption function (AES-256-CBC)
function encrypt($data, $key)
{
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc')); // Generate a random initialization vector
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv); // Encrypt data
    return base64_encode($encrypted . '::' . $iv); // Return encrypted data with IV
}

// Decryption function (AES-256-CBC)
function decrypt($data, $key)
{
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2); // Split data and IV
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv); // Decrypt the data
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the URL text from the form
    $text = isset($_POST['text']) ? $_POST['text'] : '';

    // Encrypt the URL (or any data)
    $key = 'parishvolunteer'; // Make sure to keep this key safe
    $encrypted_text = encrypt($text, $key);

    // Create the QR code with the encrypted text
    $qrCode = new QrCode($encrypted_text);

    // Set up the writer
    $writer = new PngWriter();

    // Ensure the directory exists (outside the 'pages' folder)
    $directory = __DIR__ . '/../qrcode/'; // Navigate to 'qrcode' folder outside of 'pages'
    if (!file_exists($directory)) {
        mkdir($directory, 0777, true); // Create directory if it doesn't exist
    }

    // Generate a unique file name for the QR code image
    $filename = $directory . 'qrcode_' . md5($encrypted_text) . '.png'; // Unique file name based on the encrypted text

    // Save the QR code to a PNG file using the write method
    $writer->write($qrCode)->saveToFile($filename); // Save to the specified file

    // Display the QR code image to the user
    echo "<h3>Your Encrypted QR Code:</h3>";
    echo "<img src='../qrcode/" . 'qrcode_' . md5($encrypted_text) . ".png' alt='QR Code' />"; // Corrected path to the image
} else {
    echo "No text provided.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encrypted QR Code Generator</title>
</head>

<body>
    <h1>Generate Encrypted QR Code for URL</h1>
    <form action="" method="post">
        <label for="text">Enter URL (e.g., https://www.Servify.infinityfreeapp.com/volunteers_id=1):</label>
        <input type="text" id="text" name="text" required>
        <button type="submit">Generate Encrypted QR Code</button>
    </form>
</body>

</html>