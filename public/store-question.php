<?php 
    require('../config/Database.php');
    // require('../src/Repositories/QuestionRepository.php');
    $pdo = Database::connect();
    if($pdo){
        echo"hello";
    }
?>