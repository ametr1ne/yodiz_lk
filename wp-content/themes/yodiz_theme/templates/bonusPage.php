<?php
/**
 * Template Name: Бонусная страница *
 */
get_header();
?>
<!-- main(start)-->

<main class="main">

	<?php get_sidebar() ?>

    <!-- content(start) -->

    <div class="content">
        <div class="content__wrapper">

            <p class="breadcrumbs text-grey"><a style="color: #0500FF" href="<?= home_url() ?>/courses">Курсы от Yodiz School</a> / Веб-дизайн, быстрый старт / <?php the_field( 'lesson_num' ) ?></p>
            <h1><?php the_field( 'title_name' ) ?></h1>

			<?php include 'componets/bonus_comp.php' ?>

			<?php get_footer() ?>

            <!-- main(end) -->

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
            <script src="<?= get_template_directory_uri() ?>/assets/js/timer.js"></script>

            </body>
            </html>