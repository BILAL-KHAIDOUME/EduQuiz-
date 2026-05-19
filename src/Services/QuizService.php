<?php

require_once __DIR__ . '/../Repositories/QuizRepository.php';
require_once __DIR__ . '/../Repositories/QuestionRepository.php';

// Service = handles the "thinking" (business logic), not the DB, not the HTML
class QuizService {
    private QuizRepository     $quizRepo;
    private QuestionRepository $questionRepo;

    public function __construct() {
        $this->quizRepo     = new QuizRepository();
        $this->questionRepo = new QuestionRepository();
    }

    // Find a quiz by code and load its questions
    // Returns null if the code is wrong
    public function getQuizByCode(string $code): ?array {
        $quiz = $this->quizRepo->findByCode($code);

        if ($quiz === null) {
            return null;
        }

        $questions = $this->questionRepo->findByQuizId($quiz->id);

        return [
            'quiz'      => $quiz,
            'questions' => $questions,
        ];
    }

    // Calculate the student's score
    // $userAnswers = [ questionIndex => chosenAnswerIndex, ... ]
    public function calculateScore(array $questions, array $userAnswers): array {
        $score   = 0;
        $total   = count($questions);
        $details = [];

        foreach ($questions as $i => $question) {
            $chosen     = $userAnswers[$i] ?? null;  // null = not answered
            $isCorrect  = ($chosen === $question->correctIndex);

            if ($isCorrect) {
                $score++;
            }

            $details[] = [
                'question'     => $question->text,
                'options'      => $question->options,
                'chosen'       => $chosen,
                'correctIndex' => $question->correctIndex,
                'isCorrect'    => $isCorrect,
            ];
        }

        return [
            'score'   => $score,
            'total'   => $total,
            'percent' => $total > 0 ? round(($score / $total) * 100) : 0,
            'details' => $details,
        ];
    }
}
