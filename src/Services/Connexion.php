<?php
class Connexion {

    private $host = "localhost";
    private $dbname = "eduquiz";
    private $username = "root";
    private $password = "";

    public function connect() {

        try {
            $pdo = new PDO(
                "mysql:host=".$this->host.";dbname=".$this->dbname,
                $this->username,
                $this->password
            );
            
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
                        
            } catch (PDOException $e) {

            die("Erreur connexion : " . $e->getMessage());

        }

    }

}
