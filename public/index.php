<?php

require_once __DIR__ . '/../src/Services/AuthService.php';

$auth = new AuthService();

$action = $_GET['action'] ?? '';

switch($action){

    
    case 'register':

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $result = $auth->register(
                $_POST['name'],
                $_POST['email'],
                $_POST['password'],
                $_POST['role']
            );

            if($result === true){

                header("Location: ../src/Views/login.php");
                exit;

            } else {

                echo $result;
            }
        }

    break;

   
    case 'login':

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $result = $auth->login(
                $_POST['email'],
                $_POST['password']
            );

            if($result === true){

                header("Location: ../src/Views/dashbord.php");
                exit;

            } else {

                echo $result;
            }
        }

    break;

   
    case 'logout':

        session_start();
        session_destroy();

        header("Location: ../src/Views/login.php");
        exit;

    break;
}