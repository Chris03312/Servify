<?php

require_once __DIR__ . '/../core/helpers.php';
require_once __DIR__ . '/../core/Router.php';

// COORDINATORS
require_once __DIR__ . '/../controllers/Coordinator/CoordinatorDashboardController.php';
require_once __DIR__ . '/../controllers/Coordinator/CoordinatorProfileSettingsController.php';
require_once __DIR__ . '/../controllers/Coordinator/CoordinatorChangesPassController.php';
require_once __DIR__ . '/../controllers/Coordinator/CoordinatorAnnouncementsController.php';
require_once __DIR__ . '/../controllers/Coordinator/VolunteerApplicationDetailsController.php';
require_once __DIR__ . '/../controllers/Coordinator/CoordinatorProfileController.php';
require_once __DIR__ . '/../controllers/Coordinator/CoordinatorVolunteerManagementController.php';
require_once __DIR__ . '/../controllers/Coordinator/DistrictVolunteerDirectoryController.php';
require_once __DIR__ . '/../controllers/Coordinator/BarangayVolunteerDirectoryController.php';
require_once __DIR__ . '/../controllers/Coordinator/PollingAreaController.php';
require_once __DIR__ . '/../controllers/Coordinator/ListOfVolunteerController.php';
require_once __DIR__ . '/../controllers/Coordinator/PendingSubmissionsController.php';
require_once __DIR__ . '/../controllers/Coordinator/UnderReviewSubmissionsController.php';
require_once __DIR__ . '/../controllers/Coordinator/ApprovedSubmissionsController.php';
require_once __DIR__ . '/../controllers/Coordinator/CancelledSubmissionsController.php';
require_once __DIR__ . '/../controllers/Coordinator/CoordinatorAttendanceTrackingController.php';
require_once __DIR__ . '/../controllers/Coordinator/CoordinatorAchievementsController.php';
require_once __DIR__ . '/../controllers/Coordinator/CoordinatorInquiryController.php';
require_once __DIR__ . '/../controllers/Coordinator/AddNewVolunteerController.php';
require_once __DIR__ . '/../controllers/Coordinator/CoordinatorFeedbackController.php';
require_once __DIR__ . '/../controllers/Coordinator/ReportsController.php';
require_once __DIR__ . '/../controllers/Coordinator/ViewVolunteerProfileController.php';
require_once __DIR__ . '/../controllers/Coordinator/AddNewVolunteerController.php';

// VOLUNTEERS
require_once __DIR__ . '/../controllers/Volunteer/VolunteerDashboardController.php';
require_once __DIR__ . '/../controllers/Volunteer/VolunteerAttendanceController.php';
require_once __DIR__ . '/../controllers/Volunteer/VolunteerRegistrationStatusController.php';
require_once __DIR__ . '/../controllers/Volunteer/VolunteerNewApplicationController.php';
require_once __DIR__ . '/../controllers/Volunteer/VolunteerRenewalApplicationController.php';
require_once __DIR__ . '/../controllers/Volunteer/AchievementsController.php';
require_once __DIR__ . '/../controllers/Volunteer/AnnouncementController.php';
require_once __DIR__ . '/../controllers/Volunteer/VolunteerApplicationDetailsController.php';
require_once __DIR__ . '/../controllers/Volunteer/VolFeedbackController.php';
require_once __DIR__ . '/../controllers/Volunteer/VolunteerDetailsController.php';
require_once __DIR__ . '/../controllers/Volunteer/ContactUsController.php';
require_once __DIR__ . '/../controllers/Volunteer/GenerateIDController.php';

// ADMIN
require_once __DIR__ . '/../controllers/Admin/AdminDashboardController.php';
require_once __DIR__ . '/../controllers/Admin/AdminCoorManagementController.php';
require_once __DIR__ . '/../controllers/Admin/AdminVolunManagementController.php';
require_once __DIR__ . '/../controllers/Admin/AdminDirectoryController.php';
require_once __DIR__ . '/../controllers/Admin/CitiesDirectoryController.php';
require_once __DIR__ . '/../controllers/Admin/ViewCoordinatorDetailsController.php';
require_once __DIR__ . '/../controllers/Admin/AdminAttendanceController.php';
require_once __DIR__ . '/../controllers/Admin/AdminAttendanceSummaryController.php';
require_once __DIR__ . '/../controllers/Admin/AdminPrecinctsController.php';
require_once __DIR__ . '/../controllers/Admin/AdminAchievementsController.php';
require_once __DIR__ . '/../controllers/Admin/AdminInquiryController.php';
require_once __DIR__ . '/../controllers/Admin/AdminFeedbackController.php';
require_once __DIR__ . '/../controllers/Admin/AdminReportsController.php';

// LANDING PAGE
require_once __DIR__ . '/../controllers/LandingPage/LandingPageController.php';
require_once __DIR__ . '/../controllers/LoginController.php';
require_once __DIR__ . '/../controllers/SignUpController.php';
require_once __DIR__ . '/../controllers/LogoutController.php';

$router = new Router();

$router->add('/', function () use ($router) {
    $router->redirect('/index'); // Now $router is available inside the closure
});

// Landing Page
$router->add('/index', [LandingPageController::class, 'ShowLandingPage']);
$router->add('/logout', [LogoutController::class, 'Logout']);
$router->add('/login', [LoginController::class, 'ShowLoginForm']);
$router->add('/login/submit', [LoginController::class, 'Login']);
$router->add('/signup', [SignUpController::class, 'ShowSignUp']);
$router->add('/signup/submit', [SignUpController::class, 'SignUp']);

$router->add('/whoweare', [LandingPageController::class, 'ShowWhoWeAre']);
$router->add('/mission_vision', [LandingPageController::class, 'ShowMissionVision']);
$router->add('/organization_profile', [LandingPageController::class, 'ShowOrganizationProfile']);
$router->add('/volunteers', [LandingPageController::class, 'ShowVolunteers']);
$router->add('/resources', [LandingPageController::class, 'ShowResources']);
$router->add('/events', [LandingPageController::class, 'ShowEvents']);
$router->add('/announcement2', [LandingPageController::class, 'ShowAnnouncement']);
$router->add('/resources', [LandingPageController::class, 'ShowResources']);
$router->add('/pollwatchers', [LandingPageController::class, 'ShowPollwatchers']);





// Volunteer
$router->add('/volunteer_dashboard', [VolunteerDashboardController::class, 'VolunteerDashboard']);
$router->add('/volunteer_registration_status', [VolunteerRegistrationStatusController::class, 'VolunteerRegistrationStatus']);
$router->add('/volunteer_new_application', [VolunteerNewApplicationController::class, 'VolunteerNewApplication']);
$router->add('/volunteer_new_application/validate', [VolunteerNewApplicationController::class, 'validateForms']);
$router->add('/volunteer_new_application/submit', [VolunteerNewApplicationController::class, 'NewApplication']);
$router->add('/volunteer_renewal_application', [VolunteerRenewalApplicationController::class, 'RenewalApplication']);
$router->add('/volunteer_attendance', [VolunteerAttendanceController::class, 'VolunteerAttendances']);
$router->add('/volunteer_application_details', [VolunteerApplicationDetailsController::class, 'ShowVolunteerApplicationDetails']);
$router->add('/volunteer_feedback', [VolFeedbackController::class, 'ShowVolFeedback']);
$router->add('/volunteer_feedback/submit', [VolFeedbackController::class, 'submitFeedback']);
$router->add('/volunteer_details', [VolunteerDetailsController::class, 'ShowVolunteerDetails']);
$router->add('/announcements', [AnnouncementController::class, 'ShowAnnouncements']);
$router->add('/announcement/submit', [AnnouncementController::class, 'AddComment']);
$router->add('/achievements', [AchievementsController::class, 'Achievements']);
$router->add('/ContactUs', [ContactUsController::class, 'ShowContactUs']);
$router->add('/ContactUs/submit', [ContactUsController::class, 'ContactUs']);
$router->add('/generate_id', [GenerateIDController::class, 'ShowGenerateID']);

// Coordinator
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
$router->add('/view_volunteer_profile', [ViewVolunteerProfileController::class, 'ShowVolunteerProfile']);
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

// Admin
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

$router->add('/add_new_coordinator', [AdminCoorManagementController::class, 'ShowAddCoordinator']);



$router->run();


