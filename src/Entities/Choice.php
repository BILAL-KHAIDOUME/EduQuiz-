<?php

declare(strict_types=1);

class Choice
{
    private ?int $id;
    private string $choiceText;
    private bool $isCorrect;
    private int $questionId;

    public function __construct(
        ?int $id,
        string $choiceText,
        bool $isCorrect,
        int $questionId
    ) {
        $this->id = $id;
        $this->choiceText = $choiceText;
        $this->isCorrect = $isCorrect;
        $this->questionId = $questionId;
    }

    public function getChoiceText(): string
    {
        return $this->choiceText;
    }

    public function isCorrect(): bool
    {
        return $this->isCorrect;
    }

    public function getQuestionId(): int
    {
        return $this->questionId;
    }
}