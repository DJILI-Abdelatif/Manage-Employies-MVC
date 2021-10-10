<?php  

    namespace controllers;

    use core\Response;
    use core\Session;
    use models\Employe;

    class EmployesController
    {

        public function getAllEmployes() {
            return Employe::getAllEmployes();
        }

        public function addEmploye() {
            $data = [];
            if(isset($_POST['submit'])) {
                $data['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS); 
                $data['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); 
                if(Employe::addEmploye($data)) {
                    Session::flashSession('success', 'Element Inserted');
                    Response::redirect('home');
                } else {
                    Session::flashSession('warning', 'Faild To Insert');
                }
            }
        }
        
        public function getOneEmploye() {
            if(isset($_POST['updateEmploye'])) {
                $id = filter_input(INPUT_POST, 'id_employe', FILTER_SANITIZE_NUMBER_INT); 
                return Employe::getOneEmploye($id); 
            }
        }

        public function updateEmploye() {
            $data = [];
            if(isset($_POST['submit'])) {
                $data['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS); 
                $data['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); 
                $data['id'] = filter_input(INPUT_POST, 'id_employe', FILTER_SANITIZE_NUMBER_INT); 
                if(Employe::updateEmploye($data)) {
                    Session::flashSession('success', 'Element Updated');
                    Response::redirect('home');
                } else {
                    Session::flashSession('warning', 'Faild To Updated');
                }
            }
        }

        public function deleteEmploye() {
            if(isset($_POST['deleteEmploye'])) {
                $id = filter_input(INPUT_POST, 'id_employe', FILTER_SANITIZE_NUMBER_INT);
                if(Employe::deleteEmploye($id)) {
                    echo 'Employe Deleted';
                    Response::redirect('home');
                } else {
                    echo 'Not Deleted';
                }
            }
        }

        public function findEmploye() {
            if(isset($_POST['findEmploye'])) {
                $data = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
                return Employe::findEmploye($data); 
            }
        }
    }

?>