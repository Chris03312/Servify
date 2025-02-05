<?php 

require_once __DIR__ . '/../configuration/Database.php';

class Application {

    public static function getinfoapplication() {
        try {

            $email = $_SESSION['email'];

            $db = Database::getConnection();

            $stmt = $db->prepare('SELECT * FROM VPROFILE_TABLE WHERE EMAIL = :email');
            $stmt->execute([':email' => $email]);
            $userInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $userInfo;
        }catch (PDOException $e) {
            error_log("Get info error ". $e->getMessage());
        }
    }

}