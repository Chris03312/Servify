<?php
require_once __DIR__ . '/../configuration/Database.php';

class VolunteerFeedback
{
    public $volunteer_experience;
    public $system_experience;
    public $feedback_text;
    public $email;

    // Save feedback to the database
    public function saveFeedback()
    {
        $db = Database::getConnection();

        // Debugging: Check the data being inserted
        error_log("Saving Feedback - Volunteer Experience: " . $this->volunteer_experience);
        error_log("Saving Feedback - System Experience: " . $this->system_experience);
        error_log("Saving Feedback - Feedback Text: " . $this->feedback_text);
        error_log("Saving Feedback - Email: " . $this->email);

        // Prepare the SQL query
        $query = "INSERT INTO volunteer_feedback (volunteer_experience, system_experience, feedback_text, email) 
                  VALUES (:volunteer_experience, :system_experience, :feedback_text, :email)";
        
        // Prepare the statement
        try {
            $stmt = $db->prepare($query);

            // Bind parameters to the query
            $stmt->bindParam(':volunteer_experience', $this->volunteer_experience);
            $stmt->bindParam(':system_experience', $this->system_experience);
            $stmt->bindParam(':feedback_text', $this->feedback_text);
            $stmt->bindParam(':email', $this->email);

            // Execute the query
            if ($stmt->execute()) {
                error_log("Feedback successfully saved.");
                return true;  // Success
            } else {
                error_log("Error executing query: " . implode(":", $stmt->errorInfo()));
                return false;
            }
        } catch (PDOException $e) {
            error_log("Error during saving feedback: " . $e->getMessage());
            return false;
        }
    }
}
