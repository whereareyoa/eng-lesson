<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Случайное слово дня</title>
    <style>
        /* Основной фон для страницы */
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f9ff;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1 {
            color: #003366;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Контейнер для случайного слова */
        .random-word-container {
            background: #ffffff;
            padding: 20px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
            text-align: center;
        }

        .random-word-container:hover {
            transform: scale(1.02);
        }

        .random-word-container p {
            font-size: 1.2rem;
            color: #333;
        }

        /* Стили для текста */
        .random-word-container strong {
            font-size: 1.5rem;
            color: #7787E1FF; /* Новый цвет текста */
            font-weight: bold;
        }

        /* Стиль для сообщения "Слов пока нет" */
        .no-word {
            font-size: 1.2rem;
            color: #ff6f61;
            text-align: center;
        }

    </style>
</head>
<body>

<h1>🎲 Случайное слово дня</h1>

<div class="random-word-container">
    <?php if ($word): ?>
        <p><strong><?= $word->word ?></strong> — <?= $word->translation ?></p>
    <?php else: ?>
        <p class="no-word">Слов пока нет.</p>
    <?php endif; ?>
</div>

</body>
</html>
