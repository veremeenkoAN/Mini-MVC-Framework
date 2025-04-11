<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой Сайт</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<header class="header">
    <div class="logo">

        <img src="/images/html.png" alt="Логотип">
        <span class="logo-text">I DON'T KNOW</span>
    </div>

    <!-- Кнопки -->
    <div class="nav-buttons">
        <?php if(!isset($_SESSION['name'])) : ?>
            <a href="/signup" class="btn btn-login">Регистрация</a>
            <a href="/signin" class="btn btn-login">Войти</a>
        <?php endif; ?>
        <?php if(isset($_SESSION['name'])) : ?>
            <a href="/delete" class="btn btn-logout">Выйти</a>
            <span><?= $_SESSION['name'] ?></span>
            <div class="profile-icon">
                <img src="/images/grisha.jpg" alt="Профиль">
            </div>
        <?php endif; ?>
    </div>
</header>
<?php if (!empty($_SESSION['flash'])):?>
    <div class="notification <?php
    echo $result = isset($_SESSION['flash']['success']) ? 'success' : 'error' ?>">
        <?= app()->session->getflash($result) ?>
    </div>
<?php endif;?>
<main>

    <?=  $this->content ?>


</main>
</body>
</html>