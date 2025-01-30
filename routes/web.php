<?php

require_once __DIR__ . '/../core/helpers.php'; 
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../models/Parish.php';

require_once __DIR__ . '/../controllers/CoordinatorDashboardController.php';
require_once __DIR__ . '/../controllers/CoordinatorProfileSettingsController.php';
require_once __DIR__ . '/../controllers/CoordinatorChangesPassController.php';
require_once __DIR__ . '/../controllers/CoordinatorAnnouncementsController.php';
require_once __DIR__ . '/../controllers/CoordinatorProfileController.php';
require_once __DIR__ . '/../controllers/CoordinatorVolunteerManagementController.php';
require_once __DIR__ . '/../controllers/BarangayVolunteerDirectoryController.php';
require_once __DIR__ . '/../controllers/PollingAreaController.php';
require_once __DIR__ . '/../controllers/ListOFVolunteerController.php';
require_once __DIR__ . '/../controllers/ViewVolunteerProfile.php';
require_once __DIR__ . '/../controllers/AddNewVolunteerController.php';
require_once __DIR__ . '/../controllers/PendingSubmissionsController.php';
require_once __DIR__ . '/../controllers/UnderReviewSubmissionsController.php';
require_once __DIR__ . '/../controllers/ApprovedSubmissionsController.php';
require_once __DIR__ . '/../controllers/CancelledSubmissionsController.php';
require_once __DIR__ . '/../controllers/CoordinatorAttendanceTrackingController.php';
require_once __DIR__ . '/../controllers/CoordinatorAchievementsController.php';
require_once __DIR__ . '/../controllers/CoordinatorInquiryController.php';


require_once __DIR__ . '/../controllers/VolunteerDashboardController.php';
require_once __DIR__ . '/../controllers/VolunteerAttendanceController.php';
require_once __DIR__ . '/../controllers/VolunteerRegistrationStatusController.php';
require_once __DIR__ . '/../controllers/VolunteerNewApplicationController.php';
require_once __DIR__ . '/../controllers/VolunteerRenewalApplicationController.php';
require_once __DIR__ . '/../controllers/AchievementsController.php';
require_once __DIR__ . '/../controllers/AnnouncementsController.php';


require_once __DIR__ . '/../controllers/LoginController.php';
require_once __DIR__ . '/../controllers/LandingPageController.php';
require_once __DIR__ . '/../controllers/SignUpController.php';
// require_once __DIR__ . '/../controllers/HeatmapController.php';
// require_once __DIR__ . '/../controllers/ParishController.php';
// require_once __DIR__ . '/../controllers/ProfileController.php';
require_once __DIR__ . '/../controllers/LogoutController.php';
// require_once __DIR__ . '/../controllers/DashboardController.php';
// require_once __DIR__ . '/../controllers/AuthController.php';

$router = new Router();

$router->add('/', function () use ($router) {
    $router->redirect('/index'); // Now $router is available inside the closure
});

$router->add('/index', [LandingPageController::class, 'ShowLandingPage']);

$router->add('/login', [LoginController::class, 'ShowLoginForm']);
$router->add('/login/submit', [LoginController::class, 'Login']);

$router->add('/signup', [SignUpController::class, 'ShowSignUp']);
$router->add('/signup/submit', [SignUpController::class, 'SignUp']);

$router->add('/volunteer_dashboard', [VolunteerDashboardController::class, 'VolunteerDashboard']);
$router->add('/volunteer_registration_status', [VolunteerRegistrationStatusController::class, 'VolunteerRegistrationStatus']);
$router->add('/volunteer_new_application', [VolunteerNewApplicationController::class, 'VolunteerNewApplication']);
$router->add('/volunteer_new_application/submit', [VolunteerNewApplicationController::class, 'NewApplication']);
$router->add('/volunteer_renewal_application', [VolunteerRenewalApplicationController::class, 'RenewalApplication']);
$router->add('/volunteer_attendance', [VolunteerAttendanceController::class, 'VolunteerAttendances']);

$router->add('/announcements', [AnnouncementsController::class, 'Announcements']);
$router->add('/achievements', [AchievementsController::class, 'Achievements']);

$router->add('/coordinator_dashboard', [CoordinatorDashboardController::class, 'ShowCoordinatorDashboard']);
$router->add('/coordinator_change_pass', [CoordinatorChangesPassController::class, 'CoordinatorChangePass']);
$router->add('/coordinator_profile_settings', [CoordinatorProfileSettingsController::class, 'CoordinatorProfileSettings']);
$router->add('/coordinator_profile', [CoordinatorProfileController::class, 'ShowConfirmProfile']);
$router->add('/coordinator_profile/submit', [CoordinatorProfileController::class, 'ConfirmProfile']);
$router->add('/coordinator_announcements', [CoordinatorAnnouncementsController::class, 'ShowAnnouncements']);
$router->add('/coordinator_volunteer_management', [CoordinatorVolunteerManagementController::class, 'ShowVolunteerManagement']);
$router->add('/barangay_volunteer_directory', [BarangayVolunteerDirectoryController::class, 'ShowBarangayDirectory']);
$router->add('/polling_area', [PollingAreaController::class, 'ShowPollingArea']);
$router->add('/list_of_volunteer', [ListOfVolunteerController::class, 'ShowListOfVolunteer']);


$router->add('/view_volunteer_profile', [ViewVolunteerProfile::class, 'ShowVolunteerProfile']);
$router->add('/add_new_volunteer', [AddNewVolunteerController::class, 'ShowAddNewVolunteer']);
$router->add('/pending_submissions', [PendingSubmissionsController::class, 'ShowPendingSubmissions']);
$router->add('/under_review_submissions', [UnderReviewSubmissionsController::class, 'ShowUnderReviewSubmissions']);
$router->add('/approved_submissions', [ApprovedSubmissionsController::class, 'ShowApprovedSubmissions']);
$router->add('/cancelled_submissions', [CancelledSubmissionsController::class, 'ShowCancelledSubmissions']);
$router->add('/coordinator_attendance_tracking', [CoordinatorAttendanceTrackingController::class, 'ShowCoordinatorAttendanceTracking']);
$router->add('/coordinator_achievements', [CoordinatorAchievementsController::class, 'ShowCoordinatorAchievements']);
$router->add('/coordinator_inquiries', [CoordinatorInquiryController::class, 'ShowCoordinatorInquiry']);

// $router->add('/dashboard', [DashboardController::class, 'dashboard']);
// $router->add('/parishes', [ParishController::class, 'getParishes']);
// $router->add('/profile/submit', [ProfileController::class,'updateProfile']);
// $router->add('/profile', [ProfileController::class,'profile']);
// $router->add('/heatmap', [HeatmapController::class, 'showHeatmap']);
$router->add('/logout', [LogoutController::class, 'Logout']);

$router->run();


