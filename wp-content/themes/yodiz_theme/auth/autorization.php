<?php /* Template Name: Авторизация */
?>
<?php get_header( 'login' ) ?>
<main class="main">
    <div class="content">
        <form id="auth-form" class="form">
            <div class="form__content">
                <div class="error"></div>
                <h3>Вход в личный кабинет</h3>
                <div class="email input-block">
                    <label class="text-grey">E-mail</label>
                    <input name="email" class="input" type="email" aria-describedby="error-email">
                    <span class="error" id="error-email"></span>
                </div>
                <div class="pass input-block">
                    <label class="text-grey">Пароль</label>
                    <input name="password" class="input" type="password" aria-describedby="error-pass">
                    <span class="error" id="error-pass"></span>
                </div>
            </div>
            <button class="btn blue-btn login-btn">Войти</button>
            <div class="form__content">
                <a href="<?= home_url() ?>/pass_recovery/" class="recovery">Восстановить пароль</a>
                <p class="text-grey">Нажимая кнопку, принимаю условия политики и пользовательского соглашения</p>
                <p class="text-grey">Еще нет аккаунта? <a href="<?= home_url() ?>/registration/">Зарегистрироваться</a></p>
            </div>
        </form>
    </div>
</main>
</body>
</html>