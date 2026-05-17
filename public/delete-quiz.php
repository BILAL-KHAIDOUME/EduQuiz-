<?php
require('../config/Database.php');

$pdo = Database::connect();

$id = $_POST['id'] ?? $_GET['id'] ?? null;

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM quizzes WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: ../src/Views/teacher/dashboard.php");
exit;