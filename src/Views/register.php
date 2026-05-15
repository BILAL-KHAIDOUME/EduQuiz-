<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-950 min-h-screen flex items-center justify-center p-4">

  <!-- SMALL RESPONSIVE CARD -->
  <div class="w-full max-w-3xl bg-[#0f172a] rounded-2xl shadow-2xl overflow-hidden grid md:grid-cols-2">

    <!-- LEFT SIDE -->
    <div class="hidden md:flex flex-col justify-center items-center bg-gradient-to-br from-indigo-600 to-purple-600 text-white p-8">

      <h1 class="text-4xl font-bold mb-4">EduQuiz</h1>

      <p class="text-center text-sm text-gray-200 max-w-xs">
        Create your account and start learning with interactive quizzes.
      </p>

    </div>

    <!-- RIGHT SIDE -->
    <div class="p-6 md:p-8">

      <h2 class="text-2xl font-bold text-white mb-1">Create Account</h2>
      <p class="text-gray-400 text-sm mb-6">Fill your details to register</p>

  <form method="POST" action="?action=register" class="space-y-4">

        <!-- NAME -->
        <div>
          <label class="text-sm text-gray-300">Full Name</label>
          <input type="text" name="name" required
            class="w-full mt-1 px-3 py-2 rounded-lg bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-purple-500 outline-none"
            placeholder="Your name">
        </div>

        <!-- EMAIL -->
        <div>
          <label class="text-sm text-gray-300">Email</label>
          <input type="email" name="email" required
            class="w-full mt-1 px-3 py-2 rounded-lg bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-purple-500 outline-none"
            placeholder="you@example.com">
        </div>

        <!-- PASSWORD -->
        <div>
          <label class="text-sm text-gray-300">Password</label>
          <input type="password" name="password" required
            class="w-full mt-1 px-3 py-2 rounded-lg bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-purple-500 outline-none"
            placeholder="••••••••">
        </div>

        <!-- ROLE -->
        <div>
          <label class="text-sm text-gray-300">Role</label>
          <select name="role"
            class="w-full mt-1 px-3 py-2 rounded-lg bg-gray-800 text-white border border-gray-700 focus:ring-2 focus:ring-purple-500 outline-none">
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
          </select>
        </div>

        <!-- BUTTON -->
        <button type="submit"
          class="w-full bg-purple-600 hover:bg-purple-700 transition text-white font-semibold py-2 rounded-lg">
          Register
        </button>

        <!-- LOGIN LINK -->
        <p class="text-center text-sm text-gray-400">
          Already have an account?
          <a href="../Views/login.php" class="text-purple-400 hover:underline">
            Login
          </a>
        </p>

      </form>

    </div>
  </div>

</body>
</html>