<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить слово</title>
    <style>
        /* Основной фон для формы */
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

        /* Контейнер для формы */
        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 0 auto;
            animation: fadeIn 1s ease-out;
        }

        /* Заголовок формы */
        .form-container h2 {
            text-align: center;
            font-size: 1.5rem;
            color: #003366;
            margin-bottom: 20px;
        }

        /* Поля ввода */
        .input-field {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #7787E1FF; /* Новый цвет обводки */
            border-radius: 8px;
            font-size: 1rem;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        /* Эффект фокуса на полях ввода */
        .input-field:focus {
            border-color: #7787E1FF; /* Новый цвет обводки при фокусе */
            box-shadow: 0 0 8px rgba(119, 135, 225, 0.5);
        }

        /* Кнопка */
        button.btn {
            background: #7787E1FF; /* Новый цвет кнопки */
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 1.1rem;
            width: 100%;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 20px;
        }

        button.btn:hover {
            background: #5f70b5; /* Темнее оттенок кнопки при наведении */
        }

        /* Анимация плавного появления */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<h1>➕ Добавить слово</h1>

<form method="post" class="form-container">
    <?= Yii::$app->request->csrfToken ? '<input type="hidden" name="_csrf" value="' . Yii::$app->request->csrfToken . '">' : '' ?>

    <h2>Заполните данные</h2>

    <label for="word" class="input-label">Слово:</label>
    <input type="text" name="Word[word]" id="word" placeholder="Введите слово" required class="input-field"><br>

    <label for="translation" class="input-label">Перевод:</label>
    <input type="text" name="Word[translation]" id="translation" placeholder="Введите перевод" required class="input-field"><br>

    <button type="submit" class="btn">Сохранить</button>
</form>

</body>
</html>
