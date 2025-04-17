<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Курс Английского Языка</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Основные стили для страницы */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f7fa;
            color: #333;
        }

        header {
            background: linear-gradient(45deg, #9DA9E9, #853ee0); /* Градиент с цветом #9DA9E9 */
            color: white;
            padding: 80px 0;
            text-align: center;
            border-radius: 20px; /* Закругленные края */
        }

        header h1 {
            font-size: 40px;
            margin: 0;
            font-weight: 700;
        }

        header p {
            font-size: 18px;
            margin-top: 20px;
            opacity: 0.8;
        }

        /* Стили для кнопки-ссылки */
        .header-btn {
            display: inline-block;
            background-color: #ffffff;
            color: #6f5c86;
            font-size: 18px;
            padding: 12px 30px;
            border: none;
            font-weight: 650;
            border-radius: 30px;
            cursor: pointer;
            text-transform: uppercase;
            margin-top: 20px;
            text-decoration: none; /* Убираем подчеркивание */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .header-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-decoration: none; /* Убираем подчеркивание при наведении */
            color: #6f5c86; /* Обеспечиваем, чтобы цвет текста всегда оставался белым */
        }

        section {
            padding: 60px 20px;
            text-align: center;
        }

        .about-course {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
            opacity: 0;
            animation: fadeIn 1.5s ease-out 0.5s forwards;
        }

        .about-course h2 {
            font-size: 30px;
            color: #6f42c1;
            margin-bottom: 20px;
        }

        .about-course p {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
        }

        .features {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 40px;
            opacity: 0;
            animation: fadeIn 1.5s ease-out 1s forwards;
        }

        .feature {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            width: 280px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .feature h3 {
            font-size: 22px;
            color: #6f42c1;
            margin-bottom: 20px;
        }

        .feature p {
            font-size: 16px;
            color: #777;
        }

        .testimonial {
            background-color: #f8f9fc;
            padding: 60px 20px;
        }

        .testimonial h2 {
            font-size: 30px;
            color: #6f42c1;
            margin-bottom: 20px;
        }

        .testimonial p {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
            margin: 0;
        }

        .program {
            background-color: #ffffff;
            padding: 30px 20px;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
            opacity: 0;
            animation: fadeIn 1.5s ease-out 1.5s forwards;
        }

        .program h2 {
            text-align: center;
            font-size: 26px;
            color: #6f42c1;
            margin-bottom: 20px;
        }

        .program p {
            font-size: 16px;
            color: #555;
            line-height: 1.8;
        }

        .program ul {
            list-style: none;
            padding: 0;
        }

        .program li {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
            transition: color 0.3s ease;
        }

        .program li:hover {
            color: #6f42c1;
        }

        /* Анимация появления */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
</head>
<body>

<header>
    <h1>Курс Английского Языка</h1>
    <p>Улучшите свои навыки с опытными преподавателями</p>
    <!-- Кнопка-ссылка -->
    <a href="<?php echo \yii\helpers\Url::to(['/site/biokurs'])  ?>" class="header-btn">Пройти тестирование</a>
</header>

<section class="about-course">
    <h2>О курсе</h2>
    <p>Наш курс предназначен для всех, кто хочет улучшить свои знания английского языка. Мы предлагаем структурированные уроки, практические задания и поддержку на всех этапах обучения. Подход к каждому студенту индивидуален!</p>
</section>

<section class="features">
    <div class="feature">
        <h3>Индивидуальный подход</h3>
        <p>Мы адаптируем программу под ваши потребности и цели, чтобы обучение было максимально эффективным.</p>
    </div>
    <div class="feature">
        <h3>Гибкий график</h3>
        <p>Вы можете учиться в любое время, независимо от вашего расписания. Уроки доступны онлайн и офлайн.</p>
    </div>
    <div class="feature">
        <h3>Опытные преподаватели</h3>
        <p>Наши преподаватели – это профессионалы с многолетним опытом преподавания и практической работы.</p>
    </div>
</section>

<section class="testimonial">
    <h2>Отзывы студентов</h2>
    <p>“Этот курс помог мне значительно улучшить мои навыки английского. Я смог начать свободно общаться и читать книги на языке оригинала!” - Анна, студентка</p>
</section>

<section class="program">
    <h2>Программа обучения</h2>
    <p>Курс включает в себя: Введение в грамматику, Углубленное изучение лексики, Практика произношения, Разговорные клубы и тесты для оценки прогресса.</p>
</section>

</body>
</html>
