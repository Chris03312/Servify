<?php 

class Coorsidebarinfo {
    
    public static function sidebarinfo() {
        try {
            
        }catch (PDOException $e) {
            error_log('error at coordinator sidebar'. $e->getMessage());
        }
    }
}