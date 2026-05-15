<?php

declare(strict_types=1);

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

/* ================= LOAD FILES ================= */
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../src/Repositories/UserRepository.php';
require_once __DIR__ . '/../src/Services/AuthService.php';

use Src\Services\AuthService;

$auth = new AuthService();

$action = $_GET['action'] ?? 'login';

/* ================= REGISTER ================= */
if ($action === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $ok = $auth->register($_POST);

    if ($ok) {
        header("Location: index.php?action=login");
        exit;
    }

    die("REGISTER FAILED");
}

/* ================= LOGIN ================= */
if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $ok = $auth->login($_POST['email'], $_POST['password']);

    if ($ok) {
        header("Location: index.php?action=dashboard");
        exit;
    }

    die("LOGIN FAILED");
}

/* ================= LOGOUT ================= */
if ($action === 'logout') {
    $auth->logout();
    header("Location: index.php?action=login");
    exit;
}

/* ================= DASHBOARD ================= */
if ($action === 'dashboard') {

    if (!isset($_SESSION['user'])) {
        header("Location: index.php?action=login");
        exit;
    }

    require __DIR__ . '/../src/Views/dashboard.php';
    exit;
}

/* ================= VIEWS ================= */
if ($action === 'register') {
    require __DIR__ . '/../src/Views/register.php';
    exit;
}

require __DIR__ . '/../src/Views/login.php';