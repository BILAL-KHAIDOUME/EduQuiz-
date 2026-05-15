<?php

namespace Src\Services;

use Src\Repositories\UserRepository;

class AuthService
{
    private UserRepository $repo;

    public function __construct()
    {
        $this->repo = new UserRepository();
    }

    public function register(array $data): bool
    {
        $name = trim($data['name'] ?? '');
        $email = trim($data['email'] ?? '');
        $password = $data['password'] ?? '';
        $role = $data['role'] ?? 'student';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return false;
        if ($name === '' || strlen($password) < 8) return false;

        if ($this->repo->findByEmail($email)) return false;

        return $this->repo->create([
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'role' => $role
        ]);
    }

    public function login(string $email, string $password): bool
    {
        $user = $this->repo->findByEmail($email);

        if (!$user) return false;

        if (!password_verify($password, $user['password'])) return false;

        $_SESSION['user'] = $user;

        return true;
    }

    public function logout(): void
    {
        session_destroy();
    }
}