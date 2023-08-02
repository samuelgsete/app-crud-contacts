<?php
    class ContactRepository {

        public static $pdo;

        function __construct() {
            try {
                $username = 'root';
                $password = 'root';
                $database = 'crudcontactsdb';
                self::$pdo = new PDO('mysql:host=localhost;dbname='.$database, $username, $password);
                // Configuração para exibir os erros
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            }
            catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }

        public function findById($id) {
            $sql = self::$pdo->prepare("SELECT * FROM contacts WHERE id = ".$id);
            $sql->execute();
            $foundContact = $sql->fetch();
            return $foundContact;     
        }

        public function findAll($search) {
            try {
                $sql = self::$pdo->prepare("SELECT * FROM contacts WHERE first_name LIKE '%". $search ."%' OR last_name LIKE '%". $search ."%'");
                $sql->execute();
                $contacts = $sql->fetchAll();
                return $contacts;
            }
            catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }

        public function create($first_name, $last_name, $email, $phone) {
            try {
                $sql = self::$pdo->prepare("INSERT INTO contacts (first_name, last_name, email, phone) VALUES (?,?,?,?)");
                $sql->execute(
                    array(
                        $first_name, 
                        $last_name, 
                        $email, 
                        $phone
                ));
            }
            catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }

        public function deleteOne($id) {
            try {
                $sql = self::$pdo->prepare('DELETE FROM contacts WHERE id = '.$id);
                $sql->execute();
            }
            catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }

        public function update($id, $first_name, $last_name, $email, $phone) {
            try {
                $sql = self::$pdo->prepare("UPDATE contacts SET first_name = ?, last_name = ?, email = ?, phone = ? WHERE id = ".$id);
                $sql->execute(
                    array(
                        $first_name, 
                        $last_name, 
                        $email, 
                        $phone
                    )
                );
            }
            catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    }
?>