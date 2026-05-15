<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-lg p-8">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Add Question
            </h1>

            <p class="text-gray-500 mt-2">
                Add a new question to your quiz
            </p>
        </div>

        <form
            method="POST"
            action="../../../public/store-question.php"
            class="space-y-6"
        >

            <input type="hidden" name="quiz_id" value="1">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Question
                </label>

                <textarea
                    name="question_text"
                    rows="3"
                    required
                    placeholder="Enter your question"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                ></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Points
                </label>

                <input
                    type="number"
                    name="points"
                    min="1"
                    value="1"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="space-y-4">

                <h2 class="text-xl font-semibold text-gray-700">
                    Choices
                </h2>

                <div class="flex gap-4">

                    <input
                        type="text"
                        name="choices[]"
                        placeholder="Choice 1"
                        required
                        class="flex-1 px-4 py-3 border border-gray-300 rounded-xl"
                    >

                    <input
                        type="radio"
                        name="correct_choice"
                        value="0"
                        required
                    >

                </div>

                <div class="flex gap-4">

                    <input
                        type="text"
                        name="choices[]"
                        placeholder="Choice 2"
                        required
                        class="flex-1 px-4 py-3 border border-gray-300 rounded-xl"
                    >

                    <input
                        type="radio"
                        name="correct_choice"
                        value="1"
                    >

                </div>

                <div class="flex gap-4">

                    <input
                        type="text"
                        name="choices[]"
                        placeholder="Choice 3"
                        required
                        class="flex-1 px-4 py-3 border border-gray-300 rounded-xl"
                    >

                    <input
                        type="radio"
                        name="correct_choice"
                        value="2"
                    >

                </div>

                <div class="flex gap-4">

                    <input
                        type="text"
                        name="choices[]"
                        placeholder="Choice 4"
                        required
                        class="flex-1 px-4 py-3 border border-gray-300 rounded-xl"
                    >

                    <input
                        type="radio"
                        name="correct_choice"
                        value="3"
                    >

                </div>

            </div>

            <button
                type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl transition duration-300"
            >
                Save Question
            </button>

        </form>

    </div>

</body>
</html>