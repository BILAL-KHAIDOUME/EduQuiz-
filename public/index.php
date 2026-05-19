<?php

// ── Autoload all classes ───────────────────────────────────────────
require_once __DIR__ . '/../src/Services/QuizService.php';

// ── Start session (to pass quiz data between pages) ───────────────
session_start();

$service = new QuizService();
$action  = $_POST['action'] ?? 'show_code'; // default: show the code entry page

// ─────────────────────────────────────────────────────────────────
//  ROUTING  (decides which view to show based on what happened)
// ─────────────────────────────────────────────────────────────────

// ── Step 1: Student enters the access code ────────────────────────
if ($action === 'enter_code') {
    $code = strtoupper(trim($_POST['code'] ?? ''));
    $data = $service->getQuizByCode($code);

    if ($data === null) {
        // Wrong code → show error on the entry page
        $error   = "Code invalide. Vérifiez avec votre formateur.";
        $oldCode = $code;
        require __DIR__ . '/../src/Views/enter_code.php';
    } else {
        // Good code → store quiz in session and show the quiz page
        $_SESSION['quiz']      = $data['quiz'];
        $_SESSION['questions'] = $data['questions'];
        $quiz      = $data['quiz'];
        $questions = $data['questions'];
        require __DIR__ . '/../src/Views/quiz.php';
    }
}

// ── Step 2: Student submits their answers ─────────────────────────
elseif ($action === 'submit_quiz') {
    // Get quiz and questions from session
    $quiz      = $_SESSION['quiz']      ?? null;
    $questions = $_SESSION['questions'] ?? null;

    if ($quiz === null || $questions === null) {
        // Session expired → go back to start
        header('Location: index.php');
        exit;
    }

    // answers[0]=2, answers[1]=0, ... (question index => chosen option index)
    $userAnswers = [];
    foreach ($_POST['answers'] ?? [] as $qi => $ai) {
        $userAnswers[(int)$qi] = (int)$ai;
    }

    // Calculate the score
    $result = $service->calculateScore($questions, $userAnswers);

    // Clear session
    unset($_SESSION['quiz'], $_SESSION['questions']);

    require __DIR__ . '/../src/Views/results.php';
}

// ── Default: show the code entry page ────────────────────────────
else {
    require __DIR__ . '/../src/Views/enter_code.php';
}
