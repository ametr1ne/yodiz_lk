<?php
/* Общая информация для всех сраниц */

if ( ! isset($_COOKIE['userID']) ) {
	header( 'Location: ' . home_url() . '/authorization' );
}

$bitrixUser = new BitrixBackend_User();

$user = $bitrixUser->getUserById($_COOKIE['userID']);
$userFirstName = $user->NAME;
$userLastName  = $user->LAST_NAME;

if ( isset( $user ) ) {
	$userName = $userFirstName . ' ' . $userLastName;
} else {
	$userName = 'Имя не задано';
}

/* // Общая информация для всех сраниц */
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/scss/settings.css"/>
    <link rel="icon" type="image/x-icon" href="<?= get_template_directory_uri() ?>/assets/img/favicon.svg">
    <title><?php the_field( 'title_name' ) ?></title>
	<?php wp_head(); ?>
</head>
<body>
<div class="dark"></div>
<!-- header(start) -->
<header class="header">
    <div class="header__burger-box">
        <button type="button" class="header__burger">
            <span class="header__line header__line--1"></span>
            <span class="header__line header__line--2"></span>
            <span class="header__line header__line--3"></span>
        </button>
    </div>
    <div class="header__wrapper">
        <div class="header__left">
            <div class="header__logo">
                <svg width="66" height="50" viewBox="0 0 66 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M48.6918 0H16.7627L0 16.9355L32.7273 50L65.4545 16.9355L48.6918 0ZM37.4687 24.2097V36.2903H27.9858V24.2097L16.7627 12.8548L22.3024 7.25806L32.7273 17.7903L43.1521 7.25806L48.6918 12.8548L37.4687 24.2097Z"
                          fill="white"/>
                </svg>
            </div>
            <a class="header__link" href="<?= home_url() ?>/courses">Мои курсы</a>
        </div>
        <div class="header__btns">
            <a href="<?= home_url() ?>/user_account" class="btn header-btn white-btn user-btn">
                <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M7.19482 6.1875C8.35117 6.1875 9.28857 5.25009 9.28857 4.09375C9.28857 2.9374 8.35117 2 7.19482 2C6.03848 2 5.10107 2.9374 5.10107 4.09375C5.10107 5.25009 6.03848 6.1875 7.19482 6.1875ZM7.19482 7.6875C9.17959 7.6875 10.7886 6.07852 10.7886 4.09375C10.7886 2.10898 9.17959 0.5 7.19482 0.5C5.21005 0.5 3.60107 2.10898 3.60107 4.09375C3.60107 6.07852 5.21005 7.6875 7.19482 7.6875Z"
                          fill="black"/>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M4.7498 9.59719C5.52497 9.2761 6.35578 9.11084 7.19482 9.11084C8.03386 9.11084 8.86468 9.2761 9.63985 9.59719C10.415 9.91827 11.1194 10.3889 11.7126 10.9822C12.3059 11.5755 12.7765 12.2798 13.0976 13.055C13.4187 13.8301 13.584 14.661 13.584 15.5H12.084C12.084 14.8579 11.9575 14.2222 11.7118 13.629L12.4047 13.342L11.7118 13.629C11.4661 13.0358 11.106 12.4968 10.652 12.0428C10.198 11.5888 9.659 11.2287 9.06582 10.983C8.47264 10.7373 7.83687 10.6108 7.19482 10.6108C6.55277 10.6108 5.917 10.7373 5.32382 10.983C4.73064 11.2287 4.19166 11.5888 3.73767 12.0428C3.28366 12.4968 2.92353 13.0358 2.67783 13.629C2.43213 14.2222 2.30566 14.8579 2.30566 15.5H0.805664C0.805664 14.661 0.970924 13.8301 1.29201 13.055C1.61309 12.2798 2.08372 11.5755 2.677 10.9822C3.27029 10.3889 3.97463 9.91827 4.7498 9.59719Z"
                          fill="black"/>
                </svg>
				<?php echo $userName ?>
            </a>
            <a href="<?php echo wp_logout_url( home_url() ); ?>" class="btn logout-btn header-btn d_greyborder-btn">Выйти</a>
        </div>
    </div>
</header>

<aside class="aside">
    <div class="aside__wrap">
        <div class="aside__top">
            <a href="<?= home_url() ?>/courses"><h2>На главную</h2></a>
        </div>
        <div class="aside__btns">
            <a href="<?= home_url() ?>/user_account" class="btn greyborder-btn">Настройки аккаунта</a>
            <a href="<?= wp_logout_url( home_url() ) ?>" class="btn greyborder-btn">Выход</a>
        </div>
    </div>
</aside>

<!-- header(end) -->