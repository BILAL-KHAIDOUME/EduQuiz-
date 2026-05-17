<?php

declare(strict_types=1);

class QuestionRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function create(Question $question): bool
    {
        $sql = "
            INSERT INTO questions
            (
                quiz_id,
                question_text,
                points
            )
            VALUES
            (
                :quiz_id,
                :question_text,
                :points
            )
        ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':quiz_id' => $question->getQuizId(),
            ':question_text' => $question->getQuestionText(),
            ':points' => $question->getPoints()
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare(
            "DELETE FROM questions WHERE id = :id"
        );

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}