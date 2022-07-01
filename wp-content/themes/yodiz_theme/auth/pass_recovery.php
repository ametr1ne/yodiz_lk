<?php /* Template Name: Восстановление пароля */ ?>
<?php get_header('login') ?>
<main class="main">
    <div class="content">
        <form id="recovery-form">
            <h3>Восстановление пароля</h3>
            <div class="email input-block">
                <div class="error"></div>
                <label class="text-grey">E-mail</label>
                <input name="email" class="input" type="email" aria-describedby="error-email">
                <span class="error" id="error-email"></span>
            </div>
            <p class="text-grey mail-sent">Вам отправлено письмо
                со ссылкой на сброс пароля</p>
            <button class="btn blue-btn login-btn">Восстановить пароль</button>
            <p class="text-grey">Еще нет аккаунта? <a href="<?=  home_url() ?>/registration/">Зарегистрироваться</a></p>
        </form>
    </div>
</main>
</body>
</html>