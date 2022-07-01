<?php /* Template Name: Смена пароля */

$url = $_SERVER['QUERY_STRING'];
parse_str( $url, $get );
$data_post = null;

if ( $url !== '' && get_user_by( 'ID', $get['id'] ) ) {
	$data_post =  $get['id'];
} else {
	header( 'Location: ' . home_url() . '/authorization' );
}
?>
<?php get_header('login') ?>
<main class="main">
    <form class="new-pass" id="changing-form" data-post="<?= $data_post ?>">
        <h2 style="margin-bottom: 6px">Придумайте новый пароль</h2>
        <div class="password input-block">
            <label class="text-grey">Новый пароль</label>
            <input id="new_pass" name="password" class="input" type="password" aria-describedby="error-pass"/>
            <span class="error" id="error-pass"></span>
        </div>
        <div class="password input-block">
            <label class="text-grey">Повторите новый пароль</label>
            <input id="new-pass-repeat" name="new_password_repeat" class="input" type="password"
                   aria-describedby="error-pass-repeat">
            <span class="error" id="error-pass-repeat"></span>
        </div>
        <button class="submit-btn change-btn">Изменить</button>
        <a href="<?= home_url() ?>/authorization/" class="submit-btn login-btn">Войти в личный кабинет</a>
    </form>
</main>
</body>
</html>