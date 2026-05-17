<?php

declare(strict_types=1);

class ChoiceRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function create(Choice $choice): bool
    {
        $sql = "
            INSERT INTO choices
            (
                question_id,
                choice_text,
                is_correct
            )
            VALUES
            (
                :question_id,
                :choice_text,
                :is_correct
            )
        ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':question_id' => $choice->getQuestionId(),
            ':choice_text' => $choice->getChoiceText(),
            ':is_correct' => $choice->isCorrect()
        ]);
    }
}