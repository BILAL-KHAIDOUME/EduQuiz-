<?php

require('../../../config/Database.php');

$pdo = Database::connect();

$stmt = $pdo->query("
    SELECT *
    FROM quizzes
    ORDER BY created_at DESC
");

$quizzes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="max-w-7xl mx-auto p-6">

        <div class="flex items-center justify-between mb-8">

            <div>
                <h1 class="text-4xl font-bold text-gray-800">
                    Teacher Dashboard
                </h1>

                <p class="text-gray-500 mt-2">
                    Manage your quizzes
                </p>
            </div>

            <a
                href="create-quiz.php"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-medium"
            >
                + Create Quiz
            </a>

        </div>

        <?php if (count($quizzes) > 0): ?>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <?php foreach ($quizzes as $quiz): ?>

                    <div class="bg-white rounded-2xl shadow-md p-6">

                        <div class="flex items-center justify-between mb-4">

                            <h2 class="text-2xl font-semibold text-gray-800">

                                <?= htmlspecialchars($quiz['title']) ?>

                            </h2>

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                Active
                            </span>

                        </div>

                        <p class="text-gray-500 mb-6">

                            <?= htmlspecialchars($quiz['description']) ?>

                        </p>

                        <div class="space-y-2 mb-6">

                            <p class="text-sm text-gray-600">
                                Access Code :
                                <span class="font-bold text-blue-600">

                                    <?= htmlspecialchars($quiz['access_code']) ?>

                                </span>
                            </p>

                            <p class="text-sm text-gray-600">
                                Time Limit :

                                <?= $quiz['time_limit'] ?> min
                            </p>

                            <p class="text-sm text-gray-600">
                                Max Attempts :

                                <?= $quiz['max_attempts'] ?>
                            </p>

                        </div>

                        <div class="flex flex-col gap-3">

                            <a
                                href="add-question.php?quiz_id=<?= $quiz['id'] ?>"
                                class="bg-green-600 hover:bg-green-700 text-white text-center py-2 rounded-xl"
                            >
                                Add Question
                            </a>

                            <div class="flex gap-3">

                                <a
                                    href="#"
                                    class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 rounded-xl"
                                >
                                    Edit
                                </a>

                                 <form action="../../../public/delete-quiz.php" method="POST" class="flex-1">
                                    <input type="hidden" name="id" value="<?= $quiz['id'] ?>">
                                    <button
                                        type="submit"
                                        class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-xl"
                                        onclick="return confirm('Are you sure?');"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div class="bg-white rounded-2xl shadow-md p-10 text-center">

                <h2 class="text-2xl font-bold text-gray-700 mb-4">
                    No quizzes found
                </h2>

                <p class="text-gray-500 mb-6">
                    Create your first quiz now
                </p>

                <a
                    href="create-quiz.php"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl"
                >
                    Create Quiz
                </a>

            </div>

        <?php endif; ?>

    </div>

</body>
</html>