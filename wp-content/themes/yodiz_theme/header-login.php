<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/scss/loginPages.css">
    <script defer src="<?= get_template_directory_uri() ?>/assets/js/jquery.validate.min.js"></script>
    <script defer src="<?= get_template_directory_uri() ?>/assets/js/messages_ru.js"></script>
    <script defer src="<?= get_template_directory_uri() ?>/assets/js/jquery.maskedinput.min.js"></script>
    <script id="registration" defer src="<?= get_template_directory_uri() ?>/assets/js/registration.js"></script>
    <link rel="icon" type="image/x-icon" href="<?= get_template_directory_uri() ?>/assets/img/favicon.svg">
    <title><?php the_field( 'head_title' ) ?></title>
	<?php wp_head(); ?>
</head>
<body>
<!-- header(start) -->
<header class="header">
    <div class="header__wrapper">
        <div class="header__left">
            <div class="header__logo">
                <svg width="66" height="50" viewBox="0 0 66 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M48.6918 0H16.7627L0 16.9355L32.7273 50L65.4545 16.9355L48.6918 0ZM37.4687 24.2097V36.2903H27.9858V24.2097L16.7627 12.8548L22.3024 7.25806L32.7273 17.7903L43.1521 7.25806L48.6918 12.8548L37.4687 24.2097Z"
                          fill="white"/>
                </svg>
            </div>
        </div>
        <div class="header__btns">
            <a href="<?= home_url() ?>/registration/" class="btn header-btn btn2_dark">Зарегистрироваться</a>
            <a href="<?= home_url() ?>/authorization/" class="btn header-btn white-btn">Войти</a>
        </div>
    </div>
</header>

<!-- header(end) -->