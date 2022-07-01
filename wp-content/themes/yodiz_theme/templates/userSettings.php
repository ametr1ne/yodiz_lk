<?php
/**
 * Template Name: Страница настроек *
 */
get_header('settings');
?>

<main class="main">

    <!-- content(start) -->

    <div class="content">
        <div class="content__wrapper">

            <h1><?php the_field( 'title_name' ) ?></h1>

            <p class="breadcrumbs"><a href="<?= home_url() ?>/courses">Мои курсы</a><span class="text-grey"> / </span><span class="text-grey">Настройки</span></p>

            <form id="personal-form" class="details content-item">
                <div class="text">
                    <h3>Личная информация</h3>
                    <p class="correction text-grey">Пожалуйста указывайте верные данные, это важно для вашего будущего
                        сертификата о пройденном курсе</p>
                </div>
                <div class="details__actions">
                    <div class="names">
                        <div>
                            <div class="first-name input-block">
                                <label class="text-grey">Имя</label>
                                <input name="name" class="input" type="text" aria-describedby="error-name"
                                       value="<?php $bitrixUser = new BitrixBackend_User();
                                       $user = $bitrixUser->getUserById($_COOKIE['userID']);
                                       echo $user->NAME; ?>">
                                <span class="error" id="error-name"></span>
                            </div>
                        </div>
                        <div>
                            <div class="last-name input-block">
                                <label class="text-grey">Фамилия</label>
                                <input name="sec_name" class="input" type="text" aria-describedby="error-sec_name"
                                       value="<?php echo $user->LAST_NAME ?>">
                                <span class="error" id="error-sec_name"></span>
                            </div>
                        </div>
                    </div>
                    <div class="phone input-block">
                        <label class="text-grey">Телефон</label>
                        <input name="phone" class="input phone-mask" type="text" aria-describedby="error-phone"
                               value="<?php
						       echo $user->PHONE[0]->VALUE;
						       ?>">
                        <span class="error" id="error-phone"></span>
                    </div>
                    <div class="data-sex">
                        <div class="birth-date">
                            <div class="last-name input-block">
                                <label class="text-grey">Дата рождения</label>
                                <input name="date" class="input date-mask" type="text" aria-describedby="error-date"
                                       value="<?php
								       echo $user->BIRTHDATE;
								       ?>">
                                <span class="error" id="error-date"></span>
                            </div>
                        </div>
                        <div class="sex-block">
                            <div class="sex">
                                <p class="text-grey">Пол:</p>
								<?php
								$userDate = $user->UF_CRM_1656330909; ?>
                                <div class="sex-box">
                                    <input class="radio-sex" name="sex" <?php if ( $userDate == 'Женский' ) {
		                                echo 'checked';
	                                } ?> value="Женский" type="radio" id="female" aria-describedby="error-sex">
                                    <label class="text-grey sex-btn" for="female">Женский</label>
                                    <input class="radio-sex" name="sex" <?php if ( $userDate == 'Мужской' ) {
		                                echo 'checked';
	                                } ?> value="Мужской" type="radio" id="male" aria-describedby="error-sex">
                                    <label class="text-grey sex-btn" for="male">Мужской</label>
                                </div>
                                <span class="error" id="error-sex"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn blue-btn">Сохранить</button>
            </form>

            <div class="settings-block content-item">
                <h3>Данные авторизации</h3>
                <div class="text">
                    <p class="text-grey">E-mail</p>
                    <p class="user-email">
		                <?php echo $user->EMAIL[0]->VALUE ?>
                    </p>
                </div>
            </div>

            <div class="settings-block content-item ref-block">
                <h3>Партнерская ссылка</h3>
                <div class="details__actions">
                    <div class="ref-input">
                        <input type="text" id="ref-link" class="input" disabled
                               value="<?= home_url() ?>/registration?ref=<?= get_current_user_id() ?>">
                        <button onclick="copytext('#ref-link')" class="copy-btn">Копировать</button>
                    </div>
                </div>
            </div>

            <form id="changing-form" class="changing-pass content-item">
                <h3>Смена пароля</h3>
                <div class="details__actions">
                    <div class="error"></div>
                    <div class="password input-block">
                        <label class="text-grey">Введите текущий пароль</label>
                        <input name="password" class="input" type="password" aria-describedby="error-pass">
                        <span class="error" id="error-pass"></span>
                    </div>
                    <div class="bottom">
                        <div class="password input-block">
                            <label class="text-grey">Введите новый пароль</label>
                            <input id="new-pass" name="new_password" class="input" type="password"
                                   aria-describedby="error-pass-new">
                            <span class="error" id="error-pass-new"></span>
                        </div>
                        <div class="password input-block">
                            <label class="text-grey">Повторите новый пароль</label>
                            <input id="new-pass-repeat" name="new_password_repeat" class="input" type="password"
                                   aria-describedby="error-pass-repeat">
                            <span class="error" id="error-pass-repeat"></span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn blue-btn">Сохранить</button>
            </form>
</main>

<!-- main(end) -->

<?php get_footer() ?>

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

<!-- main(end) -->

<script src="<?= get_template_directory_uri() ?>/assets/js/jquery.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/js/script.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/js/jquery.validate.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/js/messages_ru.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/js/jquery.maskedinput.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/js/registration.js"></script>

</body>
</html>