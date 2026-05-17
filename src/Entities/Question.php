<?php

declare(strict_types=1);

class Question
{
    private ?int $id;
    private string $questionText;
    private int $points;
    private int $quizId;

    public function __construct(
        ?int $id,
        string $questionText,
        int $points,
        int $quizId
    ) {
        $this->id = $id;
        $this->questionText = $questionText;
        $this->points = $points;
        $this->quizId = $quizId;
    }

    public function getQuestionText(): string
    {
        return $this->questionText;
    }

    public function getPoints(): int
    {
        return $this->points;
    }

    public function getQuizId(): int
    {
        return $this->quizId;
    }
}