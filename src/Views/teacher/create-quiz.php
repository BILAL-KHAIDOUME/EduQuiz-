<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-3xl bg-white rounded-2xl shadow-lg p-8">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Create New Quiz
            </h1>

            <p class="text-gray-500 mt-2">
                Create a quiz for your students
            </p>
        </div>

        <form
            method="POST"
            action="../../../public/store-quiz.php"
            class="space-y-6"
        >

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Quiz Title
                </label>

                <input
                    type="text"
                    name="title"
                    placeholder="Enter quiz title"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="4"
                    placeholder="Enter quiz description"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                ></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Time Limit (minutes)
                    </label>

                    <input
                        type="number"
                        name="time_limit"
                        min="1"
                        placeholder="30"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Max Attempts
                    </label>

                    <input
                        type="number"
                        name="max_attempts"
                        min="1"
                        placeholder="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

            </div>

            <div class="pt-4">

                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition duration-300"
                >
                    Create Quiz
                </button>

            </div>

        </form>

    </div>

</body>
</html>