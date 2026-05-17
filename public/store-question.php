<?php

declare(strict_types=1);

require_once '../config/Database.php';

require_once '../src/Entities/Question.php';
require_once '../src/Entities/Choice.php';

require_once '../src/Repositories/QuestionRepository.php';
require_once '../src/Repositories/ChoiceRepository.php';

$pdo = Database::connect();

$questionRepository = new QuestionRepository($pdo);

$choiceRepository = new ChoiceRepository($pdo);

$question = new Question(
    null,
    $_POST['question_text'],
    (int) $_POST['points'],
    (int) $_POST['quiz_id']
);

$isCreated = $questionRepository->create($question);

if (!$isCreated) {
    die('Error creating question');
}

$questionId = (int) $pdo->lastInsertId();

$choices = $_POST['choices'];

$correctChoiceIndex = (int) $_POST['correct_choice'];

foreach ($choices as $index => $choiceText) {

    $isCorrect = $index === $correctChoiceIndex;

    $choice = new Choice(
        null,
        $choiceText,
        $isCorrect,
        $questionId
    );

    $choiceRepository->create($choice);
}

header('Location: ../src/Views/teacher/dashboard.php');

exit;