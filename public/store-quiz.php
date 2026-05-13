<?php 
    require('../config/Database.php');
    require('../src/Entities/Quiz.php');
    require('../src/Repositories/QuizRepository.php');
    require('../src/Services/QuizService.php');
    $pdo = Database::connect();
    if($pdo){
        $repository=new QuizRepository($pdo);
        $quiz=new Quiz(
            null,
            $_POST['title'],
            $_POST['description'],
             QuizService::generateAccessCode(),
            $_POST['time_limit'],
            $_POST['max_attempts'],
            1
            );
            $repository->create($quiz);
            
        echo "Quiz created successfully";
    }else{
        echo"failed";
    }
?>