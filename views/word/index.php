<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список слов</title>
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

        /* Стиль для ссылок */
        a {
            text-decoration: none;
            color: #7787E1FF; /* Основной цвет */
            font-weight: bold;
            transition: color 0.3s;
        }

        a:hover {
            color: #7787E1FF; /* Цвет при наведении */
        }

        /* Контейнер для списка слов */
        .word-container {
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
        }

        .word-item:hover {
            transform: scale(1.02);
        }

        .remembered {
            color: green;
            font-weight: bold;
        }

        .remember-link {
            background: #7787E1FF; /* Цвет кнопки */
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .remember-link:hover {
            background: #7787E1FF; /* Цвет при наведении на кнопку */
        }
    </style>
</head>
<body>

<h1>📚 Список слов</h1>

<p style="text-align: center;">
    <a href="index.php?r=word/add" class="remember-link">➕ Добавить новое слово</a>
</p>

<div class="word-container">
    <?php foreach ($words as $word): ?>
        <div class="word-item">
            <strong><?= $word->word ?></strong> — <?= $word->translation ?>
            <?php if ($word->is_remembered): ?>
                <span class="remembered">(Запомнено)</span>
            <?php else: ?>
                <a href="index.php?r=word/remember&id=<?= $word->id ?>" class="remember-link">Запомнил</a>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
