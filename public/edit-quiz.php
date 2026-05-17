<?php
require('../config/Database.php');

$pdo = Database::connect();

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Quiz ID missing");
}

$stmt = $pdo->prepare("SELECT * FROM quizzes WHERE id = ?");
$stmt->execute([$id]);

$quiz = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$quiz) {
    die("Quiz not found");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $time_limit = $_POST['time_limit'];
    $max_attempts = $_POST['max_attempts'];

    $update = $pdo->prepare("
        UPDATE quizzes
        SET title = ?, description = ?, time_limit = ?, max_attempts = ?
        WHERE id = ?
    ");

    $update->execute([
        $title,
        $description,
        $time_limit,
        $max_attempts,
        $id
    ]);

    header("Location: ../src/Views/teacher/dashboard.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Quiz</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-xl">

        <h1 class="text-3xl font-bold mb-6">
            Edit Quiz
        </h1>

        <form method="POST" class="space-y-5">

            <div>
                <label class="block mb-2 font-medium">
                    Title
                </label>

                <input
                    type="text"
                    name="title"
                    value="<?= htmlspecialchars($quiz['title']) ?>"
                    class="w-full border rounded-xl px-4 py-3"
                    required
                >
            </div>

            <div>
                <label class="block mb-2 font-medium">
                    Description
                </label>

                <textarea
                    name="description"
                    class="w-full border rounded-xl px-4 py-3"
                    required
                ><?= htmlspecialchars($quiz['description']) ?></textarea>
            </div>

            <div>
                <label class="block mb-2 font-medium">
                    Time Limit
                </label>

                <input
                    type="number"
                    name="time_limit"
                    value="<?= $quiz['time_limit'] ?>"
                    class="w-full border rounded-xl px-4 py-3"
                    required
                >
            </div>

            <div>
                <label class="block mb-2 font-medium">
                    Max Attempts
                </label>

                <input
                    type="number"
                    name="max_attempts"
                    value="<?= $quiz['max_attempts'] ?>"
                    class="w-full border rounded-xl px-4 py-3"
                    required
                >
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl"
            >
                Update Quiz
            </button>

        </form>

    </div>

</body>
</html>