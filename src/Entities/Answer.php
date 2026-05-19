<?php

class Answer {
    public int    $id;
    public int    $questionId;
    public string $text;
    public bool   $isCorrect;

    public function __construct(
        int    $id,
        int    $questionId,
        string $text,
        bool   $isCorrect = false
    ) {
        $this->id         = $id;
        $this->questionId = $questionId;
        $this->text       = $text;
        $this->isCorrect  = $isCorrect;
    }
}
