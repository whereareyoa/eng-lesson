<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="container my-5">

    <div class="row" style="margin-top: 150px">
        <?php foreach ($kurs as $k): ?>
            <div class="col-lg-4 mb-4 course-card">
                <div class="card shadow-sm">
                    <img src="image/<?php echo ($k['img'])?>" class="card-img-top" alt="Курс 1">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo ($k['name'])?></h2>
                        <p class="description-text"><?php echo ($k['body'])?></p>
                        <p><a class="btn btn-custom" href="<?php echo \yii\helpers\Url::to(['/site/infokurs'])?>">Узнать о курсе</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4 course-card">
                <div class="card shadow-sm">
                    <img src="image/<?php echo ($k['img'])?>" class="card-img-top" alt="Курс 1">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo ($k['name'])?></h2>
                        <p class="description-text"><?php echo ($k['body'])?></p>
                        <p><a class="btn btn-custom" href="<?php echo \yii\helpers\Url::to(['/site/infokurs'])?>">Узнать о курсе</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4 course-card">
                <div class="card shadow-sm">
                    <img src="image/<?php echo ($k['img'])?>" class="card-img-top" alt="Курс 1">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo ($k['name'])?></h2>
                        <p class="description-text"><?php echo ($k['body'])?></p>
                        <p><a class="btn btn-custom" href="<?php echo \yii\helpers\Url::to(['/site/infokurs'])?>">Узнать о курсе</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4 course-card">
                <div class="card shadow-sm">
                    <img src="image/<?php echo ($k['img'])?>" class="card-img-top" alt="Курс 1">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo ($k['name'])?></h2>
                        <p class="description-text"><?php echo ($k['body'])?></p>
                        <p><a class="btn btn-custom" href="<?php echo \yii\helpers\Url::to(['/site/infokurs'])?>">Узнать о курсе</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4 course-card">
                <div class="card shadow-sm">
                    <img src="image/<?php echo ($k['img'])?>" class="card-img-top" alt="Курс 1">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo ($k['name'])?></h2>
                        <p class="description-text"><?php echo ($k['body'])?></p>
                        <p><a class="btn btn-custom" href="<?php echo \yii\helpers\Url::to(['/site/infokurs'])?>">Узнать о курсе</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4 course-card">
                <div class="card shadow-sm">
                    <img src="image/<?php echo ($k['img'])?>" class="card-img-top" alt="Курс 1">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo ($k['name'])?></h2>
                        <p class="description-text"><?php echo ($k['body'])?></p>
                        <p><a class="btn btn-custom" href="<?php echo \yii\helpers\Url::to(['/site/infokurs'])?>">Узнать о курсе</a></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<style>
    /* Загружаем шрифт для анимаций */
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Roboto:wght@400;500&display=swap');

    /* Основной контейнер */
    .container {
        font-family: 'Roboto', sans-serif;
    }

    .card {
        transition: transform 0.2s ease-in-out, box-shadow 0.3s ease-in-out;
        border: none; /* Убираем лишние границы */
        border-radius: 10px; /* Закругленные углы */
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s forwards; /* Анимация появления карточки */
    }

    /* Анимация появления карточки */
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); /* Эффект тени при наведении */
    }

    .card-title {
        font-weight: bold;
        font-family: 'Montserrat', sans-serif; /* Шрифт заголовков */
        margin-bottom: 15px;
    }

    .btn-custom {
        background-color: #7787e1; /* Нежно фиолетовый цвет фона кнопки */
        color: white; /* Цвет текста кнопки */
        border-radius: 20px; /* Закругление кнопки */
        transition: background-color 0.3s ease-in-out;
    }

    .btn-custom:hover {
        background-color: #9da9ea; /* Цвет фона кнопки при наведении */
    }

    .description-text {
        color: #6c757d; /* Цвет текста описания */
    }

    .card-img-top {
        border-top-left-radius: 10px; /* Закругление углов картинки */
        border-top-right-radius: 10px; /* Закругление углов картинки */
        height: 200px; /* Задаем высоту для единого стиля */
        object-fit: cover; /* Обеспечиваем обрезание изображения по размеру */
    }

    /* Анимация для карточек при скролле */
    .course-card {
        opacity: 0;
        animation: slideIn 1s ease-out forwards;
    }

    /* Анимация скольжения карточки */
    @keyframes slideIn {
        0% {
            opacity: 0;
            transform: translateY(50px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Стили для мобильных устройств */
    @media (max-width: 768px) {
        .container {
            padding: 0 15px;
        }

        .card {
            margin-bottom: 20px;
        }

        .btn-custom {
            width: 100%;
        }
    }
</style>

<script>
    // Анимация при прокрутке
    document.addEventListener("DOMContentLoaded", function () {
        const courses = document.querySelectorAll('.course-card');
        const options = {
            threshold: 0.3
        };

        const observer = new IntersectionObserver(function (entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, options);

        courses.forEach(course => {
            observer.observe(course);
        });
    });
</script>
