<?php
class Database {
    // Heroku connection:
    private static $dsn = 'wcwimj6zu5aaddlj.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
    private static $username = 'jmqo0tnlxl6jifjr';
    private static $password = 'dykvocu437rjbd4m';
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