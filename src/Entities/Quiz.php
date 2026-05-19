<?php

// An Entity is just a class that holds data (like a row from the DB)

class Quiz {
    public int    $id;
    public string $title;
    public string $description;
    public string $accessCode;
    public int    $timeLimit;   // in seconds (0 = no limit)

    public function __construct(
        int    $id,
        string $title,
        string $description,
        string $accessCode,
        int    $timeLimit = 0
    ) {
        $this->id          = $id;
        $this->title       = $title;
        $this->description = $description;
        $this->accessCode  = $accessCode;
        $this->timeLimit   = $timeLimit;
    }
}
