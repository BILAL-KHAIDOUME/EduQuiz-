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
             (int) $_POST['time_limit'],
             (int) $_POST['max_attempts'],
            1
            );
            $repository->create($quiz);
            echo "Quiz created successfully";
            header("Location: ../src/Views/teacher/dashboard.php");
            exit;
    }else{
        echo"failed";
    }
?>