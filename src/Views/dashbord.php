<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EduQuiz Dashboard</title>

  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-950 text-white min-h-screen">

<!-- NAVBAR -->
<nav class="flex items-center justify-between px-6 py-4 bg-gray-900 border-b border-gray-800">
  <h1 class="text-xl font-bold text-purple-400">EduQuiz</h1>

  <div class="flex items-center gap-4">
    <a href="?action=dashboard" class="text-gray-300 hover:text-white text-sm">Dashboard</a>
    <a href="#" class="text-gray-300 hover:text-white text-sm">Quizzes</a>
    <a href="?action=logout" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded-lg text-sm">
      Logout
    </a>
  </div>
</nav>

<!-- MAIN -->
<div class="p-6 max-w-6xl mx-auto">

  <!-- WELCOME -->
  <div class="mb-8">
    <h2 class="text-3xl font-bold">
      Welcome 👋
      <span class="text-purple-400">
        <?= $_SESSION['user']['name'] ?? 'User' ?>
      </span>
    </h2>

    <p class="text-gray-400 mt-1 text-sm">
      Manage your quizzes and track your progress
    </p>
  </div>

  <!-- STATS -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">

    <div class="bg-gray-900 p-5 rounded-xl border border-gray-800">
      <p class="text-gray-400 text-sm">Total Quizzes</p>
      <h3 class="text-2xl font-bold text-purple-400">12</h3>
    </div>

    <div class="bg-gray-900 p-5 rounded-xl border border-gray-800">
      <p class="text-gray-400 text-sm">Completed</p>
      <h3 class="text-2xl font-bold text-green-400">5</h3>
    </div>

    <div class="bg-gray-900 p-5 rounded-xl border border-gray-800">
      <p class="text-gray-400 text-sm">Score Average</p>
      <h3 class="text-2xl font-bold text-yellow-400">78%</h3>
    </div>

  </div>

  <!-- QUIZ LIST -->
  <h3 class="text-xl font-semibold mb-4">Available Quizzes</h3>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

    <!-- CARD -->
    <div class="bg-gray-900 p-5 rounded-xl border border-gray-800 hover:border-purple-500 transition">
      <h4 class="font-bold text-lg">PHP Basics</h4>
      <p class="text-gray-400 text-sm mt-2">
        Test your knowledge in PHP fundamentals.
      </p>

      <button class="mt-4 w-full bg-purple-600 hover:bg-purple-700 py-2 rounded-lg text-sm">
        Start Quiz
      </button>
    </div>

    <!-- CARD -->
    <div class="bg-gray-900 p-5 rounded-xl border border-gray-800 hover:border-purple-500 transition">
      <h4 class="font-bold text-lg">JavaScript DOM</h4>
      <p class="text-gray-400 text-sm mt-2">
        Learn DOM manipulation and events.
      </p>

      <button class="mt-4 w-full bg-purple-600 hover:bg-purple-700 py-2 rounded-lg text-sm">
        Start Quiz
      </button>
    </div>

    <!-- CARD -->
    <div class="bg-gray-900 p-5 rounded-xl border border-gray-800 hover:border-purple-500 transition">
      <h4 class="font-bold text-lg">SQL Basics</h4>
      <p class="text-gray-400 text-sm mt-2">
        Practice queries and database concepts.
      </p>

      <button class="mt-4 w-full bg-purple-600 hover:bg-purple-700 py-2 rounded-lg text-sm">
        Start Quiz
      </button>
    </div>

  </div>

</div>

</body>
</html>