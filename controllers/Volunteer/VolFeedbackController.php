<?php
require_once __DIR__ . '/../../models/VolunteerFeedback.php'; // Assuming this is where the model is
require_once __DIR__ . '/../../models/Sidebarinfo.php'; // Assuming you still want to show sidebar info

class VolFeedbackController
{
    // Show the feedback form (GET request)
    public static function ShowVolFeedback()
    {
        // Check if the user is logged in
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

        // Render the feedback form
        view('Volunteer/volunteer_feedback', [
            'sidebarinfo' => $sidebarData
        ]);
    }

    // Insert feedback into the database (POST request)
    public static function submitFeedback()
    {
        // Check if the form is submitted via POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $volunteer_experience = $_POST['experienceAsVolunteer'] ?? '';
            $system_experience = $_POST['experienceOnSystem'] ?? '';
            $feedback_text = $_POST['feedback_text'] ?? '';
            $email = $_SESSION['email']; // Assuming the user's email is stored in the session

            // Validate the input data
            if (empty($volunteer_experience) || empty($system_experience) || empty($feedback_text)) {
                // Redirect with an error message if validation fails
                $_SESSION['error'] = "All fields are required.";
                header("Location: /volunteer_feedback");
                exit;
            }

            // Create a new VolunteerFeedback instance
            $feedback = new VolunteerFeedback();
            $feedback->volunteer_experience = $volunteer_experience;
            $feedback->system_experience = $system_experience;
            $feedback->feedback_text = $feedback_text;
            $feedback->email = $email;

            // Try to save the feedback in the database
            if ($feedback->saveFeedback()) {
                // Success - Redirect with a success message
                $_SESSION['success'] = "Your feedback has been submitted successfully.";
                header("Location: /volunteer_feedback");
                exit;
            } else {
                // Failure - Redirect with an error message
                $_SESSION['error'] = "Failed to submit feedback.";
                header("Location: /volunteer_feedback");
                exit;
            }
        }
    }
}
