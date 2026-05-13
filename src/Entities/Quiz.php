<?php

declare(strict_types=1);

class Quiz
{
    private ?int $id;
    private string $title;
    private string $description;
    private string $accessCode;
    private int $timeLimit;
    private int $maxAttempts;
    private int $teacherId;

    public function __construct(
        ?int $id,
        string $title,
        string $description,
        string $accessCode,
        int $timeLimit,
        int $maxAttempts,
        int $teacherId
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->accessCode = $accessCode;
        $this->timeLimit = $timeLimit;
        $this->maxAttempts = $maxAttempts;
        $this->teacherId = $teacherId;
    }

            public function toArray(): array
            {
                return [
                    'teacher_id' => $this->teacherId,
                    'title' => $this->title,
                    'description' => $this->description,
                    'access_code' => $this->accessCode,
                    'time_limit' => $this->timeLimit,
                    'max_attempts' => $this->maxAttempts,
                ];
            }
}