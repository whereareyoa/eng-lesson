<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fb;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .dimatop {
            max-width: 900px;
            margin: 60px auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
            transition: all 0.5s ease;
        }

        .dimatop:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 80px rgba(0, 0, 0, 0.2);
        }

        h3 {
            font-size: 24px;
            color: #4e4e4e;
            margin-bottom: 20px;
            font-weight: 600;
            opacity: 0;
            animation: fadeIn 1s forwards 0.3s;
        }

        .form-group {
            margin-bottom: 25px;
            opacity: 0;
            animation: fadeIn 1s forwards 0.5s;
        }

        .radio-button-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 10px;
        }

        .radio-button {
            padding: 15px 25px;
            background-color: #f0f0f0;
            border-radius: 15px;
            border: 2px solid transparent;
            font-size: 16px;
            color: #6f42c1;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .radio-button:hover {
            background-color: #e0e0e0;
            transform: scale(1.05);
        }

        .radio-button.selected {
            background-color: #6f42c1;
            color: #fff;
            border-color: #6f42c1;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        button {
            background-color: #6f42c1;
            color: white;
            font-size: 18px;
            padding: 15px 30px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.4s ease, transform 0.3s ease;
            width: 100%;
            margin-top: 20px;
            opacity: 0;
            animation: fadeIn 1s forwards 0.7s;
        }

        button:hover {
            background-color: #5a2b97;
            transform: scale(1.05);
        }

        .chart-container {
            margin-top: 50px;
            animation: fadeIn 1s forwards 1s;
        }

        canvas {
            max-width: 100%;
            width: 350px; /* Уменьшаем размер диаграммы */
            height: 350px; /* Уменьшаем размер диаграммы */
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.5s ease, opacity 0.5s ease;
            margin: 0 auto;
        }

        canvas:hover {
            transform: scale(1.05);
            opacity: 0.8;
        }

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

        .chart-container h3 {
            font-size: 26px;
            font-weight: 700;
            color: #4e4e4e;
            text-align: center;
            margin-bottom: 20px;
            animation: fadeIn 1s forwards 1.3s;
        }

    </style>
</head>
<body>

<div class="dimatop">
    <form id="test-form">
        <div class="form-group">
            <h3>1. Как часто вы практикуете?</h3>
            <div class="radio-button-container">
                <div class="radio-button" data-value="3" data-question="0">Каждый день</div>
                <div class="radio-button" data-value="2" data-question="0">Несколько раз в неделю</div>
                <div class="radio-button" data-value="1" data-question="0">Иногда</div>
            </div>
        </div>

        <div class="form-group">
            <h3>2. Насколько вы уверены в своих знаниях?</h3>
            <div class="radio-button-container">
                <div class="radio-button" data-value="3" data-question="1">Очень уверен</div>
                <div class="radio-button" data-value="2" data-question="1">Средне уверен</div>
                <div class="radio-button" data-value="1" data-question="1">Не уверен</div>
            </div>
        </div>

        <div class="form-group">
            <h3>3. Какие темы вам наиболее сложны?</h3>
            <div class="radio-button-container">
                <div class="radio-button" data-value="1" data-question="2">Лексика</div>
                <div class="radio-button" data-value="2" data-question="2">Грамматика</div>
                <div class="radio-button" data-value="3" data-question="2">Произношение</div>
            </div>
        </div>

        <button type="submit">Показать результаты</button>
    </form>

    <div class="chart-container">
        <h3>Результаты теста:</h3>
        <canvas id="myChart"></canvas>
    </div>
</div>

<script>
    let selectedAnswers = [0, 0, 0]; // Массив для хранения выбранных ответов

    // Обработчик для кнопок с ответами
    const radioButtons = document.querySelectorAll('.radio-button');
    radioButtons.forEach(button => {
        button.addEventListener('click', () => {
            const questionIndex = button.getAttribute('data-question'); // Индекс вопроса
            const value = button.getAttribute('data-value'); // Значение кнопки

            selectedAnswers[questionIndex] = parseInt(value);

            // Убираем класс "selected" с всех кнопок в этом вопросе
            const buttonsForQuestion = document.querySelectorAll(`[data-question="${questionIndex}"]`);
            buttonsForQuestion.forEach(b => b.classList.remove('selected'));

            // Добавляем класс "selected" для нажатой кнопки
            button.classList.add('selected');
        });
    });

    document.getElementById('test-form').addEventListener('submit', function (e) {
        e.preventDefault();

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Вопрос 1', 'Вопрос 2', 'Вопрос 3'],
                datasets: [{
                    label: 'Ответы',
                    data: selectedAnswers,
                    backgroundColor: [
                        'rgba(131, 58, 180, 0.8)', // фиолетовый
                        'rgba(112, 68, 255, 0.8)', // нежный синий
                        'rgba(135, 255, 196, 0.8)'  // нежный зеленый
                    ],
                    borderColor: '#ffffff',
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 16,
                                weight: 'bold'
                            },
                            color: '#555'
                        }
                    },
                    tooltip: {
                        backgroundColor: '#333',
                        bodyColor: '#fff',
                        titleColor: '#fff',
                        borderRadius: 10,
                        padding: 10
                    }
                },
                cutoutPercentage: 60, // для изменения размера "отверстия" в круге
            }
        });
    });
</script>

</body>
</html>
