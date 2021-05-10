<?php
class Database {
    // Heroku connection:
    private static $dsn = 'mysql:host=z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=q5eb1vj9faharoe4';
    private static $username = 'qt34l1n36ohrcfn6';
    private static $password = 'rbqy5g1b3879gv4e';
    private static $db;
    
    // (local development server connection):
    // private static $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    // private static $username = 'root';
    // private static $password = 'pa55word';

    private function __construct() {}

    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                // Heroku connection:
                self::$db = new PDO(self::$dsn, self::$username, self::$password);

                // (local development server connection):
                // if using a $password, add it as 3rd parameter
                // $db = new PDO($dsn, $username);
            } catch (PDOException $e) {
                $error = "Database Error: ";
                $error .= $e->getMessage();
                include('../view/error.php');
                exit();
            }
        }
        return self::$db;
    }
}
?>