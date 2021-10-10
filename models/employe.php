<?php

    namespace models;

    use database\Database;

    class Employe
    {

        public function getAllEmployes() {
            $sql = "SELECT * FROM employes";
            $statment = Database::prepare($sql);
            $statment->execute();
            return $statment->fetchAll();
        }
        
        public function addEmploye(array $data) {
            $sql = "INSERT INTO 
                        employes(name, email, created_at)
                    VALUES (
                        :name,
                        :email,
                        now())";
            $statment = Database::prepare($sql);
            $statment->bindParam(':name', $data['name']);
            $statment->bindParam(':email', $data['email']);
            if($statment->execute()) return true;
            return false;
        }

        public function getOneEmploye(int $id) {
            $sql = "SELECT * FROM employes WHERE id = ?";
            $statment = Database::prepare($sql);
            $statment->bindParam(1, $id);
            if($statment->execute()) return $statment->fetch();
            return false;
        }

        public function updateEmploye(array $data) {
            $sql = "UPDATE 
                        Employes 
                    SET 
                        name = :name,
                        email = :email
                    WHERE
                        id = :id";
            $statment = Database::prepare($sql);
            $statment->bindParam(':name', $data['name']);
            $statment->bindParam(':email', $data['email']);
            $statment->bindParam(':id', $data['id']);
            if($statment->execute()) return true;
            return false;
        }

        public function deleteEmploye(int $id) {
            $sql = "DELETE FROM employes WHERE id = ?";
            $statment = Database::prepare($sql);
            $statment->bindParam(1, $id);
            if($statment->execute()) return true;
            return false;
        }

        public function findEmploye(string $data) {
            $sql = "SELECT * FROM employes WHERE name LIKE ? OR email LIKE ?";
            $statment = Database::prepare($sql);
            if($statment->execute(array("%$data%", "%$data%"))) return $statment->fetchAll();
            return false;
        }
    }

?>