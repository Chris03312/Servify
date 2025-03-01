<?php
require_once __DIR__ . '/../configuration/Database.php';

class Accounts
{
    public static function getAccounts($email)
    {

        try {
            $db = Database::getConnection();

            $stmt = $db->prepare('SELECT * FROM ACCOUNTS WHERE EMAIL = :email');
            $stmt->execute([':email' => $email]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log('Error in getting accounts' . $e->getMessage());
        }
    }
}