<?php

declare(strict_types=1);

class QuizService
{
    public static function generateAccessCode(): string
    {
        return strtoupper(substr(md5(uniqid()), 0, 6));
    }
}