<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Авторизация';
?>

<style>
    body {
        background-color: #f8f9fa; /* Светлый фон для всей страницы */
        font-family: 'Arial', sans-serif; /* Основной шрифт */
    }

    .site-login {
        max-width: 400px; /* Максимальная ширина формы */
        margin: 100px auto; /* Центрирование формы по вертикали и горизонтали */
        padding: 20px; /* Паддинг вокруг формы */
        border: 2px solid #6a5acd; /* Фиолетовая обводка формы */
        border-radius: 10px; /* Закругление углов формы */
        background-color: white; /* Белый фон для формы */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Тень под формой */
    }

    h1 {
        text-align: center; /* Центрирование заголовка */
        color: #6a5acd; /* Фиолетовый цвет заголовка */
        margin-bottom: 30px; /* Отступ снизу */
    }

    .form-control {
        border-radius: 5px; /* Закругление углов полей ввода */
        border: 2px solid #6a5acd; /* Фиолетовая обводка полей ввода */
        padding: 15px; /* Паддинг внутри поля */
    }

    .form-control:focus {
        border-color: #8a3ffc; /* Более светлая обводка при фокусе */
        box-shadow: 0 0 5px rgba(106, 92, 205, 0.5); /* Эффект тени при фокусе */
    }

    .btn-primary {
        background-color: #6a5acd; /* Основной цвет кнопки */
        border: none; /* Убираем границу кнопки */
        padding: 15px; /* Паддинг внутри кнопки */
        width: 100%; /* Полная ширина кнопки */
        border-radius: 5px; /* Закругление углов кнопки */
        margin-top: 10px; /* Отступ сверху */
    }

    .btn-primary:hover {
        background-color: #8a3ffc; /* Более светлый оттенок при наведении */
    }

    .custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
        background-color: #6a5acd; /* Фиолетовый цвет для контрольного поля */
        border-color: #6a5acd; /* Фиолетовая обводка для контрольного поля */
    }
</style>

<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-form-label'],
            'inputOptions' => ['class' => 'form-control'],
            'errorOptions' => ['class' => 'invalid-feedback'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин') ?>

    <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

    <?= $form->field($model, 'rememberMe')->checkbox([
        'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div>{error}</div>",
    ])->label('Запомнить меня') ?>

    <div class="form-group">
        <div>
            <?= Html::submitButton('Вход', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>