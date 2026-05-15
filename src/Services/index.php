<?php

require_once "CorrectionService.php";

$resultService = new ResultService();

$resultId = 1;
$quizId = 1;

$result = $resultService->getFinalScore($resultId, $quizId);


?>

<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">

    
    <h1 class="text-2xl font-bold mb-4">
         Votre Score est : <?= $result['score'] ?> / <?= $result['total'] ?>
    </h1>

   



</div>

</body>
</html>