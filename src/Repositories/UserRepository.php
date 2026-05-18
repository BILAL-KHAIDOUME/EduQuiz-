<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../Entities/User.php';

class UserRepository
{
    private $db;

    public function __construct()
    {
        $database = new Database();

        $this->db = $database->connect();
    }

    public function findByEmail($email)
    {
        $sql = $this->db->prepare(
            "SELECT * FROM users WHERE email = ?"
        );

        $sql->execute([$email]);

        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    
    public function create($name, $email, $password, $role)
    {
        $sql = $this->db->prepare(
            "INSERT INTO users(name,email,password,role)
             VALUES(?,?,?,?)"
        );

        return $sql->execute([
            $name,
            $email,
            $password,
            $role
        ]);
    }
}