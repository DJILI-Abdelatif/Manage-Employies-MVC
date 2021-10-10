<?php 

    namespace models;

    use core\Model;
    use database\Database;
    use PDO;

    class User 
    {

        public function createUser(array $data) {
            $sql = "INSERT INTO 
                        users(fullname, username, password) 
                    VALUES(
                        :fullname,
                        :username,
                        :password
                    )";
            $statment = Database::prepare($sql);
            $statment->bindParam(':fullname', $data['fullname']);
            $statment->bindParam(':username', $data['username']);
            $statment->bindParam(':password', $data['password']);
            if($statment->execute()) return true;
            return false;
        }

        public function loginUser(string $username) {
            $sql = "SELECT * FROM users WHERE username = :username";
            $statment = Database::prepare($sql);
            $statment->bindParam(':username', $username);
            if($statment->execute()) return $statment->fetch(PDO::FETCH_OBJ); 
        }

    }

?>