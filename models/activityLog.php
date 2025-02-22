<?php

require_once __DIR__ . '/../configuration/Database.php';

function getActivityLog($email, $username)
{
    try {
        // Validate input
        if (empty($email) || empty($username)) {
            return [];
        }

        // Establish database connection
        $db = Database::getConnection();

        // Query activities for the specific user
        $stmt = $db->prepare('
            SELECT DESCRIPTION, CREATED_AT
            FROM ACTIVITIES
            WHERE username = :username OR email = :email
            ORDER BY CREATED_AT DESC
        ');
        $stmt->execute(['username' => $username, 'email' => $email]);

        $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return formatActivityDates($activities);

    } catch (PDOException $e) {
        error_log('Database error in getActivityLog: ' . $e->getMessage());
        return [];
    } catch (Exception $e) {
        error_log('General error in getActivityLog: ' . $e->getMessage());
        return [];
    }
}

function formatActivityDates($activities)
{
    $currentDate = (new DateTime())->format('Y-m-d');

    foreach ($activities as &$activity) {
        $date = new DateTime($activity['CREATED_AT']);
        $activityDate = $date->format('Y-m-d');

        if ($activityDate === $currentDate) {
            $activity['FORMATTED_DATE'] = 'Today, ' . $date->format('h:i A');
        } else {
            $activity['FORMATTED_DATE'] = $date->format('D, h:i A');
        }
    }
    return $activities;
}
