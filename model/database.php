<?php
class Database{ 
    private static $dsn = 'mysql:host=localhost;dbname=cardmanager';
    private static $username = 'jubeik';
    private static $password = 'nEWUSERE=MC2!';
    private static $db;
    
    private function __construct(){}
    
    public static function getDB () {   
        if(!isSet(self::$db)){                  
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                display_db_error($error_message);
                exit();
            }
        }
        return self::$db;
    }
    
    public static function display_db_error($error_message){
        include('../errors/database_error.php');
        exit();
    }
    
    public static function pokemonApiCall() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        return $ch;
    }
}
?>