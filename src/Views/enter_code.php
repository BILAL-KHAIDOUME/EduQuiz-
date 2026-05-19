<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EduQuiz – Accès étudiant</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-[#f0f4ff] min-h-screen flex items-center justify-center p-5">

  <div class="bg-white rounded-2xl shadow-[0_8px_32px_rgba(0,0,0,0.10)] max-w-[420px] w-full p-10">

    <h1 class="text-[1.6rem] font-bold text-[#1a1a2e] mb-2">🎓 EduQuiz</h1>
    <p class="text-gray-500 text-[0.95rem] mb-7">Entrez le code d'accès donné par votre formateur.</p>

    <?php if (!empty($error)): ?>
      <div class="bg-red-50 text-red-600 border border-red-300 rounded-lg px-4 py-2.5 text-[0.88rem] mb-3.5">
        ❌ <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="index.php">
      <label for="code" class="block font-semibold text-[0.9rem] text-gray-700 mb-1.5">
        Code d'accès
      </label>
      <input
        type="text"
        id="code"
        name="code"
        placeholder="Ex : HTML01"
        maxlength="20"
        value="<?= htmlspecialchars($oldCode ?? '') ?>"
        required
        class="w-full px-4 py-3 border-2 border-[#dde3f0] rounded-xl text-base outline-none uppercase tracking-widest transition-colors duration-200 mb-3.5 focus:border-[#4f6ef7]" />
      <input type="hidden" name="action" value="enter_code" />
      <button
        type="submit"
        class="w-full py-3.5 bg-[#4f6ef7] text-white border-none rounded-xl text-base font-semibold cursor-pointer transition-colors duration-200 hover:bg-[#3a57d4]">
        Accéder au Quiz →
      </button>
    </form>

  </div>
</body>

</html>