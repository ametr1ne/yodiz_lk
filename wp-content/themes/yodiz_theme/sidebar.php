<!-- aside(start) -->

<aside class="aside">
    <div class="aside__wrap" data-simplebar>

        <div class="aside__top">
            <a href="<?= home_url() ?>/courses"><h2>На главную</h2></a>
            <a href="<?= home_url() ?>/courses/schedule"><h2>Расписание</h2></a>
        </div>

        <div class="aside__courses">

			<?php displayCourses( $post) ?>

        </div>

        <div class="aside__btns">
            <a href="<?= home_url() ?>/user_account" class="btn greyborder-btn">Настройки аккаунта</a>
            <a href="<?= wp_logout_url( home_url() ) ?>" class="btn greyborder-btn">Выход</a>
        </div>

		<?php if ( $post->post_name === 'user_account' ) {
			$courseID = $_SESSION['parentID']; // ID корневой страницы для курсов
		} else {
			$courseID = get_post_ancestors( $post->ID )[1]; // ID корневой страницы для курсов
		} ?>

    </div>
    </div>
</aside>

<!-- aside(end) -->
