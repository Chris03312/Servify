<?php

require_once __DIR__ . '/../../models/Registrationstatus.php';
require_once __DIR__ . '/../../models/Application.php';
require_once __DIR__ . '/../../models/Dashboard.php';
require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/Notification.php';
require_once __DIR__ . '/../../package/vendor/autoload.php'; // Adjust the path if needed



use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class GenerateIDController
{
    public static function ShowGenerateID()
    {
        session_start();

        // Retrieve the session_id from GET or POST request
        $session_id = $_GET['token'] ?? '';

        // Check if the session exists for the given session_id
        if (!isset($_SESSION['sessions'][$session_id])) {
            redirect('/login');
        }

        // Fetch user session data
        $userSession = $_SESSION['sessions'][$session_id];
        $email = $userSession['email'];
        $role = $userSession['role'];

        $sidebarData = SidebarInfo::getSidebarInfo($email, $role);
        $notifications = Notification::getNotification($email);
        $idInfo = Application::getidInformation($email);

        // Pass data to the view in a single variable
        view('Volunteer/generate_id', [
            'email' => $email,
            'sidebarinfo' => $sidebarData,
            'idInfo' => $idInfo, // Make sure this variable is correctly passed
            'notifications' => $notifications['notifications'],
            'unread_count' => $notifications['unread_count'],
        ]);

    }


    public static function generateQrCode() {
        try {
            // Get the email from the form
            $email = $_POST['email'];

            // Get the user information based on the email
            $idInfo = Application::getidInformation($email);

            // Create a new QrCode instance
            $qrCode = new QrCode($email);

            // Set up the writer
            $writer = new PngWriter();

            // Ensure the directory exists (outside the 'pages' folder)
            $directory = __DIR__ . '/../qrcode/'; // Navigate to 'qrcode' folder outside of 'pages'
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true); // Create directory if it doesn't exist
            }

            // Generate a unique file name for the QR code image
            $filename = $directory . 'qrcode_' . md5($email) . '.png'; // Unique file name based on the encrypted text

            // Save the QR code to a PNG file using the write method
            $writer->write($qrCode)->saveToFile($filename); // Save to the specified file

            view('Volunteer/generate_id', [
                'email' => $email,
                'idInfo' => $idInfo,
                'filename' => $filename
            ]);

        }catch (PDOException $e) {
            error_log('Error in generating Qr Code: ' . $e->getMessage());
        }

    }
}
