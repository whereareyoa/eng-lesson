<?php
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кнопка с эффектом пульсации</title>
    <style>
        /* Анимация для всплывающего окна */
        @keyframes modal-appear {
            0% {
                transform: translateY(-50%);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Стиль пульсации для кнопки */
        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 rgba(106, 92, 205, 0.7);
            }
            50% {
                transform: scale(1.05);
                box-shadow: 0 0 10px rgba(106, 92, 205, 1);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 rgba(106, 92, 205, 0);
            }
        }

        .pulsate {
            animation: pulse 5s infinite;
        }

        .button {
            background: linear-gradient(90deg, #8b99e5, #6a78c7, #6a5acd);
            border: none;
            color: white;
            padding: 15px 30px;
            font-size: 18px;
            font-family: 'Montserrat', sans-serif;
            border-radius: 25px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            transition: background 0.3s ease, color 0.3s ease;
            margin-top: 20px;
        }

        .button:hover {
            color: #e0e0e0;
        }

        /* Стиль модального окна */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            animation: modal-appear 0.5s ease-out forwards;
        }

        .modal-content {
            background: linear-gradient(135deg, #6a78c7, #8b99e5);
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 12px;
            width: 90%;
            max-width: 500px;
        }

        .close {
            color: white;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: #ddd;
        }

        label {
            color: white;
            font-family: 'Montserrat', sans-serif;
            display: block;
            margin-top: 10px;
        }

        input[type="text"], input[type="email"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-top: 5px;
        }

        input[type="submit"] {
            background-color: #6a5acd;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            width: 100%;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #8b99e5;
        }

        /* Стиль карточек */
        .card {
            transition: transform 0.2s, box-shadow 0.2s;
            border: none;
            border-radius: 10px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-weight: bold;
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 15px;
        }

        .btn-custom {
            background-color: #7787e1;
            color: white;
            border-radius: 20px;
        }

        .btn-custom:hover {
            background-color: #9da9ea;
        }

        .description-text {
            color: #6c757d;
        }

        .card-img-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            height: 200px;
            object-fit: cover;
        }

        @keyframes shake-updown {
            0% {
                transform: translateY(0);
            }
            25% {
                transform: translateY(-6px);
            }
            50% {
                transform: translateY(4px);
            }
            75% {
                transform: translateY(-3px);
            }
            100% {
                transform: translateY(0);
            }
        }

        /* Применение анимации тряски */
        .shake {
            animation: shake-updown 1.7s ease-in-out infinite;
        }

        @keyframes rotate-left-right {
            0% {
                transform: rotate(0deg);
            }
            25% {
                transform: rotate(-5deg);
            }
            50% {
                transform: rotate(5deg);
            }
            75% {
                transform: rotate(-5deg);
            }
            100% {
                transform: rotate(0deg);
            }
        }

        .rotate {
            animation: rotate-left-right 9s ease-in-out infinite;
        }
    </style>
</head>
<body>
<div class="container" style="position: relative; text-align: right; height: 100vh; display: flex; align-items: center; justify-content: flex-end; top: -60px;">
    <img src="image/Group.png" alt="группа" style="display: block; position: relative;">
    <img src="image/online-study.png" alt="компьютер верхний слой" style="position: absolute; top: 220px; left: 100px;">
    <img src="image/school-bag.png" alt="рюкзак" class="shake" style="position: absolute; top: 240px; left: -200px;">
    <img src="image/blood-report.png" alt="отчет о крови" class="rotate" style="position: absolute; top: 40px; left: 350px;">

    <div class="container">
        <h1 style="display: flex; margin-left: 80px; font-family: 'Montserrat', ui-serif; font-weight: 600;">
            Эффективные курсы английского языка для детей и подростков
        </h1>
        <p style="font-weight: normal; font-family: Montserrat;">
            Благодаря профессиональным преподавателям, гибкому графику обучения и курсам для всех уровней вы быстро научитесь говорить.
        </p>
        <a href="#" class="button pulsate" id="myBtn">Записаться на курс</a>
    </div>
</div>

<!-- Модальное окно -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <h2 style="color: white">Форма записи на курс</h2>
        <p>Введите свои данные, и мы свяжемся с вами.</p>

        <!-- Начало формы -->
        <?php $form = ActiveForm::begin([
            'id' => 'signup-form',
            'method' => 'post',
        ]); ?>

        <?= $form->field($model, 'name')->textInput()->label('Имя') ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true])->label('Почта') ?>

        <?= $form->field($model, 'phone')->widget(MaskedInput::class, [
            'mask' => '+7-999-999-9999',
        ])->label('Номер телефона') ?>

        <input type="submit" value="Отправить">
        <?php ActiveForm::end(); ?>
        <!-- Конец формы -->
    </div>
</div>
<!-- Контейнер с изображениями -->
<div class="body-content"></div>
<style>
    .image-container {
        position: relative;
        width: 100%;
        max-width: 1376px;
        height: 70px;
        border-radius: 16px;
        overflow: hidden;
        margin-top: -200px;
    }

    .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .text-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: Montserrat;
        font-weight: 400;
        font-size: 26px;
        line-height: 38px;
        letter-spacing: -1px;
        color: #000000;
        cursor: pointer;
    }
</style>
<div class="container text-center" style="margin-top: 0px">
    <div class="image-container">
        <img src="image/bg.png" alt="бекграунд">
        <span class="text-overlay">Изучайте вместе с нами!</span>
    </div>
</div>

<!-- Стиль карточек и контент -->
<div class="container my-5">
    <div class="row" style="margin-top: 150px">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm">
                <img src="image/orig.png" class="card-img-top" alt="Курс 1">
                <div class="card-body">
                    <h2 class="card-title">Английский язык</h2>
                    <p class="description-text">Изучите основы новой языковой грамматики и словарного запаса с помощью наших уникальных материалов.</p>
                    <p><a class="btn btn-custom" href="<?php echo \yii\helpers\Url::to(['/site/infokurs'])?>">Узнать о курсе</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm">
                <img src="image/orig.png" class="card-img-top" alt="Курс 2">
                <div class="card-body">
                    <h2 class="card-title">Английский язык</h2>
                    <p class="description-text">Станьте уверенными в разговорной речи с помощью интерактивных заданий и практики в реальных условиях.</p>
                    <p><a class="btn btn-custom" href="<?php echo \yii\helpers\Url::to(['/site/infokurs'])?>">Узнать о курсе</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm">
                <img src="image/orig.png" class="card-img-top" alt="Курс 3">
                <div class="card-body">
                    <h2 class="card-title">Английский язык</h2>
                    <p class="description-text">Изучите сложные аспекты языка через видеоуроки и культурные погружения. Учи языки с нами!</p>
                    <p><a class="btn btn-custom" href="<?php echo \yii\helpers\Url::to(['/site/infokurs'])?>">Узнать о курсе</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementById("closeModal");

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>
