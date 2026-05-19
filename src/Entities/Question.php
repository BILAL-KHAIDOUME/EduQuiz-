<?php

class Question {
    public int    $id;
    public int    $quizId;
    public string $text;
    public array  $options;   // array of Answer objects
    public int    $correctIndex; // which option index is correct

    public function __construct(
        int    $id,
        int    $quizId,
        string $text,
        array  $options = [],
        int    $correctIndex = 0
    ) {
        $this->id           = $id;
        $this->quizId       = $quizId;
        $this->text         = $text;
        $this->options      = $options;
        $this->correctIndex = $correctIndex;
    }
}
