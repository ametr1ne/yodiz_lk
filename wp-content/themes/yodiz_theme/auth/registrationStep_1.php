<?php /* Template Name: Регистрация */

if (isset($_GET['ref']) && !isset($_COOKIE['refID'])) {
    setcookie('refID', $_GET['ref'], time() + 3600 * 24 * 30, '/');
}

?>
<?php get_header('login') ?>
<main class="main">
    <div class="content">
        <form id="registration-form" method="post">
            <div class="form__content">
                <div class="error"></div>
                <h3>Регистрация в Yodiz School</h3>
                <div class="email input-block">
                    <label class="text-grey">E-mail</label>
                    <input name="email" class="input" type="email">
                    <span class="error" id="error-email"></span>
                </div>
                <div class="pass input-block">
                    <label class="text-grey">Пароль</label>
                    <input name="password" class="input" type="password">
                    <span class="error" id="error-pass"></span>
                </div>
            </div>
            <button class="btn blue-btn login-btn">Регистрация</button>
            <div class="form__content">
                <p class="text-grey">Нажимая кнопку, принимаю условия политики и пользовательского соглашения</p>
                <p class="text-grey">Уже есть аккаунт? <a href="<?=  home_url() ?>/authorization/">Войти</a></p>
            </div>
        </form>
    </div>
</main>
</body>
</html>