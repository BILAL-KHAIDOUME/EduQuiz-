<?php

declare(strict_types=1);

session_start();

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../src/Repositories/UserRepository.php';
require_once __DIR__ . '/../src/Services/AuthService.php';


use Src\Services\AuthService;
                                                                         
$authService = new AuthService();

$action = $_GET['action'] ?? 'login';


if ($action === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $authService->register([
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'role' => $_POST['role']
    ]);

    header('Location: ?action=login');
    exit;
}


if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $success = $authService->login(
        $_POST['email'],
        $_POST['password']
    );

    if ($success) {
        header('Location: ?action=dashboard');
        exit;
    }

    echo "Email ou mot de passe incorrect";
}

if ($action === 'logout') {

    $authService->logout();

    header('Location: ?action=login');
    exit;
}

switch ($action) {

    case 'register':
        require_once __DIR__ . '/../src/Views/register.php';
        break;

    case 'dashboard':

        // protection
        if (!isset($_SESSION['user'])) {
            header('Location: ?action=login');
            exit;
        }

        require_once __DIR__ . '/../src/Views/dashboard.php';
        break;

    default:
        require_once __DIR__ . '/../src/Views/login.php';
        break;
}