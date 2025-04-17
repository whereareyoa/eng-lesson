<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php

    NavBar::begin([
        'brandLabel' => 'LanguageLearn', // Просто название
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-light bg-light fixed-top', // Светлый фон, фиксированный
            'style' => 'box-shadow: 0 2px 4px rgba(0,0,0,.04);', // Тень
        ],
    ]);

    // Основное меню
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'], // Основная навигация
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index'], 'options' => ['class' => 'nav-item']],
            ['label' => 'Уроки', 'url' => ['/lesson/index'], 'options' => ['class' => 'nav-item']],
            ['label' => 'Курс', 'url' => ['/site/kurs'], 'options' => ['class' => 'nav-item']],
            ['label' => 'Слова', 'url' => ['/word/index'], 'options' => ['class' => 'nav-item']],
            ['label' => 'Рандомное слово', 'url' => ['/word/random'], 'options' => ['class' => 'nav-item']],
            ['label' => 'Форум', 'url' => ['/forum/index'], 'options' => ['class' => 'nav-item']],
        ],
    ]);

    // Меню для авторизации/регистрации/выхода
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'], // Выравнивание справа
        'items' => [
            Yii::$app->user->isGuest ?
                ['label' => 'Регистрация', 'url' => ['/site/signup'], 'options' => ['class' => 'nav-item']] :
                '<li class="nav-item">'
                . Html::beginForm(['/site/logout'])
                . Html::submitButton(
                    'Выход (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'nav-link btn btn-link logout']
                )
                . Html::endForm()
                . '</li>',
            Yii::$app->user->isGuest ?
                ['label' => 'Авторизация', 'url' => ['/site/login'], 'options' => ['class' => 'nav-item']] :
                '',
        ],
    ]);
    NavBar::end();
    ?>
</header>

<style>
    /* Общие стили для пунктов меню */
    .navbar-nav .nav-link {
        color: #343a40; /* Цвет текста по умолчанию */
        transition: color 0.3s ease, background-color 0.3s ease; /* Плавный переход цвета и фона */
    }

    /* Стили для пунктов меню при наведении */
    .navbar-nav .nav-link:hover {
        color: #000; /* Затемненный цвет текста при наведении */
        background-color: rgba(0, 0, 0, 0.1); /* Легкое затемнение фона */
        border-radius: 15px; /* Закругление углов фона */
    }

    /* Стили для кнопки "Выход" */
    .logout {
        color: #343a40 !important; /* Цвет текста */
        padding: 0; /* Убираем padding, чтобы кнопка выглядела как ссылка */
        border: none; /* Убираем обводку */
        background: none; /* Убираем фон */
    }

    .logout:hover {
        color: #000 !important; /* Затемненный цвет текста при наведении */
        text-decoration: none; /* Убираем подчеркивание */
    }

    /* Мобильная версия: уменьшаем отступы на экранах меньше 768px */
    @media (max-width: 768px) {
        .navbar-nav .nav-item {
            margin-left: 10px;
        }
    }
</style>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<?php $this->endBody() ?>
</body>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</html>
<?php $this->endPage() ?>
