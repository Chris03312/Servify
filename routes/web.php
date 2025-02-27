<?php

require_once __DIR__ . '/../core/helpers.php';
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../models/Parish.php';

require_once __DIR__ . '/../controllers/CoordinatorDashboardController.php';
require_once __DIR__ . '/../controllers/CoordinatorProfileSettingsController.php';
require_once __DIR__ . '/../controllers/CoordinatorChangesPassController.php';
require_once __DIR__ . '/../controllers/CoordinatorAnnouncementsController.php';
require_once __DIR__ . '/../controllers/VolunteerApplicationDetails.php';
require_once __DIR__ . '/../controllers/CoordinatorProfileController.php';

require_once __DIR__ . '/../controllers/CoordinatorVolunteerManagementController.php';
require_once __DIR__ . '/../controllers/DistrictVolunteerDirectoryController.php';
require_once __DIR__ . '/../controllers/BarangayVolunteerDirectoryController.php';
require_once __DIR__ . '/../controllers/PollingAreaController.php';
require_once __DIR__ . '/../controllers/ListOfVolunteerController.php';

require_once __DIR__ . '/../controllers/PendingSubmissionsController.php';
require_once __DIR__ . '/../controllers/UnderReviewSubmissionsController.php';
require_once __DIR__ . '/../controllers/ApprovedSubmissionsController.php';
require_once __DIR__ . '/../controllers/CancelledSubmissionsController.php';

require_once __DIR__ . '/../controllers/CoordinatorAttendanceTrackingController.php';
require_once __DIR__ . '/../controllers/CoordinatorAchievementsController.php';
require_once __DIR__ . '/../controllers/CoordinatorInquiryController.php';
require_once __DIR__ . '/../controllers/AddNewVolunteerController.php';

require_once __DIR__ . '/../controllers/CoordinatorFeedbackController.php';
require_once __DIR__ . '/../controllers/ReportsController.php';

require_once __DIR__ . '/../controllers/ViewVolunteerProfile.php';
require_once __DIR__ . '/../controllers/AddNewVolunteerController.php';
require_once __DIR__ . '/../controllers/VolunteerDashboardController.php';
require_once __DIR__ . '/../controllers/VolunteerAttendanceController.php';
require_once __DIR__ . '/../controllers/VolunteerRegistrationStatusController.php';
require_once __DIR__ . '/../controllers/VolunteerNewApplicationController.php';
require_once __DIR__ . '/../controllers/VolunteerRenewalApplicationController.php';
require_once __DIR__ . '/../controllers/AchievementsController.php';
require_once __DIR__ . '/../controllers/AnnouncementController.php';
require_once __DIR__ . '/../controllers/VolunteerApplicationDetailsController.php';
require_once __DIR__ . '/../controllers/VolFeedbackController.php';
require_once __DIR__ . '/../controllers/VolunteerDetailsController.php';
require_once __DIR__ . '/../controllers/ContactUsController.php';

require_once __DIR__ . '/../controllers/AdminDashboardController.php';
require_once __DIR__ . '/../controllers/AdminCoorManagementController.php';
require_once __DIR__ . '/../controllers/AdminVolunManagementController.php';
require_once __DIR__ . '/../controllers/AdminDirectoryController.php';
require_once __DIR__ . '/../controllers/CitiesDirectoryController.php';
require_once __DIR__ . '/../controllers/ViewCoordinatorDetailsController.php';
require_once __DIR__ . '/../controllers/AdminAttendanceController.php';
require_once __DIR__ . '/../controllers/AdminAttendanceSummaryController.php';
require_once __DIR__ . '/../controllers/AdminPrecinctsController.php';
require_once __DIR__ . '/../controllers/AdminAchievementsController.php';
require_once __DIR__ . '/../controllers/AdminInquiryController.php';
require_once __DIR__ . '/../controllers/AdminFeedbackController.php';
require_once __DIR__ . '/../controllers/AdminReportsController.php';

require_once __DIR__ . '/../controllers/LoginController.php';
require_once __DIR__ . '/../controllers/LandingPageController.php';
require_once __DIR__ . '/../controllers/SignUpController.php';
require_once __DIR__ . '/../controllers/LogoutController.php';

// require_once __DIR__ . '/../controllers/HeatmapController.php';
// require_once __DIR__ . '/../controllers/ParishController.php';
// require_once __DIR__ . '/../controllers/ProfileController.php';
// require_once __DIR__ . '/../controllers/DashboardController.php';
// require_once __DIR__ . '/../controllers/AuthController.php';

$router = new Router();

$router->add('/', function () use ($router) {
    $router->redirect('/index'); // Now $router is available inside the closure
});

$router->add('/index', [LandingPageController::class, 'ShowLandingPage']);

$router->add('/logout', [LogoutController::class, 'Logout']);

$router->add('/login', [LoginController::class, 'ShowLoginForm']);
$router->add('/login/submit', [LoginController::class, 'Login']);

$router->add('/signup', [SignUpController::class, 'ShowSignUp']);
$router->add('/signup/submit', [SignUpController::class, 'SignUp']);

$router->add('/volunteer_dashboard', [VolunteerDashboardController::class, 'VolunteerDashboard']);
$router->add('/volunteer_registration_status', [VolunteerRegistrationStatusController::class, 'VolunteerRegistrationStatus']);
$router->add('/volunteer_new_application', [VolunteerNewApplicationController::class, 'VolunteerNewApplication']);
$router->add('/volunteer_new_application/validate', [VolunteerNewApplicationController::class, 'validateForms']);
$router->add('/volunteer_new_application/submit', [VolunteerNewApplicationController::class, 'NewApplication']);
$router->add('/volunteer_renewal_application', [VolunteerRenewalApplicationController::class, 'RenewalApplication']);
$router->add('/volunteer_attendance', [VolunteerAttendanceController::class, 'VolunteerAttendances']);
$router->add('/volunteer_application_details', [VolunteerApplicationDetailsController::class, 'ShowVolunteerApplicationDetails']);
$router->add('/volunteer_feedback', [VolFeedbackController::class, 'ShowVolFeedback']);
$router->add('/volunteer_details', [VolunteerDetailsController::class, 'ShowVolunteerDetails']);

$router->add('/announcements', [AnnouncementController::class, 'ShowAnnouncement']);
$router->add('/achievements', [AchievementsController::class, 'Achievements']);

$router->add('/ContactUs', [ContactUsController::class, 'ShowContactUs']);
$router->add('/ContactUs/submit', [ContactUsController::class, 'ContactUs']);

$router->add('/coordinator_dashboard', [CoordinatorDashboardController::class, 'ShowCoordinatorDashboard']);
$router->add('/coordinator_change_pass', [CoordinatorChangesPassController::class, 'CoordinatorChangePass']);
$router->add('/coordinator_profile_settings', [CoordinatorProfileSettingsController::class, 'CoordinatorProfileSettings']);
$router->add('/coordinator_profile', [CoordinatorProfileController::class, 'ShowConfirmProfile']);
$router->add('/coordinator_profile/submit', [CoordinatorProfileController::class, 'ConfirmProfile']);
$router->add('/coordinator_announcements', [CoordinatorAnnouncementsController::class, 'ShowAnnouncements']);
$router->add('/add_new_volunteer/submit', [AddNewVolunteerController::class, 'CoordinatorAddVolunteer']);
$router->add('/volunteer_application_details', [VolunteerApplicationDetails::class, 'ShowVolunteerApplicationDetails']);

$router->add('/coordinator_announcements/submit', [CoordinatorAnnouncementsController::class, 'ShowCreateAnnouncements']);
$router->add('/coordinator_announcements/delete', [CoordinatorAnnouncementsController::class, 'ShowDeleteAnnouncements']);
$router->add('/coordinator_announcements/update', [CoordinatorAnnouncementsController::class, 'ShowUpdateAnnouncements']);
$router->add('/coordinator_volunteer_management', [CoordinatorVolunteerManagementController::class, 'ShowVolunteerManagement']);
$router->add('/district_volunteer_directory', [DistrictVolunteerDirectoryController::class, 'ShowDistrictDirectory']);
$router->add('/barangay_volunteer_directory', [BarangayVolunteerDirectoryController::class, 'ShowBarangayDirectory']);
$router->add('/polling_area', [PollingAreaController::class, 'ShowPollingArea']);
$router->add('/list_of_volunteer', [ListOfVolunteerController::class, 'ShowListOfVolunteer']);

$router->add('/view_volunteer_profile', [ViewVolunteerProfile::class, 'ShowVolunteerProfile']);
$router->add('/add_new_volunteer', [AddNewVolunteerController::class, 'ShowAddNewVolunteer']);

$router->add('/pending_submissions', [PendingSubmissionsController::class, 'ShowPendingSubmissions']);
$router->add('/pending_submissions/review', [PendingSubmissionsController::class, 'ReviewApplicationDetails']);
$router->add('/pending_submissions/delete', [PendingSubmissionsController::class, 'DeletePendingSubmissions']);

$router->add('/under_review_submissions', [UnderReviewSubmissionsController::class, 'ShowUnderReviewSubmissions']);
$router->add('/under_review_submissions/review', [UnderReviewSubmissionsController::class, 'ReviewApplicationDetails']);
$router->add('/under_review_submissions/delete', [UnderReviewSubmissionsController::class, 'DeleteUnderreviewSubmissions']);

$router->add('/approved_submissions', [ApprovedSubmissionsController::class, 'ShowApprovedSubmissions']);
$router->add('/approved_submissions/review', [ApprovedSubmissionsController::class, 'ReviewApplicationDetails']);
$router->add('/approved_submissions/delete', [ApprovedSubmissionsController::class, 'DeleteApprovedSubmissions']);

$router->add('/cancelled_submissions', [CancelledSubmissionsController::class, 'ShowCancelledSubmissions']);
$router->add('/cancelled_submissions/review', [CancelledSubmissionsController::class, 'ReviewApplicationDetails']);
$router->add('/cancelled_submissions/delete', [CancelledSubmissionsController::class, 'DeleteCancelledSubmissions']);
$router->add('/cancelled_submissions/reassign', [CancelledSubmissionsController::class, 'ReassignApplication']);

$router->add('/coordinator_attendance_tracking', [CoordinatorAttendanceTrackingController::class, 'ShowCoordinatorAttendanceTracking']);
$router->add('/coordinator_achievements', [CoordinatorAchievementsController::class, 'ShowCoordinatorAchievements']);
$router->add('/coordinator_inquiries', [CoordinatorInquiryController::class, 'ShowCoordinatorInquiry']);
$router->add('/coordinator_feedback', [CoordinatorFeedbackController::class, 'ShowCoordinatorFeedback']);
$router->add('/reports', [ReportsController::class, 'ShowReports']);

$router->add('/admin_dashboard', [AdminDashboardController::class, 'ShowAdminDashboard']);
$router->add('/admin_coordinator_management', [AdminCoorManagementController::class, 'ShowAdminCoorManagement']);
$router->add('/admin_volunteer_management', [AdminVolunManagementController::class, 'ShowAdminVolunManagement']);
$router->add('/admin_directory', [AdminDirectoryController::class, 'ShowAdminDirectory']);
$router->add('/cities_directory', [CitiesDirectoryController::class, 'ShowCitiesDirectory']);
$router->add('/view_coordinator_details', [ViewCoordinatorDetailsController::class, 'ShowViewCoordinatorDetails']);
$router->add('/admin_attendance_tracking', [AdminAttendanceController::class, 'ShowAdminAttendance']);
$router->add('/admin_attendance_summary', [AdminAttendanceSummaryController::class, 'ShowAdminAttendanceSummary']);
$router->add('/precincts', [AdminPrecinctsController::class, 'ShowAdminPrecincts']);
$router->add('/admin_achievements', [AdminAchievementsController::class, 'ShowAdminAchievements']);
$router->add('/admin_inquiries', [AdminInquiryController::class, 'ShowAdminInquiry']);
$router->add('/admin_feedback', [AdminFeedbackController::class, 'ShowAdminFeedback']);
$router->add('/admin_reports', [AdminReportsController::class, 'ShowAdminReports']);

$router->add('/whoweare', [LandingPageController::class, 'ShowWhoWeAre']);
$router->add('/mission_vision', [LandingPageController::class, 'ShowMissionVision']);
$router->add('/organization_profile', [LandingPageController::class, 'ShowOrganizationProfile']);
$router->add('/volunteers', [LandingPageController::class, 'ShowVolunteers']);
$router->add('/resources', [LandingPageController::class, 'ShowResources']);
$router->add('/events', [LandingPageController::class, 'ShowEvents']);

$router->add('/pollwatchers', [LandingPageController::class, 'ShowPollwatchers']);
$router->add('/psv', [LandingPageController::class, 'ShowPSV']);
$router->add('/upce', [LandingPageController::class, 'ShowUPCE']);
$router->add('/vad', [LandingPageController::class, 'ShowVAD']);
$router->add('/eo', [LandingPageController::class, 'ShowEO']);

$router->add('/announcement1', [LandingPageController::class, 'ShowAnnouncement1']);
$router->add('/announcement2', [LandingPageController::class, 'ShowAnnouncement2']);
$router->add('/announcement3', [LandingPageController::class, 'ShowAnnouncement3']);
$router->add('/announcement4', [LandingPageController::class, 'ShowAnnouncement4']);
$router->add('/announcement5', [LandingPageController::class, 'ShowAnnouncement5']);




// $router->add('/dashboard', [DashboardController::class, 'dashboard']);
// $router->add('/parishes', [ParishController::class, 'getParishes']);
// $router->add('/profile/submit', [ProfileController::class,'updateProfile']);
// $router->add('/profile', [ProfileController::class,'profile']);
// $router->add('/heatmap', [HeatmapController::class, 'showHeatmap']);


$router->run();


