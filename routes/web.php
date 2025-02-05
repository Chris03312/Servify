<?php

require_once __DIR__ . '/../core/helpers.php'; 
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../models/Parish.php';
require_once __DIR__ . '/../controllers/VolunteerDashboardController.php';
require_once __DIR__ . '/../controllers/VolunteerRegistrationStatusController.php';
require_once __DIR__ . '/../controllers/VolunteerNewApplicationController.php';
require_once __DIR__ . '/../controllers/VolunteerRenewalApplicationController.php';
require_once __DIR__ . '/../controllers/LoginController.php';
require_once __DIR__ . '/../controllers/LandingPageController.php';
require_once __DIR__ . '/../controllers/SignUpController.php';
// require_once __DIR__ . '/../controllers/HeatmapController.php';
// require_once __DIR__ . '/../controllers/ParishController.php';
// require_once __DIR__ . '/../controllers/ProfileController.php';
require_once __DIR__ . '/../controllers/LogoutController.php';
// require_once __DIR__ . '/../controllers/DashboardController.php';
// require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/ContactUsController.php';
require_once __DIR__ . '/../controllers/AnnouncementController.php';
require_once __DIR__ . '/../controllers/CommentController.php';
require_once __DIR__ . '/../models/Announcement.php';
require_once __DIR__ . '/../models/Comment.php';

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

$router->add('/ContactUs', [ContactUsController::class, 'ShowContactUs']);
$router->add('/ContactUs/submit', [ContactUsController::class, 'ContactUs']);

$router->add('/Announcement', [AnnouncementController::class, 'ShowAnnouncements']);
$router->add('/Announcement/submit', [AnnouncementController::class, 'Comments']);


// $router->add('/dashboard', [DashboardController::class, 'dashboard']);
// $router->add('/parishes', [ParishController::class, 'getParishes']);
// $router->add('/profile/submit', [ProfileController::class,'updateProfile']);
// $router->add('/profile', [ProfileController::class,'profile']);
// $router->add('/heatmap', [HeatmapController::class, 'showHeatmap']);
$router->add('/logout', [LogoutController::class, 'Logout']);

$router->run();


