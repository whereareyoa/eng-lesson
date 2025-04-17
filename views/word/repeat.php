<?php
use app\models\Word; // Подключаем модель

// Пример выборки слов на повторение
$words = Word::find()->where(['is_remembered' => 0])->all();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Слова на повторение</title>
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

        /* Контейнер для слов на повторение */
        .repeat-words-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .word-item {
            background: #ffffff;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
            text-align: center;
        }

        .word-item:hover {
            transform: scale(1.02);
        }

        .word-item strong {
            font-size: 1.5rem;
            color: #7787E1FF;
            font-weight: bold;
        }

        /* Стили для текста */
        .word-item p {
            font-size: 1.2rem;
            color: #333;
        }

        /* Стиль для кнопки */
        .repeat-button {
            background: #7787E1FF;
            color: white;
            padding: 8px 15px;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-top: 10px;
            transition: background 0.3s ease;
        }

        .repeat-button:hover {
            background: #5f70b5;
        }

    </style>
</head>
<body>

<h1>🔄 Слова на повторение</h1>

<div class="repeat-words-container">
    <?php foreach ($words as $word): ?>
        <div class="word-item">
            <p><strong><?= $word->word ?></strong> — <?= $word->translation ?></p>
            <!-- Кнопка для повторения слова -->
            <a href="index.php?r=word/repeat&id=<?= $word->id ?>" class="repeat-button">Повторить</a>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
