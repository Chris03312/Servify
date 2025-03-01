<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';  // Ensure SidebarInfo model is included
require_once __DIR__ . '/../../models/inquiries.php';   // Include the Inquiry model

class CoordinatorInquiryController
{
    public static function ShowCoordinatorInquiry()
    {
        // Get the sidebar info for the coordinator
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        // Fetch all inquiries from the 'contact_us' table using the Inquiry model
        $inquiries = Inquiry::getAllInquiries(); // This function will fetch inquiries from the database

        // Pass the sidebar data and inquiries to the view
        view('Coordinator/coordinator_inquiries', [
            'coordinator_info' => $sidebarData,  // Pass sidebar data
            'inquiries' => $inquiries           // Pass fetched inquiries
        ]);
    }
}
