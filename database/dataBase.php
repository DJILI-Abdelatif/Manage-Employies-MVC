<?php

    namespace database;

    use PDO;
    use PDOException;

    class Database
    {

        public static string $host = 'localhost';
        public static string $dbname = 'mvc4';
        public static string $username = 'root';
        public static string $password = '';
        public static array $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ];


        public function connect()
        {
            try {
                $connect = new PDO("mysql: host=localhost; dbname=mvc4",
                    self::$username, self::$password, self::$options);
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $connect;
            } 
            catch(PDOException $e) {
                echo 'Faild To Connect: '. $e->getMessage();
            }
        }

        public function prepare($sql) {
            return Database::connect()->prepare($sql);
        }


    }

?>