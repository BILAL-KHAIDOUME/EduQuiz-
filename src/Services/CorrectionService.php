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


    return [
        'score' => $score,
       
    ];
}

 }

?>