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
        (teacher_id, title, description, access_code, time_limit, max_attempts)
        VALUES
        (:teacher_id, :title, :description, :access_code, :time_limit, :max_attempts)
    ";

    return $this->pdo->prepare($sql)->execute($quiz->toArray());
}
}