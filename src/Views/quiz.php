<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EduQuiz – <?= htmlspecialchars($quiz->title) ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-[#f0f4ff] min-h-screen flex items-center justify-center p-5">

  <div class="bg-white rounded-2xl shadow-[0_8px_32px_rgba(0,0,0,0.10)] max-w-[600px] w-full p-9">

    <!-- Top bar -->
    <div class="flex justify-between items-center mb-5">
      <span class="font-bold text-[#1a1a2e] text-base"><?= htmlspecialchars($quiz->title) ?></span>
      <?php if ($quiz->timeLimit > 0): ?>
        <span class="bg-[#fff4e5] text-[#e07b00] rounded-lg px-3.5 py-1.5 font-bold text-[0.95rem]" id="timer">⏱ --:--</span>
      <?php endif; ?>
    </div>

    <!-- Progress -->
    <div class="text-[0.82rem] text-gray-400 mb-1.5" id="progress-label">
      Question 1 / <?= count($questions) ?>
    </div>
    <div class="bg-[#e8ecff] rounded-full h-2 overflow-hidden mb-6">
      <div
        class="h-full bg-[#4f6ef7] rounded-full transition-all duration-400"
        id="progress-bar"
        style="width: <?= round(100 / count($questions)) ?>%"></div>
    </div>

    <!-- Form -->
    <form method="POST" action="index.php" id="quiz-form">
      <input type="hidden" name="action" value="submit_quiz" />
      <input type="hidden" name="quiz_id" value="<?= $quiz->id ?>" />

      <?php
      $letters = ['A', 'B', 'C', 'D', 'E'];
      foreach ($questions as $qi => $question):
      ?>
        <div class="question-block" id="q-<?= $qi ?>" style="display: <?= $qi === 0 ? 'block' : 'none' ?>">

          <!-- Question text -->
          <p class="text-[1.08rem] font-semibold text-[#1a1a2e] mb-5 leading-relaxed">
            <?= htmlspecialchars($question->text) ?>
          </p>

          <!-- Options -->
          <div class="flex flex-col gap-3 mb-6">
            <?php foreach ($question->options as $ai => $answer): ?>
              <label
                class="option flex items-center gap-3.5 px-4 py-3.5 border-2 border-[#dde3f0] rounded-xl cursor-pointer transition-all duration-200 select-none hover:border-[#4f6ef7] hover:bg-[#f5f7ff]"
                id="opt-<?= $qi ?>-<?= $ai ?>">
                <input
                  type="radio"
                  class="hidden"
                  name="answers[<?= $qi ?>]"
                  value="<?= $ai ?>"
                  onchange="selectOption(<?= $qi ?>, <?= $ai ?>)" />
                <span
                  class="letter w-[30px] h-[30px] rounded-full bg-[#e8ecff] text-[#4f6ef7] font-bold text-[0.88rem] flex items-center justify-center shrink-0"><?= $letters[$ai] ?></span>
                <span><?= htmlspecialchars($answer->text) ?></span>
              </label>
            <?php endforeach; ?>
          </div>

        </div>
      <?php endforeach; ?>

      <!-- Nav buttons -->
      <div class="flex gap-3">
        <button
          type="button"
          id="btn-prev"
          onclick="prevQ()"
          disabled
          class="flex-1 py-3.5 rounded-xl text-base font-semibold cursor-pointer border-2 border-[#4f6ef7] bg-transparent text-[#4f6ef7] transition-colors duration-200 hover:bg-[#eef1ff] disabled:opacity-40 disabled:cursor-not-allowed">← Précédent</button>
        <button
          type="button"
          id="btn-next"
          onclick="nextQ()"
          class="flex-1 py-3.5 rounded-xl text-base font-semibold cursor-pointer border-none bg-[#4f6ef7] text-white transition-colors duration-200 hover:bg-[#3a57d4]">Suivant →</button>
      </div>
    </form>
  </div>

  <style>
    /* Selected option state — kept in <style> since Tailwind can't do dynamic class toggling cleanly here */
    .option.selected {
      border-color: #4f6ef7;
      background: #eef1ff;
    }

    .option.selected .letter {
      background: #4f6ef7;
      color: #fff;
    }

    /* Urgent timer */
    .timer-urgent {
      background: #ffe5e5 !important;
      color: #e03e3e !important;
    }

    @keyframes pulse {

      0%,
      100% {
        opacity: 1
      }

      50% {
        opacity: 0.4
      }
    }

    .timer-urgent {
      animation: pulse 0.8s infinite;
    }
  </style>

  <script>
    const total = <?= count($questions) ?>;
    const timeLimit = <?= $quiz->timeLimit ?>;
    let current = 0;
    let timeLeft = timeLimit;

    function showQuestion(index) {
      document.querySelectorAll('.question-block').forEach(b => b.style.display = 'none');
      document.getElementById('q-' + index).style.display = 'block';

      document.getElementById('progress-label').textContent =
        'Question ' + (index + 1) + ' / ' + total;
      document.getElementById('progress-bar').style.width =
        Math.round(((index + 1) / total) * 100) + '%';

      document.getElementById('btn-prev').disabled = index === 0;
      document.getElementById('btn-next').textContent =
        index === total - 1 ? '✅ Soumettre' : 'Suivant →';
    }

    function nextQ() {
      if (current < total - 1) {
        current++;
        showQuestion(current);
      } else {
        if (confirm('Voulez-vous soumettre vos réponses ?')) {
          document.getElementById('quiz-form').submit();
        }
      }
    }

    function prevQ() {
      if (current > 0) {
        current--;
        showQuestion(current);
      }
    }

    function selectOption(qi, ai) {
      document.querySelectorAll('#q-' + qi + ' .option').forEach(el => el.classList.remove('selected'));
      document.getElementById('opt-' + qi + '-' + ai).classList.add('selected');
    }

    function pad(n) {
      return String(n).padStart(2, '0');
    }

    function updateTimer() {
      const m = Math.floor(timeLeft / 60);
      const s = timeLeft % 60;
      const el = document.getElementById('timer');
      if (el) {
        el.textContent = '⏱ ' + pad(m) + ':' + pad(s);
        el.classList.toggle('timer-urgent', timeLeft <= 30);
      }
    }

    if (timeLimit > 0) {
      updateTimer();
      const interval = setInterval(() => {
        timeLeft--;
        updateTimer();
        if (timeLeft <= 0) {
          clearInterval(interval);
          alert('⏰ Temps écoulé ! Vos réponses sont soumises automatiquement.');
          document.getElementById('quiz-form').submit();
        }
      }, 1000);
    }
  </script>
</body>

</html>