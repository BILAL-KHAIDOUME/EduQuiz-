<?php

session_start();

if(empty($_SESSION['user'])){
    header("Location: /EduQuiz/src/Views/login.php");
    exit;
}

$user = $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>EduQuiz Dashboard</title>

  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-950 text-white min-h-screen">


<nav class="flex items-center justify-between px-6 py-4 bg-gray-900 border-b border-gray-800">

  
  <h1 class="text-2xl font-bold text-purple-400">
    EduQuiz
  </h1>

  
  <div class="flex items-center gap-4">

    <a href="#" class="text-gray-300 hover:text-white text-sm">
      Dashboard
    </a>

    <a href="#" class="text-gray-300 hover:text-white text-sm">
      Quizzes
    </a>

    <a
      href="../../public/index.php?action=logout"
      class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg text-sm"
    >
      Logout
    </a>

  </div>

</nav>


<div class="p-6 max-w-6xl mx-auto">

  
  <div class="mb-8">

    <h2 class="text-3xl font-bold">

      Welcome 👋

      <span class="text-purple-400">
        <?= $user['name'] ?>
      </span>

    </h2>

    <p class="text-gray-400 mt-2">
      Role :
      <span class="text-blue-400 font-semibold">
        <?= $user['role'] ?>
      </span>
    </p>

  </div>

 
  <?php if($user['role'] === 'teacher'): ?>

    <div class="mb-8 bg-gray-900 border border-gray-800 p-5 rounded-xl">

      <h3 class="text-xl font-bold text-green-400 mb-2">
        Teacher Dashboard
      </h3>

      <p class="text-gray-400 text-sm">
        Create quizzes, manage questions and track students results.
      </p>

    </div>

  <?php else: ?>

    <div class="mb-8 bg-gray-900 border border-gray-800 p-5 rounded-xl">

      <h3 class="text-xl font-bold text-blue-400 mb-2">
        Student Dashboard
      </h3>

      <p class="text-gray-400 text-sm">
        Start quizzes and check your scores.
      </p>

    </div>

  <?php endif; ?>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">

    <div class="bg-gray-900 p-5 rounded-xl border border-gray-800">

      <p class="text-gray-400 text-sm">
        Total Quizzes
      </p>

      <h3 class="text-3xl font-bold text-purple-400">
        12
      </h3>

    </div>

    <div class="bg-gray-900 p-5 rounded-xl border border-gray-800">

      <p class="text-gray-400 text-sm">
        Completed
      </p>

      <h3 class="text-3xl font-bold text-green-400">
        5
      </h3>

    </div>

    <div class="bg-gray-900 p-5 rounded-xl border border-gray-800">

      <p class="text-gray-400 text-sm">
        Average Score
      </p>

      <h3 class="text-3xl font-bold text-yellow-400">
        78%
      </h3>

    </div>

  </div>

 
  <h3 class="text-2xl font-bold mb-5">
    Available Quizzes
  </h3>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

    
    <div class="bg-gray-900 p-5 rounded-xl border border-gray-800 hover:border-purple-500 transition">

      <h4 class="text-lg font-bold">
        PHP Basics
      </h4>

      <p class="text-gray-400 text-sm mt-2">
        Test your PHP fundamentals knowledge.
      </p>

      <button class="mt-5 w-full bg-purple-600 hover:bg-purple-700 py-2 rounded-lg">
        Start Quiz
      </button>

    </div>

   
    <div class="bg-gray-900 p-5 rounded-xl border border-gray-800 hover:border-purple-500 transition">

      <h4 class="text-lg font-bold">
        JavaScript DOM
      </h4>

      <p class="text-gray-400 text-sm mt-2">
        Practice DOM manipulation and events.
      </p>

      <button class="mt-5 w-full bg-purple-600 hover:bg-purple-700 py-2 rounded-lg">
        Start Quiz
      </button>

    </div>

    <div class="bg-gray-900 p-5 rounded-xl border border-gray-800 hover:border-purple-500 transition">

      <h4 class="text-lg font-bold">
        SQL Basics
      </h4>

      <p class="text-gray-400 text-sm mt-2">
        Learn SQL queries and databases.
      </p>

      <button class="mt-5 w-full bg-purple-600 hover:bg-purple-700 py-2 rounded-lg">
        Start Quiz
      </button>

    </div>

  </div>

</div>

</body>
</html>