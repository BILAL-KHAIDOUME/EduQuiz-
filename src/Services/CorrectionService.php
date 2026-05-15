<?php

require_once "Connexion.php";

class ResultService {

    private $pdo;

    public function __construct()
    {
        $connexion = new Connexion();
        $this->pdo = $connexion->connect();
    }

  
public function getFinalScore($resultId, $quizId)
{
    
    $sql = "   
        SELECT COUNT(*) as total_score  FROM answers 
        INNER JOIN choices  ON answers.choice_id = choices.id
        WHERE answers.result_id = ?  AND  studen
    ";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$resultId]);
    $score = $stmt->fetch()['total_score'];

    $sql2 = "
        SELECT COUNT(*) as total_question 
        FROM questions
        WHERE quiz_id = ?
    ";

    $stmt2 = $this->pdo->prepare($sql2);
    $stmt2->execute([$quizId]);
    $total = $stmt2->fetch()['total_question'];

    return [
        'score' => $score,
        'total' => $total
    ];
}

public function getCorrection($resultId)
    {

    $sql = "

    SELECT  questions.question_text, choices.choice_text, choices.is_correct
    FROM answers
    JOIN questions ON answers.question_id = questions.id
    JOIN choices   ON answers.choice_id = choices.id
    WHERE answers.result_id = :result_id;
        ";


        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'result_id' => $resultId
        ]);

        return $stmt->fetchAll();



 }}

?>