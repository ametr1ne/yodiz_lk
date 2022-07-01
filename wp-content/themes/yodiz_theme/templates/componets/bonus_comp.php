<!-- progress(start)-->

<?php require 'progressBlock.php' ?>

<!-- progress(end) -->

<!-- theory(start) -->

<?php showVideos() ?>

<!-- theory(end) -->

<!-- homework(start)-->


<!-- homework(end)-->

<!-- materials(start)-->

<?php showMaterials() ?>

<!-- materials(end)-->

<!-- checking-hw(start)-->

<?php if (!json_decode(get_user_meta(get_current_user_id(), 'lessonsProgress')[0])->$courseID->access) { ?>
<div class="sale-card">
	<?php $dateFinish = '2022-05-11 20:00:00';

	$dateEnd = date("U", strtotime($dateFinish));

	if ($dateEnd < date("U")) {
		while ($dateEnd < date("U")) {
			$dateEnd = strtotime("+3 days", $dateEnd);
		}
	} ?>
    <div class="tape">
        <div class="tape-item">
            <p class="tape-text">Скидка — 8 000 руб.*</p>
        </div>
        <div class="tape-item"></div>
        <div class="tape-item"></div>
    </div>
    <p class="sale-correction">*Скидка 8 000 руб. действует ограниченное количество времени для участников курса
        «Веб-дизайн, быстрый старт»</p>
    <div class="sale-title">
        <p class="title-text">Профессия веб-дизайнер</p>
        <div class="title-teachers">
            <img src="<?= get_template_directory_uri() ?>/assets/img/4_dima_ava.png" alt="dima">
            <img src="<?= get_template_directory_uri() ?>/assets/img/1_lika_ava%201.png" alt="dima">
            <img src="<?= get_template_directory_uri() ?>/assets/img/1_lecha_ava.png" alt="dima">
        </div>
    </div>
	<?php
	if ( date( 'U' ) < $dateEnd ) {
		$diff = $dateEnd - date( "U" );
		echo "<p data-diff=" . date($diff) . " class='sale-text' id='h1'>Успей записаться на основной курс
        со скидкой, страница закроется через —
        <span><span class='timer__days'>00</span> <span class='timer__text'></span>, <span class='timer__hours'>00</span>:<span
                            class='timer__minutes'>00</span>:<span class='timer__seconds'>00</span></span></p>";
	} else {
		echo "<p class='sale-text' style='margin: 0 auto'>Акция завершена</p>";
	} ?>
    <a href="https://yodizschool.ru/online/sales" target="_blank" class="sale-bnt">Записаться со скидкой</a>
</div>
<?php } ?>