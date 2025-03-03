<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';  // Ensure SidebarInfo model is included
require_once __DIR__ . '/../../models/inquiries.php';   // Include the Inquiry model

class CoordinatorInquiryController
{
    public static function ShowCoordinatorInquiry()
    {
        // Get the sidebar info for the coordinator

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
        // Fetch all inquiries from the 'contact_us' table using the Inquiry model
        $inquiries = Inquiry::getAllInquiries(); // This function will fetch inquiries from the database

        // Pass the sidebar data and inquiries to the view
        view('Coordinator/coordinator_inquiries', [
            'coordinator_info' => $sidebarData,  // Pass sidebar data
            'inquiries' => $inquiries           // Pass fetched inquiries
        ]);
    }
}
