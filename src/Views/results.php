<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EduQuiz – Résultats</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-[#f0f4ff] min-h-screen flex items-center justify-center p-5">

  <div class="bg-white rounded-2xl shadow-[0_8px_32px_rgba(0,0,0,0.10)] max-w-[600px] w-full p-9">

    <h1 class="text-center text-[#1a1a2e] text-2xl font-bold mb-6">📊 Résultats</h1>

    <!-- Score circle -->
    <div class="w-[120px] h-[120px] rounded-full bg-gradient-to-br from-[#4f6ef7] to-[#7c3aed] flex items-center justify-center mx-auto mb-5 text-white text-[1.8rem] font-extrabold shadow-[0_6px_20px_rgba(79,110,247,0.3)]">
      <?= $result['score'] ?>/<?= $result['total'] ?>
    </div>

    <!-- Result message -->
    <p class="text-center text-gray-500 text-[0.95rem] leading-relaxed mb-7">
      <?php
      $pct = $result['percent'];
      if ($pct === 100)   echo "🏆 Parfait ! Toutes les réponses sont correctes.";
      elseif ($pct >= 70) echo "👍 Bien joué ! Score : {$pct}%. Continuez comme ça !";
      elseif ($pct >= 50) echo "😐 Passable ({$pct}%). Quelques points à retravailler.";
      else                echo "😟 Score insuffisant ({$pct}%). Revoyez le cours !";
      ?>
    </p>

    <hr class="border-none border-t border-gray-100 my-6" />

    <h2 class="text-base text-gray-700 font-semibold mb-4">Correction détaillée</h2>

    <?php
    $letters = ['A', 'B', 'C', 'D', 'E'];
    foreach ($result['details'] as $i => $detail):
      $isCorrect  = $detail['isCorrect'];
      $icon       = $isCorrect ? '✅' : '❌';
      $chosenText = $detail['chosen'] !== null
        ? $letters[$detail['chosen']] . '. ' . htmlspecialchars($detail['options'][$detail['chosen']]->text)
        : 'Non répondu';
      $correctText = $letters[$detail['correctIndex']] . '. '
        . htmlspecialchars($detail['options'][$detail['correctIndex']]->text);
    ?>
      <div class="<?= $isCorrect
                    ? 'bg-green-50 border-l-4 border-green-500'
                    : 'bg-red-50 border-l-4 border-red-500' ?> px-4 py-3.5 rounded-xl mb-3 text-[0.9rem] leading-relaxed">

        <div class="font-semibold text-[#1a1a2e] mb-1.5">
          <?= $icon ?> Q<?= $i + 1 ?>. <?= htmlspecialchars($detail['question']) ?>
        </div>

        <div class="<?= $isCorrect ? 'text-green-700 font-semibold' : 'text-red-600' ?>">
          Votre réponse : <?= $chosenText ?>
        </div>

        <?php if (!$isCorrect): ?>
          <div class="text-green-700 font-semibold">Bonne réponse : <?= $correctText ?></div>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>

    <a
      href="index.php"
      class="block w-full py-3.5 mt-5 text-center text-[#4f6ef7] font-semibold text-base border-2 border-[#4f6ef7] rounded-xl bg-transparent no-underline transition-colors duration-200 hover:bg-[#eef1ff]">🔄 Recommencer</a>

  </div>
</body>

</html>