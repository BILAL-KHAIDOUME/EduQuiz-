<?php

require_once __DIR__ . '/../Repositories/UserRepository.php';

class AuthService
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    
    public function register($name, $email, $password, $role)
    {
        $existingUser = $this->userRepository
            ->findByEmail($email);

        if($existingUser){

            return "Email already exists";
        }

        $hashedPassword = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $this->userRepository->create(
            $name,
            $email,
            $hashedPassword,
            $role
        );

        return true;
    }

    
    public function login($email, $password)
    {
        $user = $this->userRepository
            ->findByEmail($email);

        if(!$user){

            return "User not found";
        }

        if(!password_verify(
            $password,
            $user['password']
        )){
            return "Wrong password";
        }

        session_start();

        $_SESSION['user'] = $user;

        return true;
    }
}