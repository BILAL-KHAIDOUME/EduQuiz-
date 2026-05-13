<?php

declare(strict_types=1);

class QuizRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function create(Quiz $quiz): bool
    {
        $sql = "
            INSERT INTO quizzes
            (
                teacher_id,
                title,
                description,
                access_code,
                time_limit,
                max_attempts
            )
            VALUES
            (
                :teacher_id,
                :title,
                :description,
                :access_code,
                :time_limit,
                :max_attempts
            )
        ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':teacher_id' => $quiz->getTeacherId(),
            ':title' => $quiz->getTitle(),
            ':description' => $quiz->getDescription(),
            ':access_code' => $quiz->getAccessCode(),
            ':time_limit' => $quiz->getTimeLimit(),
            ':max_attempts' => $quiz->getMaxAttempts()
        ]);
    }
}