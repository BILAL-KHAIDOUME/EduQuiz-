<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../Entities/Question.php';
require_once __DIR__ . '/../Entities/Answer.php';

class QuestionRepository {
    private PDO $pdo;

    public function __construct() {
        $db        = new Database();
        $this->pdo = $db->getConnection();
    }

    // Get all questions for a quiz, with their answers
    public function findByQuizId(int $quizId): array {
        // 1) Get questions
        $stmt = $this->pdo->prepare(
            "SELECT * FROM questions WHERE quiz_id = :quiz_id ORDER BY id"
        );
        $stmt->execute([':quiz_id' => $quizId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $questions = [];

        foreach ($rows as $row) {
            // 2) For each question, get its answers
            $answers = $this->getAnswersForQuestion((int)$row['id']);

            // Find the correct index (position of the correct answer)
            $correctIndex = 0;
            foreach ($answers as $i => $answer) {
                if ($answer->isCorrect) {
                    $correctIndex = $i;
                    break;
                }
            }

            $questions[] = new Question(
                (int)$row['id'],
                (int)$row['quiz_id'],
                $row['text'],
                $answers,
                $correctIndex
            );
        }

        return $questions;
    }

    // Get all answers for one question
    private function getAnswersForQuestion(int $questionId): array {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM answers WHERE question_id = :qid ORDER BY id"
        );
        $stmt->execute([':qid' => $questionId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $answers = [];
        foreach ($rows as $row) {
            $answers[] = new Answer(
                (int)$row['id'],
                (int)$row['question_id'],
                $row['text'],
                (bool)$row['is_correct']
            );
        }
        return $answers;
    }
}

