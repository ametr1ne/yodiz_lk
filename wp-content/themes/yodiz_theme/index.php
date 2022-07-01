<?php
/**
 * Template Name: Главная страница *
 */

get_header();
?>

<!-- main(start)-->

<main class="main">

	<?php get_sidebar() ?>

    <!-- content(start) -->

    <div class="content">
        <div class="content__wrapper">
            <h1><?php the_field( 'title_name' ) ?></h1>

            <p class="breadcrumbs text-grey"><a href="<?= home_url() ?>/courses">Мои курсы</a> / <a
                        href="<?= home_url() ?>/courses/designschedule">Расписание</a>
                / <?php the_field( 'course_name', $post->post_parent ); ?> — <?php the_field( 'lesson_num' ) ?></p>

			<?php

            $lesson = new BitrixBackend_Lesson();

            var_dump($lesson->getLesson($_GET['id']));

            include 'templates/componets/free_lesson.php' ?>

        </div>
    </div>

    <!-- content(end) -->

	<?php get_footer() ?>

</main>

<!-- main(end) -->

<div class="popup free-popup marafon-popup">
    <svg class="close" width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 1.50019L7.99988 8.50007L14.9999 1.5" stroke="#9090A9" stroke-width="2" stroke-linecap="round"/>
        <path d="M15 15.5L8.00012 8.50011L1.00005 15.5002" stroke="#9090A9" stroke-width="2" stroke-linecap="round"/>
    </svg>
    <div class="popup__content">
        <p class="free">Следите за ходом марафона в закрытой группе ВКонтакте — <a class="marafon_link"
                                                                                   href="https://vk.com/yodizmarafon"
                                                                                   target="_blank">vk.com/yodizmarafon</a>
        </p>
        <a href="https://vk.com/yodizmarafon" class="btn popup__btn" target="_blank">Перейти в группу</a>
    </div>
</div>

<div class="popup free-popup">
    <svg class="close" width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 1.50019L7.99988 8.50007L14.9999 1.5" stroke="#9090A9" stroke-width="2" stroke-linecap="round"/>
        <path d="M15 15.5L8.00012 8.50011L1.00005 15.5002" stroke="#9090A9" stroke-width="2" stroke-linecap="round"/>
    </svg>
    <div class="popup__content">
        <p class="free">Следи за расписанием следующих занятий курса
            «Веб-дизайн, быстрый старт» в телеграм боте Yodiz School</p>
        <a href="https://t.me/Yodiz_School_Bot" class="btn popup__btn" target="_blank">Открыть бота</a>
    </div>
</div>

<div class="popup paid-popup">
    <svg class="close" width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 1.50019L7.99988 8.50007L14.9999 1.5" stroke="#9090A9" stroke-width="2" stroke-linecap="round"/>
        <path d="M15 15.5L8.00012 8.50011L1.00005 15.5002" stroke="#9090A9" stroke-width="2" stroke-linecap="round"/>
    </svg>
    <div class="popup__content">
        <svg class="lock" width="28" height="35" viewBox="0 0 28 35" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_677_749)">
                <path d="M15.6887 21H12.3105V28H15.6887V21Z" fill="black"/>
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M27.5 17.5C27.5 17.4481 27.5 17.3963 27.5 17.3444V14H24.1219H22.4328V8.76296C22.4328 3.91481 18.6573 0 13.9876 0C9.31785 0 5.54232 3.91481 5.54232 8.76296V10.5259H8.94526V8.76296C8.94526 5.85926 11.2056 3.5 14.0124 3.5C16.8192 3.5 19.0796 5.85926 19.0796 8.76296V14H16.8937H11.8017H11.0814H8.94526H5.56716H4.5736H3.87811H0.5V17.3444C0.5 17.3963 0.5 17.4481 0.5 17.5V31.5C0.5 31.5519 0.5 31.6037 0.5 31.6556V34.9741H3.48068C3.60488 35 3.72907 35 3.87811 35H24.1219C24.2461 35 24.3951 35 24.5193 34.9741H27.5V31.6556C27.5 31.6037 27.5 31.5519 27.5 31.5V17.5V17.5ZM3.87811 31.5V17.5H24.1219V31.5H16.8937H11.1063H3.87811Z"
                      fill="black"/>
            </g>
            <defs>
                <clipPath id="clip0_677_749">
                    <rect x="0.5" width="27" height="35" fill="white"/>
                </clipPath>
            </defs>
        </svg>
        <h2>Регистрация на курс «Профессия веб-дизайнер»</h2>
        <p class="text-grey paid">Под руководством практикующих, опытных наставников ты пройдешь путь становления в
            профессии веб-дизайнер. С
            еженедельной обратной связью освоишь до «уровня про» программы: Figma, Photoshop и Illustrator. Освоишь
            моушн-дизайн в программе Adobe Animate. На основе реальных клиентов разработаешь более 12 коммерчески
            обоснованных проектов в портфолио. И, самое важное, подготовишь серьёзную базу для дальнейшего поиска
            стажировки, работы или заказов на фриланс.</p>
        <a href="https://yodizschool.ru/online" target="_blank" class="btn popup__btn">Зарегистрироваться на курс</a>
    </div>
</div>

<div class="dark-popup"></div>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (m, e, t, r, i, k, a) {
        m[i] = m[i] || function () {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(88205003, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true
    });
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/88205003" style="position:absolute; left:-9999px;" alt=""/>
    </div>
</noscript>
<!-- /Yandex.Metrika counter -->

<script src="<?= get_template_directory_uri() ?>/assets/js/jquery.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/js/player.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/js/simplebar.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/js/script.js"></script>

<!--	        --><?php //wp_footer(); ?>
</body>
</html>