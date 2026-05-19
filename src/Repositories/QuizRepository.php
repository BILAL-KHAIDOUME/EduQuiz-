<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../Entities/Quiz.php';

// Repository = a class that talks to the database for one entity
class QuizRepository {
    private PDO $pdo;

    public function __construct() {
        $db        = new Database();
        $this->pdo = $db->getConnection();
    }

    // Find a quiz by its access code (used by the student)
    public function findByCode(string $code): ?Quiz {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM quizzes WHERE access_code = :code LIMIT 1"
        );
        $stmt->execute([':code' => $code]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null; // no quiz found with this code
        }

        return new Quiz(
            (int)$row['id'],
            $row['title'],
            $row['description'],
            $row['access_code'],
            (int)$row['time_limit']
        );
    }
}
