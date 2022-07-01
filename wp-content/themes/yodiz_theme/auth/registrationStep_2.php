<?php /* Template Name: Второй этап регистрации */
setcookie('userID', $_SESSION['userID'], time() + 3600 * 24 * 30, '/')
?>

<?php get_header( 'login' ) ?>

<main class="main">
    <div class="content">
        <form id="details-form" class="details">
            <div class="form__content">
                <div class="error"></div>
                <h3>Отлично! Расскажите немного о себе и мы начинаем</h3>
                <p class="correction text-grey">Пожалуйста, указывайте верные данные, это важно для вашего будущего
                    сертификата о пройденном курсе</p>
                <div class="details__actions">
                    <div class="names">
                        <div>
                            <div class="first-name input-block">
                                <label class="text-grey">Имя</label>
                                <input name="name" class="input" type="text" aria-describedby="error-name">
                                <span class="error" id="error-name"></span>
                            </div>
                        </div>
                        <div>
                            <div class="last-name input-block">
                                <label class="text-grey">Фамилия</label>
                                <input name="sec_name" class="input" type="text" aria-describedby="error-sec_name">
                                <span class="error" id="error-sec_name"></span>
                            </div>
                        </div>
                    </div>
                    <div class="phone input-block">
                        <label class="text-grey">Телефон</label>
                        <input name="phone" class="input phone-mask" type="text" aria-describedby="error-phone">
                        <span class="error" id="error-phone"></span>
                    </div>
                    <div class="data-sex">
                        <div class="birth-date">
                            <div class="last-name input-block">
                                <label class="text-grey">Дата рождения</label>
                                <input name="date" class="input date-mask" type="text" aria-describedby="error-date">
                                <span class="error" id="error-date"></span>
                            </div>
                        </div>
                        <div class="sex-block">
                            <div class="sex">
                                <p class="text-grey">Пол:</p>
                                <div class="sex-box">
                                    <input class="radio-sex" name="sex" type="radio" id="female" value="Женский"
                                           aria-describedby="error-sex">
                                    <label class="text-grey sex-btn" for="female">Женский</label>
                                    <input class="radio-sex" name="sex" type="radio" id="male" value="Мужской"
                                           aria-describedby="error-sex">
                                    <label class="text-grey sex-btn" for="male">Мужской</label>
                                </div>
                                <span class="error" id="error-sex"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn blue-btn login-btn">Сохранить</button>
        </form>
    </div>
</main>
</body>
</html>