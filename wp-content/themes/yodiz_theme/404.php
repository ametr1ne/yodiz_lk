<?php get_header( '404') ?>

<main class="main">
    <h1>Ошибка 404</h1>
    <p>Страница, на которую вы пытаетесь попасть,
        не существует или была удалена. Начните
        <br> с главной страницы сайта школы</p>
    <a href="<?= home_url() ?>/courses" class="btn greyborder-btn">Перейти на главную страницу</a>
</main>

<?php get_footer() ?>
</body>
</html>