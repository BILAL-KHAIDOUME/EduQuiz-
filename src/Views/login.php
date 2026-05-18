<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduQuiz Login</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-950 min-h-screen flex items-center justify-center">

<div class="w-full max-w-5xl bg-gray-900 rounded-3xl overflow-hidden shadow-2xl grid md:grid-cols-2">

    <!-- LEFT SIDE -->
    <div class="hidden md:flex flex-col justify-center items-center bg-gradient-to-br from-purple-700 to-blue-600 p-10 text-white">

        <h1 class="text-5xl font-bold mb-6">EduQuiz</h1>

        <p class="text-lg text-center leading-relaxed text-gray-200">
            Welcome back  <br>
            Login to continue your quizzes and track your progress.
        </p>

    </div>

   
    <div class="p-8 md:p-12 bg-gray-900">

        <h2 class="text-3xl font-bold text-white mb-2">
            Sign In
        </h2>

        <p class="text-gray-400 mb-8">
            Enter your credentials to access your account
        </p>

        <form method="POST" action="../../public/index.php?action=login">

           
            <div>
                <label class="block text-sm text-gray-300 mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="you@example.com"
                >
            </div>

            
            <div>
                <label class="block text-sm text-gray-300 mb-2">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="••••••••"
                >
            </div>

          
            <button
                type="submit"
                class="w-full bg-purple-600 hover:bg-purple-700 transition text-white font-semibold py-3 rounded-xl"
            >
                Login
            </button>

            <p class="text-gray-400 text-sm text-center">
                Don’t have an account?
                <a href="../Views/register.php" class="text-purple-400 hover:underline">
                    Create one
                </a>
            </p>

        </form>

    </div>

</div>

</body>
</html>