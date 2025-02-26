<?php

class Adminreports
{

    public static function getVolunteerList()
    {
        try {
            $db = Database::getConnection();

            $stmt = $db->prepare('
            SELECT
                v.*,
                CONCAT(p.FIRST_NAME, " ", COALESCE(p.MIDDLE_NAME, ""), " ", p.SURNAME) AS COORDINATOR,
                p.DISTRICT
            FROM VOLUNTEERS_TBL AS v
            INNER JOIN CPROFILE_TABLE AS p
            ON v.PARISH = p.PARISH
            ');
            $stmt->execute();
            $volunteersList = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $currentDate = date('Y');

            foreach ($volunteersList as &$volunteer) {
                if (!empty($volunteer['DATE_APPROVED'])) {
                    $volunteer['YEARSOFSERVICE'] = $currentDate - date("Y", strtotime($volunteer['DATE_APPROVED']));
                } else {
                    $volunteer['YEARSOFSERVICE'] = 0; // Default if DATE_APPROVED is missing
                }
            }

            return [
                'volunteersList' => $volunteersList
            ];
        } catch (PDOException $e) {
            error_log('Error in getting Volunteers List in admin reports: ' . $e->getMessage());
            return ['volunteersList' => []]; // Return an empty structure to avoid errors
        }
    }

    public static function numberofVolunteerPerYear()
    {
        try {
            $db = Database::getConnection();

            $stmt = $db->prepare('
            SELECT 
                DATE_REGISTERED,S
                SUM(CASE WHEN CITY = "Caloocan city" THEN 1 ELSE 0 END) AS CALOOCAN,
                SUM(CASE WHEN CITY = "Malabon city" THEN 1 ELSE 0 END) AS MALABON,
                SUM(CASE WHEN CITY = "Navotas city" THEN 1 ELSE 0 END) AS NAVOTAS,
                COUNT(VOLUNTEERS_ID) AS VOLUNTEERS
            FROM VOLUNTEERS_TBL
            GROUP BY DATE_REGISTERED
            ORDER BY DATE_REGISTERED ASC
        ');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error in getting number of volunteer per year' . $e->getMessage());
        }
    }

    public static function numberofVolunteerPerYearGraphs()
    {
        try {
            $db = Database::getConnection();

            $stmt = $db->prepare('
            SELECT
                COUNT(CASE WHEN CITY = "Caloocan city" THEN 1 END) AS CALOOCAN,
                COUNT(CASE WHEN CITY = "Malabon city" THEN 1 END) AS MALABON,
                COUNT(CASE WHEN CITY = "Navotas city" THEN 1 END) AS NAVOTAS,
                DATE_REGISTERED
            FROM VOLUNTEERS_TBL
        ');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error in getting number of volunteers per year: ' . $e->getMessage());
        }
    }


    public static function ageGroups()
    {
        try {
            $db = Database::getConnection();

            $stmt = $db->prepare("
                SELECT 
                    COUNT(CASE WHEN YEAR(CURDATE()) - BIRTHYEAR BETWEEN 18 AND 24 THEN 1 END) AS '18-24',
                    COUNT(CASE WHEN YEAR(CURDATE()) - BIRTHYEAR BETWEEN 25 AND 34 THEN 1 END) AS '25-34',
                    COUNT(CASE WHEN YEAR(CURDATE()) - BIRTHYEAR BETWEEN 35 AND 44 THEN 1 END) AS '35-44',
                    COUNT(CASE WHEN YEAR(CURDATE()) - y >= 45 THEN 1 END) AS '45+',
                    COUNT(*) AS TOTAL
                FROM VOLUNTEERS_TBL
                WHERE BIRTH_YEAR IS NOT NULL AND BIRTH_YEAR > 1900
            ");
            $stmt->execute();
            $ageCounts = $stmt->fetch(PDO::FETCH_ASSOC);

            // Ensure valid data
            $ageCounts = $ageCounts ?: ['18-24' => 0, '25-34' => 0, '35-44' => 0, '45+' => 0, 'TOTAL' => 0];

            // Calculate percentages
            $total = $ageCounts['TOTAL'] > 0 ? $ageCounts['TOTAL'] : 1; // Prevent division by zero
            $agePercentages = [
                '18-24' => round(($ageCounts['18-24'] / $total) * 100, 2),
                '25-34' => round(($ageCounts['25-34'] / $total) * 100, 2),
                '35-44' => round(($ageCounts['35-44'] / $total) * 100, 2),
                '45+' => round(($ageCounts['45+'] / $total) * 100, 2)
            ];

            return [
                'ageCounts' => $ageCounts,
                'agePercentages' => $agePercentages
            ];
        } catch (PDOException $e) {
            error_log('Error in getting age group: ' . $e->getMessage());
            return ['ageCounts' => ['18-24' => 0, '25-34' => 0, '35-44' => 0, '45+' => 0, 'TOTAL' => 0], 'agePercentages' => ['18-24' => 0, '25-34' => 0, '35-44' => 0, '45+' => 0]];
        }
    }
}